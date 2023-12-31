
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{asset('admin/css/all.min.css')}}>
    <link rel="stylesheet" href={{asset('admin/css/bootstrap.min.css')}}>
    <link rel="stylesheet" href={{asset('admin/css/admin.css')}}>
    <link rel="stylesheet" href={{asset('admin/css/login.css')}}>
    <title>تسجيل الدخول -لوحة التحكم</title>
</head>
<body>
<div class="login-container">
<div class="login">
    <h2 class="header"> لوحة التحكم الرئيسيه</h2>
    <form action="{{route('admin.login')}}"  method="POST"  class="admin-login">
        @csrf
        <div class="username">
            <label for="username">البريد الالكتروني:</label>
            <br>
            <i class="fa-solid fa-user"></i>
            <input type="email" name="email"  id="username" value="{{old('email')}}" autofocus autocomplete="username"
            class="@error('email') is-invalid @enderror">

            @error('email')
            <div class="alert alert-danger"  style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <div class="password">
            <label for="password">كلمة المرور:</label>
            <br>
            <i class="fa-sharp fa-solid fa-key"></i>
            <input type="password" name="password"  id="password"  autocomplete="current-password"
              class="@error('password') is-invalid @enderror" >
            @error('password')
            <div class="alert alert-danger" style="color:red">{{ $message }}</div>
            @enderror

        </div>
          <div class="login-submit">
            <input type="submit" value="تسجيل الدخول" name="login">
        </div>

    </form>

</div>
</div>
</body>
</html>
