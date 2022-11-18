<?php

namespace App\Http\Controllers\Specialties;

use App\Http\Controllers\Controller;
use App\Models\doctor_specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Specialties extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialties=doctor_specialty::where('user_id',Auth::id())->get();
        return view('pages.Specialties_doctor.Specialties_doctor',compact('specialties'));
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
            $specialty = new doctor_specialty();
            $specialty->Specialties_name = $request->Specialties_name;
            $specialty->Specialties_number = $request->Specialties_number;
            $specialty->user_id=Auth::id();
            $specialty->save();
            flash()->addSuccess('تم الحفظ بنجاح');
            return redirect()->route('Specialties.index');
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
            $specialty = doctor_specialty::where('id', $id)->firstOrFail();
            $specialty->Specialties_name = $request->Specialties_name;
            $specialty->Specialties_number = $request->Specialties_number;
            $specialty->save();
            flash()->addSuccess('تم الحفظ بنجاح');
            return redirect()->route('Specialties.index');
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
