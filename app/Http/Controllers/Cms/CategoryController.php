<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Category;
use Auth;
use NotificationHelper;
use FileHelper;


class CategoryController extends Controller
{   
    private $icon = 'icon-layers';


    public function index()
    {
        $data = [
            'title' => 'List Category',
            'icon' => $this->icon
        ];
        return view('cms.category.index')->with($data);
    }

    public function getCategoryLists()
    {
        return Laratables::recordsOf(Category::class);
    }

    public function create()
    {
        $data = [
            'title' => 'Create New Category',
            'icon' => $this->icon
        ];
        return view('cms.category.create')->with($data);
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
                $photo = FileHelper::upload($request->photo);
            }
           
            Category::create([
                'name' => $request->name,
                'description' => $request->description,
                'photo' => $photo,
                'created_by' => Auth::id(),
            ]);
            NotificationHelper::setSuccessNotification('created_success');
            return back();
        } 
        catch (\Exception $e) 
        {
            NotificationHelper::errorNotification($e);
            return back()->withInput();
        }
    }

    public function show(Category $category)
    {
        //
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Category',
            'icon' => $this->icon
        ];
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
                $category->photo = FileHelper::updateImage($request->photo, $category->photo, '');
            }
            $category->name = $request->name;
            $category->description = $request->description;
            $category->updated_by = Auth::id();
            $category->save();

            NotificationHelper::setSuccessNotification('updated_success');
            return redirect()->route('category');
        } 
        catch (\Exception $e) 
        {
            NotificationHelper::errorNotification($e);
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

            NotificationHelper::setDeletedPopUp('deleted_success');
            return redirect()->route('category');
        } 
        catch (\Exception $e) 
        {
            NotificationHelper::errorNotification($e);
            return redirect()->route('category');
        }
    }
}
