<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    //
    public  function index(){

        $accounts=Account::all();
        return view('admin.accounts.show_accounts',compact('accounts'));
    }
    public  function store(Request $request){

        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'photo'=>'required',
            'video'=>'required',
        ],[
                'name.required'=>'الاسم مطلوب',
                'description.required'=>'الوصف مطلوب',
                'price.required'=>'السعر مطلوب',
                'photo.required'=>'الصورة مطلوبه',
                'video.required'=>'الفيديو مطلوب',
            ]
        );
        $photo = time().$request->file('photo')->getClientOriginalName();
        $request->file('photo')->storeAs('/products/accounts/', $photo, 'admin');
        $video = time().$request->file('video')->getClientOriginalName();
        $request->file('video')->storeAs('/products/accounts/', $video, 'admin');
        Account::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'photo'=>$photo,
            'video'=>$video,
        ]);

        return redirect()->back()->with('success', 'تم اضافة الحساب بنجاح');
    }


    public function delete($id)
    {
        $account=Account::find($id);
       $photo= $account->photo;
       $video= $account->video;
        Storage::disk('admin')->delete('/products/accounts/'.$photo);
        Storage::disk('admin')->delete('/products/accounts/'.$video);
        $account->delete();
        return redirect()->back()->with('success', 'تم حذف الحساب بنجاح');
    }
}
