<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Unit;
use Auth;
use NotificationHelper;


class UnitController extends Controller
{
    private $icon = 'icon-home';
    
    public function index()
    {
        $data = [
            'title' => 'List Unit',
            'icon' => $this->icon
        ];
        return view('cms.unit.index')->with($data);
    }

    public function getUnitLists()
    {
        return Laratables::recordsOf(Unit::class);
    }

    public function create()
    {
        $data = [
            'title' => 'Create New Unit',
            'icon' => $this->icon
        ];
        return view('cms.unit.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:units|max:255',
        ]);

        try 
        {
            Unit::create([
                'name' => $request->name,
                'description' => $request->description,
                'created_by' => Auth::id(),
            ]);
            NotificationHelper::setSuccessNotification('Created Success...!', true);
            return back();
        } 
        catch (\Exception $e) 
        {
            NotificationHelper::errorNotification($e);
            return back()->withInput();
        }
    }

    public function show(Unit $unit)
    {
        //
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Unit',
            'icon' => $this->icon
        ];
        $data['unit'] = Unit::findOrFail($id);
        return view('cms.unit.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' =>  [
                'required',
                'max:255',
                Rule::unique('units')->ignore($id),
            ],
        ]);

        try 
        {
            $unit = Unit::findOrFail($id);
            $unit->name = $request->name;
            $unit->description = $request->description;
            $unit->updated_by = Auth::id();
            $unit->save();

            NotificationHelper::setSuccessNotification('updated_success');
            return redirect()->route('unit');
        } 
        catch (\Exception $e) 
        {
            NotificationHelper::errorNotification($e);
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        try 
        {
            $unit->deleted_at = date("Y-m-d H:i:s");
            $unit->deleted_by = Auth::id();
            $unit->save();

            NotificationHelper::setDeletedPopUp('deleted_success');
            return redirect()->route('unit');
        } 
        catch (\Exception $e) 
        {
            NotificationHelper::errorNotification($e);
            return redirect()->route('unit');
        }
    }
}
