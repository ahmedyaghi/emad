  <!-- start:: modal -->
      <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border-0 rounded-4">
            <div class="modal-body p-4 p-lg-5">
              <h3 class="font-bold mb-2">تسجيل الدخول</h3>
              <h4 class="text-gray">ادخل البريد الالكتروني و كلمة المرور لتسجيل الدخول لحسابك.</h4>
              <hr class="my-4"/>
              <form action="{{route('handle.login')}}" method="POST">
                @csrf
                <div class="form-content">
                  <div class="form-group"> 
                    <label class="form-label">البريد الالكتروني </label>
                    <input class="form-control" type="text" placeholder="test@example.com" name="email" value="{{old('email')}}"/>
                      @if ($errors->has('email'))
                          <span class="text-danger">{{ $errors->first('email') }}</span>
                      @endif
                  </div>
                  <div class="form-group"> 
                    <label class="form-label">كلمة المرور  </label>
                    <input class="form-control" type="password" placeholder="*********" name="password"/>
                    @if ($errors->has('password'))
                          <span class="text-danger">{{ $errors->first('password') }}</span>
                      @endif
                  </div>
                  <div class="form-group"> <a class="form-label text-black" href="">نسيت كلمة المرور ؟</a></div>
                  <div class="form-group"> 
                     @if ($errors->has('credentials'))
                          <span class="text-danger">{{ $errors->first('credentials') }}</span>
                      @endif
                  </div>

                </div>
                <div class="form-group mb-0">
                  <div class=" gap-2 d-flex justify-content-between mt-4">
                    <button class="btn btn-white px-5" type="button" data-bs-dismiss="modal">إلغاء</button>
                    <button class="btn btn-primary px-5" type="submit" data-bs-dismiss="modal"> تأكيد</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!-- end:: modal -->   

      <!-- start:: modal -->
      <div class="modal fade" id="modalRegister" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border-0 rounded-4">
            <div class="modal-body p-4 p-lg-5">
              <h3 class="font-bold mb-2">اختر نوع الحساب</h3>
              <h4 class="text-gray">يرجى تحديد نوع الحساب الذي يناسبك للاستفادة من خدمات المنصة:</h4>
              <hr class="my-4"/>
              <div class="row"> 
                <div class="col-lg-6"> 
                  <div class="widget_item-card-2 mb-4">
                    <div class="widget_item-icon mb-3"><img src="assets/images/user.svg" alt=""/></div>
                    <div class="widget_item-content">
                      <h4 class="mb-3 font-bold">إنشاء حساب كفرد</h4>
                      <h6 class="mb-3 widget_item-desc text-gray">إذا كنت تبحث عن فرص عمل موسمية في موسم الحج والعمرة، يمكنك التقديم على الوظائف المناسبة لك وتتبع حالتها بسهولة</h6><a class="btn btn-primary w-100 rounded-pill" href="{{route('register', 'individual')}}">متابعة كفرد </a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6"> 
                  <div class="widget_item-card-2 mb-4">
                    <div class="widget_item-icon mb-3"><img src="assets/images/building.svg" alt=""/></div>
                    <div class="widget_item-content">
                      <h4 class="mb-3 font-bold">إنشاء حساب كجمعية</h4>
                      <h6 class="mb-3 widget_item-desc text-gray">إذا كنت تمثل جمعية وتبحث عن كوادر للعمل خلال الموسم، يمكنك إنشاء حساب لرفع الوظائف وإدارة طلبات المتقدمين.</h6><a class="btn btn-primary w-100 rounded-pill" href="{{route('register', 'association')}}">متابعة كجمعية</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6"> 
                  <div class="widget_item-card-2">
                    <div class="widget_item-icon mb-3"><img src="assets/images/user-group.svg" alt=""/></div>
                    <div class="widget_item-content">
                      <h4 class="mb-3 font-bold">إنشاء حساب أﻋﻀﺎء ﻫﻴﺌﺔ اﻟﺘﺪرﻳﺲ</h4>
                      <h6 class="mb-3 widget_item-desc text-gray">إذا كنت تبحث عن فرص عمل موسمية في موسم الحج والعمرة، يمكنك التقديم على الوظائف المناسبة لك وتتبع حالتها بسهولة</h6><a class="btn btn-primary w-100 rounded-pill" href="{{route('register', 'faculty-member')}}">متابعة كعضو هيئة تدريس</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6"> 
                  <div class="widget_item-card-2">
                    <div class="widget_item-icon mb-3"><img src="assets/images/user-shield.svg" alt=""/></div>
                    <div class="widget_item-content">
                      <h4 class="mb-3 font-bold">إنشاء حساب ﻣﺴﺘﺸﺎر ﻣﻬﻨﻲ ﻣﺴﺘﻘﻞ</h4>
                      <h6 class="mb-3 widget_item-desc text-gray">إذا كنت تبحث عن فرص عمل موسمية في موسم الحج والعمرة، يمكنك التقديم على الوظائف المناسبة لك وتتبع حالتها بسهولة</h6><a class="btn btn-primary w-100 rounded-pill" href="{{route('register', 'consultant')}}">متابعة كمستشار</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- end:: modal -->       


       <!-- start:: modal -->   
        <div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4">
              <div class="modal-body p-4 p-lg-5">
                <h2 class="section-title font-bold mb-2">الرجاء إدخال رمز OTP</h2>
                <h4 class="text-gray">تم إرسال رمز التحقق (OTP) إلى رقم جوالك. يرجى إدخال الرمز في الحقل أدناه لاستكمال عملية التسجيل.</h4>
                <hr/>
                <div class="d-flex justify-content-center gap-2 mb-4 pt-3">
                  <input class="otp-input form-control text-center" type="text" maxlength="1" placeholder="0"/>
                  <input class="otp-input form-control text-center" type="text" maxlength="1" placeholder="0"/>
                  <input class="otp-input form-control text-center" type="text" maxlength="1" placeholder="0"/>
                  <input class="otp-input form-control text-center" type="text" maxlength="1" placeholder="0"/>
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
            </div>
          </div>
        </div>
        <!-- end:: modal -->  


        <!-- start:: modal -->
        <div class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4">
              <div class="modal-body p-4 p-lg-5">
                <h2 class="section-title font-bold mb-2">دفع الاشتراك في الباقة </h2>
                <h4 class="text-gray">من فضلك ادخل بيانات الدفع حتي تستكمل خطوات انشاء الحساب الخاصة بجمعية</h4>
                <hr/>
                <div class="package-info d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <h6 class="font-bold">الباقة</h6>
                    <h3 class="font-bold" id="selectedPlanName">المهنية</h3>
                  </div>
                  <div class="text-end">
                    <p class="text-gray mb-0">السعر</p>
                    <h3 class="font-bold" id="selectedPlanPrice">149 ريال / شهريًا</h3>
                  </div>
                </div>
                <div class="mb-4">
                  <label class="form-label mb-2">رقم البطاقة</label>
                  <div class="row">
                    <div class="col-3">
                      <input class="form-control text-center" type="text" placeholder="0 0 0 0"/>
                    </div>
                    <div class="col-3">
                      <input class="form-control text-center" type="text" placeholder="0 0 0 0"/>
                    </div>
                    <div class="col-3">
                      <input class="form-control text-center" type="text" placeholder="0 0 0 0"/>
                    </div>
                    <div class="col-3">
                      <input class="form-control text-center" type="text" placeholder="0 0 0 0"/>
                    </div>
                  </div>
                </div>
                <div class="mb-4">
                  <label class="form-label mb-2">اسم حامل البطاقة</label>
                  <input class="form-control" type="text" placeholder="اسم حامل البطاقة"/>
                </div>
                <div class="mb-4">
                  <div class="row"> 
                    <div class="col-6">
                      <label class="form-label mb-2">CVV</label>
                      <input class="form-control" type="text" placeholder="***" maxlength="3"/>
                    </div>
                    <div class="col-6">
                      <label class="form-label mb-2">MM/YY</label>
                      <input class="form-control" type="text" placeholder="00/00" maxlength="5"/>
                    </div>
                  </div>
                </div>
                <hr class="my-4"/>
                <div class=" gap-2 d-flex justify-content-between">
                  <button class="btn btn-white px-5" type="button" data-bs-dismiss="modal">إلغاء</button>
                  <button class="btn btn-primary px-5" type="submit">الدفع وإنشاء حساب</button>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end:: modal -->   
<!-- start:: modal -->   
    