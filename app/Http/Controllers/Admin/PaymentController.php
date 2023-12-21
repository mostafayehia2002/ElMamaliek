<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PaymentController extends Controller
{
    //
    public function index(){
        $payments= Payment::with('accounts')->get();
       return view('admin.payments.show_payments',compact('payments'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'payment_name' => ['required', 'unique:payments,payment_name'],
            'payment_photo' => ['required'],
        ], [
            'payment_name.required' => 'يرجي ادخال اسم وسيلة الدفع',
            'payment_name.unique' => 'اسم وسيلة الدفع موجود مسبقا',
            'payment_photo'=>'يرجي ادخال صورة',
        ]);
        $photo = time().$request->file('payment_photo')->getClientOriginalName();
        $request->file('payment_photo')->storeAs('payment/', $photo, 'admin');
       Payment::create([
          'payment_name'=>$request->payment_name,
          'payment_photo' =>$photo,
       ]);
        return redirect()->back()->with('success', 'تم اضافة وسيلة الدفع بنجاح');
    }


       public function delete($id){
           $payment= Payment::find($id);
           $photo=$payment->payment_photo;
           Storage::disk('admin')->delete('payment/'.$photo);
           $payment->delete();
           return redirect()->back()->with('success', 'تم حذف وسيلة الدفع بنجاح');
       }


}
