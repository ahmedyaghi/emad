<x-site.layout :internal="false">
    <!-- start:: section -->  
        <section class="section section-bg-light">
          <div class="container"> 
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="section-content">
                  <div class="mb-4">
                    <h2 class="font-bold mb-3">إنشاء حساب جديد</h2>
                    <h5>املأ النموذج أدناه ليتم تسجيل حساب جديد والانضمام إلى منصة عماد.</h5>
                  </div>
                  <hr/>
                  <form action="{{route('handle.register', App\Enums\UserTypeEnum::ASSOCIATION )}}" method="POST">
                  @csrf
                  <div class="row">
                     <div class="col-12">
                        <div class="form-group">
                        <label class="form-label">شعار الجمعية<span class="text-danger ms-1">*</span></label>
                        <div class="logo-upload">
                            <input id="association-logo" type="file" accept="image/*" hidden="hidden" name="image"/>
                            <div class="logo-preview"><img src="{{asset('assets/images/upload.svg')}}" alt=""/></div>
                        </div>
                        </div>
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                   <div class="col-lg-6">
                      <div class="form-group"> 
                        <label class="mb-2">اسم الجمعية <span class="text-danger ms-1">*</span></label>
                        <input class="form-control" type="text" placeholder="أدخل اسم الجمعية" name="name" value="{{old('name')}}"/>
                          @if ($errors->has('name'))
                              <span class="text-danger">{{ $errors->first('name') }}</span>
                          @endif
                      </div>
                    </div>

                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="mb-2">رقم الجوال<span class="text-danger ms-1">*</span></label>
                          <div class="row flex-nowrap gx-2">
                            <div class="col">
                              <input class="form-control text-end" type="text" placeholder="00" name="phone" value="{{old('phone')}}"/>
                              @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="col-auto">
                              <select class="form-control  select2 " data-width="100px" data-placeholder="اختر" name="code">
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
                          <label class="mb-2">البريد الاكتروني</label>
                          <input class="form-control" type="text" placeholder="email@example.com" name="email" value="{{old('email')}}"/>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        </div>
                      </div>
                   
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="mb-2"> اﻟﺘﺨﺼﺺ<span class="text-danger ms-1">*</span></label>
                        <select class="select2 form-control" data-placeholder="اختر" name="specilization_id">
                          <option></option>
                          <option value="1">اﻟﺘﺨﺼﺺ 1</option>
                          <option value="2">اﻟﺘﺨﺼﺺ 2</option>
                        </select>
                        @if ($errors->has('specilization_id'))
                              <span class="text-danger">{{ $errors->first('specilization_id') }}</span>
                        @endif
                      </div>
                     </div>
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="mb-2"> القطاع<span class="text-danger ms-1">*</span></label>
                        <select class="select2 form-control" data-placeholder="اختر" name="section_type_id">
                          <option></option>
                          <option value="1">القطاع 1</option>
                          <option value="2">القطاع 2</option>
                        </select>
                        @if ($errors->has('section_type_id'))
                              <span class="text-danger">{{ $errors->first('section_type_id') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="mb-2">الدولة</label>
                        <select class="select2 form-control" data-placeholder="اختر"  name="country_id">
                          <option></option>
                          <option value="1">الدولة 1</option>
                          <option value="2">الدولة 2</option>
                        </select>
                         @if ($errors->has('country_id'))
                              <span class="text-danger">{{ $errors->first('country_id') }}</span>
                        @endif
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="mb-2">المدينة</label>
                        <select class="select2 form-control" data-placeholder="اختر"  name="city_id">
                          <option></option>
                          <option value="1">المدينة 1</option>
                          <option value="2">المدينة 2</option>
                        </select>
                         @if ($errors->has('city_id'))
                              <span class="text-danger">{{ $errors->first('city_id') }}</span>
                        @endif
                      </div>
                    </div>
                   
                    <div class="col-12"> 
                      <hr/>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group"> 
                        <label class="form-label">موقعك الإلكتروني </label>
                        <input class="form-control" type="text" placeholder="www.capitalx.com" name="website" value="{{old('website')}}"/>
                        @if ($errors->has('website'))
                            <span class="text-danger">{{ $errors->first('website') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group"> 
                        <label class="form-label">موقع x  (تويتر)</label>
                        <input class="form-control" type="text" placeholder="twitter.com/CapitalX" name="twitter" value="{{old('twitter')}}"/>
                         @if ($errors->has('twitter'))
                            <span class="text-danger">{{ $errors->first('twitter') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group"> 
                        <label class="form-label">فيسبوك</label>
                        <input class="form-control" type="text" placeholder="Facebook.com/CapitalX" name="facebook" value="{{old('facebook')}}"/>
                         @if ($errors->has('facebook'))
                            <span class="text-danger">{{ $errors->first('facebook') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group"> 
                        <label class="form-label">يوتيوب</label>
                        <input class="form-control" type="text" placeholder="YouTube.com/CapitalX" name="youtube" value="{{old('youtube')}}"/>
                         @if ($errors->has('youtube'))
                            <span class="text-danger">{{ $errors->first('youtube') }}</span>
                        @endif
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
                        <input class="form-control required" type="text" placeholder="اسم مسئول التواصل " name="manager_name"/>
                         @if ($errors->has('manager_name'))
                            <span class="text-danger">{{ $errors->first('manager_name') }}</span>
                        @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="mb-2"> المنصب<span class="text-danger ms-1">*</span></label>
                        <select class="select2 form-control required" data-placeholder="اختر" name="position_id">
                            <option></option>
                            <option value="1">المنصب 1</option>
                            <option value="2">المنصب 2</option>
                        </select>
                        @if ($errors->has('position_id'))
                            <span class="text-danger">{{ $errors->first('position_id') }}</span>
                        @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="mb-2"> الجنسية<span class="text-danger ms-1">*</span></label>
                        <select class="select2 form-control required" data-placeholder="اختر" name="nationality_id">
                            <option></option>
                            <option value="1">الجنسية 1</option>
                            <option value="2">الجنسية 2</option>
                        </select>
                         @if ($errors->has('nationality_id'))
                            <span class="text-danger">{{ $errors->first('nationality_id') }}</span>
                        @endif
                        </div>
                    </div>
                  <div class="col-md-6">
                        <div class="form-group">
                          <label class="mb-2">رقم الجوال<span class="text-danger ms-1">*</span></label>
                          <div class="row flex-nowrap gx-2">
                            <div class="col">
                              <input class="form-control text-end" type="text" placeholder="00" name="manager_phone" value="{{old('manager_phone')}}"/>
                              @if ($errors->has('manager_phone'))
                                <span class="text-danger">{{ $errors->first('manager_phone') }}</span>
                                @endif
                            </div>
                            <div class="col-auto">
                              <select class="form-control  select2 " data-width="100px" data-placeholder="اختر" name="code">
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
                          <label class="mb-2">البريد الاكتروني</label>
                          <input class="form-control" type="text" placeholder="email@example.com" name="manager_email" value="{{old('manager_email')}}"/>
                        @if ($errors->has('manager_email'))
                            <span class="text-danger">{{ $errors->first('manager_email') }}</span>
                        @endif
                        </div>
                      </div>


                    <div class="col-12">
                      <div class="form-group text-end"> 
                          <button class="btn btn-primary btn-lg font-medium" type="submit">إنشاء الحساب</button>
                        {{-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#otpModal"> إنشاء حساب</button> --}}
                      </div>
                    </div>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end:: section -->   
</x-site.layout>