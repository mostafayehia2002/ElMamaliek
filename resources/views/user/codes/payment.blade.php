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

    <header style="background-color: #f9f9fb;">
        <div class="head-conatiner">
            <div>
            <select class="country-select form-select-lg mb-3">
                <option  selected>اختر الدولة</option>
                <option  value="1">
                    <img src="stocks/egypt.jpeg" alt="">
                    مصر
                </option>
                <option  value="2">المغرب</option>
                <option  value="3">الجزائر</option>
              </select>
            </div>
<div class="flex-container">
    <div class="img-div">
        <img src="https://spaceremit.com/files/images/deposite_ways/da7350c182.png">
    </div>
    <div class="img-div">
        <img style="width: 150px;" src="https://spaceremit.com/files/images/deposite_ways/ae3d1b9a74.png">
    </div>
    <div class="img-div">
        <img style="width: 120px;" src="https://spaceremit.com/files/images/deposite_ways/d879e17b7f.png">
    </div>
    <div class="img-div">
        <img style="width: 120px;" src="https://spaceremit.com/files/images/deposite_ways/302301b92e.png">
    </div>
    <div class="img-div">
        <img style="width: 150px;" src="https://spaceremit.com/files/images/deposite_ways/7c689f9522.png">
    </div>
    <div class="img-div">
        <img style="width: 150px;" src="https://spaceremit.com/files/images/deposite_ways/ed7920e14d.png">
    </div>
    <div class="img-div">
        <img style="width: 120px;" src="https://spaceremit.com/files/images/deposite_ways/0ae250fb05.png">
    </div>
    <div class="img-div">
        <img style="width: 150px;" src="https://spaceremit.com/files/images/deposite_ways/374a07f260.png">
    </div>
    <div class="img-div">
        <img style="width: 150px;" src="https://spaceremit.com/files/images/deposite_ways/5b9d1e4835.png">
    </div>
    <div class="img-div">
        <img style="width: 150px;" src="https://spaceremit.com/files/images/deposite_ways/2865656654.png">
    </div>
</div>

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
              <button  class="payment-btn">
                <div>
                  <h6 style="margin-bottom: 0; font-weight: 500 !important;">SPACEREMIT</h6>
                </div>
                <div>
                    <i class="fa-solid fa-paste" style="color: #2e2e2e;"></i>
                  </div>

              </button>
            </div>

            <div class="parag1">
              <h6 style="color: #000000;">بعد تحويل الأموال، قم بتحميل إثبات الدفع ورقم المعاملة ثم انقر فوق الزر "لقد دفعت</h6>
              <div>
                <select dir="ltr" class="payment-select form-select-lg mb-3">
                  <option dir="ltr" selected>pay for myself</option>
                  <option  dir="ltr" value="2">paying for the others</option>
                </select>
              </div>
              <div class="btnFlex" style="display: flex; gap: 20px;">
                <input class="custom-input" type="text" placeholder="الرقم المرجعي للحوالة">
                <button class="custom-input2">
                <div style="display: flex; gap :10px;">
                  <h6 style="font-weight: 500 !important;">لقطة الشاشة كدليل </h6>
                  <div>
                    <i class="fa-solid fa-image" style="color: #2e2e2e;"></i>
                  </div>
                </div>
                </button>
              </div>
              <div>
                <button class="btn responsive" style="margin: 1.5% 0%; height: 50px; border: none; width: 60%; border-radius: 10px; border:1px solid #d1d0d0; background-color: #F9F9FB; color: rgb(178, 178, 178);">اضف طلبا اخر  <span style="font-weight: 500;">+</span></button>

                <div style="display: flex; gap: 10px; flex-direction: column;">
                    <button class="btnLarge" style=" border: none; width: 160px;height: 50px; border-radius: 10px; background-color: #000000; color: white;">لقد دفعت</button>
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
        </div>
    </header>
  </body>
</html>
