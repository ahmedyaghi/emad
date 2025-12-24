<x-common.layout>
     {{-- <div class="row mb-4">
            <div class="col-12"> 
              <div class="accordion" id="accordion">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                      <p class="d-block mb-1 font-bold">تصفية<br/><span class="fw-normal">قم بتخصيص نتائج البحث لعرض الوظائف التي تناسبك بشكل أفضل. </span></p>
                    </button>
                  </h2>
                  <div class="accordion-collapse collapse show" id="collapseOne">
                    <div class="accordion-body px-0">
                      <form action="" method="post">
                        <div class="row"> 
                          <div class="col-lg-3 col-sm-6">
                            <div class="form-group"> 
                              <label class="form-label">تاريخ المقابلة </label>
                              <input class="form-control datetimepicker" type="text" placeholder="تاريخ المقابلة"/>
                            </div>
                          </div>
                          <div class="col-lg-3 col-sm-6">
                            <div class="form-group"> 
                              <label class="form-label">الموقع </label>
                              <select class="form-control select2" data-placeholder="الموقع">
                                <option value=""> </option>
                                <option value="2"> الموقع 1</option>
                                <option value="3"> الموقع 2</option>
                                <option value="4"> الموقع 3</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-3 col-sm-6">
                            <div class="form-group"> 
                              <label class="form-label">الجمعية </label>
                              <select class="form-control select2" data-placeholder="الجمعية">
                                <option value=""> </option>
                                <option value="2"> الجمعية 1</option>
                                <option value="3"> الجمعية 2</option>
                                <option value="4"> الجمعية 3</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-3 col-sm-6">
                            <div class="form-group"> 
                              <label class="form-label">الحالة </label>
                              <select class="form-control select2" data-placeholder="الحالة">
                                <option value=""> </option>
                                <option value="2"> الحالة 1</option>
                                <option value="3"> الحالة 2</option>
                                <option value="4"> الحالة 3</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-12"> 
                            <hr/>
                            <div class="d-flex align-items-center justify-content-between"> 
                              <button class="btn btn-white">إعادة تعيين</button>
                              <button class="btn btn-primary">تطبيق</button>
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
           --}}
          <div class="row gx-lg-3">
            <div class="col-12 mb-4">
              <div class="d-flex justify-content-between">
                <div class="col-lg-7">
                  <h3 class="font-semi-bold mb-2"> عرض {{count($assessments)}} تقييم</h3>
                  <h6 class="text-gray">بناءً على طلبات التدريب الخاصة بك</h6>
                </div>
                <div class="col-lg-auto">
                  <div class="select2-width-auto">
                      <select class="form-control select2" data-width="auto" data-minimum-results-for-search="Infinity" onchange="redirectToPage(this)">
                         <option value="">اختر</option>  
                          <option value="{{ route('individual.reports.index') }}" @selected(request()->routeIs('individual.reports.*'))>التقارير</option>
                          <option value="{{ route('individual.assessments.index') }}" @selected(request()->routeIs('individual.assessments.*'))>التقييمات</option>
                      </select>
                  </div>
              </div>
              </div>
            </div>
          </div>
             @if(!$assessments->isEmpty())
          <div class="row">
            @foreach ($assessments as $assessment)
             <div class="col-lg-4 col-md-6">
              <div class="widget_item-card bg-white p-4">
                <div class="d-flex align-items-start mb-3">
                  {{-- <div class="col">
                    <h6 class="accepted-text accepted-bg d-inline-block px-3 py-2 rounded-3 font-medium">معتمد</h6>
                  </div> --}}
                  <div class="col-auto">
                    <div class="d-flex align-items-center"> 
                      {{-- <div class="dropdown ms-2">
                        <button class="btn btn-icon bg-light py-1 px-2 h-auto w-auto border-0" data-bs-toggle="dropdown"><img src="../assets/images/more-vertical.svg" alt=""/></button>
                        <div class="dropdown-menu"><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/file-add.svg" alt=""/></span><span class="font-medium">تقييم المتدرب </span></a><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/file-add.svg" alt=""/></span><span class="font-medium">اضافة تقرير  </span></a><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/user.svg" alt=""/></span><span class="font-medium">عرض الملف الشخصي </span></a><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/delete2.svg" alt=""/></span><span class="font-medium">حذف من التدريب </span></a></div>
                      </div> --}}
                    </div>
                  </div>
                </div>
                <h4 class="widget_item-title font-semi-bold mb-3"><a href="{{route('individual.assessments.show', $assessment)}}"> {{$assessment->name}}</a></h4>
                <h6 class="widget_item-desc text-gray mb-3"> {{$assessment->description}}</h6>
                <hr/>
                <div class="widget_item-info mt-3 d-flex align-items-center flex-wrap mb-3 border-0">
                  <div class="col-6">
                    <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray">  تاريخ الانشاء<span class="font-bold d-block text-black mt-2">{{$assessment->created_at}}</span></span></div>
                  </div>
                  <div class="col-6">
                    <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/system-update.svg')}}" alt=""/><span class="info-title text-gray"> اخر تحديث<span class="font-bold d-block text-black mt-2">{{$assessment->updated_at}}</span></span></div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="row"> 
            <div class="col-12"> 
              <div class="pannel p-3">
                {{$assessments->links('components.common.pagination')}}
              </div>
            </div>
          </div>
          @endif


          @section('scripts')
          <script>
              function redirectToPage(select) {
                  if (select.value) {
                      window.location.href = select.value;
                  }
              }
          </script>
          @endsection
</x-common.layout>