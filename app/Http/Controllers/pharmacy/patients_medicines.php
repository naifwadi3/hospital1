<?php

namespace App\Http\Controllers\pharmacy;

use App\Http\Controllers\Controller;
use App\Models\doctors;
use App\Models\Patients;
use App\Models\Patients_medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class patients_medicines extends Controller
{
    public function index()
    {
        $patients= Patients_medicine::where('user_id',Auth::id())->get();
        $doctor=doctors::all();
        $Patient=Patients::all();
        return view('pages.pharmacies.patientsmedicines',compact('patients','doctor','Patient'));
    }

    public function store(Request $request)
    {
        try {
        $pharmaci = new Patients_medicine();
        $pharmaci->patient_id = $request->patient_id;
        $pharmaci->doctor_id = $request->doctor_id;
        $pharmaci->medicament_id = $request->medicament_id;
        $pharmaci->discharge_date = $request->discharge_date;
        $pharmaci->quantity = $request->quantity;
        $pharmaci->use_way = $request->use_way;
        $pharmaci->user_id=Auth::id();

        $pharmaci->save();
        toastr()->success(trans('messages.success'));
        return redirect()->route('patients_medicines.index');
    }
    catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
    }

    }
}
