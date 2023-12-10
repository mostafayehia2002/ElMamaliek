<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form  action="{{route('login')}}" method="POST">
    @csrf
    <label for="email">email</label>
    <input type="email"  name="email" id="email" required>
    <button type="button" id="btn-code" >require code</button>
    <label for="code">code</label>
    <input type="text"  name="password" id="code">
    <input type="submit">
</form>
<script src={{asset('https://code.jquery.com/jquery-3.7.0.js')}}></script>
<script>
    document.querySelector('#btn-code').onclick = function () {
        let email = document.querySelector('#email').value;
        if (email.trim() !== '') {
            sendCode(email);
        } else {
            alert('Please enter an email address.');
        }
    }
    function sendCode(email) {
  $.ajax({
    url:'register',
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
</body>
</html>
{{--rand(111111,999999);--}}
