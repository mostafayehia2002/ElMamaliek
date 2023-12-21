<!DOCTYPE html>
<html lang="ar" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link css -->
    <link rel="stylesheet" href="{{asset('user/css/stylee.css')}}">
    <!-- link bootstrap -->
    <link rel="stylesheet" href="{{asset('user/css/bootstrap1.min.css')}}">

    <!-- font icons library -->
    <link rel="stylesheet" href="{{asset('user/css/all.min.css')}}">
    <title>انهاء الدفع</title>
</head>
<body dir="rtl">
{{--Start container--}}
<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="row ">
        <!-- start header -->
        <header class="d-flex">
            <div>
                <a href="{{route('home')}}">
                    <img src="{{asset('user/img/logop.png')}}" alt="logo" height="45px" style="display: block;">
                </a>
            </div>
            <div>
                <h1 style="color: #444; font-size: 20px; padding-bottom: 4px; margin: 0; font-weight: 100; margin-right: 27px;"> مرحبا بك   {{Auth::user()->email}}</h1>
                <div class="link-road">
                    <a style="color: red;" href="" target="_blank"></a>
                    <a href="{{route('home')}}" target="_blank">متجر الممالك</a>
                    <i class="fa-solid fa-chevron-left"></i>
                    <a href="" target="_blank">سلة المشتريات</a>
                    <i class="fa-solid fa-chevron-left"></i>
                    <a href="{{route('home')}}">إنهاء الطلب</a>

                </div>
            </div>
        </header>
        <!-- end header -->
        <!--  قسم الدفع-->
        <div class= "col-sm-12" style="display: block; ">
            <div class="head-main d-flex align-items-center my-3">
                <span style="background-color: #3a075f; font-size: 13px; padding: 4px 10px; border-radius: 50%; color: #b986de;">1</span>
                <img style="margin: 0 5px;" class="title-wallet-img" src="https://cdn.assets.salla.network/stores/vendor/checkout/images/icons/step-payment.svg" alt="wallet">
                <h2 class="title-wallet">الدفع</h2>
            </div>
            <div class="container">
                <div class="row justify-content-start">
                    @if(!is_null($payments))
                        @foreach($payments as $payment)
                            <button class="button-bank  col-5 m-1" onclick="toggleBorder(this)"  data-payment_id="{{$payment->id}}" ><img src="{{asset('admin/admin_image/payment/'.$payment->payment_photo)}}" alt="mada" width="80px"></button>
                        @endforeach
                    @endif
                </div>
            </div>
            {{--       start form     --}}
            <form action="{{route('sendCodeOrder')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="my-3">
                    <div class="head-select">
                        <h2 style="font-size: 20px; color: #444;">اختر حساب التاجر</h2>
                    </div>
                    <input type="hidden" name="product_id" id="product_id" value="{{$product_id}}">
                    <div class="select col-md-12">
                        <select dir="rtl" class="form-select  @error('account_name') is-invalid @enderror" aria-label="Default select example"  name="account_name">
                            @if(!is_null($accounts))
                                @foreach($accounts as $account)
                                    <option value="{{$account->id}}" selected >{{$account->account_name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    @error('account_name')
                    <div class="alert alert-danger message">{{ $message}}</div>
                    @enderror
                </div>
                <div style="margin-top: 40px;">
                    <div class="d-block d-md-flex">
                        <p style="margin-right: 20px;">صاحب الحساب</p>
                        <b id="accountOwner" style="margin-right: 20px;">{{ empty($account->account_name)? 'لا يوجد حساب':$account->account_name}}</b>
                        <button onclick="copyCodename()" style="border: none; background-color: transparent;"><i class="fa-regular fa-copy" style="font-size: 20px; margin-right: 5px;"></i></button>
                    </div>

                    <div class="d-block d-md-flex" style="margin:10px 0">
                        <p style="margin-right: 20px;">رقم الحساب</p>
                        <b id="accountNumber" class="account-number" style="margin-right: 20px;">{{empty($account->account_number)?'لا يوجد رقم حساب':$account->account_number}}</b>
                        <button onclick="copyCodenamee()" style="border: none; background-color: transparent;"><i class="fa-regular fa-copy" style="font-size: 20px; margin-right: 5px;"></i></button>

                        <p style="margin-right: 20px;"> رقم الآيبان </p>
                        <b id="iban" style="margin-right: 20px;">{{ empty($account->ipn_number)?'لا يوجد رقم ايبان':$account->ipn_number}}</b>
                        <button onclick="copyCodeaccountNumberr()" style="border: none; background-color: transparent;"><i class="fa-regular fa-copy" style="font-size: 20px; margin-right: 5px;"></i></button>
                    </div>
                </div>
                <div>
                    <input class="form-control w-50" type="text" value="USD ={{ empty($account->exchange_rate)?'لا يوجد سعر صرف':$account->exchange_rate}}" readonly name="exchange_rate">
                </div>

                <div class="my-4 d-flex justify-content-start">
                    <label id="upload-file" for="formFileMultiple" style="font-size: 18px; font-weight: 500; margin-right: 20px; color: #ffb71b; opacity: .8; cursor: pointer; background-color: #00000053; padding: 5px; border-radius: 5px;"><i class="fa-solid fa-cloud-arrow-up"></i> الرجاء ارفاق صورة الايصال.</label>
                    <input type="file" id="formFileMultiple" multiple style="display: none;" name="photo" accept="image/*" class="@error('photo') is-invalid @enderror"">
                </div>
                @error('photo')
                <div class="alert alert-danger message">{{ $message}}</div>
                @enderror
                <div class="my-1">
                    <input type="text" class="form-control @error('process_number') is-invalid @enderror" placeholder="الرقم المرجعي للعملية" name="process_number">
                </div>
                @error('process_number')
                <div class="alert alert-danger message">{{ $message}}</div>
                @enderror
                <div class="col-lg-3 col-sm-12" style="margin-top: 50px;">

                    <div class="d-flex justify-content-center">
                        <h4 class="text-muted" style="font-size: 20px;">ملخص السلة</h4>
                        <p style="margin-right: 60px;">${{$price}}</p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <h4 class="text-muted" style="font-size: 20px;">اجمالي الطلب</h4>
                        <p style="margin-right: 60px;">${{$price}}</p>
                    </div>
                </div>
                <div class="my-4">
                    <button id="btn-submit" type="submit" class="btn w-100" style="background-color: #000; color: #ffb71b; font-size: 18px; font-weight: 700; height: 45px; padding: 3 50px 5px; border-radius: 0 0 5px 5px;">اكمال الدفع</button>
                </div>

            </form>
            {{--     End form       --}}
            <div class="d-flex align-items-center my-2">
                <!-- footer section -->
                <p style="font-size: 15px; margin: 0 5px; color: #c4c4c4;">تسوق إلكتروني آمن 100%</p>
                <img style="display: inline-block; height: auto; opacity: .4; vertical-align: middle; width: 15px; margin: 0 6px;" src="https://cdn.assets.salla.network/stores/vendor/checkout/images/icons/secure-payment-02.svg" alt="">
                <img style="display: inline-block; height: auto; opacity: .4; vertical-align: middle; width: 15px; margin: 0 6px;" src="https://cdn.assets.salla.network/stores/vendor/checkout/images/icons/secure-payment.svg" alt="">
                <img style="display: inline-block; height: auto; opacity: .4; vertical-align: middle; width: 15px; margin: 0 6px;" src="https://cdn.assets.salla.network/stores/vendor/checkout/images/icons/secure-payment-03.svg" alt="">

            </div>


        </div>
    </div>
    {{--  end row  --}}
</div>
{{-- End container  --}}
<script src={{asset('https://code.jquery.com/jquery-3.7.0.js')}}></script>


<script>
    $('.button-bank').on('click', function () {
        let paymentId = $(this).data('payment_id');
        let select=  $('select[name="account_name"]');
        if (paymentId) {
            $.ajax({
                url: "{{ URL::to('getAllAccounts')}}/" + paymentId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    select.empty();
                    data.forEach(function (item){
                        item.forEach(function (e){
                            select.append(`
                                <option value="${e.id}" selected>${e.account_name}</option>
                             `);
                            $('#accountOwner').text(e.account_name);
                            $('#accountNumber').text(e.account_number);
                            $('#iban').text(e.ipn_number);
                            $('input[name=exchange_rate]').val(e.exchange_rate);
                        });
                    });
                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });
</script>
<!-- script link -->
{{--get account info--}}
<script>
    $('select[name="account_name"]').on('change', function() {
        let accountId = $(this).val();
        if (accountId) {
            $.ajax({
                url: "{{ URL::to('getPaymentAccount')}}/"+accountId,
                type: "GET",
                dataType: "json",
                success: function(data){
                    data.forEach(function(item, index){
                        $('#accountOwner').text(item[index].account_name);
                        $('#accountNumber').text(item[index].account_number);
                        $('#iban').text(item[index].ipn_number);
                        $('input[name=exchange_rate]').val(item[index].exchange_rate);
                    });
                },

            });
        } else {
            console.log('AJAX load did not work');
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

        },4000)
    }
</script>
<script>
    // نسخ ال account number
    function copyCodenamee() {
        var accountNumber = document.getElementById('accountNumber');

        var textArea = document.createElement('textarea');
        textArea.value = accountNumber.innerText;

        document.body.appendChild(textArea);

        textArea.select();
        document.execCommand('copy');

        document.body.removeChild(textArea);

    }
    function copyCodename() {
        var accountNumber = document.getElementById('accountOwner');

        var textArea = document.createElement('textarea');
        textArea.value = accountNumber.innerText;

        document.body.appendChild(textArea);

        textArea.select();
        document.execCommand('copy');

        document.body.removeChild(textArea);

    }

    function copyCodeaccountNumberr() {
        var accountNumber = document.getElementById('iban');

        var textArea = document.createElement('textarea');
        textArea.value = accountNumber.innerText;

        document.body.appendChild(textArea);

        textArea.select();
        document.execCommand('copy');

        document.body.removeChild(textArea);

    }

    // border boxes
    function toggleBorder(button) {
        var buttons = document.querySelectorAll('.button-bank');

        buttons.forEach(function (btn) {
            btn.classList.remove('active');
        });
        button.classList.add('active');
    }

    function copyCode() {
        console.log('تم نسخ النص');
    }
    // upload صورة الايصال

    document.getElementById('formFileMultiple').addEventListener('change', function () {
        var fileName = this.value.split('\\').pop();
        document.getElementById('customFileLabel').innerHTML = fileName ? fileName : 'ارفع الصورة من فضلك';
    });
</script>
<script src="{{asset('user/css/bootstrap1.bundle.min.js')}}"></script>
</body>
</html>
