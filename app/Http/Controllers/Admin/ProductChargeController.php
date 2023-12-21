<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category_Charge;
use App\Models\Product;
use App\Models\Product_Charge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductChargeController extends Controller
{
    //
    public function index(){
        $categories=Category_Charge::all();
          $products=Product_Charge::with('category')->orderBy('created_at','desc')->get();
        return view('admin.charges.show_products_charges',compact('products','categories'));
    }

    public function store(Request $request){
        $request->validate([
            'category'=>'required',
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'photo'=>'required',
        ],[
                'category.required'=>'يرجي اختيار قسم',
                'name.required'=>'الاسم المنتج مطلوب',
                'description.required'=>'الوصف المنتج مطلوب',
                'price.required'=>'السعرالمنتج مطلوب',
                'photo.required'=>'الصورةالمنتج  مطلوبه',
            ]
        );
        $photo = time().$request->file('photo')->getClientOriginalName();
        $request->file('photo')->storeAs('products/products_charge/', $photo, 'admin');

        Product_Charge::create([
            'category_id'=>$request->category,
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'photo'=>$photo
        ]);

        return redirect()->back()->with('success','تم اضافة المنتج بنجاح');
    }

    public function delete($id){
        $product=  Product_Charge::findOrFail($id);
        $photo= $product->photo;
        $product->delete();
        Storage::disk('admin')->delete('products/products_charge/'.$photo);
        return redirect()->back()->with('success','تم حذف المنتج بنجاح');

    }

}
