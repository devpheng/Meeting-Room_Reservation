<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Request as RequestModel;
use \App\Http\Requests\StationeryRequest;
use App\Models\Stationery;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            // $stationery = Stationery::findOrfail($request->stationery_id);
            // $stationery->stock = $stationery->stock + $stock;
            // $stationery->save();
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
            
            $stationery = Stationery::findOrFail($request->stationery_id);

            // dd($request->quantity . " " . $stationery->stock);

            if($request->quantity > $stationery->stock) {
                return redirect()->route('admin.request.index')->with('message_error','Product out of stock');
            }

            $request->approved_at = \now();
            $request->save();

            $stationery->stock = $stationery->stock - $request->quantity;
            $stationery->save();

            return redirect()->route('admin.request.index')->with('message','Approve successful!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function daily()
    {
        $requests = DB::table('requests')
                    ->select('stationeries.code', 'departments.name', DB::raw('sum(requests.quantity) as total'), 'requests.department_id', 'requests.stationery_id')
                    ->join('departments', 'departments.id', '=', 'requests.department_id')
                    ->join('stationeries', 'stationeries.id', '=', 'requests.stationery_id')
                    ->whereDate('requests.created_at', Carbon::today())
                    ->whereNotNull('requests.approved_at')
                    ->groupBy(['requests.department_id', 'requests.stationery_id'])
                    ->orderBy('stationeries.code')
                    ->get();

        return $requests;
    }

    public function monthly()
    {
        $now = Carbon::now();
        $startDate = $now->year."-".($now->month-1)."-20 00:00:00";
        $endDate = $now->year."-".$now->month."-20 00:00:00";
        $requests = DB::table('requests')
                    ->select('stationeries.code', 'departments.name', DB::raw('sum(requests.quantity) as total'), 'requests.department_id', 'requests.stationery_id')
                    ->join('departments', 'departments.id', '=', 'requests.department_id')
                    ->join('stationeries', 'stationeries.id', '=', 'requests.stationery_id')
                    ->whereBetween('requests.created_at', [$startDate, $endDate])
                    ->whereNotNull('requests.approved_at')
                    ->groupBy(['requests.department_id', 'requests.stationery_id'])
                    ->orderBy('stationeries.code')
                    ->get();

        return $requests;
    }
}
