<?php

namespace App\Http\Controllers\fee;

use App\Http\Controllers\Controller;
use App\Models\fee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class fees extends Controller
{
    public function index(){
        $fee=fee::where('user_id',Auth::id())->get();
        return view('pages.fee.fees',compact('fee'));
    }




    public function store(Request $request){
        try {
            $fee = new fee();
            $fee->name = $request->name;
            $fee->amount = $request->amount;
            $fee->user_id=Auth::id();
            $fee->save();
            toastr()->error(trans('messages.success'));
            return redirect()->route('fee.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $fee = fee::where('id', $id)->firstOrFail();
            $fee->name = $request->name;
            $fee->amount = $request->amount;
            $fee->save();
            toastr()->error(trans('messages.success'));
            return redirect()->route('fee.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }

    public function destroy($id)
    {
          fee::where('id', $id)->delete();
        toastr()->warning('تم الحذف بنجاح','حذف');
        return redirect()->route('fee.index');
    }
}
