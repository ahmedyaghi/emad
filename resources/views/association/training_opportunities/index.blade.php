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
                      <form action="{{route('association.training-opportunities.index')}}" method="get">
                        <div class="row"> 
                          <div class="col-md-4"> 
                            <div class="form-group"> 
                              <label class="form-label">تاريخ النشر </label>
                              <input class="form-control datetimepicker" type="text" placeholder="تاريخ النشر " name="created_at"/>
                            </div>
                          </div>
                          <div class="col-md-4"> 
                            <div class="form-group"> 
                              <label class="form-label">تاريخ الانتهاء </label>
                              <input class="form-control datetimepicker" type="text" placeholder="تاريخ النشر " name="end_date"/>
                            </div>
                          </div>
                          <div class="col-md-4"> 
                            <div class="form-group"> 
                              <label class="form-label">الحالة </label>
                              <select class="form-control select2" data-placeholder="الحالة" name="status">
                                <option value=""> </option>
                                <option value="1">نشرت</option>
                                <option value="2"> انتهت</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-12"> 
                            <hr/>
                            <div class="d-flex align-items-center justify-content-between"> 
                              <a class="btn btn-white" type="reset" href="{{route('association.training-opportunities.index')}}">إعادة تعيين</a>
                              <button class="btn btn-primary" type="submit">تطبيق</button>
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
          
          <div class="row"> 
            <div class="col-12 mb-4">
              <div class="d-flex justify-content-between">
                <div class="col-lg-7">
                  <h3 class="font-semi-bold mb-2">عرض {{count($training_opportunities)}}الفرص التدريبية</h3>
                  <h6 class="text-gray">بناءً على وظائفك المنشورة</h6>
                </div>
                <div class="col-lg-auto"><a class="btn btn-primary px-4" href="{{route('association.training-opportunities.create')}}">نشر تدريب جديد</a></div>
              </div>
            </div>
            @if(!$training_opportunities->isEmpty())
            @foreach ($training_opportunities as $training_opportunity)
              <x-association.training-card :model="$training_opportunity"/>
            @endforeach
            @endif
          </div>
          <div class="row"> 
            <div class="col-12"> 
              {{$training_opportunities->links('components.common.pagination')}}
            </div>
          </div>
</x-common.layout>