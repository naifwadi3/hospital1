<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\day_work;
use App\Models\doctors;
use App\Models\nurss;
use Illuminate\Http\Request;

class doctor_day_table extends Controller
{
    public function index(){
        $day_work=day_work::all();
        $doctor=doctors::all();
        $nurs = nurss::all();
        return view('pages.dashboard.doctor_day_taple',compact('doctor','nurs','day_work'));
    }


    public function store(Request $request){
        try {
            $nurs = new day_work();
            $nurs->worker_id = $request->worker_id;
            $nurs->the_work = $request->the_work;
            $nurs->status = $request->status;
            $nurs->start_time = $request->start_time;
            $nurs->end_time = $request->end_time;
            $nurs->note = $request->note;
            $nurs->save();
            flash()->addSuccess('تم الحفظ بنجاح');
            return redirect()->route('day_work');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
