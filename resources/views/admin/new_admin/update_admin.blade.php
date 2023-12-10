@extends('admin.layouts.dashboard')
@section('title')
    تحديث البيانات
@endsection
@section('page address')
    تحديث بيانات الدخول
@endsection
@section('content')
    <form action="{{route('admin.updateAdmin',$admin->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="all-fields">
          {{-- error  validation message--}}
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger message">{{$error}}</div>
                    @endforeach
                @endif
            <div class="input-field file">
                <label for="userPhoto">Photo:</label>
                <br>
                <input type="file" id="userPhoto" name="photo" accept="image/*" max="1">
                <img src="{{asset('admin/admin_image/profile/'.$admin->photo)}}" class="photo show" height="200px" width="200px">
            </div>
            <div class="input-field">
                <label for="username">اسم المستخدم:</label>
                <br>
                <input type="text" id="username" name="name"  value="{{$admin->name}}">
            </div>
            <div class="input-field">
                <label for="password">كلمة المرور:</label>
                <br>
                <input type="password" id="password" name="password" value="">
            </div>
            <div class="input-field">
                <label for="email">البريد الالكتروني:</label>
                <br>
                <input type="email" id="email" name="email"  value="{{$admin->email}}">
            </div>
            <div class="input-field  submit">
                <input type="submit" name="update" value="تحديث البيانات" style="width: 20%;">
            </div>
        </div>
    </form>
@endsection
