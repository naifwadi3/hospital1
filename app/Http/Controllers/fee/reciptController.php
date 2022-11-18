<?php

namespace App\Http\Controllers\fee;

use App\Http\Controllers\Controller;
use App\Models\fee;
use App\Models\Patients;
use App\Models\receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class reciptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receipt=receipt::where('user_id',Auth::id())->get();
        $fee=fee::all();
        $patient=Patients::all();
        return view('pages.fee.receipt',compact('receipt','fee','patient'));
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

            $receipt = new receipt();
            $receipt->patient_id = $request->patient_id;
            $receipt->receipt_number = $request->receipt_number;
            $receipt->reason_amount = $request->reason_amount;
            $receipt->amount_paid = $request->amount_paid;
            $receipt->remaining_amount = $request->remaining_amount;
            $receipt->Date_of_receipt = $request->Date_of_receipt;
            $receipt->note = $request->note;
            $receipt->user_id=Auth::id();
            $receipt->save();
            toastr()->error(trans('messages.success'));
            return redirect()->route('receipt.index');


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

        $receipt = receipt::where('id', $id)->firstOrFail();
        $receipt->patient_id = $request->patient_id;
        $receipt->receipt_number = $request->receipt_number;
        $receipt->reason_amount = $request->reason_amount;
        $receipt->amount_paid = $request->amount_paid;
        $receipt->remaining_amount = $request->remaining_amount;
        $receipt->Date_of_receipt = $request->Date_of_receipt;
        $receipt->note = $request->note;
        $receipt->save();
        toastr()->error(trans('messages.success'));
        return redirect()->route('receipt.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        receipt::where('id', $id)->delete();
        toastr()->warning('تم الحذف بنجاح','حذف');
        return redirect()->route('receipt.index');
    }
}
