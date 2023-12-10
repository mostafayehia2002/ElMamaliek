<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AdminAuth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryChargeController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\OrderChargeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProductChargeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
Route::middleware('guest:admins')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});
Route::middleware('auth:admins')->group(function () {
    Route::get('notAllowed',function (){
        return view('admin.not_allowed');
    })->name('notAllowed');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
    Route::controller(AdminController::class)->group(function (){
        Route::get('show_admins', 'showAdmins')->name('showAdmins');
        Route::get('add_admin','index')->name('addAdmin');
        Route::post('add_admin','store')->name('storeAdmin');
        Route::get('add_admin/{id}','editAdmin')->name('editAdmin');
        Route::post('update_admin/{id}','updateAdmin')->name('updateAdmin');
        Route::get('delete_admin/{id}','deleteAdmin')->name('deleteAdmin');
    });
    //payments
    Route::controller(CountryController::class)->group(function (){
        Route::get('country', 'index')->name('showCountries');
        Route::get('country/create', 'create')->name('createCountry');
        Route::Post('country/store', 'store')->name('storeCountry');
    });
    Route::controller(PaymentController::class)->group(function (){
        Route::Post('payment/store', 'store')->name('storePayment');
        Route::get('payment/delete/{id}', 'delete')->name('deletePayment');
    });
    //
    Route::controller(AccountController::class)->group(function (){
        Route::get('accounts', 'index')->name('showAccounts');
        Route::Post('accounts/store', 'store')->name('storeAccount');
        Route::get('accounts/delete/{id}', 'delete')->name('deleteAccount');
    });
    //
    Route::controller(CategoryChargeController::class)->group(function (){
        Route::get('category', 'index')->name('showCategories');
        Route::Post('category/store', 'store')->name('storeCategory');
        Route::get('category/edit/{id}', 'edit')->name('editCategory');
        Route::Post('category/update/{id}', 'update')->name('updateCategory');
        Route::get('category/delete/{id}', 'delete')->name('deleteCategory');
    });
    Route::controller(ProductController::class)->group(function (){
        Route::get('products', 'index')->name('showProducts');
        Route::Post('products/store', 'store')->name('storeProduct');
        Route::get('products/delete/{id}', 'delete')->name('deleteProduct');
    });
    Route::controller(OrderController::class)->group(function (){
        Route::get('orders', 'index')->name('showOrders');
        Route::get('orders/delete/{id}', 'delete')->name('deleteOrder');
        Route::get('orders/accept/{id}', 'acceptOrder')->name('acceptOrder');
    });
    //charges
    Route::controller(ProductChargeController::class)->group(function (){
        Route::get('products_charge', 'index')->name('showProducts_Charge');
        Route::Post('products_charge/store', 'store')->name('storeProduct_Charge');
        Route::get('products_charge/delete/{id}', 'delete')->name('deleteProduct_charge');
    });
    Route::controller(OrderChargeController::class)->group(function (){
        Route::get('order_charges', 'index')->name('showOrderCharges');
        Route::get('order_charges/delete/{id}', 'delete')->name('deleteOrderCharge');
        Route::get('order_charges/accept/{id}', 'acceptOrder')->name('acceptOrderCharge');
    });
//users
    Route::controller(UserController::class)->group(function (){
        Route::get('users', 'index')->name('showUsers');
        Route::get('users/delete/{id}', 'delete')->name('deleteUser');
    });

});
