<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\date_with_doctors;
use App\Models\doctors;
use App\Models\Patients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class date extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Patient=Patients::all();
        $doctor=doctors::all();
        $date=date_with_doctors::where('user_id',Auth::id())->get();
        return view('pages.doctors.date_with_docotr',compact('Patient','doctor','date'));
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
            $doctor = new date_with_doctors();
            $doctor->patient_id = $request->patient_id;
            $doctor->doctor_id = $request->doctor_id;
            $doctor->visit_date = $request->visit_date;
            $doctor->patient_phone = $request->patient_phone;
            $doctor->user_id=Auth::id();
            $doctor->save();
            flash()->addSuccess('تم الحفظ بنجاح');
            return redirect()->route('date.index');
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
            $doctor = date_with_doctors::where('id', $id)->firstOrFail();
            $doctor->patient_id = $request->patient_id;
            $doctor->doctor_id = $request->doctor_id;
            $doctor->visit_date = $request->visit_date;
            $doctor->patient_phone = $request->patient_phone;
            $doctor->save();
            flash()->addSuccess('تم الحفظ بنجاح');
            return redirect()->route('date.index');
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
        //
    }
}
