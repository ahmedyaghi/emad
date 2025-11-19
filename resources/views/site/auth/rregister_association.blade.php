<x-site.layout :internal="false">
    <!-- start:: section -->  
        <section class="section section-bg-light section-wizard">
          <div class="container"> 
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="section-content">
                  <div class="mb-4 pb-lg-3">
                    <h2 class="font-bold mb-3">إنشاء حساب جديد</h2>
                    <h5 class="mb-2">املأ النموذج أدناه ليتم تسجيل حساب جديد والانضمام إلى منصة عماد.</h5>
                  </div>
                  <form id="registrationForm"> 
                    <div id="smartwizard">
                      <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="#step-1" data-step-name="المعلومات الأساسية" data-step-number="1"><span class="sw-step-title">المعلومات الأساسية</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="#step-2" data-step-name="بيانات الاتصال" data-step-number="2"><span class="sw-step-title">بيانات الاتصال</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="#step-3" data-step-name="الباقات" data-step-number="3"><span class="sw-step-title">الباقات</span></a></li>
                      </ul>
                      <div class="tab-content">
                        <!-- الخطوة 1-->
                        <div class="tab-pane" id="step-1" role="tabpanel">
                          <div class="row"> 
                            <div class="col-12">
                              <div class="form-group">
                                <label class="form-label">شعار الجمعية<span class="text-danger ms-1">*</span></label>
                                <div class="logo-upload">
                                  <input id="association-logo" type="file" accept="image/*" hidden="hidden" required="required"/>
                                  <div class="logo-preview"><img src="../assets/images/upload.svg" alt=""/></div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group"> 
                                <label class="form-label">إسم اﻟﺠﻤﻌﻴﺔ<span class="text-danger ms-1">*</span></label>
                                <input class="form-control required" type="text" placeholder="أدخل إسم اﻟﺠﻤﻌﻴﺔ"/>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="mb-2"> اﻟﺘﺨﺼـــﺺ<span class="text-danger ms-1">*</span></label>
                                <select class="select2 form-control required" data-placeholder="اختر">
                                  <option></option>
                                  <option value="1">اﻟﺘﺨﺼـــﺺ 1</option>
                                  <option value="2">اﻟﺘﺨﺼـــﺺ 2</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="mb-2"> القطاع<span class="text-danger ms-1">*</span></label>
                                <select class="select2 form-control required" data-placeholder="اختر">
                                  <option></option>
                                  <option value="1">القطاع 1</option>
                                  <option value="2">القطاع 2</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="mb-2"> سجل اﻟﺘﺠﺎري<span class="text-danger ms-1">*</span></label>
                                <select class="select2 form-control required" data-placeholder="اختر">
                                  <option></option>
                                  <option value="1">سجل اﻟﺘﺠﺎري 1</option>
                                  <option value="2">سجل اﻟﺘﺠﺎري 2</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="mb-2"> ﺗﺼﺮﻳﺢ اﻟﺠﻤﻌﻴﺔ<span class="text-danger ms-1">*</span></label>
                                <select class="select2 form-control required" data-placeholder="اختر">
                                  <option></option>
                                  <option value="1">ﺗﺼﺮﻳﺢ اﻟﺠﻤﻌﻴﺔ 1</option>
                                  <option value="2">ﺗﺼﺮﻳﺢ اﻟﺠﻤﻌﻴﺔ 2</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="mb-2">الدولة</label>
                                <select class="select2 form-control" data-placeholder="اختر">
                                  <option></option>
                                  <option value="1">الدولة 1</option>
                                  <option value="2">الدولة 2</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="mb-2"> اﻟﻤﺪﻳﻨﺔ</label>
                                <select class="select2 form-control" data-placeholder="اختر">
                                  <option></option>
                                  <option value="1">اﻟﻤﺪﻳﻨﺔ 1</option>
                                  <option value="2">اﻟﻤﺪﻳﻨﺔ 2</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group"> 
                                <label class="form-label">البريد الإلكتروني<span class="text-danger">*</span></label>
                                <input class="form-control required" type="text" placeholder="أدخل بريدك الإلكتروني"/>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group"> 
                                <label class="form-label">ﻧﺒﺬة<span class="text-danger">*</span></label>
                                <textarea class="form-control required" type="text" placeholder="أدخل وصف اﻟﺠﻤﻌﻴﺔ..." rows="5"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- الخطوة 2-->
                        <div class="tab-pane" id="step-2" role="tabpanel">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group"> 
                                <label class="form-label">موقعك الإلكتروني </label>
                                <input class="form-control" type="text" placeholder="www.capitalx.com"/>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group"> 
                                <label class="form-label">موقع x  (تويتر)</label>
                                <input class="form-control" type="text" placeholder="twitter.com/CapitalX"/>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group"> 
                                <label class="form-label">فيسبوك</label>
                                <input class="form-control" type="text" placeholder="Facebook.com/CapitalX"/>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group"> 
                                <label class="form-label">يوتيوب</label>
                                <input class="form-control" type="text" placeholder="YouTube.com/CapitalX"/>
                              </div>
                            </div>
                            <div class="col-12 mb-3">
                              <hr/>
                            </div>
                            <div class="col-12 mb-4">
                              <h3 class="font-medium">مسئول التواصل</h3>
                            </div>
                            <div class="col-12">
                              <div class="form-group"> 
                                <label class="form-label">الإسم<span class="text-danger">*</span></label>
                                <input class="form-control required" type="text" placeholder="YouTube.com/CapitalX"/>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="mb-2"> المنصب<span class="text-danger ms-1">*</span></label>
                                <select class="select2 form-control required" data-placeholder="اختر">
                                  <option></option>
                                  <option value="1">المنصب 1</option>
                                  <option value="2">المنصب 2</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="mb-2"> الجنسية<span class="text-danger ms-1">*</span></label>
                                <select class="select2 form-control required" data-placeholder="اختر">
                                  <option></option>
                                  <option value="1">الجنسية 1</option>
                                  <option value="2">الجنسية 2</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="mb-2">رقم الجوال<span class="text-danger ms-1">*</span></label>
                                <div class="row flex-nowrap gx-2">
                                  <div class="col">
                                    <input class="form-control text-end required" type="text" placeholder="00"/>
                                  </div>
                                  <div class="col-auto">
                                    <select class="form-control  select2  required" data-width="100px" data-placeholder="اختر">
                                      <option></option>
                                      <option value="+966">966</option>
                                      <option value="+968">968</option>
                                      <option value="+969">969</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group"> 
                                <label class="form-label">البريد الإلكتروني<span class="text-danger">*</span></label>
                                <input class="form-control required" type="text" placeholder="YouTube.com/CapitalX"/>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="step-3" role="tabpanel">
                          <div class="row gx-2">
                            <div class="col-lg-4"> 
                              <div class="package-card" data-plan="free" data-price="0 ريال / شهريًا">
                                <div class="package-header">
                                  <p class="package-title font-bold mb-2">الباقة</p>
                                  <h3 class="package-name font-bold mb-2">المجانية</h3>
                                  <p class="package-price">
                                    <spa class="text-gray">السعر : </spa><span class="font-bold">0 ريال / شهريًا </span>
                                  </p>
                                </div>
                                <hr/>
                                <ul class="package-features">
                                  <li class="feature-item"><span class="checkmark me-2"><img src="../assets/images/checkmark.svg" alt=""/></span>إنشاء حساب للجمعية</li>
                                  <li class="feature-item"><span class="checkmark me-2"><img src="../assets/images/checkmark.svg" alt=""/></span>نشر حتى 3 فرص تدريبة</li>
                                  <li class="feature-item"><span class="checkmark me-2"><img src="../assets/images/checkmark.svg" alt=""/></span>عرض الملفات الشخصية للطلاب والباحثين</li>
                                  <li class="feature-item"><span class="checkmark me-2"><img src="../assets/images/checkmark.svg" alt=""/></span>لا تشمل نظام الدفع</li>
                                </ul>
                                <hr/>
                                <p class="package-footer text-center">الأسعار شاملة ضريبة القيمة المضافة.<br/>تُطبّق <a class="font-medium" href="">الشروط والأحكام </a> على جميع الباقات.</p>
                              </div>
                            </div>
                            <div class="col-lg-4"> 
                              <div class="package-card" data-plan="المهنية" data-price="149 ريال / شهريًا">
                                <div class="package-header">
                                  <p class="package-title font-bold mb-2">الباقة</p>
                                  <h3 class="package-name font-bold mb-2">المهنية</h3>
                                  <p class="package-price">
                                    <spa class="text-gray">السعر : </spa><span class="font-bold">149 ريال / شهريًا </span>
                                  </p>
                                </div>
                                <hr/>
                                <ul class="package-features">
                                  <li class="feature-item"><span class="checkmark me-2"><img src="../assets/images/checkmark.svg" alt=""/></span>إنشاء حساب للجمعية</li>
                                  <li class="feature-item"><span class="checkmark me-2"><img src="../assets/images/checkmark.svg" alt=""/></span>نشر حتى 15 فرص تدريبة</li>
                                  <li class="feature-item"><span class="checkmark me-2"><img src="../assets/images/checkmark.svg" alt=""/></span>الوصول الكامل إلى ملفات الطلاب والباحثين</li>
                                  <li class="feature-item"><span class="checkmark me-2"><img src="../assets/images/checkmark.svg" alt=""/></span>تقارير أداء وتفاعل مع الإعلانات</li>
                                </ul>
                                <hr/>
                                <p class="package-footer text-center">الأسعار شاملة ضريبة القيمة المضافة.<br/>تُطبّق <a class="font-medium" href="">الشروط والأحكام </a> على جميع الباقات.</p>
                              </div>
                            </div>
                            <div class="col-lg-4"> 
                              <div class="package-card" data-plan="المميزة" data-price="399 ريال / شهريًا">
                                <div class="package-header">
                                  <p class="package-title font-bold mb-2">الباقة</p>
                                  <h3 class="package-name font-bold mb-2">المميزة</h3>
                                  <p class="package-price">
                                    <spa class="text-gray">السعر : </spa><span class="font-bold">399 ريال / شهريًا </span>
                                  </p>
                                </div>
                                <hr/>
                                <ul class="package-features">
                                  <li class="feature-item"><span class="checkmark me-2"><img src="../assets/images/checkmark.svg" alt=""/></span>جميع مميزات الباقة المهنية</li>
                                  <li class="feature-item"><span class="checkmark me-2"><img src="../assets/images/checkmark.svg" alt=""/></span>عدد غير محدود من فرص تدريبة</li>
                                  <li class="feature-item"><span class="checkmark me-2"><img src="../assets/images/checkmark.svg" alt=""/></span>دعم فني مخصص ومتابعة مباشرة</li>
                                  <li class="feature-item"><span class="checkmark me-2"><img src="../assets/images/checkmark.svg" alt=""/></span>لوحة إدارة متقدمة للفرق والبيانات</li>
                                </ul>
                                <hr/>
                                <p class="package-footer text-center">الأسعار شاملة ضريبة القيمة المضافة.<br/>تُطبّق <a class="font-medium" href="">الشروط والأحكام </a> على جميع الباقات.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section><!-- end:: section --> 
</x-site.layout>