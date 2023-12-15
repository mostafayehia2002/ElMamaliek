<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Verification;
use App\Models\User;
use App\Notifications\SendChargeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class RegisteredUserController extends Controller
{
    private $code;
    public function requestCode(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        ]);
        $user = User::where('email', $request->email)->first();
        $this->code=rand(1111, 9999);
        try {
            if (empty($user)) {
               $user=User::create([
                    'email' => $request->email,
                    'password' => bcrypt($this->code),
                ]);
            } else {
                $user->update([
                    'password' => bcrypt($this->code),
                ]);
            }
            //send  verification code to email
             Mail::to($user)->send(new Verification($user->email,$this->code));
            return response()->json(['success' => 'successfully send code','code'=>$this->code]);

        }    catch (\Exception $e) {

       return response()->json(['error' =>$e], 500);
}
    }
}
