<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{

    public function search(Request $request)
    {
        $getDate = $request->query('date');
        $getTimeIn = $request->query('time_in');
        $getTimeOut = $request->query('time_out');
        $getBooking = Booking::where("time_in", ">=", $getDate." ".$getTimeIn.":00")->where("time_out", "<=", $getDate." ".$getTimeOut.":00")->get();
        return view("home", [
            'date' => $getDate,
            'setTimeIn' => $getTimeIn,
            'setTimeOut' => $getTimeOut
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $macAddr = $request->ip();
            $setTimeIn = $request->timeIn;
            $setTimeOut = $request->timeOut;
            $currentDateTime = Carbon::now();
            $checkTimeInTimeOut = Carbon::parse($setTimeOut)->lt($setTimeIn);
            $checkBookingTime = Carbon::parse($setTimeOut)->lt($currentDateTime);
            if($checkTimeInTimeOut || $checkBookingTime){
                return response()->json(array(
                    'status' => 'error',
                    'msg'=> "Please check Time In or Time Out!"), 
                200);
            }

            $checkBooking =  Booking::where("room_id", $request->room_id)
                    ->where(function($query) use ($setTimeIn, $setTimeOut){
                        $query->where("time_in", "<", $setTimeOut)
                            ->where("time_out", ">", $setTimeIn);
                        })
                    ->exists();
            if($checkBooking){
                return response()->json(array(
                    'status' => 'error',
                    'msg'=> "This room is already booked!"), 
                200);
            }else{
                $booking = new Booking();
                $booking->mac_adress = $macAddr;
                $booking->purpose = $request->purpose;
                $booking->time_in = $request->timeIn;
                $booking->time_out = $request->timeOut;
                $booking->booker = $request->booker;
                $booking->department_id = $request->department;
                $booking->room_id = $request->room_id;
                $booking->save();
                return response()->json(array(
                    'status' => 'success',
                    'msg'=> "Booking Success")
                , 200);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(Request $request)
    {
        try {
            $bookingId = $request->id;
            $macAddr = $request->ip();
            $booking = Booking::where('id', $bookingId)->where('mac_adress', $macAddr)->first();
            $booking->delete();
            return redirect()->back()->with('message-cancel','Booking was canceled Successful!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
