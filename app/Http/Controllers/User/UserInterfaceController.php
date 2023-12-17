<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Category;
use App\Models\Category_Charge;
use App\Models\Country;
use App\Models\Order;
use App\Models\Order_Charge;
use App\Models\Payment;
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

    public function paymentCode($category_id,$product_id){
         $countries=Country::all();
        if(!Auth::guard('web')->check()){

            return  redirect()->back()->with('error','يرجي تسجيل الدخول');
        }
        return view('user.codes.payment',compact('countries','category_id','product_id'));
    }

    public function sendCodeOrder(Request $request){
        $request->validate([
            'account_number'=>'required',
            'process_number'=>'required',
            'photo'=>'required',
        ],[
            'account_number.required'=>'يرجي اختيار رقم الحساب ',
            'process_number.required'=>'يرجي ارسال رقم المرجعي',
            'photo.required'=>'يرجي ارسال لقطه شاشه بالدفع',
        ]);
        $product= Product::findOrFail($request->product_id);
        $photo = time().$request->file('photo')->getClientOriginalName();
        $request->file('photo')->storeAs('orders/', $photo, 'admin');
        Order::create([
            'user_id'=>Auth::guard('web')->user()->id,
            'product_id'=>$request->product_id,
            'payment_id'=>$request->payment_id,
            'price'=>$product->price,
            'process_number'=>$request->process_number,
            'process_photo'=>$photo,
        ]);
        toastr()->success('تم طلب المنتج بنجاح في انتظار الموافقة');
        return redirect()->route('home');
    }

    //charge product
    public function chargeProducts($id){
        $charges=Product_Charge::where('category_id',$id)->get();
        $category_name=Category_Charge::find($id);
        return view('user.charges.products_charges',compact('charges','category_name'));
    }
    public function paymentCharge($category_id,$product_id){
        $countries=Country::all();
        if(!Auth::guard('web')->check()){

            return  redirect()->back()->with('error','يرجي تسجيل الدخول');


        }
        return view('user.charges.payment',compact('countries','category_id','product_id'));
    }
    public function sendChargeOrder(Request $request){
     $request->validate([
    'account_number'=>'required',
    'process_number'=>'required',
    'photo'=>'required',
    'user_id'=>'required',
  ],[
    'account_number.required'=>'يرجي اختيار رقم الحساب ',
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
        'payment_id'=>$request->payment_id,
        'price'=>$product->price,
        'process_number'=>$request->process_number,
        'process_photo'=>$photo,
        'user_number'=>$request->user_id,
    ]);
        toastr()->success('تم طلب المنتج بنجاح في انتظار الموافقة');
        return redirect()->route('home');
    }

    //get payments of country
    public function getPayments($id){
        try {
            $payments= Payment::where('country_id',$id)->get();
        }catch (Exception $e){
            return response()->json(['error'=>$e]);
        }
        return response()->json([$payments]);
    }
}

