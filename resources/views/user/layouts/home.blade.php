
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
@include('user.layouts.head')
</head>
<body class="store-home salla-theme_6 color-mode-dark font-dinnextltarabic-regular">
@include('user.layouts.navbar')
    <!---->
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









