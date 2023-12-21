<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category_Charge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryChargeController extends Controller
{
    public function index(){
     $categories= Category_Charge::orderBy('created_at', 'desc')->get();
     return view('admin.charges.show_categories',compact('categories'));
    }
    public function store(Request $request){
     $request->validate([
     'name'=>['required','unique:category_charges,name'],
     'photo'=>['required','image']
    ],[
        'name.required'=>'اسم القسم مطلوب',
         'name.unique'=>'القسم موجود مسبقا',
         'photo.required'=>'صورة القسم مطلوبه',
     ]);
        $photo = time().$request->file('photo')->getClientOriginalName();
        $request->file('photo')->storeAs('category/', $photo, 'admin');
       Category_Charge::create([
           'name'=>$request->name,
           'photo'=>$photo,
       ]);
      return redirect()->back()->with('success','تم انشاء القسم بنجاح');
    }

    public function edit($id){
        $category=Category_Charge::findOrFail($id);
        return view('admin.charges.update_category',compact('category'));
    }
    public function update(Request $request ,$id)
    {
        $category = Category_Charge::findOrFail($id);
        $oldPhoto = $category->photo;
        if ($request->has('photo')) {
            $photo = time() . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('category/', $photo, 'admin');
            Storage::disk('admin')->delete('category/' . $oldPhoto);
        } else {
            $photo = $oldPhoto;
        }
        $request->validate([
            'name' => ['required','unique:category_charges,name,'.$id],
            'photo' => ['image']
        ], [
            'name.required' => 'اسم القسم مطلوب',
            'name.unique' => 'القسم موجود مسبقا',
        ]);
        $category->update([
            'name' => $request->name,
            'photo' => $photo,
        ]);
        return redirect()->route('admin.showCategories')->with('success', 'تم تحديث القسم بنجاح');
    }


    public function delete($id){
        $category = Category_Charge::with('products')->findOrFail($id);

        foreach($category->products as $product){
            Storage::disk('admin')->delete('products/products_charge/'.$product->photo);
        }
        Storage::disk('admin')->delete('category/'.$category->photo);
        $category->delete();
        return redirect()->route('admin.showCategories')->with('success', 'تم حذف القسم بنجاح');
    }
}
