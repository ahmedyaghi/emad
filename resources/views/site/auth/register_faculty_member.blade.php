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
                  <form action="{{route('handle.register')}}" method="POST">
                  @csrf
                  <input type="hidden" name="type" value="{{App\Enums\UserType::FACULTY_MEMBER}}">
                  <div class="row">
                   <div class="col-lg-6">
                      <div class="form-group"> 
                        <label class="mb-2">الإسم <span class="text-danger ms-1">*</span></label>
                        <input class="form-control" type="text" placeholder="أدخل الاسم" name="name" value="{{old('name')}}"/>
                          @if ($errors->has('name'))
                              <span class="text-danger">{{ $errors->first('name') }}</span>
                          @endif
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group"> 
                        <label class="mb-2">رقم الهوية الوطنية أو الإقامة <span class="text-danger ms-1">*</span></label>
                        <input class="form-control" type="text" placeholder="000000000000" name="id_number" value="{{old('id_number')}}"/>
                          @if ($errors->has('id_number'))
                              <span class="text-danger">{{ $errors->first('id_number') }}</span>
                          @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label class="mb-2"> اﻟﺘﺨﺼﺺ<span class="text-danger ms-1">*</span></label>
                          <select class="select2 form-control" data-placeholder="اختر" name="specilization_id">
                            <option></option>
                            @foreach ($specializations as $specialization)
                              <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                            @endforeach
                          </select>
                          @if ($errors->has('specilization_id'))
                                <span class="text-danger">{{ $errors->first('specilization_id') }}</span>
                          @endif
                      </div>
                     </div>
                     <div class="col-md-6">
                      <div class="form-group">
                        <label class="mb-2">اﻟﻤﺪﻳﻨﺔ<span class="text-danger ms-1">*</span></label>
                        <select class="select2 form-control" data-placeholder="اختر" name="city_id">
                          <option></option>
                          @foreach ($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                          @endforeach
                        </select>
                        @if ($errors->has('city_id'))
                              <span class="text-danger">{{ $errors->first('city_id') }}</span>
                        @endif
                      </div>
                    </div>
                    {{-- <div class="col-md-6">
                      <div class="form-group">
                        <label class="mb-2"> سجل اﻟﺘﺠﺎري<span class="text-danger ms-1">*</span></label>
                        <select class="select2 form-control" data-placeholder="اختر">
                          <option></option>
                          <option value="1">سجل اﻟﺘﺠﺎري 1</option>
                          <option value="2">سجل اﻟﺘﺠﺎري 2</option>
                        </select>
                      </div>
                    </div> --}}
                    {{-- <div class="col-md-6">
                      <div class="form-group">
                        <label class="mb-2"> ﺗﺼﺮﻳﺢ اﻟﺠﻤﻌﻴﺔ<span class="text-danger ms-1">*</span></label>
                        <input class="form-control" type="text" placeholder="اختر"/>
                      </div>
                    </div> --}}
                    {{-- <div class="col-12">
                      <div class="form-group"> 
                        <label class="form-label">ﻧﺒﺬة<span class="text-danger">*</span></label>
                        <textarea class="form-control" type="text" placeholder="أدخل وصف اﻟﺠﻤﻌﻴﺔ..." rows="5"></textarea>
                      </div>
                    </div> --}}
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="mb-2"> القطاع<span class="text-danger ms-1">*</span></label>
                        <select class="select2 form-control" data-placeholder="اختر" name="section_type_id">
                          <option></option>
                          @foreach ($section_types as $section_type)
                            <option value="{{$section_type->id}}">{{$section_type->name}}</option>
                          @endforeach
                        </select>
                        @if ($errors->has('section_type_id'))
                              <span class="text-danger">{{ $errors->first('section_type_id') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="mb-2">الدولة <span class="text-danger ms-1">*</span></label>
                        <select class="select2 form-control" data-placeholder="اختر"  name="country_id">
                          <option></option>
                          @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                          @endforeach
                        </select>
                         @if ($errors->has('country_id'))
                              <span class="text-danger">{{ $errors->first('country_id') }}</span>
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
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                     <div class="col-md-6">
                        <div class="form-group"> 
                          <label class="mb-2"> البريد الاكتروني <span class="text-danger ms-1">*</span></label>
                          <input class="form-control" type="text" placeholder="email@example.com" name="email" value="{{old('email')}}"/>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        </div>
                      </div>

                        <div class="col-md-6">
                        <div class="form-group"> 
                          <label class="mb-2">كلمة المرور <span class="text-danger ms-1">*</span></label>
                          <input class="form-control" type="password" placeholder="****************" name="password" />
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group"> 
                          <label class="mb-2">تأكيد كلمة المرور <span class="text-danger ms-1">*</span></label>
                          <input class="form-control" type="password" placeholder="****************" name="password_confirmation" />
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
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
                    <div class="col-12">
                      <div class="form-group text-end"> 
                          <button class="btn btn-primary btn-lg font-medium" type="submit">إنشاء الحساب</button>
                        {{-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#otpModal"> إنشاء حساب</button> --}}
                      </div>
                    </div>
                  </div>
                  </form>
                   @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end:: section -->   
</x-site.layout>