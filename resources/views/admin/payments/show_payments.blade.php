
@extends('admin.layouts.dashboard')
@section('title')
  عرض طرق الدفع
@endsection
@section('page address')
    عرض جميع طرق الدفع
@stop
@section('content')
    <div class="container" style="overflow-x: auto">
        <div class="col-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddCountry">
                اضافة دولة جديدة
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddAccount">
               اضافة حساب دفع
            </button>
        </div>
       <br>

        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger message">{{$error}}</div>
            @endforeach
        @endif
        <br>

          @foreach($countries as $country)
        <table class="table table-bordered">
           <h6>*اسم الدوله:<strong><mark>{{$country->name}}</mark></strong></h6>
            <thead style="background-color: #eee">
            <tr>
                <th scope="col">#</th>
                <th scope="col">اسم وسيله الدفع</th>
                <th scope="col">رقم الحساب</th>
                <th scope="col">التحكم</th>
            </tr>
            </thead>
            <tbody>
            @foreach($country->payments as $payment)
                <tr>
                <th scope="row">{{$loop->index+1}}</th>
                <td> {{$payment->payment_name}}</td>
                    <td> {{$payment->account_number}}</td>
                    <td>
                        <a href="{{route('admin.deletePayment',$payment->id)}}" class="btn btn-danger" onclick=" return confirm('هل انت متاكد من حذف وسيلة الدفع')">
                            حذف
                        </a
                        ></td>
               </tr>
            @endforeach
            </tbody>
        </table>
        <hr>
        @endforeach
    </div>

    <!-- Modal  Add_Country-->
    <div class="modal fade" id="AddCountry" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">اضافة دولة جديدة</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.storeCountry')}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="mb-1">
                            <label for="name" class="form-label">اسم الدولة:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">مسح</button>
                            <button type="submit" class="btn btn-primary">اضافة</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
{{--End Model--}}

    <!-- Modal  Add_Accounts-->
    <div class="modal fade" id="AddAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">اضافة وسيله دفع</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.storePayment')}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="mb-1">
                            <label for="payment_name" class="form-label">اسم وسيلة الدفع</label>
                            <input type="text" class="form-control" id="payment_name" name="payment_name" value="{{old('payment_name')}}">
                        </div>
                        <div class="mb-1">
                            <label for="account_number" class="form-label">رقم الحساب:</label>
                            <input type="text" class="form-control" id="account_number" name="account_number" value="{{old('account_number')}}">
                        </div>
                        <div class="mb-1">
                            <label for="country_name" class="form-label">الدولة:</label>
                            <select class="form-select" aria-label="Default select example" name="country_name">
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="payment_photo" class="form-label">الصورة المنتج:</label>
                            <input class="form-control" type="file" id="payment_photo" name="payment_photo" accept="image/*">
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">مسح</button>
                            <button type="submit" class="btn btn-primary">اضافة</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    {{--End Model--}}
@endsection
