<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Notifications\SendCodeProduct;
use Illuminate\Support\Facades\Notification;
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
        $photo=$order->process_photo;
        Storage::disk('admin')->delete('orders/'.$photo);
        $order->delete();
        return redirect()->back()->with('success','تم حذف الطلب بنجاح');
    }

    public function acceptOrder($id){
        $order=Order::with('product')->where('id',$id)->first();
        $order->update(['status'=>'تم الموافقة']);
        $order->product->update(['status'=>'غير متاح']);
        //send code to email && notification
        Notification::send($order->user,new SendCodeProduct($order->user->email, $order->product->product_name ,$order->product->code));
        return redirect()->back()->with('success','تم ارسال الكود بنجاح ');
    }
}
