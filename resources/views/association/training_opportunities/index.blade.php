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
                  <h3 class="font-semi-bold mb-2">عرض {{count($training_opportunities)}} تدريباتي المنشورة</h3>
                  <h6 class="text-gray">بناءً على وظائفك المنشورة</h6>
                </div>
                <div class="col-lg-auto"><a class="btn btn-primary px-4" href="{{route('association.training-opportunities.create')}}">نشر تدريب جديد</a></div>
              </div>
            </div>
            @if(!$training_opportunities->isEmpty())
            @foreach ($training_opportunities as $training_opportunity)
              <div class="col-lg-4 col-md-6">
                <div class="widget_item-card p-4 bg-white">
                  <div class="widget_item-status {{$training_opportunity->getStatusClass()}} font-medium">{{$training_opportunity->getStatus()}}</div>
                  <div class="widget_item-content">
                    <h4 class="widget_item-title font-semi-bold mb-2 mt-3"><a href="{{route('association.training-opportunities.show', ['training_opportunity' => $training_opportunity])}}">{{$training_opportunity->title}}</a></h4>
                    <h6 class="widget_item-desc text-gray mb-3">{{$training_opportunity->short_description}}</h6>
                    <div class="widget_item-info mt-3 pt-3 d-flex align-items-center flex-wrap">
                      <div class="col-6 mb-4">
                        <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/user-group2.svg')}}" alt=""/><span class="info-title text-gray">متقدم<span class="font-bold d-block text-black mt-2">89</span></span></div>
                      </div>
                      <div class="col-6 mb-4">
                        <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/system-update.svg')}}" alt=""/><span class="info-title text-gray">اخر تحديث<span class="font-bold d-block text-black mt-2">{{$training_opportunity->updated_at}}</span></span></div>
                      </div>
                      <div class="col-6">
                        <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray">تاريخ النشر<span class="font-bold d-block text-black mt-2">{{$training_opportunity->created_at}}</span></span></div>
                      </div>
                      <div class="col-6">
                        <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray">تاريخ الانتهاء<span class="font-bold d-block text-black mt-2">{{$training_opportunity->end_date}}</span></span></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
            @endif
          </div>
          <div class="row"> 
            <div class="col-12"> 
              {{$training_opportunities->links('common.pagination')}}
            </div>
          </div>
</x-common.layout>