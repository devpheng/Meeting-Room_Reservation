<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Stationery;
use App\Models\AdditionStock;
use \App\Http\Requests\StationeryRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StationeryController extends Controller
{
    public function index(Request $request)
    {
        // $macAddr = $request->ip();
        $stationeries = Stationery::get();
        
        return view('admin.stationery.index', [
            'stationeries' => $stationeries
        ]);
    }

    public function create()
    {
        // $macAddr = $request->ip();
        $stationeries = Stationery::get();
        
        return view('admin.stationery.create', ['exist' => '']);
    }


    public function store(StationeryRequest $request)
    {
        $stationery = Stationery::where('code', $request->code)->first();
        if(!$stationery){
            $stationery = Stationery::create([
                'code' => $request->code,
                'quantity' => $request->quantity,
                'stock' => $request->stock,
                'remark' => $request->remark
            ]);
        } else {
            return view('admin.stationery.create', ['exist' => 'Stationery already exist']);
        }
        return view('admin.stationery.create', ['exist' => '']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stationery = Stationery::findOrfail($id);
        return view('admin.stationery.edit', [
            'stationery' => $stationery
        ]);
    }

    public function update(StationeryRequest $request)
    {
        try {
            $stationery = Stationery::findOrfail($request->id);
            $stationery->code = $request->code;
            $stationery->quantity = $request->quantity;
            $stationery->remark = $request->remark;
            $stationery->stock = $request->stock;
            $stationery->save();
            return redirect()->route('admin.stationery.index')->with('message','Update successful!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function add(Request $request)
    {
        try {
            AdditionStock::create([
                'addition' => $request->stock,
                'stationery_id' => $request->id
            ]);
            $stationery = Stationery::findOrfail($request->id);
            $stationery->stock = $stationery->stock + $request->stock;
            $stationery->save();
            return redirect()->route('admin.stationery.index')->with('message','Add Stock successful!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function monthly()
    {
        $now = Carbon::now();
        $startDate = $now->year."-".($now->month-1)."-20 00:00:00";
        $endDate = $now->year."-".$now->month."-20 00:00:00";

        $requests = DB::select("select
                                    `stationeries`.`id`,
                                    `stationeries`.`code`,
                                    `stationeries`.`stock`,
                                    `stationeries`.`quantity`,
                                    `stationeries`.`remark`,
                                    sum(requests.quantity) as stock_used,
                                    `additions_stock`.`addition`,
                                    `additions_stock`.`created_at`
                                from
                                    `stationeries`
                                    left join `requests` on `requests`.`stationery_id` = `stationeries`.`id` and `requests`.`created_at` BETWEEN '".$startDate."'
                                    AND '".$endDate."' AND `requests`.`approved_at` IS NOT NULL
                                    left join `additions_stock` on `additions_stock`.`stationery_id` = `stationeries`.`id` AND `additions_stock`.`created_at` BETWEEN '".$startDate."'
                                    AND '".$endDate."'
                                group by
                                    `stationeries`.`code`
                                order by
                                    `stationeries`.`id`");
        return $requests;
    }
}
