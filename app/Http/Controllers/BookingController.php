<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return view("booking.lists");
    }

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $booking = new Booking();
            $booking->ip = 0;
            $booking->perpose = $request->perpose;
            $booking->time_in = $request->timeIn;
            $booking->time_out = $request->timeOut;
            $booking->booker = $request->booker;
            $booking->department_id = $request->department;
            $booking->employees_id = 0;
            $booking->room_id = $request->room_id;
            $booking->save();
            return response()->json(array('msg'=> "Booking Success"), 200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
