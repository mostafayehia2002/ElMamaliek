
<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.layouts.head')
</head>
<body>

<!-- Start Sidebar -->
@include('admin.layouts.sidebar')
<!-- End Sidebar -->

{{--Start Main Container--}}
<div class="container1">
    <!-- Start Navbar -->
  @include('admin.layouts.navbar')
    <!-- End Navbar -->

    {{--Start Page Content  --}}
    <div class="content">
    @yield('content')
    </div>
    {{--    End Page Content--}}

</div>
{{--End Main Container--}}

{{--All Script Files--}}
@include('admin.layouts.script')
</body>
</html>
