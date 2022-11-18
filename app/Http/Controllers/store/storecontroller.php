<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class storecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store=store::where('user_id',Auth::id())->get();
        return view('pages.store.hospital_store',compact('store'));
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
            $store = new store();
            $store->class_name = $request->class_name;
            $store->class_id = $request->class_id;
            $store->section_name = $request->section_name;
            $store->save();
            toastr()->error(trans('messages.success'));
            return redirect()->route('stores.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $store = store::where('id', $id)->firstOrFail();
            $store->class_name = $request->class_name;
            $store->class_id = $request->class_id;
            $store->section_name = $request->section_name;
            $store->save();
            toastr()->error(trans('messages.success'));
            return redirect()->route('stores.index');
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
