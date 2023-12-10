@extends('admin.layouts.dashboard')
@section('title')
    صفحة الادمن
@endsection
@section('page address')
    عرض جميع الادمن
@endsection
@section('content')
    @if(session('success'))
        <div  class="success-massage message">{{session()->get('success')}}</div>
    @endif
    <div class="container" style="overflow-x: auto">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th style="text-align: start">#</th>
                <th style="text-align: start"> الصورة</th>
                <th style="text-align: start">الاسم</th>
                <th style="text-align: start">البريد الالكتروني</th>
                <th style="text-align: start">تاريخ الاضافة</th>
                <th style="text-align: start">وقت الاضافة</th>
                <th style="text-align: start">التحكم</th>
            </tr>
            </thead>
            <tbody>
            @foreach($admins as $a)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td> <img src="{{asset('admin/admin_image/profile/'.$a->photo)}}" alt="no photo" style="width: 40px;height: 40px;border-radius:50%"></td>
                    <td>{{$a->name}}</td>
                    <td>{{$a->email}}</td>
                    <td>{{ date_format($a->created_at,'d:m:Y')}}</td>
                    <td>{{ date_format($a->created_at,'h:m A')}}</td>
                    <td>
                        <a href="{{route('admin.editAdmin',$a->id)}}" class="btn btn-primary control-edit"><span class="fa-solid fa-pen-to-square"></span></a>
                        <a href="{{route('admin.deleteAdmin',$a->id)}}" class="btn btn-primary control-delete"><span class="fa-solid fa-trash"></span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
