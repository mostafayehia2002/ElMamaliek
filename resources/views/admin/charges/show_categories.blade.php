@extends('admin.layouts.dashboard')
@section('title')
اقسام الشحن
@endsection
@section('page address')
    عرض جميع اقسام الشحن
@endsection
@section('content')
    <div class="container" style="overflow-x: auto">

        <div class="col-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddCategory">
               اضافة قسم شحن
            </button>
        </div>
        <br>
        @if(session('success'))
            <div  class="success-massage message">{{session()->get('success')}}</div>
        @endif
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger message">{{$error}}</div>
            @endforeach
        @endif
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th style="text-align: start">#</th>
                <th style="text-align: start">صورة القسم</th>
                <th style="text-align: start">اسم القسم</th>
                <th style="text-align: start">التحكم</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td><img src="{{asset('admin/admin_image/category/'.$category->photo)}}" alt="no photo" style="width: 40px;height: 40px;border-radius:50%"></td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{route('admin.editCategory',$category->id)}}" class="control-edit btn btn-primary">
                            <span class="fa-solid fa-pen-to-square"></span>
                        </a>
                        <a href="{{route('admin.deleteCategory',$category->id)}}" class="control-delete btn btn-primary" onclick="return confirm('هل انت متاكد من حذف القسم')">
                            <span class="fa-solid fa-trash"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal  Add_Category-->
    <div class="modal fade" id="AddCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">اضافة قسم جديد</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.storeCategory')}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="mb-1">
                            <label for="name" class="form-label">اسم القسم:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">صورة القسم:</label>
                            <input class="form-control" type="file" id="photo" name="photo" accept="image/*">
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
