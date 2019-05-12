<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Branch;

class ReportsController extends Controller
{
    
    private $icon = 'icon-layers';

    public function stock() {
        $branches = Branch::getBranchByAuth();
        $stockTypes = [ 
            'adjust_add' => 'Adjust Add', 
            'adjust_sub' => 'Adjust Sub', 
            'stock_in' => 'Stock In', 
            'transfer' => 'Transfer', 
            'wasted' => 'Wasted', 
        ];
        $data = [
            'title' => 'Stock Report',
            'icon' => $this->icon,
            'branches' => $branches,
            'stockTypes' => $stockTypes
        ];
        return view('cms.report.stock')->with($data);
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
