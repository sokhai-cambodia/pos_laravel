<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Freshbitsweb\Laratables\Laratables;

use DB;
use Auth;
use App\User;
use App\Role;
use App\Branch;
use App\BranchUser;
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
        $branches = Branch::all();
        $data = [
            'title' => 'Create New User',
            'icon' => $this->icon,
            'gender' => $this->gender,
            'roles'  => $roles,
            'branches'  => $branches
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
            DB::transaction(function () use($request) {
              
                $photo = null;
                if($request->hasFile('photo')) {
                    $photo = FileHelper::upload($request->photo);
                }
                $is_active = isset($request->is_active) ? 1 : 0;
                
                $user = User::create([
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
                
                if($request->branches !== null) {
                    $branches = [];
                    foreach($request->branches as $branch) {
                        $branches[] = [
                            'branch_id' => $branch,
                            'user_id' => $user->id,
                            'is_active' => 1,
                            'created_by' => Auth::id(),
                            'created_at' => date("Y-m-d H:i:s")
                        ];
                    }

                    BranchUser::insert($branches);
                }
            });

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
        $user = User::findOrFail($id);
        $roles = Role::all();
        $branches = DB::table('branches as b')
                        ->leftJoin('branch_users as bu', function ($join) use ( $id) {
                            $join->on('bu.branch_id', '=', 'b.id')
                                 ->where('bu.user_id', '=', $id);
                        })
                        ->select('b.*', DB::raw('IF(bu.branch_id = b.id, true, false) as checked'))
                        ->get();

        $data = [
            'title' => 'Edit User',
            'icon' => $this->icon,
            'gender' => $this->gender,
            'roles'  => $roles,
            'user'  => $user,
            'branches'  => $branches
        ];
        
        return view('cms.user.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'last_name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'gender' => [
                'required',
                Rule::in(['male', 'female']),
            ],
            'dob' => 'required|date',
            'role_id' => 'required',
            'username' =>  [
                'required',
                'max:255',
                Rule::unique('users')->ignore($id),
            ],
        ]);

        try 
        {
            DB::transaction(function () use($request, $id) {
                $user = User::findOrFail($id);
                if($request->hasFile('photo')) {
                    $user->photo = FileHelper::updateImage($request->photo, $user->photo, '');
                }
                
                $is_active = isset($request->is_active) ? 1 : 0;

                $user->last_name = $request->last_name;
                $user->first_name = $request->first_name;
                $user->gender = $request->gender;
                $user->dob = $request->dob;
                $user->phone = $request->phone;
                $user->username = $request->username;
                $user->role_id = $request->role_id;
                $user->is_active = $is_active;
                $user->updated_by = Auth::id();
                $user->save();

                BranchUser::where('user_id', $user->id)->delete();
                if($request->branches !== null) {
                    $branches = [];
                    foreach($request->branches as $branch) {
                        $branches[] = [
                            'branch_id' => $branch,
                            'user_id' => $user->id,
                            'is_active' => 1,
                            'created_by' => Auth::id(),
                            'created_at' => date("Y-m-d H:i:s")
                        ];
                    }

                    BranchUser::insert($branches);
                }
            });

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
