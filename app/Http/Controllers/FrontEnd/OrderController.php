<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use NotificationHelper;
use FileHelper;


class CategoryController extends Controller
{   
    private $icon = 'icon-layers';


    public function index()
    {
        return view('front-end.order.index')->with($data);
    }


    public function create()
    {
    }

    public function store(Request $request)
    {
      
    }

    public function show(Category $category)
    {
        //
    }

    public function edit($id)
    {
    
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
