<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getRooms = Room::get();
        return view('admin.room.index', [
            'rooms' => $getRooms
        ]);
    }

    public function update(Request $request)
    {
        try {
            $room = Room::findOrfail($request->id);
            $room->name = $request->name;
            $room->save();
            return redirect()->back()->with('message-cancel','Booking was canceled Successful!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
