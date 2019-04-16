<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\User;
use Auth;
use UtilHelper;
use FileHelper;


class UserController extends Controller
{   
    private $icon = 'icon-layers';


    public function index()
    {
        $data = [
            'title' => 'List User',
            'icon' => $this->icon
        ];
        return view('cms.category.index')->with($data);
    }

    public function getUserLists()
    {
        return Laratables::recordsOf(User::class);
    }

    public function create()
    {
        $data = [
            'title' => 'Create New User',
            'icon' => $this->icon
        ];
        return view('cms.category.create')->with($data);
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'last_name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'gender' => [
                'required',
                Rule::in(['male', 'female']),
            ],
            'dob' => 'required|date',
            'username' => 'required|unique:users|max:255',
            'role_id' => 'required',
        ]);

        try 
        {   
            $photo = null;
            if($request->hasFile('photo')) {
                $photo = FileHelper::upload($request->photo);
            }

            $is_active = isset($request->is_active) ? 1 : 0;
           
            User::create([
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'phone' => $request->phone,
                'photo' => $photo,
                'username' => $request->username,
                'password' => Hash::make('123456'), // default password
                'role_id' => $request->role_id,
                'is_active' => $is_active,
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

    public function show(User $category)
    {
        //
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit User',
            'icon' => $this->icon
        ];
        $data['category'] = User::findOrFail($id);
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
            $category = User::findOrFail($id);
            if($request->hasFile('photo')) {
                $category->photo = FileHelper::updateImage($request->photo, $category->photo, '');
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
        $category = User::findOrFail($id);
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
