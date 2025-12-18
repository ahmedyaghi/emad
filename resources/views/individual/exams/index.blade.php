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
                      <form action="" method="post">
                        <div class="row"> 
                          <div class="col-md-4"> 
                            <div class="form-group"> 
                              <label class="form-label">تاريخ الاختبار </label>
                              <input class="form-control datetimepicker" type="text" placeholder="تاريخ الاختبار "/>
                            </div>
                          </div>
                          <div class="col-md-4"> 
                            <div class="form-group"> 
                              <label class="form-label">الدورة </label>
                              <select class="form-control select2" data-placeholder="الدورة">
                                <option value=""> </option>
                                <option value="2"> الدورة 1</option>
                                <option value="3"> الدورة 2</option>
                                <option value="4"> الدورة 3</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4"> 
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
          <div class="row gx-lg-3">
            <div class="col-12 mb-4">
              <div class="d-flex justify-content-between">
                <div class="col-lg-7">
                  <h3 class="font-semi-bold mb-2">عرض {{count($exams)}} الاختبارات</h3>
                  <h6 class="text-gray">بناءً على الاختبارات الخاصة بك</h6>
                </div>
              </div>
            </div>
          </div>
          @if(!$exams->isEmpty())
          <div class="row"> 
            <div class="col-12">
              @foreach ($exams as $exam)
                <div class="card"> 
                <div class="d-flex align-items-center"> 
                  <div class="col">
                    <h5 class="font-semi-bold mb-2">{{$exam->title}}</h5>
                    <h6 class="text-gray">{{$exam->datetime}}</h6>
                  </div>
                  <div class="col-auto">
                    <a class="btn btn-primary  @disabled(!$exam->examAnswers->isEmpty())" href="{{route('individual.exams.create', ['exam' => $exam])}}">بدء الاختبار </a>
                
                    {{-- 

                     <div class="widget_item-card rounded-3 p-3 test-result mb-0">
                      <h4 class="mb-2"><span class="total-score"> 120 / </span><span class="achieved-score">90</span></h4>
                      <h6 class="font-light font-12">نتيجة الاختبار </h6>
                    </div> --}}

                  </div>
                </div>
              </div>   
              @endforeach
            </div>
          </div>
          <div class="row"> 
            {{$exams->links('components.common.pagination')}}
          </div>
          @endif
</x-common.layout>