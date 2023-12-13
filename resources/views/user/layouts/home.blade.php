
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <style>
        .message{
            height: 40px;
            width: 96%;
            text-align: center;
            padding: 6px;
            margin: 24px auto;
        }
        .success-massage{
            color: white;
            background-color: black;
        }
        /**/
    </style>
@include('user.layouts.head')
</head>
<body class="store-home salla-theme_6 color-mode-dark font-dinnextltarabic-regular">
@include('user.layouts.navbar')
    <!---->
@if(session('login-error'))
    <div class="alert alert-danger message">{{session()->get('login-error')}}</div>
@endif
   @include('user.layouts.slide')
{{--content--}}
@yield('content')
{{----}}


         {{--Start Footer--}}
         @include('user.layouts.footer')
       {{--End Footer--}}
        {{--Notifications--}}
         @include('user.layouts.notification')
        {{--End Notification--}}

       {{--Start Login--}}
         @include('user.layouts.login')
      {{--End Login--}}

{{--Start Scripts--}}
@include('user.layouts.script')
{{--End Scripts--}}
</body>
</html>









