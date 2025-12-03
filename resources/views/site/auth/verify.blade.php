<x-site.layout :internal="false">
    <!-- start:: section -->  
        <section class="section section-bg-light section-wizard">
          <div class="container"> 
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="section-content">
                  <div class="mb-4 pb-lg-3">
                    <h2 class="font-bold mb-3">الرجاء إدخال رمز OTP</h2>
                    <h5 class="mb-2">تم إرسال رمز التحقق (OTP) إلى رقم جوالك. يرجى إدخال الرمز في الحقل أدناه لاستكمال عملية التسجيل.</h5>
                  </div>
                  
                    <form action="{{route('verification.verify')}}" method="POST">
                        @csrf

                         <div class="d-flex justify-content-center gap-2 mb-4 pt-3">
                            <input class="otp-input form-control text-center" type="text" maxlength="1" placeholder="0" name="code[]" value="{{old('code.0')}}"/>
                            <input class="otp-input form-control text-center" type="text" maxlength="1" placeholder="0" name="code[]" value="{{old('code.1')}}"/>
                            <input class="otp-input form-control text-center" type="text" maxlength="1" placeholder="0" name="code[]" value="{{old('code.2')}}"/>
                            <input class="otp-input form-control text-center" type="text" maxlength="1" placeholder="0" name="code[]" value="{{old('code.3')}}"/>
                        </div>
                        <div class="text-center">
                            @if ($errors->has('code.*'))
                                <span class="text-danger">{{ $errors->first('code.*') }}</span>
                            @endif
                            @if ($errors->has('invalid_code'))
                                <span class="text-danger">{{ $errors->first('invalid_code') }}</span>
                            @endif
                        </div>
                        <div class="text-center">
                            <div class="text-danger small mb-3" id="otpError"></div>
                            <h3 class="mb-3">لم يصلك رمز التحقق؟</h3>
                            <h5 class="text-danger"> إعادة الإرسال خلال 59 ثانية ...</h5>
                        </div>
                        <div class=" gap-2 d-flex justify-content-between mt-4">
                        <button class="btn btn-white px-5" type="button" data-bs-dismiss="modal">إلغاء</button>
                        <button class="btn btn-primary px-5" type="submit" data-bs-dismiss="modal"> تأكيد</button>
                        </div>
                        </div>
                      </form>
                </div>
              </div>
            </div>
          </div>
        </section><!-- end:: section --> 
</x-site.layout>