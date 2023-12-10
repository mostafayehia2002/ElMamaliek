<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        $users=User::all();
        return view('admin.users.show_users',compact('users'));
    }

    public function delete($id){
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success','تم حذف المستخدم بنجاح');
    }
}
