<?php

namespace App\Http\Controllers\room;

use App\Http\Controllers\Controller;
use App\Models\sections;
use App\Models\room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class rooms extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room=room::where('user_id',Auth::id())->get();
        $sectoion=sections::all();
        return view('pages.room.hospital_room',compact('sectoion','room'));
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
        $validated = $request->validate([
            'room_name' => 'required',
            'room_id' => 'required',
            'section_id' => 'required',
            'Special_room' => 'required',
            'room_price' => 'required',
            'room_type' => 'required',

        ]);

        try {
            $room = new room($validated);
            $room->room_name = $request->room_name;
            $room->room_id = $request->room_id;
            $room->section_id = $request->section_id;
            $room->Special_room = $request->Special_room;
            $room->room_price = $request->room_price;
            $room->room_type = $request->room_type;
            $room->note = $request->note;
            $room->user_id=Auth::id();
            $room->save();
            flash()->addSuccess('تم الحفظ بنجاح');
            return redirect()->route('room.index');
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
        $room = room::where('id', $id)->firstOrFail();
        $room->room_name = $request->room_name;
        $room->room_id = $request->room_id;
        $room->section_id = $request->section_id;
        $room->Special_room = $request->Special_room;
        $room->room_price = $request->room_price;
        $room->room_type = $request->room_type;
        $room->note = $request->note;
            $room->save();
            toastr()->success(trans('messages.Update'));


    return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = room::where('id', $id)->delete();
        toastr()->warning('تم الحذف بنجاح','حذف');
        return redirect()->route('room.index');
    }
}
