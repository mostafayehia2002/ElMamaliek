<div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding: 10px;">
                    <span aria-hidden="true" style="font-size: 40px;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="page-contentt">
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="panel panel-body login-form mb-0">
                            <div class="text-center panel-title">
                                <div class="icon-object border-yellow-dark text-yellow-dark"><i class="sicon-user"></i></div>
                                <h5 class="content-group login-title">تسجيل الدخول</h5>
                            </div>
                            <div id="login-panel-actions">
                                <p class="text-muted text-center ">اختر الوسيلة المناسبة</p>
                                <div class="btn-group login-options login-options--vertical text-center">
                                    <button type="button" class="btn login-option" id="showButton" data-option="email">
                                        <i class="sicon-mail"></i>
                                        <span>البريد الإلكتروني</span>
                                    </button></div>
                            </div>
                            <div id="login-panel-actionss" style="text-align: right; display: none;" >
                                <div class="form-group">
                                    <label >البريد الالكتروني <span class="text-danger">*</span></label>
                                    <div class="">
                                        <div class="input-group">
                                            <input type="email" name="email" id="email" class="form-control align-left text-ltr" placeholder="your@email.com" required="">
                                            <span class="input-group-addon shrinked"><i class="sicon-mail"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group align-center mb-0">
                                    <button type="button" id="email-login-form-submit-btn" class="btn btn-primary btn-code" style="width: 100%;"  >الدخول <i class="sicon-caret-left"></i></button>
                                </div>
                            </div>
                            <div id="verification" style=" display: none;">
                                <div class="form-group"  style="text-align: right;">
                                    <label>رمز التحقق  <span class="text-danger">*</span></label>
                                    <div id="mobile_number_div">
                                        <input type="tel" class="form-control" id="code" maxlength="4" name="password" data-type="email" placeholder="ادخل رمز التحقق" onkeyup="parseArabicNumbers('code')" onkeypress="return event.keyCode != 13;" onkeydown="return event.keyCode != 13;" autocomplete="one-time-code" required="">
                                    </div>
                                </div>
                                <div class="form-group align-center">
                                    <button type="submit" id="verification-form-submit-btn" data-type="email" class="btn btn-primary"><i class="sicon-check"></i> التحقق</button>
                                </div>
                                <div id="resend-section">
                                    <div class="form-group align-center">
                                        <div style="width: 100%; height: 13px; border-bottom: 1px solid #eee; text-align: center">
                                            <span style="background-color: #fff; padding: 0 10px;">إعادة الارسال بعد <span id="resend-timer">00:00</span></span>
                                        </div>
                                    </div>
                                    <div class="form-group align-center resend-btn-options" style="margin-bottom: 0;">
                                        <button type="button" data-type="sms" class="btn resend-btn btn-resend-option"><i class="sicon-iphone"></i>&nbsp;رسالة نصية&nbsp; </button>
                                        <button type="button" data-type="email" class="btn resend-btn btn-resend-option"><i class="sicon-mail"></i> &nbsp;الايميل&nbsp; </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

