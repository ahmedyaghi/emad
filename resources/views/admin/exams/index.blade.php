<x-common.layout>
      <div class="row mb-4">
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
                      <form action="{{route('admin.exams.index')}}" method="get">
                        <div class="row"> 
                          <div class="col-md-4"> 
                            <div class="form-group"> 
                              <label class="form-label">تاريخ الاختبار </label>
                              <input class="form-control datetimepicker" type="text" placeholder="تاريخ الاختبار " name="date" autocomplete="off" value="{{request('date')}}"/>
                            </div>
                          </div>
                          <div class="col-md-4"> 
                            <div class="form-group"> 
                              <label class="form-label">الدورة </label>
                              <select class="form-control select2" data-placeholder="الدورة" name="course_id">
                                <option value=""> </option>
                                @foreach($courses as $course)
                                <option value="{{$course->id}}" @selected(request('course_id') == $course->id)> {{$course->title}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          {{-- <div class="col-md-4"> 
                            <div class="form-group"> 
                              <label class="form-label">الحالة </label>
                              <select class="form-control select2" data-placeholder="الحالة" name="status">
                                <option value=""> </option>
                                <option value="2"> الحالة 1</option>
                                <option value="3"> الحالة 2</option>
                                <option value="4"> الحالة 3</option>
                              </select>
                            </div>
                          </div> --}}
                          <div class="col-12"> 
                            <hr/>
                            <div class="d-flex align-items-center justify-content-between"> 
                              <a href="{{ route('admin.exams.index') }}" class="btn btn-white">إعادة تعيين</a>
                              <button type="submit" class="btn btn-primary">تطبيق</button>
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
          <div class="row gx-lg-3">
            <div class="col-12 mb-4">
              <div class="d-flex justify-content-between">
                <div class="col-lg-7">
                  <h3 class="font-semi-bold mb-2">عرض {{count($exams)}} الاختبارات</h3>
                  <h6 class="text-gray">بناءً على الاختبارات الخاصة بك</h6>
                </div>
                <div class="col-auto"> <a class="btn btn-primary" href="{{route('admin.exams.create')}}">اضافة اختبار </a></div>
              </div>
            </div>
          </div>
          @if(!$exams->isEmpty())
          <div class="row"> 
            <div class="col-12">
              @foreach ($exams as $exam)

              <div class="card mb-2">
                <div class="row align-items-center"> 
                  <div class="col-lg-6 mb-2 mb-lg-0">
                    <h5 class="font-semi-bold mb-2">{{$exam->title}}</h5>
                    <h6 class="text-gray">{{$exam->datetime->locale('ar')->translatedFormat('d F Y h:i A')}}</h6>
                  </div>
                  <div class="col-lg-6">
                    <div class="widget_item-card rounded-3 p-3 test-result mb-0">
                      <div class="row"> 
                        <div class="col-6">
                          <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/user-group2.svg')}}" alt=""/><span class="font-12 font-light text-gray"> عدد المشاركين<span class="font-12 font-bold d-block text-black mt-2"> {{ $exam->examAnswers()->count()}}</span></span></div>
                        </div>
                        {{-- <div class="col-6">
                          <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/user-check.svg')}}" alt=""/><span class="font-12 font-light text-gray"> عدد المشاركين<span class="font-12 font-bold d-block text-black mt-2">566</span></span></div>
                        </div> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              @endforeach
            </div>
          </div>
          <div class="row"> 
            <div class="col-12"> 
              {{$exams->links('components.common.pagination')}}
            </div>
          </div>
          @endif
</x-common.layout>