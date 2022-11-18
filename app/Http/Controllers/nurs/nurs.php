<?php

namespace App\Http\Controllers\nurs;

use App\Http\Controllers\Controller;
use App\Models\doctor_specialty;
use App\Models\nurss;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class nurs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor_specialty=doctor_specialty::all();
        $nurs=nurss::where('user_id',Auth::id())->get();
        return view('pages.nurs.hospital_nurs',compact('doctor_specialty','nurs'));
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
            $nurs = new nurss();
            $nurs->name = $request->name;
            $nurs->nurs_id = $request->nurs_id;
            $nurs->email = $request->email;
            $nurs->password = Hash::make($request->password);
            $nurs->nurs_phone = $request->nurs_phone;
            $nurs->nurs_gender = $request->nurs_gender;
            $nurs->nurs_birthday = $request->nurs_birthday;
            $nurs->Date_of_contract = $request->Date_of_contract;
            $nurs->Contract_expiry_date = $request->Contract_expiry_date;
            $nurs->nurs_specialty = $request->nurs_specialty;
            $nurs->note = $request->note;
            $nurs->nurs_cv_file = $request->nurs_cv_file;
            $nurs->user_id=Auth::id();
            $nurs->save();
            flash()->addSuccess('تم الحفظ بنجاح');
            return redirect()->route('nurs.index');
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
            $nurs = nurss::where('id', $id)->firstOrFail();
            $nurs->name = $request->name;
            $nurs->nurs_id = $request->nurs_id;
            $nurs->email = $request->email;
            $nurs->nurs_phone = $request->nurs_phone;
            $nurs->nurs_gender = $request->nurs_gender;
            $nurs->nurs_birthday = $request->nurs_birthday;
            $nurs->Date_of_contract = $request->Date_of_contract;
            $nurs->Contract_expiry_date = $request->Contract_expiry_date;
            $nurs->nurs_specialty = $request->nurs_specialty;
            $nurs->note = $request->note;
            $nurs->nurs_cv_file = $request->nurs_cv_file;
            $nurs->save();
            flash()->addSuccess('تم الحفظ بنجاح');
            return redirect()->route('nurs.index');
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

        nurss::where('id', $id)->delete();
        toastr()->error('تم الحذف بنجاح');
        return redirect()->route('nurs.index');
    }
}
