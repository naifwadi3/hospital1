<?php

namespace App\Http\Controllers\rays;

use App\Http\Controllers\Controller;
use App\Models\Patients;
use App\Models\rays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ray extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ray=rays::where('user_id',Auth::id())->get();
        $Patient=Patients::all();
        return view('pages.X-Ray.rays',compact('ray','Patient'));
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
            $ray = new rays();
            $ray->patient_id = $request->patient_id;
            $ray->device_name = $request->device_name;
            $ray->booking_date = $request->booking_date;
            $ray->user_id=Auth::id();
            $ray->save();
            toastr()->error(trans('messages.success'));
            return redirect()->route('rays.index');
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
            $ray = rays::where('id', $id)->firstOrFail();
            $ray->patient_id = $request->patient_id;
            $ray->device_name = $request->device_name;
            $ray->booking_date = $request->booking_date;
            $ray->save();
            toastr()->error(trans('messages.success'));
            return redirect()->route('rays.index');
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
