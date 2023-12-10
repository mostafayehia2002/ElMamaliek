<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function  showAdmins()
    {

        $admins = Admin::orderBy('created_at', 'desc')->get();
        return view('admin.new_admin.show_admins', compact('admins'));
    }

    //
    public function index()
    {
        return view('admin.new_admin.add_admin');
    }
    public function store(Request $r)
    {
        if ($r->hasFile('photo')) {
            $img = $r->file('photo')->getClientOriginalName();
            $r->file('photo')->storeAs('profile', $img, 'admin');
        } else {
            $img = 'profile.jpg';
        }

        $r->validate([
            'name' => ['required', 'unique:admins,name'],
            'password' => 'required',
            'email' => ['required', 'unique:admins,email'],
        ]);
        Admin::create([
            'name' => $r->name,
            'password' => Hash::make($r->password),
            'email' => $r->email,
            'photo' => $img,
        ]);
        return  redirect()->back()->with('success', 'تم اضافة المستخدم بنجاح');
    }

    public function editAdmin($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.new_admin.update_admin', compact('admin'));
    }
    public function updateAdmin($id, Request $r)
    {
       $admin= Admin::findOrFail($id);
        $oldImg =$admin->photo;
        if($r->hasFile('photo')){
            $img = $r->file('photo')->getClientOriginalName();
            $r->file('photo')->storeAs('profile/', $img, 'admin');
            if ($oldImg !== 'profile.jpg') {
                Storage::disk('admin')->delete('profile/' . $oldImg);
            }
            }else{
            $img = $oldImg;
        }

        $r->validate([
            'name' => 'required',
            'email' => 'required|unique:admins,email,'.$id,
        ]);
        if ($r->has('password') && !empty($r->password)) {
            $admin->update([
                'name' => $r->name,
                'email' => $r->email,
                'password' => Hash::make($r->password),
                'photo' => $img,
            ]);
        } else{
            $admin->update([
                'name' => $r->name,
                'email' => $r->email,
                'photo' => $img,
            ]);
        }

        return redirect()->route('admin.showAdmins')->with('success', 'تم تعديل البيانات بنجاح');
    }

    public function deleteAdmin($id)
    {
        $admin=  Admin::find($id);
        $oldImg=$admin->photo;
        if (Auth::guard('admins')->user()->id == $id) {
            return  redirect()->route('admin.notAllowed');
        } else{
            $admin->delete();
            if ($oldImg !== 'profile.jpg') {
                Storage::disk('admin')->delete('profile/'.$oldImg);
            }
            return redirect()->back()->with('success', 'تم حذف المستخدم بنجاح');
        }
    }
}
