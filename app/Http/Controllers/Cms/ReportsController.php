<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Branch;
use App\InventoryTransaction;
use DB;

class ReportsController extends Controller
{
    
    private $icon = 'icon-layers';

    private function getInventoryTransaction($start_date, $end_date, $branch, $stock_type, $limit=30) {
        
        $whereData = [
            ['it.type', '!=', 'transfer']
        ];
        if($start_date != null) {
            $whereData[] = [ DB::raw("DATE_FORMAT(it.created_at, '%Y-%m-%d')"), '>=', $start_date ];
        }

        if($end_date != null) {
            $whereData[] = [ DB::raw("DATE_FORMAT(it.created_at, '%Y-%m-%d')"), '<=', $end_date ];
        }

        if($branch != '') {
            $whereData[] = ['it.from_branch_id', $branch];
        }

        if($stock_type != '') {
            $whereData[] = ['it.type', $stock_type];
        }

        $data = DB::table('inventory_transactions AS it')
                ->join('inventory_transaction_details AS itd', 'itd.inventory_transaction_id', '=', 'it.id')
                ->join('products AS p', 'p.id', '=', 'itd.product_id')
                ->join('users AS u', 'u.id', '=', 'it.created_by')
                ->select(
                    'it.id',
                    'it.type',
                    'p.name',
                    'itd.quantity',
                    DB::raw("DATE_FORMAT(it.created_at, '%Y-%m-%d') AS date"),
                    DB::raw("CONCAT(u.last_name, ' ', u.first_name) AS fullName")
                )
                ->where($whereData)
                ->orderBy('it.id')
                ->paginate($limit);;

        return $data;
    }

    private function getTransferInventoryTransaction($start_date, $end_date, $from_branch, $to_branch, $limit=30) {
        
        $whereData = [
            ['it.type', 'transfer']
        ];
        if($start_date != null) {
            $whereData[] = [ DB::raw("DATE_FORMAT(it.created_at, '%Y-%m-%d')"), '>=', $start_date ];
        }

        if($end_date != null) {
            $whereData[] = [ DB::raw("DATE_FORMAT(it.created_at, '%Y-%m-%d')"), '<=', $end_date ];
        }

        if($from_branch != '') {
            $whereData[] = ['it.from_branch_id', $from_branch];
        }

        if($to_branch != '') {
            $whereData[] = ['it.to_branch_id', $to_branch];
        }

        $data = DB::table('inventory_transactions AS it')
                ->join('inventory_transaction_details AS itd', 'itd.inventory_transaction_id', '=', 'it.id')
                ->join('products AS p', 'p.id', '=', 'itd.product_id')
                ->join('users AS u', 'u.id', '=', 'it.created_by')
                ->select(
                    'it.id',
                    'it.type',
                    'p.name',
                    'itd.quantity',
                    DB::raw("DATE_FORMAT(it.created_at, '%Y-%m-%d') AS date"),
                    DB::raw("CONCAT(u.last_name, ' ', u.first_name) AS fullName")
                )
                ->where($whereData)
                ->orderBy('it.id')
                ->paginate($limit);;

        return $data;
    }

    public function stock(Request $request) {
        $branches = Branch::getBranchByAuth();
        $f_start_date = isset($request->start_date) ? $request->start_date : date("Y-m-d");
        $f_end_date = isset($request->end_date) ? $request->end_date : date("Y-m-d");
        $f_branch = isset($request->branch) ? $request->branch : '';
        $f_stock_type = isset($request->stock_type) ? $request->stock_type : '';
        $stocks = $this->getInventoryTransaction($f_start_date, $f_end_date, $f_branch, $f_stock_type, 30);
       
        $branch = Branch::find($f_branch);
        $stockTypes = [ 
            'adjust_add' => 'Adjust Add', 
            'adjust_sub' => 'Adjust Sub', 
            'stock_in' => 'Stock In',
            'wasted' => 'Wasted', 
        ];
        $data = [
            'title' => 'Stock Report',
            'icon' => $this->icon,
            'branches' => $branches,
            'stockTypes' => $stockTypes,
            'f_start_date' => $f_start_date,
            'f_end_date' => $f_end_date,
            'f_branch' => $f_branch,
            'f_stock_type' => $f_stock_type,
            'stocks' => $stocks,
            'branch' => $branch
        ];
        return view('cms.report.stock')->with($data);
    }

    public function transferStock(Request $request) {
        $branches = Branch::getBranchByAuth();
        $f_start_date = isset($request->start_date) ? $request->start_date : date("Y-m-d");
        $f_end_date = isset($request->end_date) ? $request->end_date : date("Y-m-d");
        $f_from_branch = isset($request->from_branch) ? $request->from_branch : '';
        $f_to_branch = isset($request->to_branch) ? $request->to_branch : '';
        $stocks = $this->getTransferInventoryTransaction($f_start_date, $f_end_date, $f_from_branch, $f_to_branch, 30);
       
        $from_branch = Branch::find($f_from_branch);
        $to_branch = Branch::find($f_to_branch);

        $data = [
            'title' => 'Stock Report',
            'icon' => $this->icon,
            'branches' => $branches,
            'f_start_date' => $f_start_date,
            'f_end_date' => $f_end_date,
            'f_from_branch' => $f_from_branch,
            'f_to_branch' => $f_to_branch,
            'stocks' => $stocks,
            'from_branch' => $from_branch,
            'to_branch' => $to_branch
        ];
        return view('cms.report.transfer-stock')->with($data);
    }

    public function daily() {
        $data = [
            'title' => 'Daily Report',
            'icon' => $this->icon
        ];
        return view('cms.report.daily')->with($data);
    }

    public function month() {
        $data = [
            'title' => 'Monthly Report',
            'icon' => $this->icon
        ];
        return view('cms.report.month')->with($data);
    }
    public function year() {
        $data = [
            'title' => 'Yearly Report',
            'icon' => $this->icon
        ];
        return view('cms.report.year')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
