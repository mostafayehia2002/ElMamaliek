<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'payment_name'=>['required'],
            'payment_photo'=>['required'],
            'account_number'=>['required'],
            'country_name'=>['required']

        ],[
            'payment_name.required'=>'اسم وسيله الدفع مطلوبه',
            'account_number.required'=>'رقم الحساب مطلوب',
            'payment.required'=>'يرجي ادخال صوره',
            'country_name.required'=>'اسم الدوله مطلوب',
        ]);
        $photo = time().$request->file('payment_photo')->getClientOriginalName();
        $request->file('payment_photo')->storeAs('payment/', $photo, 'admin');
       Payment::create([
           'payment_name'=>$request->payment_name,
           'photo'=>$photo,
           'account_number'=>$request->account_number,
           'country_id'=>$request->country_name,
       ]);
        return redirect()->back()->with('success', 'تم اضافة وسيله الدفع بنجاح');
    }
    //

    public function delete($id){
         $payment= Payment::find($id);
         $photo= $payment->photo;
         Storage::disk('admin')->delete('/payment/'.$photo);
        $payment->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }

}
