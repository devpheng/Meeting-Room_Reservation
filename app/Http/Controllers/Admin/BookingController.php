<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Department;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sDate = $request->get('date');
        $sBooker = $request->get('booker');
        $sRoom = $request->get('room');
        $sDepartment = $request->get('department');
        $currentDateTimeIn = Carbon::now();
        $getDate = Carbon::parse($currentDateTimeIn->toDateString())->format('Y-m-d');
        $getRoom = Room::get();
        $getDepartment = Department::get();
        $bookingQuery = Booking::query();
        if($sDate && $sDate !== ''){
            $bookingQuery->whereDate('time_in', $sDate);
        }
        if($sBooker && $sBooker !== ''){
            $bookingQuery->where('booker', 'like', '%' . $sBooker . '%');
        }

        if($sRoom && $sRoom !== ''){
            $bookingQuery->where('room_id', $sRoom);
        }

        if($sDepartment && $sDepartment !== ''){
            $bookingQuery->where('department_id', $sDepartment);
        }
        
        $getBookings = $bookingQuery->orderBy('time_out', 'DESC')->paginate(10);
        return view('admin.booking.index', [
            'date' => $getDate,
            'bookings' => $getBookings,
            'rooms' => $getRoom,
            'department' => $getDepartment,
            'sDate' => $sDate,
            'sBooker' => $sBooker,
            'sRoom' => $sRoom,
            'sDepartment' => $sDepartment
        ]);
    }

    public function delete(Request $request)
    {
        try {
            $bookingId = $request->id;
            $macAddr = $request->ip();
            $booking = Booking::where('id', $bookingId)->first();
            $booking->delete();
            return redirect()->back()->with('message-cancel','Booking was canceled Successful!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
