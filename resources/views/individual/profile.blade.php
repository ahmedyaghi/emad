<x-common.layout>
      <div class="pannel">
            <div class="row"> 
              <div class="col-lg-6">
                <div class="widget_item-card">
                  <div class="d-flex align-items-start justify-content-between">
                    <div class="profile-completion mb-4">
                      <div class="profile-image"><img src="{{$user->profile->image}}" alt=""/></div>
                      <div class="profile-percentage text-white font-semi-bold">76%</div>
                      <div class="profile-progress"><img src="{{asset('assets/images/circle.png')}}" alt=""/></div>
                    </div><a class="btn btn-white btn-icon border-0 rounded-pill" href=""><img src="{{asset('assets/images/edit.svg')}}" alt=""/></a>
                  </div>
                  <h3 class="mb-3 font-semi-bold">{{$user->name}}</h3>
                  <h6>{{$user->getType()}}</h6>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card-profile d-flex align-items-start"> 
                  <div class="col-auto me-3">
                    <div class="circle-progress circle-small" id="graph" data-percent="70">
                      <div class="total-result">70%</div>
                    </div>
                  </div>
                  <div class="col-lg-9">
                    <h4 class="mb-3 font-bold">أستكمل ملفك الشخصي</h4>
                    <h6 class="mb-3">استكمالك لملفك الشخصي يساعدنا في ترشيح الوظائف الأنسب لك، ويزيد من فرص قبولك لدى الجهات. أضف معلوماتك الشخصية، مؤهلاتك، وخبراتك العملية لتظهر بشكل احترافي أمام أصحاب العمل.</h6><a class="btn btn-primary px-4" href="">أستكمل ملفك الشخصي </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="pannel">
                  <h5 class="mb-3 font-bold">التقييمات </h5>
                  <hr/>
                  <div class="row"> 
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="d-flex align-items-center justify-content-between">
                          <h4 class="font-semi-bold">اسم التقييم</h4>
                          <div class="col-auto"> 
                            <h6 class="font-12 accepted-text accepted-bg px-4 py-2 rounded-2">ممتاز</h6>
                          </div>
                        </div>
                        <hr/>
                        <div class="d-flex align-items-start">
                          <div class="col-auto me-3"><img src="{{asset('assets/images/calendar.svg')}}" alt=""/></div>
                          <div class="col">
                            <h6 class="font-light mb-1 text-gray">تاريخ التقييم</h6>
                            <h6 class="font-12 font-semi-bold">8 مارس 1993</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="d-flex align-items-center justify-content-between">
                          <h4 class="font-semi-bold">اسم التقييم</h4>
                          <div class="col-auto"> 
                            <h6 class="font-12 accepted-text accepted-bg px-4 py-2 rounded-2">ممتاز</h6>
                          </div>
                        </div>
                        <hr/>
                        <div class="d-flex align-items-start">
                          <div class="col-auto me-3"><img src="{{asset('assets/images/calendar.svg')}}" alt=""/></div>
                          <div class="col">
                            <h6 class="font-light mb-1 text-gray">تاريخ التقييم</h6>
                            <h6 class="font-12 font-semi-bold">8 مارس 1993</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="d-flex align-items-center justify-content-between">
                          <h4 class="font-semi-bold">اسم التقييم</h4>
                          <div class="col-auto"> 
                            <h6 class="font-12 accepted-text accepted-bg px-4 py-2 rounded-2">ممتاز</h6>
                          </div>
                        </div>
                        <hr/>
                        <div class="d-flex align-items-start">
                          <div class="col-auto me-3"><img src="{{asset('assets/images/calendar.svg')}}" alt=""/></div>
                          <div class="col">
                            <h6 class="font-light mb-1 text-gray">تاريخ التقييم</h6>
                            <h6 class="font-12 font-semi-bold">8 مارس 1993</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row"> 
              <div class="col-12">
                <div class="pannel">
                  <h5 class="mb-3 font-bold">الملاحظات </h5>
                  <hr/>
                  <div class="row"> 
                    <div class="col-lg-4">
                      <div class="card">
                        <h5 class="font-semi-bold mb-2">عنوان الملاحظة</h5>
                        <h6 class="font-12 text-gray lh-lg">استكمالك لملفك الشخصي يساعدنا في ترشيح الوظائف الأنسب لك، ويزيد من فرص قبولك لدى الجهات. أضف معلوماتك الشخصية، مؤهلاتك، وخبراتك العملية لتظهر بشكل احترافي أمام أصحاب العمل.</h6>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card">
                        <h5 class="font-semi-bold mb-2">عنوان الملاحظة</h5>
                        <h6 class="font-12 text-gray lh-lg">استكمالك لملفك الشخصي يساعدنا في ترشيح الوظائف الأنسب لك، ويزيد من فرص قبولك لدى الجهات. أضف معلوماتك الشخصية، مؤهلاتك، وخبراتك العملية لتظهر بشكل احترافي أمام أصحاب العمل.</h6>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card">
                        <h5 class="font-semi-bold mb-2">عنوان الملاحظة</h5>
                        <h6 class="font-12 text-gray lh-lg">استكمالك لملفك الشخصي يساعدنا في ترشيح الوظائف الأنسب لك، ويزيد من فرص قبولك لدى الجهات. أضف معلوماتك الشخصية، مؤهلاتك، وخبراتك العملية لتظهر بشكل احترافي أمام أصحاب العمل.</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-4"> 
            <div class="col-12">
              <div class="profile-nav">
                <ul class="nav nav-pills mb-3 gap-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-1" type="button" role="tab">البيانات الشخصية</button>
                  </li>
                  <li class="nav-item">
                    <button class="nav-link " data-bs-toggle="pill" data-bs-target="#tab-2" type="button" role="tab">المؤهلات</button>
                  </li>
                  <li class="nav-item">
                    <button class="nav-link " data-bs-toggle="pill" data-bs-target="#tab-3" type="button" role="tab">الخبرات</button>
                  </li>
                  <li class="nav-item">
                    <button class="nav-link " data-bs-toggle="pill" data-bs-target="#tab-4" type="button" role="tab">المعلومات المالية</button>
                  </li>
                  <li class="nav-item">
                    <button class="nav-link " data-bs-toggle="pill" data-bs-target="#tab-5" type="button" role="tab">المرفقات</button>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row mb-4"> 
            <div class="col-12">
              <div class="pannel">
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="tab-1">
                    <h5 class="mb-3 font-bold">البيانات الشخصية</h5>
                    <hr/>
                    <div class="row"> 
                      <div class="col-lg-3 col-md-4 col-6 mb-4">
                        <div class="d-flex align-items-start">
                          <div class="col-auto me-3"><img src="{{asset('assets/images/globe.svg')}}" alt=""/></div>
                          <div class="col">
                            <h6 class="font-light mb-1 text-gray">الجنسية</h6>
                            <h6 class="font-12 font-semi-bold">{{$user->profile?->nationality?->name}}</h6>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-4 col-6 mb-4">
                        <div class="d-flex align-items-start">
                          <div class="col-auto me-3"><img src="{{asset('assets/images/passport.svg')}}" alt=""/></div>
                          <div class="col">
                            <h6 class="font-light mb-1 text-gray">رقم الهوية</h6>
                            <h6 class="font-12 font-semi-bold">{{$user->id_number}}</h6>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-4 col-6 mb-4">
                        <div class="d-flex align-items-start">
                          <div class="col-auto me-3"><img src="{{asset('assets/images/calendar.svg')}}" alt=""/></div>
                          <div class="col">
                            <h6 class="font-light mb-1 text-gray">تاريخ الميلاد</h6>
                            <h6 class="font-12 font-semi-bold">{{$user->profile?->date_of_birth}}</h6>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-4 col-6 mb-4">
                        <div class="d-flex align-items-start">
                          <div class="col-auto me-3"><img src="{{asset('assets/images/graduate-male.svg')}}" alt=""/></div>
                          <div class="col">
                            <h6 class="font-light mb-1 text-gray">الجنس</h6>
                            <h6 class="font-12 font-semi-bold">{{$user->profile?->getGenderLabel()}}</h6>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-4 col-6 mb-4">
                        <div class="d-flex align-items-start">
                          <div class="col-auto me-3"><img src="{{asset('assets/images/mail.svg')}}" alt=""/></div>
                          <div class="col">
                            <h6 class="font-light mb-1 text-gray">البريد الالكتروني</h6>
                            <h6 class="font-12 font-semi-bold">{{$user->email}}</h6>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-4 col-6 mb-4">
                        <div class="d-flex align-items-start">
                          <div class="col-auto me-3"><img src="{{asset('assets/images/call.svg')}}" alt=""/></div>
                          <div class="col">
                            <h6 class="font-light mb-1 text-gray">رقم الجوال</h6>
                            <h6 class="font-12 font-semi-bold">{{$user->phone}}</h6>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-4 col-6 mb-4">
                        <div class="d-flex align-items-start">
                          <div class="col-auto me-3"><img src="{{asset('assets/images/city2.svg')}}" alt=""/></div>
                          <div class="col">
                            <h6 class="font-light mb-1 text-gray">المدينة</h6>
                            <h6 class="font-12 font-semi-bold">{{$user->profile?->city?->name}}</h6>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-4 col-6 mb-4">
                        <div class="d-flex align-items-start">
                          <div class="col-auto me-3"><img src="{{asset('assets/images/city.svg')}}" alt=""/></div>
                          <div class="col">
                            <h6 class="font-light mb-1 text-gray">المنطقة</h6>
                            <h6 class="font-12 font-semi-bold">{{$user->profile?->country?->name}}</h6>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-4 col-6 mb-4">
                        <div class="d-flex align-items-start">
                          <div class="col-auto me-3"><img src="{{asset('assets/images/building2.svg')}}" alt=""/></div>
                          <div class="col">
                            <h6 class="font-light mb-1 text-gray">الحي</h6>
                            <h6 class="font-12 font-semi-bold">{{$user->profile?->neighborhood?->name}}</h6>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-4 col-6 mb-4">
                        <div class="d-flex align-items-start">
                          <div class="col-auto me-3"><img src="{{asset('assets/images/road.svg')}}" alt=""/></div>
                          <div class="col">
                            <h6 class="font-light mb-1 text-gray">اسم الشارع</h6>
                            <h6 class="font-12 font-semi-bold">{{$user->profile?->street_name}}</h6>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-4 col-6 mb-4">
                        <div class="d-flex align-items-start">
                          <div class="col-auto me-3"><img src="{{asset('assets/images/distribution.svg')}}" alt=""/></div>
                          <div class="col">
                            <h6 class="font-light mb-1 text-gray">الرمز البريدي</h6>
                            <h6 class="font-12 font-semi-bold">{{$user->profile?->postal_code}}</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab-2">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                      <h5 class="font-bold">المؤهلات</h5><a class="btn btn-primary px-4" href="" data-bs-toggle="modal" data-bs-target="#academicModal">اضافة مؤهل </a>
                    </div>
                    <hr/>
                    @if(!$user_qualifications->isEmpty())
                    @foreach ($user_qualifications as $qualification)
                      <div class="qualification-card mb-3 p-3">
                      <div class="d-lg-flex align-items-center">
                        <div class="qualification-details w-100 row gx-2 mb-2 mb-lg-0">
                          <div class="col-lg col-4 mb-4 mb-lg-0">
                            <h6 class="mb-2 font-bold font-12">المؤهل العلمي</h6>
                            <h6 class="font-light text-gray font-12">{{$qualification->qualification->name}}</h6>
                          </div>
                          <div class="col-lg col-4 mb-4 mb-lg-0">
                            <h6 class="mb-2 font-bold font-12">التخصص</h6>
                            <h6 class="font-light text-gray font-12">{{$qualification->specialization->name}}</h6>
                          </div>
                          <div class="col-lg col-4 mb-4 mb-lg-0">
                            <h6 class="mb-2 font-bold font-12">الجهة التعليمية</h6>
                            <h6 class="font-light text-gray font-12">{{$qualification->university->name}}</h6>
                          </div>
                          <div class="col-lg col-4 mb-4 mb-lg-0">
                            <h6 class="mb-2 font-bold font-12">سنة التخرج</h6>
                            <h6 class="font-light text-gray font-12">{{$qualification->graduation_year}}</h6>
                          </div>
                          <div class="col-lg col-4 mb-4 mb-lg-0">
                            <h6 class="mb-2 font-bold font-12">التقدير</h6>
                            <h6 class="font-light text-gray font-12"> {{$qualification->grade->name}}</h6>
                          </div>
                        </div>
                        <div class="action-buttons ms-4 d-flex gap-3 col-auto">
                          <button class="btn btn-white border-0 btn-icon edit-qualification"
                              data-bs-toggle="modal"
                              data-bs-target="#academicModal"
                              data-id="{{ $qualification->id }}"
                              data-qualification="{{ $qualification->qualification_id }}"
                              data-specialization="{{ $qualification->specialization_id }}"
                              data-university="{{ $qualification->university_id }}"
                              data-year="{{ $qualification->graduation_year }}"
                              data-grade="{{ $qualification->grade_id }}">
                              <img src="{{asset('assets/images/edit2.svg')}}" alt=""/></button>
                          <button class="btn btn-white border-0 btn-icon"><img src="{{asset('assets/images/delete.svg')}}" alt=""/></button>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    @endif
                  </div>
                  <div class="tab-pane fade" id="tab-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                      <h5 class="font-bold">الخبرات</h5><a class="btn btn-primary px-4" href="" data-bs-toggle="modal" data-bs-target="#experienceModal">اضافة الخبرات </a>
                    </div>
                    <hr/>
                    @if(!$user_experiences->isEmpty())
                    @foreach ($user_experiences as $experience)
                      <div class="qualification-card mb-3 p-3">
                      <div class="d-lg-flex align-items-center">
                        <div class="qualification-details w-100 row gx-2 mb-2 mb-lg-0">
                          <div class="col-lg col-4 mb-4 mb-lg-0">
                            <h6 class="mb-2 font-bold font-12">المسمي الوظيفي</h6>
                            <h6 class="font-light text-gray font-12">{{$experience->position->name}}</h6>
                          </div>
                          <div class="col-lg col-4 mb-4 mb-lg-0">
                            <h6 class="mb-2 font-bold font-12">الجهة</h6>
                            <h6 class="font-light text-gray font-12">{{$experience->company_name}}</h6>
                          </div>
                          <div class="col-lg col-4 mb-4 mb-lg-0">
                            <h6 class="mb-2 font-bold font-12">الفترة</h6>
                            <h6 class="font-light text-gray font-12">{{$experience->start_date}} - {{$experience->end_date}}</h6>
                          </div>
                          <div class="col-lg col-4 mb-4 mb-lg-0">
                            <h6 class="mb-2 font-bold font-12">الموقع</h6>
                            <h6 class="font-light text-gray font-12">{{$experience->city->name}}</h6>
                          </div>
                        </div>
                        <div class="action-buttons ms-4 d-flex gap-3 col-auto">
                          <button class="btn btn-white border-0 btn-icon edit-experience"
                                   data-bs-toggle="modal"
                                  data-bs-target="#experienceModal"
                                  data-id="{{ $experience->id }}"
                                  data-position="{{ $experience->position_id }}"
                                  data-company="{{ $experience->company_name }}"
                                  data-city="{{ $experience->city_id }}"
                                  data-start="{{ $experience->start_date }}"
                                  data-end="{{ $experience->end_date }}"><img src="{{asset('assets/images/edit2.svg')}}" alt=""/></button>
                          <button class="btn btn-white border-0 btn-icon"><img src="{{asset('assets/images/delete.svg')}}" alt=""/></button>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    @endif
                  </div>
                  <div class="tab-pane fade" id="tab-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                      <h5 class="font-bold">المعلومات المالية</h5>
                    </div>
                    <hr/>
                    <div class="qualification-card mb-3 p-3">
                      <div class="d-lg-flex align-items-center">
                        <div class="qualification-details w-100 row gx-2 mb-2 mb-lg-0">
                          <div class="col-lg col-4 mb-4 mb-lg-0">
                            <h6 class="mb-2 font-bold font-12">رقم الايبان</h6>
                            <h6 class="font-light text-gray font-12">2189 0239 0132 9888</h6>
                          </div>
                          <div class="col-lg col-4 mb-4 mb-lg-0">
                            <h6 class="mb-2 font-bold font-12">اسم البنك</h6>
                            <h6 class="font-light text-gray font-12">الراجحي</h6>
                          </div>
                          <div class="col-lg col-4 mb-4 mb-lg-0">
                            <h6 class="mb-2 font-bold font-12">اسم صاحب الحساب البنكي</h6>
                            <h6 class="font-light text-gray font-12">عبدالله محمد الحربي</h6>
                          </div>
                          <div class="col-lg col-4 mb-4 mb-lg-0">
                            <h6 class="mb-2 font-bold font-12">رقم هوية صاحب الحساب البنكي</h6>
                            <h6 class="font-light text-gray font-12"> 90127903891</h6>
                          </div>
                        </div>
                        <div class="action-buttons ms-4 d-flex gap-3 col-auto">
                          <button class="btn btn-white border-0 btn-icon"><img src="{{asset('assets/images/edit2.svg')}}" alt=""/></button>
                          <button class="btn btn-white border-0 btn-icon"><img src="{{asset('assets/images/delete.svg')}}" alt=""/></button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab-5">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                      <h5 class="font-bold">المرفقات</h5><a class="btn btn-primary px-4" href="" data-bs-toggle="modal" data-bs-target="#cvModal">اضافة مرفق </a>
                    </div>
                    <hr/>
                    @if(!$user_attachments->isEmpty())
                    @foreach ($user_attachments as $attachment)
                    <div class="qualification-card mb-3 p-3">
                      <div class="d-lg-flex align-items-center">
                        <div class="qualification-details w-100 row gx-2 mb-2 mb-lg-0">
                          <div class="col-lg col-4 mb-4 mb-lg-0">
                            <div class="d-flex align-items-center">
                              <div class="bg-white p-2 rounded"><img src="{{asset('assets/images/pdf-file.svg')}}" alt=""/></div>
                              <div class="ms-3">
                                <h6 class="mb-2 font-bold font-12">{{$attachment->title}}</h6>
                                <h6 class="font-light text-gray font-12">2.67 ميجابايت </h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="action-buttons ms-4 d-flex gap-3 col-auto">
                          <button class="btn btn-white border-0 btn-icon"><img src="{{asset('assets/images/edit2.svg')}}" alt=""/></button>
                          <button class="btn btn-white border-0 btn-icon"><img src="{{asset('assets/images/delete.svg')}}" alt=""/></button>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- start:: modal -->
          <div class="modal fade" id="academicModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content border-0">
                <div class="modal-header flex-column align-items-start">
                  <h3 class="mb-2 font-semi-bold">إضافة مؤهل علمي جديد</h3>
                  <h6 class="text-gray">أدخل بيانات مؤهلك العلمي بدقة لعرضها ضمن ملفك الشخصي. تساعد المؤهلات الجهات في تقييم مدى توافقك مع الوظائف المتاحة.</h6>
                </div>
                <div class="modal-body p-0">
                  <form action="{{route('individual.profile.add.qualification')}}" method="POST" id="qualificationForm">
                    @csrf 
                      <input type="hidden" name="qualification_form_id" id="qualification_form_id">
                    <div class="row">
                      <div class="col-12">
                        <div class="p-4">
                          <div class="row"> 
                            @if(!$qualifications->isEmpty())
                            <div class="col-12">
                              <div class="form-group"> 
                                <label class="form-label">نوع المؤهل <span class="text-danger">* </span></label>
                                <select class="select2" data-placeholder="بكالوريوس / دبلوم / ثانوية عامة / شهادة مهنية " name="qualification_id">
                                  <option value="">اختر</option>
                                  @foreach ($qualifications as $qualification)
                                    <option value="{{$qualification->id}}">{{$qualification->name}}</option>
                                  @endforeach
                                </select>
                                 @error('qualification_id')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>
                            @endif
                            @if(!$specializations->isEmpty())
                            <div class="col-lg-6">
                              <div class="form-group"> 
                                <label class="form-label">التخصص الدراسي <span class="text-danger">* </span></label>
                                <select class="select2" data-placeholder="اختر" name="specialization_id">
                                  <option value="">اختر</option>
                                  @foreach ($specializations as $specialization)
                                    <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                                  @endforeach
                                </select>
                                 @error('specialization_id')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>
                           @endif
                           @if(!$universities->isEmpty())
                            <div class="col-lg-6">
                              <div class="form-group"> 
                                <label class="form-label">الجهة التعليمية  <span class="text-danger">* </span></label>
                                <select class="select2" data-placeholder="اختر الجهة" name="university_id">
                                    <option value="">اختر</option>
                                    @foreach ($universities as $university)
                                      <option value="{{$university->id}}">{{$university->name}}</option>
                                    @endforeach
                                </select>
                                @error('university_id')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>
                            @endif
                            <div class="col-lg-6">
                              <div class="form-group"> 
                                <label class="form-label">سنة التخرج <span class="text-danger">* </span></label>
                                <input class="form-control yearpicker" type="text" placeholder="اختر سنة التخرج" name="graduation_year"/>
                                @error('graduation_year')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>
                            @if(!$grades->isEmpty())
                            <div class="col-lg-6">
                              <div class="form-group"> 
                                <label class="form-label">التقدير <span class="text-danger">* </span></label>
                                <select class="select2" data-placeholder="اختر" name="grade_id">
                                  <option value="">اختر</option>
                                    @foreach ($grades as $grade)
                                      <option value="{{$grade->id}}">{{$grade->name}}</option>
                                    @endforeach
                                </select>
                                 @error('grade_id')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>
                             @endif
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="modal-footer d-flex align-items-center justify-content-between"> 
                          <button class="btn btn-white" type="button" data-bs-dismiss="modal">إلغاء</button>
                          <button class="btn btn-primary action_button" type="submit">إضافة</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- end:: modal -->

          <!-- start:: modal -->
          <div class="modal fade" id="experienceModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content border-0">
                <div class="modal-header flex-column align-items-start">
                  <h3 class="mb-2 font-semi-bold">إضافة الخبرات</h3>
                  <h6 class="text-gray">أضف خبراتك السابقة في العمل، سواء كانت موسمية أو دائمة. تساعد الخبرات الجهات في التعرف على مهاراتك العملية ومدى جاهزيتك للوظائف المعروضة.</h6>
                </div>
                <div class="modal-body p-0">
                  <form action="{{route('individual.profile.add.experience')}}" method="POST" id="experienceForm">
                    @csrf 
                    <input type="hidden" name="experience_form_id" id="experience_form_id">

                    <div class="row">
                      <div class="col-12">
                        <div class="p-4">
                          <div class="row"> 
                            <div class="col-12">
                              <div class="form-group"> 
                                <label class="form-label">المسمى الوظيفي <span class="text-danger">* </span></label>
                                <select class="select2" data-placeholder="اختر" name="position_id">
                                  <option value="">اختر</option>
                                  @foreach ($positions as $position)
                                    <option value="{{$position->id}}">{{$position->name}}</option>
                                  @endforeach
                                </select>
                                 @error('position_id')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group"> 
                                <label class="form-label">اسم الجهة  <span class="text-danger">* </span></label>
                               <input class="form-control" type="text" placeholder="اختر اسم الجهة" name="company_name"/>
                                @error('company_name')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group"> 
                                <label class="form-label">موقع العمل <span class="text-danger">* </span></label>
                                <select class="select2" data-placeholder="اختر" name="city_id">
                                  <option value="">اختر</option>
                                  @foreach ($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                  @endforeach
                                </select>
                                 @error('city_id')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group"> 
                                <label class="form-label">فترة العمل من <span class="text-danger">* </span></label>
                                <input class="form-control datepicker_db" type="text" placeholder="فترة العمل من" name="start_date"/>
                                @error('start_date')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group"> 
                                <label class="form-label">فترة العمل الى <span class="text-danger">* </span></label>
                                <input class="form-control datepicker_db" type="text" placeholder="فترة العمل الى" name="end_date"/>
                                @error('end_date')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="modal-footer d-flex align-items-center justify-content-between"> 
                          <button class="btn btn-white" type="button" data-bs-dismiss="modal">إلغاء</button>
                          <button class="btn btn-primary action_button" type="submit">إضافة</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- end:: modal -->

          <!-- start:: modal -->
          <div class="modal fade" id="cvModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content border-0">
                <div class="modal-header flex-column align-items-start">
                  <h3 class="mb-2 font-semi-bold">اضافة السيرة الذاتية</h3>
                  <h6 class="text-gray">أرفق سيرتك الذاتية لتُعرض ضمن ملفك الشخصي، مما يساعد الجهات في تقييم خبراتك ومهاراتك بشكل احترافي. يُفضل رفع الملف بصيغة PDF وبحجم لا يتجاوز 5 ميغابايت.</h6>
                </div>
                <div class="modal-body p-0">
                   <form action="{{route('individual.profile.add.attachment')}}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="row">

                      <div class="col-lg-12">
                        <div class="p-4">
                        <div class="form-group"> 
                          <label class="form-label">عنوان المرفق<span class="text-danger">* </span></label>
                          <input class="form-control" type="text" placeholder="عنوان المرفق" name="title"/>
                          @error('title')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="p-4">
                          <div class="form-group"> 
                            <label class="form-label">السيرة الذاتية</label>
                            <div class="upload-box">
                              <input id="fileInput" type="file" accept=".pdf,.doc,.docx" name="file"/>
                              <div class="upload-placeholder"><img class="mb-3" src="{{asset('assets/images/upload.svg')}}"/>
                                <h3 class="font-bold mb-2 text-main">اسحب وأفلِت أو اختر الملف الذي تريد تحميله</h3>
                                <h6 class="mb-2 text-sub">الحد الأقصى للحجم 5 ميجا بايت</h6>
                              </div>
                              <div class="file-list"></div>
                            </div>
                            @error('file')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="modal-footer d-flex align-items-center justify-content-between"> 
                          <button class="btn btn-white" type="button" data-bs-dismiss="modal">إلغاء</button>
                          <button class="btn btn-primary" type="submit">إضافة</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div><!-- end:: modal -->

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.edit-qualification').forEach(button => {
      button.addEventListener('click', function () {

        document.querySelector('#academicModal h3').innerText = 'تعديل المؤهل العلمي';
        document.querySelector('#academicModal .action_button').innerText = 'تعديل ';

        let form = document.getElementById('qualificationForm');
        form.action = "{{ route('individual.profile.update.qualification') }}";

        document.getElementById('qualification_form_id').value = this.dataset.id;
        document.querySelector('[name="qualification_id"]').value = this.dataset.qualification;
        document.querySelector('[name="specialization_id"]').value = this.dataset.specialization;
        document.querySelector('[name="university_id"]').value = this.dataset.university;
        document.querySelector('[name="graduation_year"]').value = this.dataset.year;
        document.querySelector('[name="grade_id"]').value = this.dataset.grade;

        $('.select2').trigger('change');
      });
    });

    document.getElementById('academicModal').addEventListener('hidden.bs.modal', function () {

      document.querySelector('#academicModal h3').innerText = 'إضافة مؤهل علمي جديد';
      document.querySelector('#academicModal .action_button').innerText = 'إضافة ';

      let form = document.getElementById('qualificationForm');
      form.action = "{{ route('individual.profile.add.qualification') }}";
      form.reset();

      $('.select2').val(null).trigger('change');

    });


    document.querySelectorAll('.edit-experience').forEach(button => {
      button.addEventListener('click', function () {

        document.querySelector('#experienceModal h3').innerText = 'تعديل الخبرة';
        document.querySelector('#experienceModal .action_button').innerText = 'تعديل';

        let form = document.getElementById('experienceForm');
        form.action = "{{ route('individual.profile.update.experience') }}";

        document.getElementById('experience_form_id').value = this.dataset.id;
        document.querySelector('[name="position_id"]').value = this.dataset.position;
        document.querySelector('[name="company_name"]').value = this.dataset.company;
        document.querySelector('[name="city_id"]').value = this.dataset.city;
        document.querySelector('[name="start_date"]').value = this.dataset.start;
        document.querySelector('[name="end_date"]').value = this.dataset.end;

        $('.select2').trigger('change');
      });
    });

    document.getElementById('experienceModal').addEventListener('hidden.bs.modal', function () {

      document.querySelector('#experienceModal h3').innerText = 'إضافة الخبرات';
      document.querySelector('#experienceModal .action_button').innerText = 'إضافة';

      let form = document.getElementById('experienceForm');
      form.action = "{{ route('individual.profile.add.experience') }}";
      form.reset();

      $('.select2').val(null).trigger('change');
    });


  });
</script>

@endsection
</x-common.layout>