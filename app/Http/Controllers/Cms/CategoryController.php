<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    public function index()
    { 
        return view('cms.category.index');
    }

    public function create()
    {
        return view('cms.category.create');
    }

    public function store(Request $request)
    {
       return redirect()->route('category');
    }

    // public function show(Category $category)
    // {
    //     //
    // }

   
    public function edit($id)
    {
        return view('cms.category.edit');
    }

    public function update(Request $request, $id)
    {
       return redirect()->route('category');
    }

    public function destroy($id)
    {
        return redirect()->back();
    }
}
