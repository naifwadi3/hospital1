<?php

namespace App\Http\Controllers\pharmacy;

use App\Http\Controllers\Controller;
use App\Models\pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pharmacys extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharmaci=pharmacy::where('user_id',Auth::id())->get();
        return view('pages.pharmacies.pharmacy',compact('pharmaci'));
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
            $pharmaci = new pharmacy();
            $pharmaci->medicament_name = $request->medicament_name;
            $pharmaci->medicament_id = $request->medicament_id;
            $pharmaci->quantity = $request->quantity;
            $pharmaci->producing_company = $request->producing_company;
            $pharmaci->made_in = $request->made_in;
            $pharmaci->medicament_classification = $request->medicament_classification;
            $pharmaci->production_date = $request->production_date;
            $pharmaci->expiry_date = $request->expiry_date;
            $pharmaci->note = $request->note;
            $pharmaci->user_id=Auth::id();

            $pharmaci->save();
            flash()->addSuccess('تم الحفظ بنجاح');
            return redirect()->route('pharmacy.index');
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

            $pharmaci = pharmacy::where('id', $id)->firstOrFail();
            $pharmaci->medicament_name = $request->medicament_name;
            $pharmaci->medicament_id = $request->medicament_id;
            $pharmaci->quantity = $request->quantity;
            $pharmaci->producing_company = $request->producing_company;
            $pharmaci->made_in = $request->made_in;
            $pharmaci->medicament_classification = $request->medicament_classification;
            $pharmaci->production_date = $request->production_date;
            $pharmaci->expiry_date = $request->expiry_date;
            $pharmaci->note = $request->note;
            $pharmaci->save();
            flash()->addSuccess('تم الحفظ بنجاح');
            return redirect()->route('pharmacy.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pharmacy::where('id', $id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('pharmacy.index');
    }
}
