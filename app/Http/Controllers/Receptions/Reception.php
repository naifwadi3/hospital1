<?php

namespace App\Http\Controllers\Receptions;

use App\Http\Controllers\Controller;
use App\Models\Receptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Reception extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Receptions=Receptions::where('user_id',Auth::id())->get();
        return view('pages.Reception and emergency department.Reception_and_emergency',compact('Receptions'));
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
            $Receptions = new Receptions();
            $Receptions->patient_name = $request->patient_name;
            $Receptions->patient_id = $request->patient_id;
            $Receptions->patient_gender = $request->patient_gender;
            $Receptions->patient_phone = $request->patient_phone;
            $Receptions->facilities_name = $request->facilities_name;
            $Receptions->facilities_phone = $request->facilities_phone;
            $Receptions->enter_date = $request->enter_date;
            $Receptions->out_date = $request->out_date;
            $Receptions->condition = $request->condition;
            $Receptions->transfer_by = $request->transfer_by;
            $Receptions->user_id=Auth::id();

            $Receptions->save();
            flash()->addSuccess('تم الحفظ بنجاح');
            return redirect()->route('Reception.index');
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
            $Receptions = Receptions::where('id', $id)->firstOrFail();
            $Receptions->patient_name = $request->patient_name;
            $Receptions->patient_id = $request->patient_id;
            $Receptions->patient_gender = $request->patient_gender;
            $Receptions->patient_phone = $request->patient_phone;
            $Receptions->facilities_name = $request->facilities_name;
            $Receptions->facilities_phone = $request->facilities_phone;
            $Receptions->enter_date = $request->enter_date;
            $Receptions->out_date = $request->out_date;
            $Receptions->condition = $request->condition;
            $Receptions->transfer_by = $request->transfer_by;
            $Receptions->save();
            flash()->addSuccess('تم الحفظ بنجاح');
            return redirect()->route('Reception.index');
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
        //  Receptions::where('id', $id)->onlyTrashed()->get();
        // toastr()->error('messages.Delete');
        // return redirect()->route('section.index');
    }
}
