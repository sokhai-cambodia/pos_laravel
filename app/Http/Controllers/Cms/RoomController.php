<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
// use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Room;
use App\Branch;
use Auth;
use NotificationHelper;


class RoomController extends Controller
{
    private $icon = 'icon-home';
    // private $status = ['available','checked_in','blocked'];
    
    public function index()
    {
        $data = [
            'title' => 'List Room',
            'icon' => $this->icon
        ];
        return view('cms.room.index')->with($data);
    }

    public function getRoomLists()
    {
        return Laratables::recordsOf(Room::class);
    }

    
    public function create()
    {
        $branch = Branch::all();
        $data = [
            'title' => 'Create New Room',
            'icon' => $this->icon,
            'branch' => $branch
        ];
        return view('cms.room.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'branch' => 'required',
            'bed' => 'required',
            
        ]);

        try 
        {
            Room::create([
                'room_no' => $request->name,
                'branch_id' => $request->branch,
                'bed' => $request->bed,
                'status' => $request->status,
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

    public function show(Room $room)
    {
        //
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $branch = Branch::all();
        $data = [
            'title' => 'Edit Room',
            'icon' => $this->icon,
            'branch_id'  => $branch,
            'room_no'  => $room
        ];
        
        return view('cms.room.update')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bed' => 'required',
        ]);

        try 
        {
            $room = Room::findOrFail($id);
    
            $room->room_no = $request->name;
            $room->branch_id = $request->branch;
            $room->bed = $request->bed;
            $room->status = $request->status;
            $room->updated_by = Auth::id();
            $room->save();

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
        $room = Room::findOrFail($id);
        try 
        {
            $room->deleted_at = date("Y-m-d H:i:s");
            $room->deleted_by = Auth::id();
            $room->save();

            NotificationHelper::setDeletedPopUp('deleted_success');
            return redirect()->route('room');
        } 
        catch (\Exception $e) 
        {
            NotificationHelper::errorNotification($e);
            return redirect()->route('room');
        }
    }
}
