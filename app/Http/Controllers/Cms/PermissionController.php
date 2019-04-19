<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Permission;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use Auth;
use NotificationHelper;

class PermissionController extends Controller
{ 
    private $icon = 'icon-layers';

    public function index()
    {
        return view('cms.permission.index');
    }
    

    public function getPermissionLists()
    {
        return Laratables::recordsOf(Permission::class);
    }

    public function create()
    {
        $permissions = Permission::where([
            ['use_for_action', '!=', '1'],
            ['route_name', '#']
        ])->get();
        
        $data = [
            'title' => 'Create New User',
            'icon' => $this->icon,
            'permissions'  => $permissions
        ];
        return view('cms.permission.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions|max:255',
            'route_name' => 'required'
        ]);
        
        $name = $request->name;
        $use_for_action = isset($request->use_for_action) ? 1 : 0;
        $permission_id = $request->permission_id;
        $route_name = $request->route_name;
        
        try 
        {
            Permission::create([
                'name' => $name,
                'use_for_action' => $use_for_action,
                'permission_id' => $permission_id,
                'route_name' => $route_name,
                'created_by' => Auth::id(),
            ]);
            NotificationHelper::setSuccessNotification('created_success');
            return redirect()->route('permission.create');
        } 
        catch (\Exception $e) 
        {
            NotificationHelper::errorNotification($e);
            return redirect()->route('permission.create')->withInput();
        }
        
    }

    public function show(Request $request)
    {
        $permission = Permission::find($request->id);
        if($permission == null) return response()->json([ 'status' => 0 ]);
        $permissions = Permission::where('permission_id', $permission->id)->get();

        $data = view('cms.permission.list-sub-permission')->with([
            'permissions' => $permissions
            ])->render();
        return response()->json([
            'status' => 1,
            'data' => $data,
        ]);
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        $permissions = Permission::where([
            ['use_for_action', '!=', '1'],
            ['route_name', '#']
        ])->get();
        
        $data = [
            'title' => 'Create New User',
            'icon' => $this->icon,
            'permissions'  => $permissions,
            'permission' => $permission
        ];

        return view('cms.permission.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' =>  [
                'required',
                'max:255',
                Rule::unique('permissions')->ignore($id),
            ],
            'route_name' => 'required'
        ]);

        try 
        {
            $permission = Permission::findOrFail($id);
            $permission->name = $request->name;
            $permission->use_for_action = $request->use_for_action;
            $permission->permission_id = $request->permission_id;
            $permission->route_name = $request->route_name;
            $permission->updated_by = Auth::id();
            $permission->save();

            NotificationHelper::setSuccessNotification('updated_success');
            return redirect()->route('permission');
        } 
        catch (\Exception $e) 
        {
            NotificationHelper::errorNotification($e);
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        try 
        {
            $permission->deleted_at = date("Y-m-d H:i:s");
            $permission->deleted_by = Auth::id();
            $permission->save();

            NotificationHelper::setDeletedPopUp('deleted_success');
            return redirect()->route('permission');
        } 
        catch (\Exception $e) 
        {
            NotificationHelper::errorNotification($e);
            return redirect()->route('permission');
        }
    }

    
}
