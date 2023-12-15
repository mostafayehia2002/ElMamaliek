@extends('admin.layouts.dashboard')
@section('title')
    تعديل القسم
@endsection
@section('page address')
    تعديل بيانات القسم
@endsection
@section('content')
        <form action="{{route('admin.updateCategory',$category->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="all-fields">
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger message">{{$error}}</div>
                    @endforeach
                @endif
                    <div class="input-field file">
                        <label for="userPhoto">الصورة:</label>
                        <br>
                        <input type="file" id="userPhoto" name="photo" accept="image/*" max="1">
                        <img src="{{asset('admin/admin_image/category/'.$category->photo)}}" class="photo show" height="200px" width="200px" alt="error">
                    </div>

                <div class="input-field">
                <label for="category">اسم القسم:</label>
                <br>
                <input type="text" id="category" name="name"  value="{{$category->name}}">
            </div>
            <div class="input-field  submit">
                <input type="submit" name="add" value="تحديث القسم" style="width: 20%;">
            </div>
        </div>
    </form>
@endsection
