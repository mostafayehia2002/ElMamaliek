<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserInterfaceController;
use Illuminate\Support\Facades\Route;

Route::controller(UserInterfaceController::class)->group(function (){
   Route::get('/','index')->name('home');
   //
  Route::get('/accounts','accountProducts')->name('accountProducts');
    Route::get('accounts/product/{id}/show_video','showVideo')->name('showVideo');
    //
    Route::get('category/{id}/code/products','codeProducts')->name('codeProducts');
    Route::get('category/{category_id}/code/product/{product_id}','paymentCode')->name('paymentWithCode');
    //
    Route::get('category/{id}/charge/products','chargeProducts')->name('chargeProducts');
    Route::get('category/{category_id}/charge/product/{product_id}','paymentCharge')->name('paymentWithCharge');

});
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
