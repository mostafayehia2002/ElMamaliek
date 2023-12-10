
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{asset("admin/css/datatables.min.css")}}>
    <link rel="stylesheet" href={{asset("admin/css/bootstrap.min.css")}}>
    <link rel="stylesheet" href={{asset("admin/css/all.min.css")}}>
    <link rel="stylesheet" href={{asset("admin/css/admin.css")}}>
    <title>@yield('title')</title>
    <style>
        .container{
            padding-top: 20px;
        }
    </style>
</head>
<body>
<!-- start dashboard -->
<header class="Dashboard">
    <div class="logo">
        <i class="fa-sharp fa-solid fa-house-user"></i>
        <span class="AppName"> لوحة التحكم الرئيسية</span>
    </div>
    <div class="links">
        <ul>
            <li>
                <a href="{{route('admin.index')}}"  {{Route::is('admin.index')?"class=active" : " "}}>
                    <i class="fa-solid fa-house"></i>
                    الصفحة الرئيسية
                </a>
            </li>
            <li>
                <a href="{{route('admin.addAdmin')}}"  {{Route::is('admin.addAdmin')?"class=active" : " "}}>
                    <i class="fa-solid fa-user-plus"></i>
                    اضافة ادمن جديد
                </a>
            </li>
            <li>
                <a href="{{route('admin.showCategories')}}"  {{Route::is('admin.showCategories')?" class=active" : ""}}>
                    <i class="fa-solid fa-shop"></i>
                    اضافة قسم شحن جديد
                </a>
            </li>
            <li>
                <a href="{{route('admin.showProducts_Charge')}}"  {{Route::is('admin.showProducts_Charge')?" class=active" : ""}}>
                    <i class="fa-solid fa-cart-plus"></i>
                  اضافة منتج لاقسام الشحن
                </a>
            </li>
            <li>
                <a href="{{route('admin.showAccounts')}}" {{Route::is('admin.showAccounts')?" class=active" : ""}}>
                    <i class="fa-solid fa-cart-plus"></i>
                        بيع وشراء حسابات
                </a>
            </li>
            <li>
                <a href="{{route('admin.showProducts')}}"  {{Route::is('admin.showProducts')?" class=active" : ""}}>
                    <i class="fa-solid fa-cart-plus"></i>
                    اضافه منتجات ب اكواد
                </a>
            </li>
            <li>
                <a href="{{route('admin.showCountries')}}" {{Route::is('admin.showCountries')?" class=active" : ""}}>
                    <i class="fa-solid fa-cart-plus"></i>
                    اضافه طرق دفع
                </a>
            </li>
        </ul>
    </div>
    <div class="user">
        <div class="user-img">
            <img src="{{asset('admin/admin_image/profile/'.Auth::guard('admins')->user()->photo)}}" alt="error">
        </div>
        <div class="user-name">
            <span class="name">{{Auth::guard('admins')->user()->name}} </span>
            <br>
            <span class="email">
                        <a href="mailto:{{Auth::guard('admins')->user()->email}}" >{{Auth::guard('admins')->user()->email}}</a>
                    </span>
                <div class="admin-setting">
                    <a href="{{route('admin.editAdmin',Auth::guard('admins')->user()->id)}}" class="edit-profile">
                        <i class="fa-solid fa-gear fa-spin" title="حديث البيانات"></i>
                  </a>
                    <form  action="{{route('admin.logout')}}" method="post" class="logout">
                        @csrf
                        <button type="submit"> <i class="fa-sharp fa-solid fa-right-from-bracket fa-beat" title="تسجيل الخروج" id="logout"></i></button>
                    </form>
            </div>
        </div>
    </div>
</header>
<!-- end dashboard -->
<div class="container1">
    <!-- start navbar -->
    <div class="page-navbar">
        <div class="page-address">
            <p>
            <h3>@yield('page address')</h3>

            </p>
        </div>
        <div class="notification">
            <a href="" style=" position: relative;">
                <i class="fa-solid fa-message"></i>
                    <div class="numberOfNotify">0</div>

            </a>
            <a href="" style=" position: relative;">
                <i class="fa-sharp fa-solid fa-bell"></i>

                <div class="numberOfNotify">0</div>

            </a>
              <span class="setting">
                  <i class="fa-solid fa-bars fa-bounce"></i>
            </span>
        </div>
    </div>

    <!-- end navbar -->

   {{-- page content  --}}
    @yield('content')
{{--    end page content--}}


</div>
{{--data table--}}
<script src={{asset('https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js')}}></script>
<script src={{asset('https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js')}}></script>
<script src={{asset('https://code.jquery.com/jquery-3.7.0.js')}}></script>

{{----}}
<script src={{asset('admin/js/datatables.min.js')}}></script>
<script src={{asset('admin/js/bootstrap.bundle.js')}}></script>
<script src={{asset('admin/js/admin.js')}}></script>
</body>
</html>
