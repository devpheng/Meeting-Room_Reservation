<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Department;
use App\Models\Room;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $macAddr = substr(exec('getmac'), 0, 17);
        $checkFinished = false;
        $getMeetingRoom = array();
        $getBookingRoom = array();
        $setRooms = array();
        $getRooms = Room::get();
        $getDepartments = Department::pluck("name", "id");
        $currentDateTimeIn = Carbon::now();
        $currentDateTimeOut = Carbon::now()->addMinutes(30);
        $getDate = Carbon::parse($currentDateTimeIn->toDateString())->format('Y-m-d');
        $setCurDate = Carbon::parse($currentDateTimeIn->toDateString())->format('Y-m-d');
        $getTimeInH = Carbon::parse($currentDateTimeIn->toTimeString())->format('H');
        $getTimeInM = Carbon::parse($currentDateTimeIn->toTimeString())->format('i');
        $getTimeOutH = Carbon::parse($currentDateTimeOut->toTimeString())->format('H');
        $getTimeOutM = Carbon::parse($currentDateTimeOut->toTimeString())->format('i');
        if($getTimeInM < 30){
            $setTimeIn = $getTimeInH.":00";
            $setCurTimeIn = $getTimeInH.":00";
        }else{
            $setTimeIn = $getTimeInH.":30";
            $setCurTimeIn = $getTimeInH.":30";
        }
        if($getTimeOutM < 30){
            $setTimeOut = $getTimeOutH.":00";
            $setCurTimeOut = $getTimeOutH.":00";
        }else{
            $setTimeOut = $getTimeOutH.":30";
            $setCurTimeOut = $getTimeOutH.":30";
        }
       

        if($request->query('search') == "true"){
            $getDate = $request->query('date');
            $setTimeIn = $request->query('time_in');
            $setTimeOut = $request->query('time_out');
        }
        $listBookings = Booking::whereDate('time_in', $getDate)->with('department')->orderBy('time_in')->get();
        $checkFinished = Carbon::parse($getDate.' '.$setTimeOut.':00')->lt($currentDateTimeIn);
        foreach($getRooms as $key => $value){
            $setRooms[$value->id] = array(
                'id' => $value->id,
                'name' => $value->name
            );$value->name;
            $getMeetingRoom[$value->id] = Booking::where("room_id", $value->id)
                ->where(function($q) use ($setCurDate, $setTimeIn, $setTimeOut) {
                    $q->where("time_in", "<=", $setCurDate." ".$setTimeOut.":00")
                        ->where("time_out", ">=", $setCurDate." ".$setTimeOut.":00");
                })
                ->where(function($q) use ($setCurDate, $setCurTimeIn, $setCurTimeOut) {
                    $q->where("time_in", "<", $setCurDate." ".$setCurTimeOut.":00")
                        ->where("time_out", ">", $setCurDate." ".$setCurTimeOut.":00");
                })
                ->with('department')
                ->first();
            $getBookingRoom[$value->id] = Booking::where("room_id", $value->id)
                ->Where(function($q) use ($getDate, $setTimeOut, $setTimeIn){
                    $q->where(function($query) use ($getDate, $setTimeOut, $setTimeIn){
                        $query->where("time_in", "<", $getDate." ".$setTimeOut.":00")
                            ->where("time_out", ">", $getDate." ".$setTimeIn.":00");
                    });
                })
                ->with('department')
                ->first();
        }
        return view('home', [
            'date' => $getDate,
            'setTimeIn' => $setTimeIn,
            'setTimeOut' => $setTimeOut,
            'departments' => $getDepartments,
            'getMeetingRoom' => $getMeetingRoom,
            'getBookingRoom' => $getBookingRoom,
            'checkFinished' => $checkFinished,
            'getRooms' => $setRooms,
            'listBookings' => $listBookings,
            'macAddr' => $macAddr
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lists(Request $request)
    {
        $getRooms = Room::pluck("name", "id");
        $currentDateTimeIn = Carbon::now();
        $currentDateTimeOut = Carbon::now()->addMinutes(30);
        $getDate = Carbon::parse($currentDateTimeIn->toDateString())->format('Y-m-d');
        $setCurDate = Carbon::parse($currentDateTimeIn->toDateString())->format('Y-m-d');
        $getTimeInH = Carbon::parse($currentDateTimeIn->toTimeString())->format('H');
        $getTimeInM = Carbon::parse($currentDateTimeIn->toTimeString())->format('i');
        $getTimeOutH = Carbon::parse($currentDateTimeOut->toTimeString())->format('H');
        $getTimeOutM = Carbon::parse($currentDateTimeOut->toTimeString())->format('i');
        if($getTimeInM < 30){
            $setTimeIn = $getTimeInH.":00";
            $setCurTimeIn = $getTimeInH.":00";
        }else{
            $setTimeIn = $getTimeInH.":30";
            $setCurTimeIn = $getTimeInH.":30";
        }
        if($getTimeOutM < 30){
            $setTimeOut = $getTimeOutH.":00";
            $setCurTimeOut = $getTimeOutH.":00";
        }else{
            $setTimeOut = $getTimeOutH.":30";
            $setCurTimeOut = $getTimeOutH.":30";
        }
       

        if($request->query('search') == "true"){
            $getDate = $request->query('date');
            $setTimeIn = $request->query('time_in');
            $setTimeOut = $request->query('time_out');
        }
        return view("lists",[
            'rooms' => $getRooms,
            'date' => $getDate,
            'setTimeIn' => $setTimeIn,
            'setTimeOut' => $setTimeOut,
        ]);
    }
}
