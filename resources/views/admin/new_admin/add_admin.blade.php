@extends('admin.layouts.dashboard')
@section('title')
    اضافة ادمن
@endsection
@section('page address')
    اضافة ادمن جديد
@endsection
@section('content')
    <form action="{{route('admin.storeAdmin')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="all-fields">
            @if(session('success'))
                <div  class="success-massage message">{{session()->get('success')}}</div>
            @endif
          {{-- error  validation message--}}
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger message">{{$error}}</div>
                    @endforeach
                @endif
            <div class="input-field file">
                <label for="userPhoto">الصورة:</label>
                <br>
                <input type="file" id="userPhoto" name="photo" accept="image/*" max="1">
                <img src="" class="photo" height="200px" width="200px" alt="error">
            </div>
            <div class="input-field">
                <label for="username">اسم المستخدم:</label>
                <br>
                <input type="text" id="username" name="name"  value="{{old('username')}}">
            </div>
            <div class="input-field">
                <label for="password">كلمه المرور:</label>
                <br>
                <input type="text" id="password" name="password">
            </div>
            <div class="input-field">
                <label for="email">البريد الالكتروني</label>
                <br>
                <input type="email" id="email" name="email"  value="{{old('email')}}">
            </div>
            <div class="input-field  submit">
                <input type="submit" name="add" value="اضافة المستخدم" style="width: 20%;">
            </div>
        </div>
    </form>
@endsection
