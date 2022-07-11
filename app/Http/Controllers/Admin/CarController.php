<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Driver;
use \App\Http\Requests\StoreCarRequest;

class CarController extends Controller
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
    public function index()
    {
        $getCars = Car::get();
        return view('admin.car.index', [
            'cars' => $getCars
        ]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = Driver::pluck('name', 'id');
        return view('admin.car.create', [
            'drivers' => $drivers
        ]);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarRequest $request)
    {
        try {
            $monday_time = '';
            $tuesday_time = '';
            $wednesday_time = '';
            $thursday_time = '';
            $friday_time = '';
            $car = new Car();
            $car->name = $request->name;
            $car->brand = $request->brand;
            $car->driver_id = $request->driver_id;
            $car->plat_number = $request->plat_number;
            $car->capacity = $request->plat_number;
            $car->monday_time = $monday_time;
            $car->tuesday_time = $tuesday_time;
            $car->wednesday_time = $wednesday_time;
            $car->thursday_time = $thursday_time;
            $car->friday_time = $friday_time;
            $car->image = '';
            $car->save();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
