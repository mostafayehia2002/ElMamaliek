<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Category;
use App\Models\Category_Charge;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Order_Charge;
use App\Models\Payment_Account;
use App\Models\PaymentAccount;
use App\Models\Product;
use App\Models\Product_Charge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class UserInterfaceController extends Controller
{
    //
    public function index(){
        $code_categories=Category::all();
        $charge_categories=Category_Charge::all();
        return view('user.index',compact('code_categories','charge_categories'));
    }
     //accounts category
    public function accountProducts(){
       $accounts= Account::all();
       return view('user.accounts.account_products',compact('accounts'));
    }
    public function showVideo($id){
      $account=Account::findOrFail($id);
      return view('user.accounts.video',compact('account'));
    }
    //end accounts
    //category with code
    public function codeProducts($id){
       $codes=Product::where('category_id',$id)->get();
        $category_name=Category::find($id);
       return view('user.codes.products_codes',compact('codes','category_name'));
    }
    //payment with code
    public function paymentCode($category_id,$product_id){
        $payments=Payment::all();
        $accounts=Payment_Account::all();
        $price=Product::find($product_id)->price;
        if(!Auth::guard('web')->check()){
            return  redirect()->back()->with('error','يرجي تسجيل الدخول');
        }
        return view('user.codes.payment',compact('payments','accounts','category_id','product_id','price'));
    }

    public function sendCodeOrder(Request $request){
        $request->validate([
            'account_name'=>'required',
            'process_number'=>'required',
            'photo'=>'required',
        ],[
            'account_name.required'=>'يرجي اختيار صاحب الحساب ',
            'process_number.required'=>'يرجي ارسال رقم المرجعي',
            'photo.required'=>'يرجي ارسال لقطه شاشه بالدفع',
        ]);
        $product= Product::findOrFail($request->product_id);
        $photo = time().$request->file('photo')->getClientOriginalName();
        $request->file('photo')->storeAs('orders/', $photo, 'admin');
        Order::create([
            'user_id'=>Auth::guard('web')->user()->id,
            'product_id'=>$request->product_id,
            'payment_id'=>$request->account_name,
            'price'=>$product->price,
            'process_number'=>$request->process_number,
            'process_photo'=>$photo,
        ]);
        return redirect()->back()->with('success','تم طلب المنتج بنجاح في انتظار الموافقة');
    }


    //charge product
    public function chargeProducts($id){
        $charges=Product_Charge::where('category_id',$id)->get();
        $category_name=Category_Charge::find($id);
        return view('user.charges.products_charges',compact('charges','category_name'));
    }
    public function paymentCharge($category_id,$product_id){
        $payments=Payment::all();
        $accounts=Payment_Account::all();
         $price=Product_Charge::find($product_id)->price;
        if(!Auth::guard('web')->check()){
            return  redirect()->back()->with('error','يرجي تسجيل الدخول');
        }
        return view('user.charges.payment',compact('payments','accounts','category_id','product_id','price'));
    }
    public function sendChargeOrder(Request $request){
     $request->validate([
    'account_name'=>'required',
    'process_number'=>'required',
    'photo'=>'required',
    'user_id'=>'required',
  ],[
    'account_name.required'=>'يرجي اختيار صاحب الحساب ',
    'process_number.required'=>'يرجي ارسال رقم المرجعي',
    'photo.required'=>'يرجي ارسال لقطه شاشه بالدفع',
    'user_id.required'=>'رقم ال Id الخاص بك مطلوب'
   ]);
      $product= Product_Charge::findOrFail($request->product_id);
        $photo = time().$request->file('photo')->getClientOriginalName();
        $request->file('photo')->storeAs('orders/', $photo, 'admin');
       Order_Charge::create([
         'user_id'=>Auth::guard('web')->user()->id,
        'product_id'=>$request->product_id,
        'payment_id'=>$request->account_name,
        'price'=>$product->price,
        'process_number'=>$request->process_number,
        'process_photo'=>$photo,
        'user_number'=>$request->user_id,
    ]);
        return redirect()->back()->with('success','تم طلب المنتج بنجاح في انتظار الموافقة');
    }
//end
    //get all accounts  if you click on one of payment
    public function getAllAccounts($id){
        try {
            $accounts= Payment_Account::where('payment_id',$id)->get();
        }catch (Exception $e){
            return response()->json(['error'=>$e]);
        }
        return response()->json([$accounts]);
    }
}



