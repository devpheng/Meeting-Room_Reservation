<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Department;
use App\Models\Room;

class AdminController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
        $currentDate =  Carbon::now();
        $countAllBooking = Booking::count();
        $countTodayBooking = Booking::whereDate('time_in', Carbon::today())->count();
        $countDepartment = Department::count();
        $countRoom = Room::count();
        return  view('admin.index', [
            'countAllBooking' => $countAllBooking,
            'countTodayBooking' => $countTodayBooking,
            'countDepartment' => $countDepartment,
            'countRoom' => $countRoom
        ]);
    }
}