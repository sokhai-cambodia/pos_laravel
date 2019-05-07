<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use NotificationHelper;
use FileHelper;


class OrderController extends Controller
{
    private $icon = 'icon-layers';


    public function index()
    {
        return view('front-end.view.room')->with($data);
    }


    public function filterListCategory( Request $request) {
        $category = Category::where('list_category', 'category')
                            ->where('name', 'like', '%'.$request->search.'%')
                            ->limit(10)
                            ->get();
        $response = array();
        foreach($Category as $category) {
            $response[] = ["value" => $category->id, "label" => $category->name];
        }
        return response()->json($response);

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