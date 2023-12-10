<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index(){
        $products=Product::all();
        return view('admin.codes.show_products',compact('products'));
    }
    public function store(Request $request){
        $request->validate([
            'category'=>'required',
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'code'=>'required',
            'photo'=>'required',
        ],[
               'category.required'=>'يرجي اختيار قسم',
                'name.required'=>'الاسم المنتج مطلوب',
                'description.required'=>'الوصف المنتج مطلوب',
                'price.required'=>'السعرالمنتج مطلوب',
                'photo.required'=>'الصورةالمنتج  مطلوبه',
                'code.required'=>'كود المنتج مطلوب'
            ]
        );
        $photo = time().$request->file('photo')->getClientOriginalName();
        $request->file('photo')->storeAs('/products/products_code/', $photo, 'admin');

        Product::create([
            'category_name'=>$request->category,
              'product_name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
             'code'=>$request->code,
            'photo'=>$photo
        ]);

        return redirect()->back()->with('success','تم اضافة المنتج بنجاح');
    }

    public function delete($id){

        $product=Product::findOrFail($id);
        $photo= $product->photo;
        $product->delete();
        Storage::disk('admin')->delete('/products/products_code/'.$photo);
        return redirect()->back()->with('success','تم حذف المنتج بنجاح');

    }
}
