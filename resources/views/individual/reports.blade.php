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
          <div class="row gx-lg-3">
            <div class="col-12 mb-4">
              <div class="d-flex justify-content-between">
                <div class="col-lg-7">
                  <h3 class="font-semi-bold mb-2"> عرض {{count($reports)}} تقرير</h3>
                  <h6 class="text-gray">بناءً على طلبات التدريب الخاصة بك</h6>
                </div>
                <div class="col-lg-auto">
                  <div class="select2-width-auto">
                    <select class="form-control select2" data-width="auto" data-minimum-results-for-search="Infinity">
                      <option value="2">التقارير</option>
                      <option value="4">التقييمات</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @if(!$reports->isEmpty())
          <div class="row"> 
          @foreach($reports as $report)
            <x-common.report :report="$report"/>
          @endforeach
          </div>
          @endif
          <div class="row"> 
           {{$reports->links('common.pagination')}}
          </div>
</x-common.layout>