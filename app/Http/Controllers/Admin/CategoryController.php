<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'required',
        ],[
            'name.required' => 'اسم القسم مطلوب',
            'photo.required' => 'صورة القسم مطلوبة'
        ]);
        $photo = time() . $request->file('photo')->getClientOriginalName();
        $request->file('photo')->storeAs('category/', $photo, 'admin');
       Category::create([
        'name'=>$request->name,
        'photo'=>$photo,
       ]);
     return redirect()->back()->with('success','تم اضافة القسم بنجاح');
    }
}
