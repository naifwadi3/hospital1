<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Patients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Patient extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Patient=patients::where('user_id',Auth::id())->get();

        return view('pages.Patient.Patient',compact('Patient'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $patient = new patients();
            $patient->patient_name = $request->patient_name;
            $patient->patient_id = $request->patient_id;
            $patient->patient_phone = $request->patient_phone;
            $patient->patient_blood_type = $request->patient_blood_type;
            $patient->patient_religion = $request->patient_religion;
            $patient->patient_gender = $request->patient_gender;
            $patient->patient_allergy = $request->patient_allergy;
            $patient->patient_birthday = $request->patient_birthday;
            $patient->patient_arrival_time = $request->patient_arrival_time;
            $patient->reason_for_visit = $request->reason_for_visit;
            $patient->user_id=Auth::id();
            $patient->save();
            flash()->addSuccess('تم الحفظ بنجاح');
            return redirect()->route('Patient.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $patient = patients::where('id', $id)->firstOrFail();
            $patient->patient_name = $request->patient_name;
            $patient->patient_id = $request->patient_id;
            $patient->patient_phone = $request->patient_phone;
            $patient->patient_blood_type = $request->patient_blood_type;
            $patient->patient_religion = $request->patient_religion;
            $patient->patient_gender = $request->patient_gender;
            $patient->patient_allergy = $request->patient_allergy;
            $patient->patient_birthday = $request->patient_birthday;
            $patient->patient_arrival_time = $request->patient_arrival_time;
            $patient->reason_for_visit = $request->reason_for_visit;
            $patient->save();
            flash()->addSuccess('تم الحفظ بنجاح');
            return redirect()->route('Patient.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        patients::where('id', $id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Patient.index');
    }
}
