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
                              <label class="form-label">تاريخ النشر </label>
                              <input class="form-control datetimepicker" type="text" placeholder="تاريخ النشر "/>
                            </div>
                          </div>
                          <div class="col-md-4"> 
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
                          <div class="col-md-4"> 
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
          @if(!$training_opportunities->isEmpty())  
          <div class="row gx-lg-3">
            <div class="col-12 mb-4">
              <div class="d-flex justify-content-between">
                <div class="col-lg-7">
                  <h3 class="font-semi-bold mb-2">عرض 84 نتيجة فرصة تدريبية</h3>
                  <h6 class="text-gray">بناءً على ملفك الشخصي وتفضيلاتك</h6>
                </div>
                <div class="col-lg-auto"><a class="btn btn-white" href="jobs-single.html">مشاهدة الكل </a></div>
              </div>
            </div>
            <div class="col-12">  
              <div class="row gx-3">
                @foreach($training_opportunities as $training_opportunity)
                 <div class="col-lg-4 col-md-6">
                    <div class="widget_item-card">
                    <div class="widget_item-content">
                        <h4 class="widget_item-title font-semi-bold mb-2"><a href="{{route('individual.training-opportunity', $training_opportunity->slug)}}">{{$training_opportunity->title}}</a></h4>
                        <h6 class="widget_item-desc text-gray mb-3">{{$training_opportunity->short_description}}</h6>
                        <div class="widget_item-campany mb-4 d-flex align-items-center">
                        <div class="campany-image me-2"><img src="../assets/images/logo.svg" alt=""/></div>
                        <h6 class="campany-name">شركة عماد </h6>
                        </div>
                        <div class="widget_item-info mt-3 pt-3 mb-4">
                        <div class="d-flex align-items-center mb-3"><img class="info-icon me-2" src="{{asset('assets/images/location.svg')}}" alt=""/><span class="info-title text-gray">{{$training_opportunity->location}}</span></div>
                        <div class="d-flex align-items-center mb-3"><img class="info-icon me-2" src="{{asset('assets/images/briefcase.svg')}}" alt=""/><span class="info-title text-gray">{{$training_opportunity->duration}}</span></div>
                        <div class="d-flex align-items-center mb-3"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray">{{$training_opportunity->attendance}}</span></div>
    
                    </div>
                        <div class="widget_item-action row gx-2">
                        <div class="col-lg-7"><a class="btn btn-white px-0 w-100" href="{{route('individual.training-opportunity', $training_opportunity->slug)}}">عرض تفاصيل </a></div>
                        <div class="col-lg-5"><a class="btn btn-primary px-0 w-100" href="{{route('individual.training-opportunity', $training_opportunity->slug)}}">قدّم الآن </a></div>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
              </div>
              <div class="row"> 
                {{$training_opportunities->links('common.pagination')}}
              </div>
            </div>
          </div>
          @endif
</x-common.layout>