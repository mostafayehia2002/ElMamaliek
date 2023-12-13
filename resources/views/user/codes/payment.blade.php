<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="ar">
    <link rel="stylesheet" href="{{asset('user/css/payment.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
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
</head>
<body>

<div class="nav-container">
    <nav class="nav-content">
        <ul>
            <div class="nav-logo">
                <h4>ايداع رصيد</h4>
            </div>
            <div class="fl_r">
                <div style="background-color: black; width: 30px;height: 30px; display: flex; justify-content: center;
            align-items: center; border-radius: 8px;">
                    <a href="#"><i class="fa-solid fa-user fa-lg" style="color: #ffff; "></i></a>
                </div>
                <div style="background-color: black; width: 30px;height: 30px; display: flex; justify-content: center;
            align-items: center; border-radius: 8px;">
                    <a href="#"><i class="fa-solid fa-bell fa-lg" style="color: #ffff;"></i></a>
                </div>
                <a id="barBtn" style="width: 40px;" href="#"><i class="fa-solid fa-bars fa-2x" style="color: #000000;"></i></i></a>
                <div id="helloBtn">
                    <h6 >مرحباً</h6>
                    <h5 >haso hosenat</h5>
                </div>
            </div>

        </ul>
    </nav>
</div>

@if(session('success'))
    <div  class="success-massage message">{{session()->get('success')}}</div>
@endif
{{-- error  validation message--}}
@if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger message">{{$error}}</div>
    @endforeach
@endif
<header style="background-color: #f9f9fb;">
    <div class="head-conatiner">
        <div>
            <select class="country-select form-select-lg mb-3" name="country">
                <option  selected>اختر الدولة</option>
                @foreach($countries as $country)
                    <option  value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
            </select>
        </div>
        {{-- payments--}}
        <div class="flex-container">

        </div>

        <form action="{{route('sendCodeOrder')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="money-trans">
                <div>
                    <div class="num">
                        <h4 style="color: #f9f9fb;">1</h4>
                    </div>
                    <div class="line">
                        <div class="vl"></div>
                    </div>
                    <div class="num">
                        <h4 style="color: #f9f9fb;">2</h4>
                    </div>
                </div>
                <div >
                    <div class="instructions">
                        <div class="parag1">
                            <h6 style="color: #000000;">قم بتحويل الأموال إلى حساب وكيلنا الموضح أدناه</h6>
                        </div>
                        <div class="stroke">
                            <div class="payment-btn">
                                <div>
                                    <input type="hidden" name="payment_id" id="payment_id" value="">
                                    <input type="text" name="account_number" id="account_number">
                                    <input type="hidden" name="category_id" id="category_id" value="{{$category_id}}">
                                    <input type="hidden" name="product_id" id="product_id" value="{{$product_id}}">
                                </div>
                            </div>
                        </div>
                        <div class="parag1">
                            <h6 style="color: #000000;">بعد تحويل الأموال، قم بتحميل إثبات الدفع ورقم المعاملة ثم انقر فوق الزر "لقد دفعت</h6>
                            <div>
                            </div>
                            <div class="btnFlex" style="display: flex; gap: 20px;">
                                <input class="custom-input" type="text" placeholder="الرقم المرجعي للحوالة" name="process_number">
                                <input class="custom-input2" type="file" name="photo">
                            </div>
                            <div>
                                {{--         <button class="btn responsive" style="margin: 1.5% 0%; height: 50px; border: none; width: 60%; border-radius: 10px; border:1px solid #d1d0d0; background-color: #F9F9FB; color: rgb(178, 178, 178);">اضف طلبا اخر  <span style="font-weight: 500;">+</span></button>--}}
                                <br>
                                <div style="display: flex; gap: 10px; flex-direction: column;">
                                    <button type="submit" class="btnLarge" style=" border: none; width: 160px;height: 50px; border-radius: 10px; background-color: #000000; color: white;">لقد دفعت</button>
                                    <div style="display: flex; gap: 10px;">
                                        <i class="fa-solid fa-info-circle" style="color: #806a6a;"></i>
                                        <h6 style="font-size: smaller;"> لا يوجود رسوم, يتم قبول الطلبات في غضون 0 - 8 ساعات, قد تتأثر المدة بأوقات الدوام في حال كانت عبر مكتب حوالات او عبر حوالة بنكية.</h6>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</header>
<script src={{asset('https://code.jquery.com/jquery-3.7.0.js')}}></script>
<script>
    $('select[name="country"]').on('change', function() {
        let countryId = $(this).val();
        if (countryId) {
            $.ajax({
                url: "{{ URL::to('getPayments') }}/"+countryId,
                type: "GET",
                dataType: "json",
                success: function(data){
                    console.log(data);
                    data.forEach(function(item, index){
                        $('.flex-container').append(`
                              <div class='img-div' style='cursor: pointer;'
                               data-payment_id="${item[index].id}"
                                data-account_number="${item[index].account_number}">
                            <img src="{{asset('admin/admin_image/payment')}}/${item[index].photo}"
                                    alt="">
                               </div>
                              `);
                    });
                },

            });
        } else {
            console.log('AJAX load did not work');
        }
    });
</script>
<script>
    document.addEventListener('click',function (e) {
        if(e.target.classList.contains('img-div')){
            document.querySelector('#account_number').value=e.target.getAttribute('data-account_number');
            document.querySelector('#payment_id').value=e.target.getAttribute('data-payment_id');
        }
    });
</script>
<script>
    let message=document.querySelectorAll('.message');
    if( message){
        setTimeout(()=>{
            message.forEach((e)=>{
                e.style.display="none";
            })

        },3000)
    }
</script>
</body>
</html>
