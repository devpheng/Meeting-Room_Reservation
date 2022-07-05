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
        return  view('home');
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
