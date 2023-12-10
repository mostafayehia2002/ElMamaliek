<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;


class CountryController extends Controller
{
    //
    public function index(){
       $countries= Country::with('payments')->get();
       return view('admin.payments.show_payments',compact('countries'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:countries,name'],
        ], [
            'name.required' => 'يرجي ادخال اسم الدولة',
            'name.unique' => 'اسم الدولة موجود مسبقا',
        ]);
      Country::create($request->all());
        return redirect()->back()->with('success', 'تم اضافة الدوله بنجاح');
    }
}
