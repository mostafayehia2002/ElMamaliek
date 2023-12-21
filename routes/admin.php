<?php

use App\Models\Admin;
use App\Models\Category_Charge;
use App\Models\Order;
use App\Models\Order_Charge;
use App\Models\PaymentAccount;
use App\Models\User;
use Illuminate\Support\Facades\Route;
Route::prefix('admin')->name('admin.')->group(function (){
        Route::middleware('IsAdmin')->group(function () {
            $admins=Admin::all()->count();
            $orders=Order::all()->count();
            $order_charges=Order_Charge::all()->count();
            $users=User::all()->count();
            Route::view('index', 'admin.index',compact(['admins','orders','order_charges','users']))->name('index');
        });
        require __DIR__.'/admin_auth.php';
    });
