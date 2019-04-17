<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\RolePermission;
use App\BranchUser;
use App\Branch;
use Auth;
use NotificationHelper;
use FileHelper;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Support\Facades\Hash;

class UserOldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $PATH = 'assets/uploads/profile';

    public function index()
    {
        return view('cms.user.index');
    }

    public function getUserLists()
    {
        return Laratables::recordsOf(User::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'last_name' => 'required|max:255',
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        try 
        {   
            $photo = null;
            if($request->hasFile('photo')) {
                $photo = FileHelper::upload($this->PATH, $request->photo);
            }
           
            User::create([
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'phone' => $request->phone,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role_id' => $request->role,
                'photo' => $photo,
                'created_by' => Auth::id(),
            ]);
            NotificationHelper::setSuccessNotification('created_success');
            return redirect()->route('user');
        } 
        catch (\Exception $e) 
        {
            NotificationHelper::errorNotification($e);
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RolePermission  $rolePermission
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RolePermission  $rolePermission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = User::findOrFail($id);
        $data['role'] = Role::get();
        return view('cms.user.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RolePermission  $rolePermission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $id)
    {
        try 
        {
            $user = User::findOrFail($id);
            if($request->hasFile('photo')) {
                $user->photo = FileHelper::updateImage($this->PATH, $request->photo, $user->photo);
            }
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->dob = $request->dob;
            $user->gender = $request->gender;
            $user->phone = $request->phone;
            $user->username = $request->username;
            $user->role_id = $request->role;
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RolePermission  $rolePermission
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
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

    public function uaddBranch($id)
    {
        $data['user'] = User::find($id);
        $data['branches'] = Branch::get();
        
        return view('cms.user.addbranch')->with($data);
        
    }

    public function ustoreBranch(Request $request)
    {
        
        try 
        {
            BranchUser::create([
                'branch_id' => $request->branch,
                'user_id' => $request->user_id,
                'is_active' => 1,
                'created_by' => Auth::id(),
            ]);

            NotificationHelper::setSuccessNotification('added_success');
            return redirect()->route('user');
        } 
        catch (\Exception $e) 
        {
            NotificationHelper::errorNotification($e);
            return redirect()->route('user');
        }
    }
}
