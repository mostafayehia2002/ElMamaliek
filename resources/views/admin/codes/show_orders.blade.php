
@extends('admin.layouts.dashboard')
@section('title')
    طلبات-الاكواد
@endsection
@section('page address')
عرض طلبات الاكواد
@endsection
@section('content')
    <div class="container" style="overflow-x: auto">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th style="text-align:start">#</th>
                 <th style="text-align:start">المستخدم</th>
                <th style="text-align:start">المنتج</th>
                <th style="text-align:start">السعر</th>
                <th style="text-align:start">وسيله الدفع</th>
                <th style="text-align:start">رقم الحساب </th>
                <th style="text-align:start">صورة الدفع</th>
                <th style="text-align:start">رقم عملية الدفع</th>
                <th style="text-align:start">حالة الطلب</th>
                <th style="text-align:start">التحكم</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td> {{$order->user->email}}</td>
                    <td> {{$order->product->product_name}}</td>
                    <td> {{$order->price}}</td>
                    <td>{{$order->payment->payment_name}}</td>
                    <td>{{$order->payment->account_number}}</td>
                    <td> <a href="#staticBackdrop{{$order->id}}" data-bs-toggle="modal"><i class="fa-sharp fa-solid fa-eye"></i>عرض</a></td>
                    <td>{{$order->process_number}}</td>
                    <td>
                        @if($order->status=='قبول')
                        <span class="text-success"> تم الموافقه</span>
                        @else
                        <span class="text-danger"> بانتظار الموافقة</span>
                    @endif
                    </td>
                    <td>
                        @if($order->status=='بانتظارالموافقة')
                        <a href="{{route('admin.acceptOrder',$order->id)}}" class="btn btn-primary" onclick="return confirm('هل انت متاكد من تاكيد الطلب')"><i class="fa-solid fa-check"></i></a>
                        @endif
                        <a href="{{route('admin.deleteOrder',$order->id)}}" class="btn btn-danger" onclick="return confirm('هل انت متاكد من حذف الطلب')"><i class="fa-solid fa-trash"></i></a>
                    </td>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop{{$order->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">عرض صورة الدفع</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{asset('admin/admin_image/orders/'.$order->process_photo)}}"  style="width: auto; height: auto; max-width: 100%; max-height: 100%;" alt="error">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
