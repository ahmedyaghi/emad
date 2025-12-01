<x-common.layout>
      <div class="row mb-4">
            <div class="col-lg-8">
              <div class="row"> 
                <div class="col-12"> 
                  <ol class="breadcrumb">
                    <div class="breadcrumb-item"><a href="{{route('individual.training-opportunities')}}"> الفرص التدريبية</a></div>
                    <div class="breadcrumb-item">{{$model->title}}</div>
                  </ol>
                </div>
              </div>
              <div class="row mb-4"> 
                <div class="col-12">
                  <div class="pannel">
                    <h2 class="mb-3 font-semi-bold font-24">{{$model->title}}</h2>
                    <h6 class="text-gray">{{$model->short_description}}</h6>
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
                             {!! $model->responsibilities !!}
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
                            {!! $model->conditions !!}
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
                            {!! $model->features !!}
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
                <h5 class="mb-3 font-bold">تفاصيل التدريب</h5>
                <hr/>
                <ul class="description-list-2">
                  <li class="d-flex align-items-start"><span class="description-icon me-2"><img src="{{asset('assets/images/location.svg')}}" alt=""/></span>{{$model->location}}</li>
                    <li class="d-flex align-items-start"><span class="description-icon me-2"><img src="{{asset('assets/images/briefcase.svg')}}" alt=""/></span> {{$model->attendance}}</li>
                    <li class="d-flex align-items-start"><span class="description-icon me-2"><img src="{{asset('assets/images/calendar.svg')}}" alt=""/></span>{{$model->duration}}</li>
                    <li class="d-flex align-items-start"><span class="description-icon me-2"><img src="{{asset('assets/images/riyal-circular.svg')}}" alt=""/></span> {{$model->salary}}</li>
                    <li class="d-flex align-items-start"><span class="description-icon me-2"><img src="{{asset('assets/images/user2.svg')}}" alt=""/></span>
                      @php
                        if($model->for_male == 1){
                          echo "الذكور فقط لهذه الوظيفة.";
                        } elseif($model->for_female == 2){
                          echo "الإناث فقط لهذه الوظيفة.";
                        } elseif($model->for_male == 1 && $model->for_female == 2) {
                          echo "الذكور والإناث لهذه الوظيفة.";
                        }
                      @endphp
                     </li>
                </ul>
                <hr/>
                @if(!$has_applied) 
                  <a class="btn btn-primary w-100" href="" data-bs-toggle="modal" data-bs-target="#profileCompletionFormModal">قدّم الآن </a>
                @else
                  <a class="btn btn-primary w-100" disabled>تم التقديم</a>
                @endif
              </div>
            </div>
          </div>
          <!-- start:: modal -->
          <div class="modal fade" id="profileCompletionFormModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content border-0">
                <div class="modal-header flex-column align-items-start">
                  <h3 class="mb-2 font-semi-bold">التقديم على التدريب</h3>
                  <h6 class="text-gray">أنت على بُعد خطوة واحدة من التقديم على هذه التدريب.</h6>
                </div>
                <div class="modal-body p-0">
                  <form action="{{route('individual.training-opportunities.apply')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="training_id" value="{{$model->id}}">
                    <div class="row">
                      <div class="col-12">
                        <div class="p-4">
                          <div class="form-group"> 
                            <label class="form-label">السيرة الذاتية </label>
                            <div class="upload-box">
                              <input id="fileInput" type="file" accept=".pdf,.doc,.docx" name="cv"/>
                              <div class="upload-placeholder"><img class="mb-3" src="{{asset('assets/images/upload.svg')}}"/>
                                <h3 class="font-bold mb-2 text-main">اسحب وأفلِت أو اختر الملف الذي تريد تحميله</h3>
                                <h6 class="mb-2 text-sub">الحد الأقصى للحجم 5 ميجا بايت</h6>
                              </div>
                              <div class="file-list"></div>
                            </div>
                            @if ($errors->has('cv'))
                              <span class="text-danger">{{ $errors->first('cv') }}</span>
                            @endif
                          </div>
                          <div class="form-group"> 
                            <label class="form-label">خطاب تعريفي </label>
                            <textarea name="cover_letter" id="" cols="30" rows="4" class="form-control"></textarea>
                            @if ($errors->has('cover_letter'))
                              <span class="text-danger">{{ $errors->first('cover_letter') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="modal-footer d-flex align-items-center justify-content-between"> 
                          <button class="btn btn-white" type="button" data-bs-dismiss="modal">إلغاء</button>
                          <button class="btn btn-primary" type="submit">التقديم</button>
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
          <div class="modal fade" id="profileCompletionModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content border-0">
                <div class="modal-body p-0">
                  <form action=""> 
                    <div class="row">
                      <div class="col-lg-8 mx-auto">
                        <div class="text-center p-4 p-lg-5">
                          <div class="profile-completion mb-4">
                            <div class="profile-image"><img src="../assets/images/avatar.png" alt=""/></div>
                            <div class="profile-percentage text-white font-semi-bold">76%</div>
                            <div class="profile-progress"><img src="../assets/images/circle.png" alt=""/></div>
                          </div>
                          <h3 class="font-semi-bold mb-4">لا يمكنك التقديم على هذه التدريب قبل استكمال ملفك الشخصي.</h3>
                          <h6 class="text-gray">يرجى إضافة معلوماتك الأساسية، المؤهلات، والخبرات العملية لضمان ظهورك بشكل احترافي أمام الجهات المعلنة.</h6>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="modal-footer d-flex align-items-center justify-content-between"> 
                          <button class="btn btn-white" data-bs-dismiss="modal">إلغاء</button><a class="btn btn-primary" href="">التقديم</a>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div><!-- end:: modal -->
</x-common.layout>