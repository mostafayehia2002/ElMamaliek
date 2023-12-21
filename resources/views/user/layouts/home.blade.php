
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

{{--  contact us--}}
<script>
    function actionToggle() {
        let action = document.querySelector('.contact-action');
        action.classList.toggle('open');
    }
</script>
<!-- start contact-action  
<div class="contact-action">
    <div class="item" onclick="actionToggle();">
        <i class="fa fa-list-alt" aria-hidden="true"></i>
        <p style="line-height:12pt;"> Get a Quick Quote</p>
    </div>
    <span class="item">  <a href=""><i class="fa-solid fa-envelope"></i></a> Email </span>
    <span class="item"><a href=""><i class="fa-solid fa-phone"></i></a>Connect</span>
    <span class="item"> <a href=""><i class="fa-solid fa-paper-plane"></i></a>Contact</span>
</div>
<!-- end contact-action 
<style>
    .contact-action {
        position: fixed;
        bottom: 10%;
        right: 2%;
        width: 120px;
        height: 120px;
        cursor: pointer;
        z-index: 9999;

    }

    @keyframes pulsing {
        to {
            box-shadow: 0 0 0 30px rgba(232, 76, 61, 0);
        }
    }
    .contact-action {
      background-image: url('https://king2game.shop/vistor/img/اكشخ وتميز.jpg');
        color: #fff;
        width: 60px;
        height: 60px;
        font-size: 10px;
        border-radius: 60px;
        text-align: center;
        box-shadow: 2px 2px 3px #999;
        display: flex;
        align-items: center;
        justify-content: center;
        transform: translatey(0px);
       
        font-weight: normal;
        font-family: sans-serif;
        text-decoration: none !important;
        transition: all 300ms ease-in-out;
    }

    .contact-action .item {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 12px;
        font-weight: bold;
        color: #ffffff;
        background: red;
        border-radius: 50%;
        transition: 0.5s;
        box-shadow: 1px 1px 5px #000;
        flex-direction: column;
        line-height: 25px;
    }
    .contact-action p {
        font-size: 12px;
        text-align: center;
        padding-top: 0px;
    }
    .contact-action .item i {
        color:#ffffff;
    }

    .contact-action span {
        position: absolute;
        visibility: hidden;
        z-index: -1;
        top: 0;
        left: 0;
    }

    .contact-action i {
        padding-top: 12px;
        font-size: 200px;
    }

    .quote {text-align: center;
        margin-top: 10px;
    }

    .open span{
        visibility: visible;
        animation: 1s entering;
    }

    /* Position of elements */
    .open span:nth-child(2) {
        top: -125%;
    }

    .open span:nth-child(3) {
        top: -71%;
        left: -118%;
    }

    .open span:nth-child(4) {
        top: 59%;
        left: -122%;
    }

    @keyframes entering {
        0%{
            top: 0;
            left: 0;
            width: 65%;
            height: 65%;
        }
        100%{
            width: 100%;
            height: 100%;
                }
      }
</style>
-->
</body>
</html>









