<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Payment_Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentAccountController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'payment_id'=>['required'],
            'account_name'=>['required'],
            'account_number'=>['required'],
            'ipn_number'=>['required'],
            'exchange_rate'=>['required'],

        ],[
            'payment_id.required'=>'يرجي اختيار وسيله دفع',
            'account_number.required'=>'رقم الحساب مطلوب',
            'account_name.required'=>'يرجي ادخال اسم الحساب',
            'ipn_number.required'=>'رقم الايبان مطلوب (ipn)',
            'exchange_rate.required'=>'يرجي ادخال سعر الصرف'
        ]);
       Payment_Account::create([
           'payment_id'=>$request->payment_id,
           'account_name'=>$request->account_name,
           'account_number'=>$request->account_number,
           'ipn_number'=>$request->ipn_number,
           'exchange_rate'=>$request->exchange_rate,
       ]);
        return redirect()->back()->with('success', 'تم اضافة حساب الدفع بنجاح');
    }
    //

    public function delete($id){
         $payment= Payment_Account::find($id);
        $payment->delete();
        return redirect()->back()->with('success', 'تم حذف الحساب بنجاح');
    }

}
