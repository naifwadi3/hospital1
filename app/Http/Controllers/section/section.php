<?php

namespace App\Http\Controllers\section;

use App\Models\sections;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class section extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section=sections::where('user_id',Auth::id())->get();
        return view('pages.section.hospital_seaction',compact('section'));
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
            $section = new sections();
            $section->section_name = $request->section_name;
            $section->section_number = $request->section_number;
            $section->user_id=Auth::id();
            $section->save();
            toastr()->error(trans('messages.success'));
            return redirect()->route('section.index');
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
        $section = sections::where('id', $id)->firstOrFail();

            $section->section_name=$request->section_name;
            $section->section_number=$request->section_number;
            $section->save();
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
        $section = sections::where('id', $id)->delete();
      toastr()->error(trans('messages.Delete'));
      return redirect()->route('section.index');

    }
}
