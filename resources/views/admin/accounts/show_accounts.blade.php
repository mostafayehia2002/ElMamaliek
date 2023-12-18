@extends('admin.layouts.dashboard')
@section('title')
  بيع وشراء حسابات
@endsection
@section('page address')
    عرض جميع الحسابات
@endsection
@section('content')

    <div class="container" style="overflow-x: auto">
        <div class="row">
            <!-- Button trigger modal -->
            <div class="col-md-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                اضافة حساب جديد
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">اضافة حساب جديد</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('admin.storeAccount')}}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">الاسم</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">الوصف</label>
                                    <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}">
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">السعر</label>
                                    <input type="text" class="form-control" id="price" name="price"  value="{{old('price')}}">
                                </div>
                                <div class="mb-3">
                                    <label for="photo" class="form-label">الصورة</label>
                                    <input class="form-control" type="file" id="photo" name="photo">
                                </div>
                                <div class="mb-3">
                                    <label for="video" class="form-label">الفيديو</label>
                                    <input class="form-control" type="file" id="video" accept="video/*" name="video">
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
        </div>
        <br>
        {{-- error  validation message--}}
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger message">{{$error}}</div>
            @endforeach
        @endif
            <br><br>
           <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th style="text-align:start">#</th>
                <th style="text-align:start">الاسم</th>
                <th style="text-align:start">السعر</th>
                <th style="text-align:start">الوسف</th>
                <th style="text-align:start">التحكم</th>
            </tr>
            </thead>
            <tbody>
            @foreach($accounts as $account)
          <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$account->name}}</td>
              <td>{{$account->price}}</td>
              <td>{{$account->description}}</td>
              <td><a href="{{route('admin.deleteAccount',$account->id)}}" class="control-delete btn btn-primary"  onclick="return confirm('هل انت متاكد من حذف الحساب')"><span class="fa-solid fa-trash"></span></a></td>
          </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
