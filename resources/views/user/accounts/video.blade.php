<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> عرض الفيديو</title>
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="{{asset('user/css/app29f4.css')}}" />
    <link rel="stylesheet" href="{{asset('user/css/themes0af0.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/plugins3ee9.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/slick-themeb521.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/fonts/sallaiconse8da.css')}}" />
    <link rel="stylesheet" href="{{asset('user/css/mainb521.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/theme-customb521.css?v=v1.5.781')}}">
    <link rel="stylesheet" href="{{asset('user/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/stayle.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/haso1.css')}}" />
</head>
<body
    class="store-home salla-theme_6 color-mode-dark font-dinnextltarabic-regular"
>
@include('user.layouts.navbar')
<section class="vd">
    <iframe  src="{{asset('admin/admin_image/products/accounts/'.$account->video)}}">
    </iframe>
</section>
<section class="text-center">
    <a
        href="https://www.google.com/search?q=1000+%D8%B1%D9%8A%D8%A7%D9%84+%D9%83%D9%85+%D8%A7%D8%B1%D8%AF%D9%86%D9%8A&oq=10&gs_lcrp=EgZjaHJvbWUqBggCEEUYOzIGCAAQRRg5MgoIARAuGLEDGIoFMgYIAhBFGDsyBggDECMYJzIJCAQQABhDGIoFMgYIBRBFGD0yBggGEEUYPTIGCAcQRRg90gEIMjM1OWowajeoAgCwAgA&sourceid=chrome&ie=UTF-8"
    ><button type="button" class="square_btn">
            <span>تحويل العمله من دينار الى سعودي</span>
        </button>
    </a>
</section>
<section id="offer">
    <div class="container">
        <div class="owl-carousel owl-theme" id="owl-services" dir="rtl">
            <div class="item">
                <div
                    class="card wow fadeIn"
                    style="width: 18rem"
                    data-wow-duration="1s"
                    data-wow-delay=".5s"
                >
                    <figure class="hover-rotate">
                        <img
                            class="card-img"
                            src="{{asset('user/img/profile.jpg')}}"
                            alt="محمود أحمد"
                        />
                    </figure>
                    <div class="card-body">
                        <h5 class="card-title">
                            محمود أحمد

                        </h5>
                        <p class="card-text">
                            <a href="">
                                تواصل معى</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div
                    class="card wow fadeIn"
                    style="width: 18rem"
                    data-wow-duration="1s"
                    data-wow-delay=".5s"
                >
                    <figure class="hover-rotate">
                        <img
                            class="card-img"
                            src="{{asset('user/img/profile.jpg')}}"
                            alt="محمد أحمد"
                        />
                    </figure>
                    <div class="card-body">
                        <h5 class="card-title">
                            محمد أحمد
                        </h5>
                        <p class="card-text">
                            <a href="">
                                تواصل معى</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div
                    class="card wow fadeIn"
                    style="width: 18rem"
                    data-wow-duration="1s"
                    data-wow-delay=".5s"
                >
                    <figure class="hover-rotate">
                        <img
                            class="card-img"
                            src="{{asset('user/img/profile.jpg')}}"
                            alt="يوسف محمد"
                        />
                    </figure>
                    <div class="card-body">
                        <h5 class="card-title">
                            يوسف محمد
                        </h5>
                        <p class="card-text">
                            <a href="">
                                تواصل معى</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('user.layouts.footer')
</body>
@include('user.layouts.script')
<script src="{{asset('user/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('user/js/bootstrap.min.js')}}"></script>
<script src="{{asset('user/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('user/js/style.js')}}"></script>
</html>
