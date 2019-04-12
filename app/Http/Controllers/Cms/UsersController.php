<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UsersController extends Controller
{
    public function index()
    {
        return view('cms.users.index');
    }

    public function create()
    {
        return view('cms.users.create');
    }

    public function store(Request $request)
    {
       return redirect()->route('users');
    }

    // public function show(Category $category)
    // {
    //     //
    // }


    public function edit($id)
    {
        return view('cms.users.edit');
    }

    public function update(Request $request, $id)
    {
       return redirect()->route('users');
    }

    public function destroy($id)
    {
        return redirect()->back();
    }
}
