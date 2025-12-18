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
                     <form action="{{route('individual.training-opportunity-applications')}}" method="get">
                        <div class="row"> 
                          <div class="col-md-4"> 
                            <div class="form-group"> 
                              <label class="form-label">تاريخ النشر </label>
                              <input class="form-control datetimepicker" type="text" placeholder="تاريخ النشر " name="published_at"/>
                            </div>
                          </div>
                          <div class="col-md-4"> 
                            <div class="form-group"> 
                              <label class="form-label">الموقع </label>
                                @if(!$cities->isEmpty())
                                <select class="form-control select2" data-placeholder="اختار" name="city_id">
                                @foreach($cities as $city)
                                    <option value=""> </option>
                                <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                                </select>
                                @endif
                            </div>
                          </div>
                          <div class="col-md-4"> 
                            <div class="form-group"> 
                              <label class="form-label">الجمعية </label>
                              @if(!$associations->isEmpty())
                                <select class="form-control select2" data-placeholder="اختار" name="association_id">
                                @foreach($associations as $association)
                                    <option value=""> </option>
                                <option value="{{$association->id}}">{{$association->name}}</option>
                                @endforeach
                                </select>
                                @endif
                            </div>
                          </div>
                          <div class="col-12"> 
                            <hr/>
                            <div class="d-flex align-items-center justify-content-between"> 
                              <button class="btn btn-white" type="reset">إعادة تعيين</button>
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
          <div class="row gx-lg-3">
            <div class="col-12 mb-4">
              <div class="d-flex justify-content-between">
                <div class="col-lg-7">
                  <h3 class="font-semi-bold mb-2"> عرض {{count($applications)}} طلبات التدريب</h3>
                  <h6 class="text-gray">بناءً على طلبات العمل الخاصة بك</h6>
                </div>
                <div class="col-lg-auto"><a class="btn btn-white" href="{{route('individual.training-opportunity-applications')}}">مشاهدة الكل </a></div>
              </div>
            </div>
          </div>
          @if(!$applications->isEmpty())
          <div class="row"> 
            @foreach ($applications as $application)
              
            <div class="col-lg-4 col-md-6">
              <div class="card widget_item-card p-4 rounded-4">
                <div class="widget_item-status {{$application->getStatusClass()}} font-medium">{{$application->getStatus()}}</div>
                <div class="widget_item-content">
                  <h4 class="widget_item-title font-semi-bold mb-2 mt-3"><a href="{{route('individual.training-opportunity-application-details', $application->slug)}}">{{$application->training->title}}</a></h4>
                  <h6 class="widget_item-desc text-gray mb-3">{{$application->training->short_description}}</h6>
                  <div class="widget_item-campany mb-4 d-flex align-items-center">
                    <div class="campany-image me-2"><img src="{{asset('assets/images/logo.svg')}}" alt=""/></div>
                    <h6 class="campany-name">{{$application->training->association->name}} </h6>
                  </div>
                  <div class="widget_item-info mt-3 pt-3 d-flex align-items-center">
                    <div class="col">
                      <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray">تاريخ النشر<span class="font-bold d-block text-black mt-2">{{$application->training->created_at}}</span></span></div>
                    </div>
                    <div class="col">
                      <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/system-update.svg')}}" alt=""/><span class="info-title text-gray">اخر تحديث<span class="font-bold d-block text-black mt-2">{{$application->training->updated_at}}</span></span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            @endforeach
          </div>
          @endif
          <div class="row"> 
            <div class="col-12"> 
              {{$applications->links('components.common.pagination')}}
            </div>
          </div>
</x-common.layout>