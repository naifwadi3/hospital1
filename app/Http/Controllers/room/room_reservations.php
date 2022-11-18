<?php

namespace App\Http\Controllers\room;

use App\Http\Controllers\Controller;
use App\Models\room_reservations as ModelsRoom_reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class room_reservations extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations=ModelsRoom_reservations::where('user_id',Auth::id())->get();
        return view('pages.room.room_reservations',compact('reservations'));
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
            $Receptions = new ModelsRoom_reservations();
            $Receptions->Patient_id = $request->Patient_id;
            $Receptions->room_id = $request->room_id;
            $Receptions->booking_date = $request->booking_date;
            $Receptions->did_pay = $request->did_pay;
            $Receptions->Exit_date = $request->Exit_date;
            $Receptions->user_id=Auth::id();
            $Receptions->save();
            flash()->addSuccess('تم الحفظ بنجاح');
            return redirect()->route('room_reservations.index');
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
            $Receptions = ModelsRoom_reservations::where('id', $id)->firstOrFail();
            $Receptions->Patient_id = $request->Patient_id;
            $Receptions->room_id = $request->room_id;
            $Receptions->booking_date = $request->booking_date;
            $Receptions->did_pay = $request->did_pay;
            $Receptions->Exit_date = $request->Exit_date;
            $Receptions->save();
            flash()->addSuccess('تم الحفظ بنجاح');
            return redirect()->route('room_reservations.index');
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
         ModelsRoom_reservations::where('id', $id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('room_reservations.index');

    }
}
