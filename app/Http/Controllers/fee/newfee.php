<?php

namespace App\Http\Controllers\fee;

use App\Http\Controllers\Controller;
use App\Models\fee;
use App\Models\invoice_details;
use App\Models\invoise;
use App\Models\Patients;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
// use Barryvdh\DomPDF\PDF;
// use Barryvdh\DomPDF\Facade\Pdf;
use PDF;
use Illuminate\Support\Facades\Auth;

class newfee extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices=invoise::where('user_id',Auth::id())->get();

        return view('pages.newfee.index_fee',compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patient=Patients::all();
        $fees=fee::all();
        $invoice=invoise::all();
        $da_invoice=invoice_details::all();
        $data=DB::table('fees')->get();
        return view('pages.newfee.creat_fee',compact('patient','fees','data','invoice','da_invoice'));
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
            $data['patient_id'] = $request->patient_id;
        $data['patient_email'] = $request->patient_email;
        $data['patient_mobile'] = $request->patient_mobile;
        $data['invoice_number'] = $request->invoice_number;
        $data['invoice_number2'] = $request->invoice_number2;
        $data['invoice_date'] = $request->invoice_date;
        $data['sub_total'] = $request->sub_total;
        $data['discount_type'] = $request->discount_type;
        $data['discount_value'] = $request->discount_value;
        $data['vat_value'] = $request->vat_value;
        $data['shipping'] = $request->shipping;
        $data['total_due'] = $request->total_due;
        $data['user_id']=Auth::id();
        $invoice = invoise::create($data);
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

        $details_list = [];
        for ($i = 0; $i < count($request->product_name); $i++) {
            $details_list[$i]['product_name'] = $request->product_name[$i];
            $details_list[$i]['unit'] = $request->unit[$i];
            $details_list[$i]['quantity'] = $request->quantity[$i];
            $details_list[$i]['unit_price'] = $request->unit_price[$i];
            $details_list[$i]['row_sub_total'] = $request->row_sub_total[$i];
        }

        $details = $invoice->details()->createMany($details_list);

        if ($details) {
            return redirect()->back()->with([
                'message' => __('Frontend/frontend.created_successfully'),
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => __('Frontend/frontend.created_failed'),
                'alert-type' => 'danger'
            ]);
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
        $invoice = invoise::findOrFail($id);
        return view('pages.newfee.show_fee',compact('invoice'));
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
        //
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


        public function print($id)
        {

            $invoice = invoise::findOrFail($id);

            return view('pages.newfee.print_fee',compact('invoice'));
        }



public function pdf($id)
    {
        // $invoice = invoise::whereId($id)->first();
        $data=invoise::all();
        $items=invoice_details::all();
        $pdf = PDF::loadView('pages.newfee.pdf', ['data'=>$data],['items'=>$items]);

        return $pdf->download('anyname.pdf');



        // $data['invoice_number']     = $invoice->invoice_number;
        // $data['created_at']         = $invoice->created_at->format('Y-m-d');
        // $data['sub_total']          = $invoice->sub_total;
        // $data['discount']           = $invoice->discountResult();
        // $data['vat_value']          = $invoice->vat_value;
        // $data['shipping']           = $invoice->shipping;
        // $data['total_due']          = $invoice->total_due;


        // $pdf = PDF::loadView('pages.newfee.pdf', $data);
        // return $pdf->download('invoice.pdf');

    //    $data=invoise::all();
        // $pdf = PDF::loadView('pages.newfee.pdf', ['data'=>$data],compact('invoice'));

        // return $pdf->download('anyname.pdf');
        // return $pdf->stream($invoice->invoice_number.'.pdf');

        // if (Route::currentRouteName() == 'invoice.pdf') {
        //     return $pdf->stream($invoice->invoice_number.'.pdf');
        // } else {
        //     $pdf->save(public_path('assets/invoices/').$invoice->invoice_number.'.pdf');
        //     return $invoice->invoice_number.'.pdf';
        // }

    }



    public function Get_fees(Request $request,$id)
    {
        $p=fee::select('amount')->where('id',$request->id)->first();
    	return response()->json($p);


        // $data=invoise::select('product_name','id')->where('prod_cat_id',$request->id)->take(100)->get();

    // $list_sections = invoise::where("product_name", $id)->pluck("amount", "id");
    // return $list_sections;


    }



}
