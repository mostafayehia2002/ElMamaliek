
<!DOCTYPE html>
<html lang="ar" dir="rtl">
@include('user.layouts.head')
<body class="store-home salla-theme_6 color-mode-dark font-dinnextltarabic-regular">
@include('user.layouts.navbar')

@include('user.layouts.slide')
{{--content--}}
@yield('content')



{{----}}
         {{--Start Footer--}}
         @include('user.layouts.footer')
       {{--End Footer--}}



{{--Start Scripts--}}
@include('user.layouts.script')
{{--End Scripts--}}

</body>
</html>









