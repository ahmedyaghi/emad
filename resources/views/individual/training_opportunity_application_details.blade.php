<x-common.layout>
     <div class="row mb-4">
            <div class="col-lg-8">
              <div class="row"> 
                <div class="col-12"> 
                  <ol class="breadcrumb">
                    <div class="breadcrumb-item"><a href="{{route('individual.training-opportunity-applications')}}"> طلباتي</a></div>
                    <div class="breadcrumb-item">{{$application->training->title}}</div>
                  </ol>
                </div>
              </div>
              <div class="row mb-4"> 
                <div class="col-12">
                  <div class="pannel position-relative">
                    <div class="widget_item-status accepted-text accepted-bg font-medium">تم القبول</div>
                    <h2 class="mb-3 font-semi-bold font-24">{{$application->training->title}}</h2>
                    <h6 class="text-gray">{{$application->training->short_description}}</h6>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <ul class="nav nav-pills mb-3 gap-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                      <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-1" type="button" role="tab">المهام والمسؤوليات</button>
                    </li>
                    <li class="nav-item">
                      <button class="nav-link " data-bs-toggle="pill" data-bs-target="#tab-2" type="button" role="tab">شروط القبول</button>
                    </li>
                    <li class="nav-item">
                      <button class="nav-link " data-bs-toggle="pill" data-bs-target="#tab-3" type="button" role="tab">المزايا والمكافأة</button>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="tab-1">
                      <div class="card">
                        <div class="card-head">
                          <h5 class="font-semi-bold mb-2"> المهام والمسؤوليات</h5>
                        </div>
                        <div class="card-body">
                          <ul class="description-list">
                            {!! $application->training->responsibilities !!}
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="tab-2">
                      <div class="card">
                        <div class="card-head">
                          <h5 class="font-semi-bold mb-2"> شروط القبول</h5>
                        </div>
                        <div class="card-body">
                          <ul class="description-list">
                           {!! $application->training->conditions !!}
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="tab-3">
                      <div class="card">
                        <div class="card-head">
                          <h5 class="font-semi-bold mb-2"> المزايا والمكافأة</h5>
                        </div>
                        <div class="card-body">
                          <ul class="description-list">
                            {!! $application->training->features !!}
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4"> 
              <div class="pannel">
                <h5 class="mb-3 font-bold">حالة الطلب</h5>
                <hr/>
                <div class="{{$application->getStatusLabel()}}-bg p-3 rounded-4 mb-3">
                  <h6 class="font-medium {{$application->getStatusLabel()}}-text mb-3">{{$application->getStatus()}}</h6>
                  <h6 class="font-12 font-light text-gray">{{$application->getStatusText()}}</h6>
                </div>
                <h6 class="font-12 text-gray">تم التقديم في تاريخ: {{ $application->created_at}}</h6>
              </div>
              <div class="pannel">
                <h5 class="mb-3 font-bold">موعد المقابلة الشخصية</h5>
                <hr/>
                <div class="widget_item-card rounded-4 border-0">
                  <h6 class="mb-3">📌 ملاحظات مهمة</h6>
                  <ul class="description-list">
                    <li>يرجى الحضور قبل الموعد بـ15 دقيقة.</li>
                    <li>إحضار أصل الهوية الوطنية والسيرة الذاتية.</li>
                    <li>الالتزام بالزي الرسمي.</li>
                  </ul>
                </div><a class="btn btn-primary w-100" href="" data-bs-toggle="modal" data-bs-target="#profileCompletionFormModal">تحديد موعد المقابلة الشخصية</a>
              </div>
              <div class="pannel">
                <h5 class="mb-3 font-bold">عقد التدريب</h5>
                <hr/>
                <ul class="description-list-2 mb-3">
                  <li class="d-flex align-items-start"><span class="description-icon me-2"><img src="../assets/images/calendar.svg" alt=""/></span>5 – 13 ذو الحجة 1446هـ</li>
                  <li class="d-flex align-items-start"><span class="description-icon me-2"><img src="../assets/images/location.svg" alt=""/></span> مكة المكرمة – المشاعر المقدسة</li>
                </ul>
                <div class="widget_item-card rounded-4 border-0">
                  <div class="d-flex align-items-center">
                    <div class="col-auto me-3">
                      <div class="bg-white p-1 rounded-3"><img src="../assets/images/pdf-file.svg" alt=""/></div>
                    </div>
                    <div class="col">
                      <h6 class="font-medium font-12 mb-2">العقد الوظيفي.pdf</h6>
                      <h6 class="text-gray font-12">2.67 ميجابايت </h6>
                    </div>
                    <div class="col-auto">
                      <button class="btn btn-white px-2 rounded py-1 border-0"><img src="../assets/images/download.svg" alt=""/></button>
                    </div>
                  </div>
                </div>
                <h6 class="mb-3 text-gray font-12">يجب توقيع العقد قبل تاريخ 15 ذو القعدة 1446هـ لتأكيد انضمامك رسميًا.</h6><a class="btn btn-primary w-100" href="">توقيع العقد إلكترونيً </a>
              </div>
              <div class="pannel">
                <h5 class="mb-3 font-bold">تفاصيل التدريب</h5>
                <hr/>
                <ul class="description-list-2">
                <li class="d-flex align-items-start"><span class="description-icon me-2"><img src="{{asset('assets/images/location.svg')}}" alt=""/></span>{{$application->training->location}}</li>
                <li class="d-flex align-items-start"><span class="description-icon me-2"><img src="{{asset('assets/images/briefcase.svg')}}" alt=""/></span> {{$application->training->attendance}}</li>
                <li class="d-flex align-items-start"><span class="description-icon me-2"><img src="{{asset('assets/images/calendar.svg')}}" alt=""/></span>{{$application->training->duration}}</li>
                <li class="d-flex align-items-start"><span class="description-icon me-2"><img src="{{asset('assets/images/riyal-circular.svg')}}" alt=""/></span> {{$application->training->salary}}</li>
                <li class="d-flex align-items-start"><span class="description-icon me-2"><img src="{{asset('assets/images/user2.svg')}}" alt=""/></span>
                    @php
                    if($application->training->for_male == 1){
                        echo "الذكور فقط لهذه الوظيفة.";
                    } elseif($application->training->for_female == 2){
                        echo "الإناث فقط لهذه الوظيفة.";
                    } elseif($application->training->for_male == 1 && $application->training->for_female == 2) {
                        echo "الذكور والإناث لهذه الوظيفة.";
                    }
                    @endphp
                    </li>
                 </ul>
              </div>
            </div>
          </div><!-- start:: modal -->
          <div class="modal fade" id="profileCompletionFormModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content border-0">
                <div class="modal-header flex-column align-items-start">
                  <h3 class="mb-2 font-semi-bold">موعد المقابلة الشخصية</h3>
                  <h6 class="text-gray">قم بتحديد مواعيد المقابلة.</h6>
                </div>
                <div class="modal-body p-0">
                  <form action=""> 
                    <div class="row">
                      <div class="col-12">
                        <div class="p-4">
                          <div class="row"> 
                            <div class="col-lg-6">
                              <div class="form-group"> 
                                <label class="form-label">التاريخ </label>
                                <input class="form-control datetimepicker " type="text" placeholder="التاريخ"/>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group"> 
                                <label class="form-label">خطاب تعريفي </label>
                                <input class="form-control timepicker" type="text" placeholder="الوقت"/>
                              </div>
                            </div>
                            <div class="col-12"> 
                              <div class="widget_item-card rounded-4 border-0">
                                <div class="d-flex align-items-center mb-2"><img class="me-2" src="../assets/images/location.svg" alt=""/>
                                  <h6>الموقع</h6>
                                </div>
                                <ul class="description-list">
                                  <li>حي العزيزية، مكة المكرمة</li>
                                </ul>
                              </div>
                            </div>
                            <div class="col-12"> 
                              <div class="widget_item-card rounded-4 border-0">
                                <h6 class="mb-3">📌 ملاحظات مهمة</h6>
                                <ul class="description-list">
                                  <li>يرجى الحضور قبل الموعد بـ15 دقيقة.</li>
                                  <li>إحضار أصل الهوية الوطنية والسيرة الذاتية.</li>
                                  <li>الالتزام بالزي الرسمي.</li>
                                </ul>
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
                          <button class="btn btn-primary" type="submit">تاكيد</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div><!-- end:: modal -->
</x-common.layout>