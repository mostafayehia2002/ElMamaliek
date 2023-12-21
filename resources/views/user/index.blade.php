@extends('user.layouts.home')
@section('title')
    متجر الممالك
@endsection
@section('content')
    <section class="section">
        <div class="container">
            <div class="category-grid">
                <div>
                    <div class="category-featured">
                        <a href="#" style="background-image:url({{asset('user/img/catrgory.jpg')}})"
                           rel="noopener noreferrer">
                        </a>
                        <img class="cat-featured-img" src="{{asset('user/img/catrgory.jpg')}}" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--   Catgories  --}}
    <section class="section">
        <div class="container">
            <div class="qsm-container">
                {{-- account category --}}
                <div class="qsm-box">
                    <a href="{{route('accountProducts')}}">
                        <img src="{{asset('admin/admin_image/category/accounts.jpg')}}" alt="error"/></a>
                </div>
                <!--categories with code-->
                @foreach($code_categories as $code)
                    <div class="qsm-box">
                        <a href="{{route('codeProducts',$code->id)}}">
                            <img src="{{asset('admin/admin_image/category/'.$code->photo)}}" alt="error"/>
                        </a>
                    </div>
                @endforeach
                <!--categories with charge-->
                @foreach($charge_categories as $charge)
                    <div class="qsm-box">
                        <a href="{{route('chargeProducts',$charge->id)}}">
                            <img src="{{asset('admin/admin_image/category/'.$charge->photo)}}" alt="error"/>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{--End Charge Category--}}
@endsection












