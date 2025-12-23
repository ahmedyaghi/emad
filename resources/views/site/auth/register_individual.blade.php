<x-site.layout :internal="false">
    <!-- start:: section -->  
       <section class="section section-bg-light">
          <div class="container"> 
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="section-content">
                  <div class="row mb-2">
                    <div class="col-12">
                      <div class="border-bottom pb-4 mb-4">
                        <h2 class="font-bold mb-3">إنشاء حساب جديد</h2>
                        <h5 class="mb-2">املأ النموذج أدناه ليتم تسجيل حساب جديد والانضمام إلى منصة عماد.</h5>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <form action="{{route('handle.register')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="{{App\Enums\UserType::INDIVIDUAL}}">
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
                          <div class="col-lg-6">
                            <div class="form-group"> 
                              <label class="mb-2">العمر</label>
                              <input class="form-control" type="text" placeholder="00" name="age" value="{{old('age')}}"/>
                                @if ($errors->has('age'))
                                    <span class="text-danger">{{ $errors->first('age') }}</span>
                                @endif
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="mb-2"> الجنس</label>
                              <select class="select2 form-control" data-placeholder="اختر" name="gender">
                                <option></option>
                                <option value="1">ذكر</option>
                                <option value="2">انثى</option>
                              </select>
                               @if ($errors->has('gender'))
                                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                                @endif
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="mb-2"> اﻟﺠﺎﻣﻌﺔ<span class="text-danger ms-1">*</span></label>
                              <select class="select2 form-control" data-placeholder="اختر" name="university_id">
                                <option></option>
                                @foreach ($univerisities as $university)
                                  <option value="{{$university->id}}">{{$university->name}}</option>
                                @endforeach
                              </select>
                               @if ($errors->has('university_id'))
                                    <span class="text-danger">{{ $errors->first('university_id') }}</span>
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
                              <label class="mb-2">اﻟﻤﺪﻳﻨﺔ</label>
                              <select class="select2 form-control" data-placeholder="اختر" name="city_id" id="city_id">
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
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="mb-2"> اﻟﺤﻲ</label>
                              <select class="select2 form-control" data-placeholder="اختر" name="neighborhood_id" id="neighborhood_id">
                                <option></option>
                              </select>
                               @if ($errors->has('neighborhood_id'))
                                    <span class="text-danger">{{ $errors->first('neighborhood_id') }}</span>
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
                                    <option value="+966" selected>966</option>
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
                              <label class="mb-2">كلمة المرور</label>
                             <input class="form-control" type="password" placeholder="****************" name="password" />
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group"> 
                              <label class="mb-2">تأكيد كلمة المرور</label>
                             <input class="form-control" type="password" placeholder="****************" name="password_confirmation" />
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group"> 
                              <label class="mb-2">حسابك في لينكدان (LinkedIn)</label>
                              <input class="form-control" type="text" placeholder="حسابك في لينكدان (LinkedIn)" name="linkedin" value="{{old('linkedin')}}"/>
                              @if ($errors->has('linkedin'))
                                <span class="text-danger">{{ $errors->first('linkedin') }}</span>
                            @endif
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="mb-2">اﻟﻤﻬـﺎرات</label>
                              <select class="select2 form-control" data-placeholder="اختر" name="skill_id">
                                <option></option>
                                @foreach ($skills as $skill)
                                  <option value="{{$skill->id}}">{{$skill->name}}</option>
                                @endforeach
                              </select>
                              @if ($errors->has('skill_id'))
                                <span class="text-danger">{{ $errors->first('skill_id') }}</span>
                            @endif
                            </div>
                          </div>
                          {{-- <div class="col-md-6">
                            <div class="form-group">
                              <label class="mb-2"> الدورات اﻟﺘـﺪرﻳﺒﻴـﺔ</label>
                              <select class="select2 form-control" data-placeholder="اختر" name="course_id">
                                <option></option>
                                <option value="1">الدورات اﻟﺘـﺪرﻳﺒﻴـﺔ 1</option>
                                <option value="2">الدورات اﻟﺘـﺪرﻳﺒﻴـﺔ 2</option>
                              </select>
                              @if ($errors->has('course_id'))
                                <span class="text-danger">{{ $errors->first('course_id') }}</span>
                            @endif
                            </div>
                          </div> --}}
                          <div class="col-12">
                            <div class="form-group"> 
                              <div class="upload-box">
                                <input id="fileInput" type="file" accept=".pdf,.doc,.docx"/>
                                <div class="upload-placeholder"><img class="mb-3" src="{{asset('assets/images/upload.svg')}}"/>
                                  <h3 class="font-bold mb-2 text-main">اسحب وأفلِت أو اختر الملف الذي تريد تحميله</h3>
                                  <h6 class="mb-2 text-sub">الحد الأقصى للحجم 5 ميجا بايت</h6>
                                </div>
                                <div class="file-list"></div>
                              </div>
                              @if ($errors->has('file'))
                                <span class="text-danger">{{ $errors->first('file') }}</span>
                            @endif
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group mb-0 text-lg-end text-center">
                                <button class="btn btn-primary btn-lg font-medium" type="submit">إنشاء الحساب</button>
                              {{-- <button class="btn btn-primary btn-lg font-medium" type="button" data-bs-toggle="modal" data-bs-target="#otpModal">إنشاء حساب</button> --}}
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end:: section --> 

 @section('scripts')
    <script>
        $(document).ready(function() {
            $('#city_id').on('change', function() {
                var cityId = $(this).val();
                var url = "{{ route('cities.neighborhoods', ':city') }}";
                url = url.replace(':city', cityId);

                if(cityId) {
                    $.ajax({
                        url: url,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#neighborhood_id').empty().append('<option value="">اختر الحي</option>');
                            $.each(data, function(key, value) {
                                $('#neighborhood_id').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                            });
                            $('#neighborhood_id').trigger('change.select2'); 
                        }
                    });
                } else {
                    $('#neighborhood_id').empty().append('<option value="">اختر الحي</option>');
                    $('#neighborhood_id').trigger('change.select2');
                }
            });
        });
    </script>
    @endsection
</x-site.layout>