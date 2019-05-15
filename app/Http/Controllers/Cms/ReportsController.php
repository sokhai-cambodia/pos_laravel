<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Branch;
use App\Room;
use DB;

class ReportsController extends Controller
{
    
    private $icon = 'icon-layers';

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

    public function daily(Request $request) {
        
        $f_branch = isset($request->branch) ? $request->branch : '';
        $f_invoice_no = isset($request->invoice_no) ? $request->invoice_no : '';
        $f_room = isset($request->room) ? $request->room : '';
        $f_date = isset($request->date) ? $request->date : date("Y-m-d");
        
        $invoices = $this->getInvoices($f_branch, $f_room, $f_date, $f_invoice_no, 30);
        $branches = Branch::getBranchByAuth();
        $rooms = Room::all();

        $branch = Branch::find($f_branch);
        $room = Room::find($f_room);

        $data = [
            'title' => 'Daily Report',
            'icon' => $this->icon,
            'invoices' => $invoices,
            'branches' => $branches,
            'rooms' => $rooms,
            'f_branch' => $f_branch,
            'f_date' => $f_date,
            'f_room' => $f_room,
            'f_invoice_no' => $f_invoice_no,
            'branch' => $branch,
            'room' => $room
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


    // ################## AJAX FUNCTION ##################

    public function getInvoiceDetail(Request $request) {
        $invoice_details = DB::table('invoice_details AS id')
        ->join('products AS p', 'p.id', '=', 'id.product_id')
        ->join('units AS u', 'u.id', '=', 'id.unit_id')
        ->where('id.invoice_id', $request->invoice_id)
        ->select(
            'p.name AS product_name',
            'u.name AS unit_name',
            'id.quantity',
            'id.price'
        )
        ->get();
        $data = view('cms.report.ajax.invoice-detail')->with([
            'invoice_details' => $invoice_details,
            ])->render();

        return response()->json([
            'status' => 1,
            'data' => $data
        ]);
    }


    // ################## PRIVATE FUNCTION ##################
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

    private function getInvoices($branch, $room, $date, $invoice_id, $limit=30) {
        
        $whereData = [];

        if($branch != '') {
            $whereData[] = ['i.branch_id', $branch];
        }

        if($room != '') {
            $whereData[] = ['i.room_id', $room];
        }

        if($invoice_id != '') {
            $whereData[] = ['i.invoice_no', 'like', '%'.$invoice_id.'%'];
        }

        if($date != null) {
            $whereData[] = [ DB::raw("DATE_FORMAT(i.created_at, '%Y-%m-%d')"), $date ];
        }

        $data = DB::table('invoices AS i')
                ->join('branches AS b', 'b.id', '=', 'i.branch_id')
                ->join('rooms AS r', 'r.id', '=', 'i.room_id')
                ->join('users AS u', 'u.id', '=', 'i.created_by')
                ->select(
                    'i.id AS invoice_id',
                    'i.invoice_no',
                    'b.name AS branch_name',
                    'r.room_no',
                    'i.sub_total',
                    'i.discount',
                    'i.total',
                    'i.created_at AS date',
                    // DB::raw("DATE_FORMAT(i.created_at, '%Y-%m-%d') AS date"),
                    DB::raw("CONCAT(u.last_name, ' ', u.first_name) AS fullName")
                )
                ->where($whereData)
                ->orderBy('i.id')
                ->paginate($limit);

        return $data;
    }
    

}
