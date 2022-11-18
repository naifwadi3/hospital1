<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\book_an_appointments;
use App\Models\doctors;
use App\Models\Patients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class book_an_appointment extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking=book_an_appointments::where('user_id',Auth::id())->get();
        $doctor=doctors::all();
        $Patient=Patients::all();
        return view('pages.doctors.book_an_appointment',compact('booking','doctor','Patient'));
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
            $booking = new book_an_appointments();
            $booking->patient_id = $request->patient_id;
            $booking->doctor_id = $request->doctor_id;
            $booking->patient_phone = $request->patient_phone;
            $booking->booking_date = $request->booking_date;
            $booking->user_id=Auth::id();

            $booking->save();
            flash()->addSuccess('تم الحفظ بنجاح');
            return redirect()->route('book_an_appointment.index');
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
            $booking = book_an_appointments::where('id', $id)->firstOrFail();
            $booking->patient_id = $request->patient_id;
            $booking->doctor_id = $request->doctor_id;
            $booking->patient_phone = $request->patient_phone;
            $booking->booking_date = $request->booking_date;
            $booking->save();
            flash()->addSuccess('تم الحفظ بنجاح');
            return redirect()->route('book_an_appointment.index');
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

        book_an_appointments::where('id', $id)->delete();
        toastr()->error('تم الحذف بنجاح');
        return redirect()->route('doctor.index');
    }
}
