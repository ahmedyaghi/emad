<x-common.layout>
     <div class="main-content-inner"> 
            <div class="row gx-lg-3 mb-3">
              <div class="col-lg-4 col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex">
                      <div class="col">
                        <h2 class="font-semi-bold">{{count($training_opportunities)}}</h2>
                        <h6 class="text-gray">وظائفي المنشورة</h6>
                      </div>
                      <div class="col-auto"> <img src="{{asset('assets/images/briefcase3.svg')}}" alt=""/></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex">
                      <div class="col">
                        <h2 class="font-semi-bold">{{$trainees_count}}</h2>
                        <h6 class="text-gray">عدد المتدربين</h6>
                      </div>
                      <div class="col-auto"> <img src="{{asset('assets/images/user-switch.svg')}}" alt=""/></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex">
                      <div class="col">
                        <h2 class="font-semi-bold">{{$applications_count}}</h2>
                        <h6 class="text-gray">عدد طلبات التدريب</h6>
                      </div>
                      <div class="col-auto"> <img src="{{asset('assets/images/permanent-job.svg')}}" alt=""/></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row gx-lg-3">
              <div class="col-12">
                <div class="pannel">
                  <div class="pannel-head">
                    <div class="d-flex justify-content-between">
                      <div class="col-lg-7">
                        <h3 class="font-semi-bold mb-2"> وظائفي المنشورة</h3>
                        <h6 class="text-gray">تابع حالة الوظائف التي نشرتها ، وابقَ على اطلاع بآخر التحديثات</h6>
                      </div>
                      <div class="col-auto"><a class="btn btn-light" href="{{route('association.training-opportunities.create')}}">نشر وظيفة جديدة</a></div>
                    </div>
                  </div>
                  @if(!$training_opportunities->isEmpty())
                  <div class="pannel-body">
                    <div class="row"> 
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
                    </div>
                  </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
</x-common.layout>