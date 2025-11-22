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
                  <form action="{{route('handle.register', App\Enums\UserTypeEnum::CONSULTANT)}}" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group"> 
                        <label class="mb-2">الإسم</label>
                        <input class="form-control" type="text" placeholder="أدخل الاسم" name="name" value="{{old('name')}}"/>
                          @if ($errors->has('name'))
                              <span class="text-danger">{{ $errors->first('name') }}</span>
                          @endif
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group"> 
                        <label class="mb-2">رقم الهوية الوطنية أو الإقامة</label>
                        <input class="form-control" type="text" placeholder="000000000000" name="id_number" value="{{old('id_number')}}"/>
                          @if ($errors->has('id_number'))
                              <span class="text-danger">{{ $errors->first('id_number') }}</span>
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
                        <label class="mb-2"> ﻧﻮع اﻟﻌﻤﻞ <span class="text-danger ms-1">*</span></label>
                        <select class="select2 form-control" data-placeholder="اختر" name="work_type_id">
                          <option></option>
                          <option value="1">اﻟﻌﻤﻞ 1</option>
                          <option value="2">اﻟﻌﻤﻞ 2</option>
                        </select>
                         @if ($errors->has('work_type_id'))
                              <span class="text-danger">{{ $errors->first('work_type_id') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="mb-2">الجنسية<span class="text-danger ms-1">*</span></label>
                        <select class="select2 form-control" data-placeholder="اختر" name="nationality_id">
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
                        <label class="mb-2">الجنس<span class="text-danger ms-1">*</span></label>
                        <select class="select2 form-control" data-placeholder="اختر" name="sex">
                          <option></option>
                          <option value="1">الجنس 1</option>
                          <option value="2">الجنس 2</option>
                        </select>
                        @if ($errors->has('sex'))
                              <span class="text-danger">{{ $errors->first('sex') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="mb-2">السكن<span class="text-danger ms-1">*</span></label>
                        <select class="select2 form-control" data-placeholder="اختر" name="place_type_id">
                          <option></option>
                          <option value="1">السكن 1</option>
                          <option value="2">السكن 2</option>
                        </select>
                        @if ($errors->has('place_type_id'))
                              <span class="text-danger">{{ $errors->first('place_type_id') }}</span>
                        @endif
                      </div>
                    </div>
                  
                  </div>
                  <div class="row"> 
                    <div class="col-12"> </div>
                  </div>
                  <div class="row"> 
                    <div class="col-12">
                      <div class="experience">
                        <div class="row align-items-end">
                          <div class="col-lg">
                            <div class="form-group">
                              <label class="mb-2"> اسم الخبرة<span class="text-danger ms-1">*</span></label>
                              <input class="form-control experience-name" type="text" placeholder="اختر"/>
                            </div>
                          </div>
                          <div class="col-lg">
                            <div class="form-group">
                              <label class="mb-2"> جهة العمل<span class="text-danger ms-1">*</span></label>
                              <input class="form-control experience-company" type="text" placeholder="اختر"/>
                            </div>
                          </div>
                          <div class="col-lg-auto">
                            <div class="form-group">
                              <button class="btn btn-primary add-experience" type="button">اضافة</button>
                            </div>
                          </div>
                        </div>
                        <div class="row"> 
                          <div class="col-12"> 
                            <div class="experience-list"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                     <div class="row"> 
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
        </section><!-- start:: modal -->   
</x-site.layout>