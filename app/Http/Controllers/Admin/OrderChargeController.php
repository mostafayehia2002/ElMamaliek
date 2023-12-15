<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_Charge;
use App\Notifications\SendChargeProduct;
use App\Notifications\SendCodeProduct;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class OrderChargeController extends Controller
{
    //
    public function index(){
        $orders=Order_Charge::with(['user','payment','product'])->orderBy('created_at','desc')->get();
        return view('admin.charges.show_order_charges',compact('orders'));
    }
    public function acceptOrder($id){
        $order=Order_Charge::with('product')->where('id',$id)->first();
        $order->update(['status'=>'قبول']);
        //send code to email && notification
        Notification::send($order->user,new SendChargeProduct($order->user->email,$order->product->name));
        return redirect()->back()->with('success','تم الشحن بنجاح ');
    }

    public function delete($id){
        $order=Order_Charge::findOrFail($id);
        $photo=$order->photo;
        Storage::disk('admin')->delete('/orders/'.$photo);
        $order->delete();
        return redirect()->back()->with('success','تم حذف الطلب بنجاح');
    }

}
