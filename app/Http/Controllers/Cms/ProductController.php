<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    public function index()
    { 
        return view('cms.product.index');
    }

    public function create()
    {
        return view('cms.product.create');
    }

    public function store(Request $request)
    {
       return redirect()->route('product');
    }

    // public function show(Category $category)
    // {
    //     //
    // }

   
    public function edit($id)
    {
        return view('cms.product.edit');
    }

    public function update(Request $request, $id)
    {
       return redirect()->route('product');
    }

    public function destroy($id)
    {
        return redirect()->back();
    }
}
