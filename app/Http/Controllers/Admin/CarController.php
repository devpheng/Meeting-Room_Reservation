<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Driver;
use \App\Http\Requests\StoreCarRequest;
use \App\Http\Requests\UpdateCarRequest;

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
            $car = new Car();
            $car->number = $request->number;
            $car->model = $request->model;
            $car->driver_id = $request->driver_id;
            $car->plat_number = $request->plat_number;
            $car->capacity = $request->capacity;
            $car->working_time_from = $request->working_time_from;
            $car->working_time_to = $request->working_time_to;
            $car->rest_day = $request->rest_day;
            $path = $request->file('image')->store('public/files/images');
            $name = explode('/', $path);
            $car->image = "images/" . end($name);

            $car->save();
            
            $drivers = Driver::pluck('name', 'id');
            return view('admin.car.create', [
                'drivers' => $drivers
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit(Request $request)
    {
        $car = Car::findOrFail($request->id);
        $drivers = Driver::pluck('name', 'id');
        return view('admin.car.edit', [
            'drivers' => $drivers,
            'car' => $car
        ]);
    }

    public function update(UpdateCarRequest $request)
    {
        // dd(public_path());

        $car = Car::findOrFail($request->id);

        if($request->file('image') != null) {        
            $path = 'storage/files/';
   
            if($car->image != '' && $car->image != null){
                $file_old = $path.$car->image;
                unlink($file_old);

                $path = $request->file('image')->store('public/files/images');
                $name = explode('/', $path);
                $car->image = "images/" . end($name);
            }
        }

        $car->number = $request->number;
        $car->model = $request->model;
        $car->driver_id = $request->driver_id;
        $car->plat_number = $request->plat_number;
        $car->capacity = $request->capacity;
        $car->working_time_from = $request->working_time_from;
        $car->working_time_to = $request->working_time_to;
        $car->rest_day = $request->rest_day;

        $car->save();

        $cars = Car::get();
        return view('admin.car.index', [
            'cars' => $cars
        ]);
       
    }

}
