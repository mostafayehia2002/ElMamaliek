<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    //
    public function index(){

        $orders=Order::with(['user','payment','product'])->orderBy('created_at','desc')->get();
      return view('admin.codes.show_orders',compact('orders'));
    }

    public function delete($id){
        $order=Order::findOrFail($id);
        $photo=$order->photo;
        Storage::disk('admin')->delete('/orders/'.$photo);
        $order->delete();
        return redirect()->back()->with('success','تم حذف الطلب بنجاح');
    }

    public function acceptOrder($id){
        $order=Order::with('product')->where('id',$id)->first();
        $order->update(['status'=>'قبول']);
        $order->product->update(['status'=>'غير متاح']);
        //send code to email && notification
        return redirect()->back()->with('success','تم ارسال الكود بنجاح ');
    }
}
