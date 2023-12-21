
@extends('admin.layouts.dashboard')
@section('title')
  عرض طرق الدفع
@endsection
@section('page address')
    عرض جميع طرق الدفع
@stop
@section('content')
    <div class="container" style="overflow-x: auto">
        <div class="col-md-6">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddPayment">
             اضافة طريقه دفع
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

          @foreach($payments as $payment)
        <table class="table table-bordered">
           <h6>*اسم الوسيلة:<strong><mark>{{$payment->payment_name}}</mark></strong>
               <a href="{{route('admin.deletePayment',$payment->id)}}" class="btn btn-danger" onclick=" return confirm('هل انت متاكد من حذف وسيلة الدفع')">
                   حذف
               </a>
           </h6>

            <thead style="background-color: #eee">
            <tr>
                <th scope="col">#</th>
                <th scope="col">اسم صاحب الحساب</th>
                <th scope="col">رقم الحساب</th>
                <th scope="col">رقم الايبان(ipn)</th>
                <th scope="col"> سعرالصرف</th>
                <th scope="col">التحكم</th>
            </tr>
            </thead>
            <tbody>
            @foreach($payment->accounts as $account)
                <tr>
                <th scope="row">{{$loop->index+1}}</th>
                <td> {{$account->account_name}}</td>
                    <td> {{$account->account_number}}</td>
                    <td> {{$account->ipn_number}}</td>
                    <td> {{$account->exchange_rate}}</td>
                    <td>
                        <a href="{{route('admin.deletePaymentAccount',$account->id)}}" class="btn btn-danger" onclick=" return confirm('هل انت متاكد من حذف حساب الدفع')">
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




    <!-- Modal  Add_Payment-->
    <div class="modal fade" id="AddPayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">اضافة طريقة دفع جديدة</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.storePayment')}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="mb-1">
                            <label for="payment_name" class="form-label">اسم الوسيلة:</label>
                            <input type="text" class="form-control" id="payment_name" name="payment_name" value="{{old('payment_name')}}">
                        </div>
                        <div class="mb-1">
                            <label for="payment_photo" class="form-label">صورة الوسيلة:</label>
                            <input type="file" class="form-control" id="payment_photo" name="payment_photo" accept="image/*">
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
                    <form action="{{route('admin.storePaymentAccount')}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="mb-1">
                            <label for="payment_id" class="form-label">اختر وسيلة الدفع:</label>
                            <select class="form-select" aria-label="Default select example" name="payment_id">
                                @foreach($payments as $payment)
                                    <option value="{{$payment->id}}">{{$payment->payment_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="account_name" class="form-label">اسم صاحب الحساب</label>
                            <input type="text" class="form-control" id="account_name" name="account_name" value="{{old('account_name')}}">
                        </div>
                        <div class="mb-1">
                            <label for="account_number" class="form-label">رقم الحساب:</label>
                            <input type="text" class="form-control" id="account_number" name="account_number" value="{{old('account_number')}}">
                        </div>
                        <div class="mb-1">
                            <label for="ipn_number" class="form-label">رقم الايبان(ipn):</label>
                            <input type="text" class="form-control" id="ipn_number" name="ipn_number" value="{{old('ipn_number')}}">
                        </div>
                        <div class="mb-1">
                            <label for="exchange_rate" class="form-label">سعر الصرف:</label>
                            <input type="text" class="form-control" id="exchange_rate" name="exchange_rate" value="{{old('exchange_rate')}}">
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
