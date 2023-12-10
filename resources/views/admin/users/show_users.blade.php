@extends('admin.layouts.dashboard')
@section('title')
    المستخدمين
@endsection
@section('page address')
عرض جميع المستخدمين
@endsection
@section('content')
    <div class="container" style="overflow-x: auto">
        @if(session('success'))
            <div  class="success-massage message">{{session()->get('success')}}</div>
        @endif
        <br>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th style="text-align: start">#</th>
                <th  style="text-align: start">البريد الالكتروني</th>
                <th  style="text-align: start">التحكم</th>
            </tr>
            </thead>
            <tbody>
@foreach($users as $user)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="{{route('admin.deleteUser',$user->id)}}" class="btn btn-danger" onclick=" return confirm('هل انت متاكد من حذف وسيلة الدفع')">
                            حذف
                        </a>
                    </td>
                </tr>
@endforeach
            </tbody>
        </table>
    </div>
@endsection
