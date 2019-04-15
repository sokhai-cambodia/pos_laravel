<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Category;
use Auth;
use UtilHelper;
use FileHelper;


class CategoryController extends Controller
{
    private $PATH = 'assets/uploads/categories';
    
    public function index()
    {
        return view('cms.category.index');
    }

    public function getCategoryLists()
    {
        return Laratables::recordsOf(Category::class);
    }

    public function create()
    {
        return view('cms.category.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        try 
        {   
            $photo = null;
            if($request->hasFile('photo')) {
                $photo = FileHelper::upload($this->PATH, $request->photo);
            }
           
            Category::create([
                'name' => $request->name,
                'description' => $request->description,
                'photo' => $photo,
                'created_by' => Auth::id(),
            ]);
            UtilHelper::setSuccessNotification('created_success');
            return back();
        } 
        catch (\Exception $e) 
        {
            UtilHelper::errorNotification($e);
            return back()->withInput();
        }
    }

    public function show(Category $category)
    {
        //
    }

    public function edit($id)
    {
        $data['category'] = Category::findOrFail($id);
        return view('cms.category.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' =>  [
                'required',
                'max:255',
                Rule::unique('categories')->ignore($id),
            ],
        ]);

        try 
        {
            $category = Category::findOrFail($id);
            if($request->hasFile('photo')) {
                $category->photo = FileHelper::updateImage($this->PATH, $request->photo, $category->photo);
            }
            $category->name = $request->name;
            $category->description = $request->description;
            $category->updated_by = Auth::id();
            $category->save();

            UtilHelper::setSuccessNotification('updated_success');
            return redirect()->route('category');
        } 
        catch (\Exception $e) 
        {
            UtilHelper::errorNotification($e);
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        try 
        {
            $category->deleted_at = date("Y-m-d H:i:s");
            $category->deleted_by = Auth::id();
            $category->save();

            UtilHelper::setDeletedPopUp('deleted_success');
            return redirect()->route('category');
        } 
        catch (\Exception $e) 
        {
            UtilHelper::errorNotification($e);
            return redirect()->route('category');
        }
    }
}
