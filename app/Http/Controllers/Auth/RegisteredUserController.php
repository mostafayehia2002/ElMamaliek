<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        ]);
        $user = User::where('email', $request->email)->first();
        $code=rand(1111, 9999);
        try {
            if (empty($user)) {
                User::create([
                    'email' => $request->email,
                    'password' => bcrypt($code),
                ]);
            } else {
                $user->update([
                    'password' => bcrypt($code),
                ]);
            }
            return response()->json(['success' => 'successfully send code','code'=>$code]);
        }    catch (\Exception $e) {

       return response()->json(['error' =>$e], 500);
}
    }
}
