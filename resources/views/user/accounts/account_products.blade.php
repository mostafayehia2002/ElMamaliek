
@extends('user.layouts.home')
@section('content')
    <div class="breadcrumb-container mobile-webview-hide">
        <div class="container container--default">
            <ol class="breadcrumb">
                <li class="breadcrumb-item home">
                    <a href="">الرئيسية</a>
                </li>
                <li class="breadcrumb-item active">بيع وشراء حسابات</li>
            </ol>
        </div>
    </div>
    <section class="section py-3">
        <div class="container">
            <div class="section-header mb-4 d-flex">
                <h1 class="section--title">
                <span>
                  بيع وشراء حسابات
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
                    @foreach($accounts as $account)
                        <div class="col-xs-6 col-sm-4 col-lg-3 product-box">
                            <div class="product">
                                <a href="" rel="canonical">
                              <span class="img-cont">
                                 <img class="lazyload"   src=""  alt="" >
                                    <img src="{{'admin/admin_image/products/accounts/'.$account->photo}}" alt="error" class="lazyload">
                                       </span>
                                    <!-- اسم منتج-->
                                    <h3 class="product-title">{{$account->name}}</h3>
                                    <!--وصف-->
                                    <h4 class="product-subtitle">{{$account->description}}</h4>
                                </a>
                                <div class="product-footer" style="margin-top: auto">
                                    <!--السعر-->
                                    <p class="product-price"> <span class="product-price" dir="ltr">{{$account->price}}$</span> </p>
                                    <a href="{{route('showVideo',$account->id)}}">
                                        <!--شراء-->
                                        <span class="not-available">عرض </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div id="load_more_wrapper" class="stripes-wrapper mt-20" style="display: none">
                    <button id="load_more" class="btn btn-primary btn-medium btn-loader">عرض المزيد</button>
                </div>
                <div class="cart-nav cart-nav-small" style="text-align:center;display: none">
                </div>
                <div class="page-load-status" style="display: none">
                    <div class="infinite-scroll-request">
                        <div class="loader loader-small loader-light"></div>
                    </div>
                </div>
            </div>
        </div>
{{--       End Products--}}

        </div>
    </section>
@endsection

