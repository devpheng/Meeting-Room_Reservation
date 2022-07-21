<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Department;
use App\Models\Request as RequestModel;
use App\Models\Room;
use App\Models\Stationery;

class StationeryController extends Controller
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
        $stationery = Stationery::get();
        $departments = Department::get();
        return  view('stationery.index', [
            'stationeries' => $stationery,
            'departments' => $departments
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function request(Request $request)
    {
        RequestModel::create([
            'request_by' => $request->request_by,
            'ip_address' => $request->ip(),
            'department_id' => $request->department_id,
            'stationery_id' => $request->stationery_id,
            'quantity' => $request->stock
        ]);

        // $stationery = Stationery::findOrFail($request->stationery_id);
        // $stationery->stock = $stationery->stock - $request->stock;
        // $stationery->save();

        return redirect()->route('stationery')->with('message','Request successful!');
       
    }
}
