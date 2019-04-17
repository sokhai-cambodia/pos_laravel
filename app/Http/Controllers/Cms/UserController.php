<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Freshbitsweb\Laratables\Laratables;

use Auth;
use App\User;
use App\Role;
use NotificationHelper;
use FileHelper;


class UserController extends Controller
{   
    private $icon = 'icon-layers';
    private $gender = ['male', 'female'];

    public function index()
    {
        $data = [
            'title' => 'List User',
            'icon' => $this->icon
        ];
        return view('cms.user.index')->with($data);
    }

    public function getUserLists()
    {
        return Laratables::recordsOf(User::class);
    }

    public function create()
    {
        $roles = Role::all();   
        $data = [
            'title' => 'Create New User',
            'icon' => $this->icon,
            'gender' => $this->gender,
            'roles'  => $roles
        ];
        return view('cms.user.create')->with($data);
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
            NotificationHelper::setSuccessNotification('created_success');
            return back();
        } 
        catch (\Exception $e) 
        {
            NotificationHelper::errorNotification($e);
            return back()->withInput();
        }
    }

    public function show(User $user)
    {
        //
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit User',
            'icon' => $this->icon
        ];
        $data['user'] = User::findOrFail($id);
        return view('cms.user.edit')->with($data);
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
            $user = User::findOrFail($id);
            if($request->hasFile('photo')) {
                $user->photo = FileHelper::updateImage($request->photo, $user->photo, '');
            }
            $user->name = $request->name;
            $user->description = $request->description;
            $user->updated_by = Auth::id();
            $user->save();

            NotificationHelper::setSuccessNotification('updated_success');
            return redirect()->route('user');
        } 
        catch (\Exception $e) 
        {
            NotificationHelper::errorNotification($e);
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        try 
        {
            $user->deleted_at = date("Y-m-d H:i:s");
            $user->deleted_by = Auth::id();
            $user->save();

            NotificationHelper::setDeletedPopUp('deleted_success');
            return redirect()->route('user');
        } 
        catch (\Exception $e) 
        {
            NotificationHelper::errorNotification($e);
            return redirect()->route('user');
        }
    }
}
