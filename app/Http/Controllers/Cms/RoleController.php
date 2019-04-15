<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use DB;
use Auth;
use UtilHelper;
use App\Role;   
use App\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.role.index');
    }

    public function getRoleLists()
    {
        return Laratables::recordsOf(Role::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['permissions'] = Permission::whereNull('permission_id')->get();
        return view('cms.role.create')->with($data);
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
            'name' => 'required|unique:roles|max:255',
            'permissions' => 'required'
        ]);
        
        try 
        {
            DB::transaction(function () use($request) {
                $role = Role::create([
                    'name' => $request->name,
                    'description' => $request->description,
                    'created_by' => Auth::id(), 
                ]);
                $role->permissions()->attach($request->permissions);
            });
            UtilHelper::setSuccessNotification('created_success');
            return back();
        } 
        catch (\Exception $e) 
        {
            UtilHelper::errorNotification($e);
            return back()->withInput();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
