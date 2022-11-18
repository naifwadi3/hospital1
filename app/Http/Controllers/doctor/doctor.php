<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\doctor_specialty;
use App\Models\doctors;
use App\Models\images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class doctor extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photo=images::all();
        $doctor_specialty=doctor_specialty::all();
        $doctors=doctors::where('user_id',Auth::id())->get();
        return view('pages.doctors.hospital_doctor',compact('doctors','doctor_specialty','photo'));
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


   $filee = $request->cv->getClientoriginalextension();
            $filee_name =$request->name.time().'.'.$filee;
            $path='docttor_cv';
            // $request->cv->move($path,$filee_name);
            $request->cv->storeAs('attachments_cv/doctors/'.$request->name, $filee_name,'upload_attachments');




           $file = $request->photos->getClientoriginalextension();
           $file_name =$request->name.time().'.'.$file;
           $path='docttor_attachments';
        //    $request->photos->move($path,$file_name);
           $request->photos->storeAs('attachments/doctors/'.$request->name, $filee_name,'upload_attachments');

            $doctor = new doctors();
            $doctor->name = $request->name;
            $doctor->doctor_id = $request->doctor_id;
            $doctor->email = $request->email;
            $doctor->password = Hash::make($request->password);
            $doctor->doctor_phone = $request->doctor_phone;
            $doctor->doctor_gender = $request->doctor_gender;
            $doctor->doctor_birthday = $request->doctor_birthday;
            $doctor->Date_of_contract = $request->Date_of_contract;
            $doctor->Contract_expiry_date = $request->Contract_expiry_date;
            $doctor->doctor_specialty = $request->doctor_specialty;
            $doctor->note = $request->note;
            $doctor->photos = $file_name;
            $doctor->cv = $filee_name;
            $doctor->user_id=Auth::id();
            $doctor->save();
            flash()->addSuccess('تم الحفظ بنجاح');
            return redirect()->route('doctor.index');


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
            $doctor = doctors::where('id', $id)->firstOrFail();
            $doctor->name = $request->name;
            $doctor->doctor_id = $request->doctor_id;
            $doctor->email = $request->email;
            $doctor->doctor_phone = $request->doctor_phone;
            $doctor->doctor_gender = $request->doctor_gender;
            $doctor->doctor_birthday = $request->doctor_birthday;
            $doctor->Date_of_contract = $request->Date_of_contract;
            $doctor->Contract_expiry_date = $request->Contract_expiry_date;
            $doctor->doctor_specialty = $request->doctor_specialty;
            $doctor->note = $request->note;
            // $doctor->doctor_cv_file = $request->doctor_cv_file;
            $doctor->save();
            toastr()->success('messages.success');
            return redirect()->route('doctor.index');
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
          doctors::where('id', $id)->delete();
        toastr()->error('تم الحذف بنجاح');
        return redirect()->route('doctor.index');
    }
}
