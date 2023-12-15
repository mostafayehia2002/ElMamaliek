<noscript>
    To get full functionality of this site you need to enable JavaScript. Here is how
    <a href="https://www.enable-javascript.com/" rel="nofollow noopener noreferrer" target="_blank">To enable
        JavaScript on webpage</a>.
</noscript>
<header class="site-header">
    <div class="sub-header p-10  d-lg-block">
        <div class="container">
            <div class="row header-wrapper">
                <div class="col-lg-6" style="text-align: right;">
                    <a href="tel:+962777515306" class="d-lg-inline-block d-none th-main-phone-no" style="direction: ltr">
                        <span>+962777515306</span>
                        <span class="sicon-phone-talking"></span>
                    </a>
                </div>
                <div class="col-lg-6 text-left">
                    @auth
                        <div>
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <span class="username" style="position: relative;top:-10px;left: 20px">{{Auth::user()->email}}</span>
                                <button type="submit" class="circle-action">
                                </button>
                            </form>
                        </div>
                    @endauth
                    <div id="cl_switcher_wrapper">
                    </div>
                    <div class="dropdown dropdown-store-header dropdown-store-header-left hidden-xs">
                        @guest
                            <button type="button" class="circle-action dropdown-toggle open-button" data-toggle="modal" data-target="#exampleModalCenter">
                                <span class="sicon-user"></span>
                            </button>
                        @endguest
                        <!-- Modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-3 header-top">
        <div class="row header-wrapper">
            <div class="col-lg-8 col-sm-11 logo-wrapper d-flex d-lg-block">
                <a href="#" class="sub-nav__menu ml-2">
                    <svg width="30px" height="30px" version="1.1" viewBox="0 0 100 100" xmlns="">
                        <path
                            d="m23 29c-1.6562 0-3 1.3438-3 3s1.3438 3 3 3h54c1.6562 0 3-1.3438 3-3s-1.3438-3-3-3zm0 18c-1.6562 0-3 1.3438-3 3s1.3438 3 3 3h54c1.6562 0 3-1.3438 3-3s-1.3438-3-3-3zm0 18c-1.6562 0-3 1.3438-3 3s1.3438 3 3 3h54c1.6562 0 3-1.3438 3-3s-1.3438-3-3-3z" />
                    </svg>
                </a>
                <h1 class="logo">
                    <a href="{{asset('/')}}">
                        <img src="{{asset('user/img/logo.png')}}" alt="متجر الممالك">
                    </a>
                </h1>
            </div>
             <div class="col-lg-1 col-sm-12 d-lg-block actions-container" >
                <button   class=" circle-action d-lg-nones site-header__mine-cart" id="btn-notification">
                    <span class="sicon-bell"></span>
                    <span class="badge" data-cart-badge="">3</span>
                </button>
            </div>
        </div>
    </div>
</header>
<div class="sub-nav">
    <div class="container-fluid sub-nav-content">
        <button class="sub-nav__close">
            <svg width="100pt" height="100pt" version="1.0" viewBox="0 0 100 100"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="m50 10c-22.109 0-40 17.883-40 40 0 22.109 17.891 40 40 40 22.117 0 40-17.891 40-40 0-22.121-17.879-40-40-40zm-15.25 23c0.074219-0.003906 0.14453-0.003906 0.21875 0 0.53906-0.003906 1.0586 0.20703 1.4375 0.59375l13.594 13.562 13.562-13.562c0.36328-0.37109 0.85547-0.58203 1.375-0.59375 0.82812-0.035156 1.5938 0.44922 1.918 1.2109 0.32812 0.76562 0.14844 1.6484-0.44922 2.2266l-13.594 13.594 13.594 13.562c0.37891 0.375 0.58984 0.88672 0.58984 1.4219 0 0.53125-0.21094 1.043-0.58984 1.4219-0.375 0.375-0.88672 0.58984-1.4219 0.58984s-1.043-0.21484-1.4219-0.58984l-13.562-13.594-13.594 13.594c-0.78516 0.78516-2.0586 0.78516-2.8438 0s-0.78516-2.0586 0-2.8438l13.562-13.562-13.562-13.594c-0.56641-0.54297-0.76562-1.3633-0.50781-2.1016 0.25391-0.73828 0.91797-1.2617 1.6953-1.3359z"
                    fill-rule="evenodd" />
            </svg>
        </button>
        <div class="sub-nav-header">
            <img src="../cdn.assets.salla.network/stores/themes/default/assets/images/avatar_male.png" alt="">
            <div class="dropdown">
                @guest
                    <button id="myfunc" type="button" class=" login-link dropbtn " data-toggle="modal" data-target="#exampleModalCenter">
                        تسجيل الدخول
                    </button>
                @endguest
                @auth
                    <div>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="circle-action">
                            </button>
                        </form>
                        <span class="username" style="position: relative;top:10px">{{Auth::user()->email}}</span>
                    </div>
                @endauth
            </div>
        </div>
        <!---->
        <ul class="main-menu">
            <li id="offers">
                <a class="offers-link" href=""></a>
            </li>
            <li id="">
                <a href="">حسابات فري فاير</a>
            </li>
            <li id="">
                <a href="">اكواد فري فاير</a>
            </li>
            <!--جانب الشاشه-->
            <li class="sub-menu-header categories-holder">
<span>
<i class="sicon-tag"></i>
فئات المنتجات </span>
                <ul class="store-categories">
                    <li id="&quot;92429577&quot;">
                        <a href=""  target="_self">حسابات ببجي</a>
                    </li>
                    <li id="&quot;86599785&quot;">
                        <a href="" target="_self">اشتراك نتفلكس</a>
                    </li>
                    <li id="&quot;799909567&quot;">
                        <a href="https://al3rb.me/حماية-جوالك/c799909567" target="_self">حماية جوالك</a>
                    </li>
                    <li id="&quot;offers&quot;">
                        <a href="" target="_self" class="offers-link">تخفيضات</a>
                    </li>
                    <li id="&quot;1466924042&quot;">
                        <a href=""  target="_self">اشتراكات المتجر آيفون وآيباد</a>
                    </li>
                    <li id="&quot;1368623225&quot;">
                        <a href="" target="_self">اكواد متنوعة</a>
                    </li>
                    <li id="&quot;1304220136&quot;">
                        <a href=""  target="_self">اشتراك المتجر للاندرويد</a>
                    </li>
                    <li id="&quot;52733482&quot;">
                        <a href=""  target="_self">شدات ببجي</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

{{--Login--}}
<div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding: 10px;">
                    <span aria-hidden="true" style="font-size: 40px;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="page-contentt">
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="panel panel-body login-form mb-0">
                            <div class="text-center panel-title">
                                <div class="icon-object border-yellow-dark text-yellow-dark"><i class="sicon-user"></i></div>
                                <h5 class="content-group login-title">تسجيل الدخول</h5>
                            </div>
                            <div id="login-panel-actions">
                                <p class="text-muted text-center ">اختر الوسيلة المناسبة</p>
                                <div class="btn-group login-options login-options--vertical text-center">
                                    <button type="button" class="btn login-option" id="showButton" data-option="email">
                                        <i class="sicon-mail"></i>
                                        <span>البريد الإلكتروني</span>
                                    </button></div>
                            </div>
                            <div id="login-panel-actionss" style="text-align: right; display: none;" >
                                <div class="form-group">
                                    <label >البريد الالكتروني <span class="text-danger">*</span></label>
                                    <div class="">
                                        <div class="input-group">
                                            <input type="email" name="email" id="email" class="form-control align-left text-ltr" placeholder="your@email.com" required="">
                                            <span class="input-group-addon shrinked"><i class="sicon-mail"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group align-center mb-0">
                                    <button type="button" id="email-login-form-submit-btn" class="btn btn-primary btn-code" style="width: 100%;"  >الدخول <i class="sicon-caret-left"></i></button>
                                </div>
                            </div>
                            <div id="verification" style=" display: none;">
                                <div class="form-group"  style="text-align: right;">
                                    <label>رمز التحقق  <span class="text-danger">*</span></label>
                                    <div id="mobile_number_div">
                                        <input type="tel" class="form-control" id="code" maxlength="4" name="password" data-type="email" placeholder="ادخل رمز التحقق" onkeyup="parseArabicNumbers('code')" onkeypress="return event.keyCode != 13;" onkeydown="return event.keyCode != 13;" autocomplete="one-time-code" required="">
                                    </div>
                                </div>
                                <div class="form-group align-center">
                                    <button type="submit" id="verification-form-submit-btn" data-type="email" class="btn btn-primary"><i class="sicon-check"></i> التحقق</button>
                                </div>
                                <div id="resend-section">
                                    <div class="form-group align-center">
                                        <div style="width: 100%; height: 13px; border-bottom: 1px solid #eee; text-align: center">
                                            <span style="background-color: #fff; padding: 0 10px;">إعادة الارسال بعد <span id="resend-timer">00:00</span></span>
                                        </div>
                                    </div>
                                    <div class="form-group align-center resend-btn-options" style="margin-bottom: 0;">
                                        <button type="button" data-type="sms" class="btn resend-btn btn-resend-option"><i class="sicon-iphone"></i>&nbsp;رسالة نصية&nbsp; </button>
                                        <button type="button" data-type="email" class="btn resend-btn btn-resend-option"><i class="sicon-mail"></i> &nbsp;الايميل&nbsp; </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{--End Login--}}

{{--Notification--}}
@if(Auth::guard('web')->check())
    <section class="section-50" id="section-50" style="display: none;" dir="ltr">
        <div class="container">
            <div class="notification-ui_dd-content">
                <h4>الاشعارات</h4>
                @foreach(Auth::user()->notifications as $notification )
                    <div class="notification-list notification-list--unread">
                        <div class="notification-list_content">
                            <div class="notification-list_detail">
                                <p>{{$notification->data['type']}}</p>
                                @if($notification->data['type']=='شراء')
                                    <p class="text-muted">{{$notification->data['message']}}
                                        <strong>{{$notification->data['code']}}</strong>
                                    </p>
                                @else
                                    <p class="text-muted">{{$notification->data['message']}}</p>
                                @endif
                                <p class="text-muted"><small>{{ date_format($notification->created_at,'y:m-d || h:i')}}</small></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
{{--End Notification--}}
{{--Send Code --}}
<script src={{asset('https://code.jquery.com/jquery-3.7.0.js')}}></script>
<script>
    document.addEventListener('click',function (e) {
        if(e.target.classList.contains('btn-code')){

            let email= document.querySelector('#email').value;

            if(email.trim() !== '') {
                sendCode(email);
            }else{
                alert('يرجي ادخال البريد الالكتروني');
            }
        }
    });
    function sendCode(email){
        $.ajax({
            url:'{{route('requestCode')}}',
            method:'POST',
            data: {
                _token: "{{csrf_token()}}",
                email:email,
            },
            success: function(response) {
                console.log(response);
            }
        });
    }
</script>
{{--End Send Code--}}
