<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Request as RequestModel;
use \App\Http\Requests\StationeryRequest;
use App\Models\Stationery;

class RequestController extends Controller
{
    public function index(Request $request)
    {
        $requests = RequestModel::orderByDesc('created_at')->get();
        
        return view('admin.request.index', [
            'requests' => $requests
        ]);
    }


    public function cancel($id, $stock)
    {
        try {
            $request = RequestModel::findOrfail($id);
            $stationery = Stationery::findOrfail($request->stationery_id);
            $stationery->stock = $stationery->stock + $stock;
            $stationery->save();
            $request->deleted_at = \now();
            $request->save();
            return redirect()->route('admin.request.index')->with('message','Cancel successful!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function approve($id)
    {
        try {
            $request = RequestModel::findOrfail($id);
            $request->approved_at = \now();
            $request->save();
            return redirect()->route('admin.request.index')->with('message','Approve successful!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // public function create()
    // {
    //     // $macAddr = $request->ip();
    //     $stationeries = Stationery::get();
        
    //     return view('admin.stationery.create', ['exist' => '']);
    // }


    // public function store(StationeryRequest $request)
    // {
    //     $stationery = Stationery::where('code', $request->code)->first();
    //     if(!$stationery){
    //         $stationery = Stationery::create([
    //             'code' => $request->code,
    //             'quantity' => $request->quantity,
    //             'stock' => $request->stock,
    //             'remark' => $request->remark
    //         ]);
    //     } else {
    //         return view('admin.stationery.create', ['exist' => 'Stationery already exist']);
    //     }
    //     return view('admin.stationery.create', ['exist' => '']);
    // }

    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     $stationery = Stationery::findOrfail($id);
    //     return view('admin.stationery.edit', [
    //         'stationery' => $stationery
    //     ]);
    // }

    // public function update(StationeryRequest $request)
    // {
    //     try {
    //         $stationery = Stationery::findOrfail($request->id);
    //         $stationery->code = $request->code;
    //         $stationery->quantity = $request->quantity;
    //         $stationery->remark = $request->remark;
    //         $stationery->save();
    //         return redirect()->route('admin.stationery.index')->with('message','Update successful!');
    //     } catch (\Exception $e) {
    //         return $e->getMessage();
    //     }
    // }
}
