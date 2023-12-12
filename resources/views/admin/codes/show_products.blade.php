@extends('admin.layouts.dashboard')
@section('title')
   المنتجات-اكواد
@endsection
@section('page address')
   عرض جميع المنتجات-اكواد
@endsection
@section('content')
    <div class="container" style="overflow-x: auto">

        <div class="col-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddCategoryWithCode">
               اضافة قسم جديد
            </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddProductWithCode">
           اضافة منتج جديد
        </button>
        </div>
        @if(session('success'))
            <div  class="success-massage message">{{session()->get('success')}}</div>
         @endif
        {{-- error  validation message--}}
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger message">{{$error}}</div>
            @endforeach
        @endif
        <br>
           <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th style="text-align:start">#</th>
                <th style="text-align:start">صوره المنتج</th>
                <th style="text-align:start">اسم المنتج</th>
                <th style="text-align:start">سعر المنتج</th>
                <th style="text-align:start">القسم</th>
                <th style="text-align:start"> الكود</th>
                <th style="text-align:start">الحالة</th>
                <th style="text-align:start">التحكم</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td><img src="{{asset('admin/admin_image//products/products_code/'.$product->photo)}}" alt="no photo" style="width: 40px;height: 40px;border-radius:50%"></td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->code}}</td>
                    <td>
                        @if($product->status=='متاح')
                        <span class="text-success">{{$product->status}}</span>
                        @else
                        <span class="text-danger">{{$product->status}}</span>
                    @endif
                    </td>
                    <td>
                        <a href="{{route('admin.deleteProduct',$product->id)}}" class="control-delete btn btn-primary"  onclick="return confirm('هل انت متاكد من حذف المنتج')"><span class="fa-solid fa-trash"></span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Modal  Add_products_with_code-->
        <div class="modal fade" id="AddProductWithCode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">اضافة منتج جديد</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.storeProduct')}}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <div class="mb-1">
                                <label for="category" class="form-label">القسم:</label>
                                <select class="form-select" aria-label="Default select example" name="category">
                                   @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-1">
                                <label for="name" class="form-label">اسم المنتج:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">سعر المنتج:</label>
                                <input type="text" class="form-control" id="price" name="price"  value="{{old('price')}}">
                            </div>
                            <div class="mb-3">
                                <label for="code" class="form-label"> كود المنتج:</label>
                                <input type="text" class="form-control" id="code" name="code"  value="{{old('code')}}">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">وصف المنتج:</label>
                                <input type="text" class="form-control" id="price" name="description"  value="{{old('description')}}">
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">الصورة المنتج:</label>
                                <input class="form-control" type="file" id="photo" name="photo">
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
{{--   End Model--}}

        <!-- Modal  Add_Category_with_code-->
        <div class="modal fade" id="AddCategoryWithCode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">اضافة قسم جديد</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.storeCategories')}}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <div class="mb-1">
                                <label for="name" class="form-label">اسم القسم :</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">الصورة:</label>
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
    </div>
@endsection
