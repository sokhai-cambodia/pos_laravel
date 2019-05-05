<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Category;
use NotificationHelper;

class FrontEndController extends Controller
{
    public function index(Request $request)
    {
        $room_id = $request->room_id;
        $room = Room::where('id', $room_id)->first();
        if($room == null) {
            NotificationHelper::setErrorNotification('Please select room', true);
            return redirect()->route('front-end.room');
        }

        $data['categories'] = Category::all();

        return view('front-end.pos')->with($data);
    }

    public function room()
    {
        $data['rooms'] = Room::all();

        return view('front-end.room')->with($data);
    }

}