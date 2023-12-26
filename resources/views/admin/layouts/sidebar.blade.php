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
                <a href="{{route('admin.showPayments')}}" {{Route::is('admin.showPayments')?" class=active" : ""}}>
                    <i class="fa-solid fa-credit-card"></i>
                    وسائل الدفع
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
                <button>
                    <a href="{{route('admin.editAdmin',Auth::guard('admins')->user()->id)}}" class="edit-profile">
                        <i class="fa-solid fa-gear" title="حديث البيانات"></i>
                    </a>
                </button>
                <form  action="{{route('admin.logout')}}" method="post" class="logout">
                    @csrf
                    <button type="submit"> <i class="fa-sharp fa-solid fa-right-from-bracket" title="تسجيل الخروج" id="logout"></i></button>
                </form>
            </div>
        </div>
    </div>
</header>

