
@extends('user.layouts.home')
@section('content')
    <div class="breadcrumb-container mobile-webview-hide">
        <div class="container container--default">
            <ol class="breadcrumb">
                <li class="breadcrumb-item home">
                    <a href="">الرئيسية</a>
                </li>
                <li class="breadcrumb-item active">{{$category_name->name}}</li>
            </ol>
        </div>
    </div>
    <section class="section py-3">
        <div class="container">
            <div class="section-header mb-4 d-flex">
                <h1 class="section--title">
                <span>
                 {{$category_name->name}}
                </span>
                </h1>
                <div id="sort" class="sort">
                    <button id="sort-toggle" type="button" class="btn btn-primary">
                        <i class="sicon-list-reorder"></i>
                        ترتيب
                    </button>
                    <ul id="sort-options">
                        <li class="col no-border-bottom">
                            <div class="checkbox radio">
                                <input
                                    name="sort-opt"
                                    type="radio"
                                    checked
                                    id="opt-1"
                                    value="ourSuggest"
                                >
                                <label for="opt-1"> مقترحاتنا</label>
                            </div>
                            <div class="checkbox radio">
                                <input
                                    name="sort-opt"
                                    type="radio"
                                    id="opt-2"
                                    value="bestSell"
                                >
                                <label for="opt-2">الاكثر مبيعاًً</label>
                            </div>
                            <div class="checkbox radio">
                                <input
                                    name="sort-opt"
                                    type="radio"
                                    id="opt-3"
                                    value="topRated"
                                >
                                <label for="opt-3">الاعلى تقييماً</label>
                            </div>
                            <div class="checkbox radio">
                                <input
                                    name="sort-opt"
                                    type="radio"
                                    id="opt-4"
                                    value="priceFromTopToLow"
                                >
                                <label for="opt-4">السعر من الاعلى إلى الاقل</label>
                            </div>
                            <div class="checkbox radio">
                                <input
                                    name="sort-opt"
                                    type="radio"
                                    id="opt-5"
                                    value="priceFromLowToTop"
                                >
                                <label for="opt-5">السعر من الاقل إلى الاعلى</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Start Product --}}
            <div class="product-sorted">
                <div class="row products-grid infinite-scroll  mobile-card-no-margin
 grid-col-4 ">
                    @foreach($codes as $code)
                        <div class="col-xs-6 col-sm-4 col-lg-3 product-box">
                            <div class="product">
                                <a href="" rel="canonical">
    <span class="img-cont">
    <img class="lazyload"   src=""  alt="" >
    <img src="{{asset('admin/admin_image/products/products_code/'.$code->photo)}}" alt="error" class="lazyload">
    </span>
                                    <!-- اسم منتج-->
                                    <h3 class="product-title">{{$code->name}}</h3>
                                    <!--وصف-->
                                    <h4 class="product-subtitle">{{$code->description}}</h4>
                                </a>
                                <div class="product-footer" style="margin-top: auto">
                                    <!--السعر-->
                                    <p class="product-price"> <span class="product-price" dir="ltr">{{$code->price}}$</span> </p>

                                    @if($code->status=='متاح')
                                    <a href="{{route('paymentWithCode',['category_id'=>$code->category_id,'product_id'=>$code->id])}}">
                                        <!--شراء-->
                                        <span class="not-available">شراء </span>
                                    </a>
                                    @else
                                        <span class="not-available">هذا المنتج غير متاح</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{--       End Products--}}
        </div>
    </section>
    <link rel="stylesheet" href="{{asset('user/css/app29f4.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/themes0af0.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/plugins3ee9.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/theme-customb521.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/sallaiconse8da.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/mainb521.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/stayle.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/theme-customb521.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/main.css')}}">
@endsection

