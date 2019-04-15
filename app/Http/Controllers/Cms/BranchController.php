<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Branch;
use Auth;
use UtilHelper;


class BranchController extends Controller
{
    
    public function index()
    {
        return view('cms.branch.index');
    }

    public function getBranchLists()
    {
        return Laratables::recordsOf(Branch::class);
    }

    public function create()
    {
        return view('cms.branch.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:branches|max:255',
        ]);

        try 
        {
            Branch::create([
                'name' => $request->name,
                'address' => $request->address,
                'description' => $request->description,
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

    public function edit($id)
    {
        $data['branch'] = Branch::findOrFail($id);
        return view('cms.branch.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' =>  [
                'required',
                'max:255',
                Rule::unique('branches')->ignore($id),
            ],
        ]);

        try 
        {
            $branch = Branch::findOrFail($id);
            $branch->name = $request->name;
            $branch->address = $request->address;
            $branch->description = $request->description;
            $branch->updated_by = Auth::id();
            $branch->save();

            UtilHelper::setSuccessNotification('updated_success');
            return redirect()->route('branch');
        } 
        catch (\Exception $e) 
        {
            UtilHelper::errorNotification($e);
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        try 
        {
            $branch->deleted_at = date("Y-m-d H:i:s");
            $branch->deleted_by = Auth::id();
            $branch->save();

            UtilHelper::setDeletedPopUp('deleted_success');
            return redirect()->route('branch');
        } 
        catch (\Exception $e) 
        {
            UtilHelper::errorNotification($e);
            return redirect()->route('branch');
        }
    }
}
