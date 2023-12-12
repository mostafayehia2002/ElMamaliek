<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use App\Models\Category_Charge;
use App\Models\Product;
use App\Models\Product_Charge;
use Illuminate\Http\Request;

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
       $codes=Product::where('category_id',$id)->where('status','متاح')->get();

       return view('user.codes.products_codes',compact('codes'));
    }

    public function paymentCode($category_id,$product_id){

        return view('user.codes.payment');
    }

    public function chargeProducts($id){
        $charges=Product_Charge::where('category_id',$id)->where('status','متاح')->get();
        return view('user.charges.products_charges',compact('charges'));
    }

    public function paymentCharge($category_id,$product_id){

        return view('user.charges.payment');
    }
}

