<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }

    
}
