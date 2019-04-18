<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UnitController extends Controller
{
    public function index()
    { 
        return view('cms.unit.index');
    }

    public function create()
    {
        return view('cms.unit.create');
    }

    public function store(Request $request)
    {
       return redirect()->route('unit');
    }

    // public function show(Category $category)
    // {
    //     //
    // }

   
    public function edit($id)
    {
        return view('cms.unit.edit');
    }

    public function update(Request $request, $id)
    {
       return redirect()->route('unit');
    }

    public function destroy($id)
    {
        return redirect()->back();
    }
}
