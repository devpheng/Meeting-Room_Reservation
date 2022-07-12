<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Driver;
use \App\Http\Requests\StoreDriverRequest;
use \App\Http\Requests\UpdateDriverRequest;

class DriverController extends Controller
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
        $drivers = Driver::get();
        return view('admin.driver.index', [
            'drivers' => $drivers
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
        return view('admin.driver.create', [
            'drivers' => $drivers
        ]);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDriverRequest $request)
    {
        try {
            $imageName = '';
            $driver = new Driver();
            $driver->name = $request->name;
            $driver->phone = $request->phone;
            $driver->status = $request->status;
            $driver->image = $imageName;
            $driver->save();
            return redirect()->route('admin.driver.index')->with('message','Registerr successful!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = Driver::findOrfail($id);
        return view('admin.driver.edit', [
            'driver' => $driver
        ]);
    }

    public function update(UpdateDriverRequest $request)
    {
        try {
            $imageName = '';
            $driver = Driver::findOrfail($request->id);
            $driver->name = $request->name;
            $driver->phone = $request->phone;
            $driver->status = $request->status;
            $driver->image = $imageName;
            $driver->save();
            return redirect()->route('admin.driver.index')->with('message','Update successful!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
