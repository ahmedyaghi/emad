<x-common.layout>
   <div class="main-content-inner"> 
            <div class="row gx-lg-3">
              <div class="col-lg-3 col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex">
                      <div class="col">
                        <h2 class="font-semi-bold">10</h2>
                        <h6 class="text-gray">عدد المهارات المكتسبة</h6>
                      </div>
                      <div class="col-auto"> <img src="{{asset('assets/images/permanent-job.svg')}}" alt=""/></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex">
                      <div class="col">
                        <h2 class="font-semi-bold">10</h2>
                        <h6 class="text-gray">عدد الدورات المكتملة</h6>
                      </div>
                      <div class="col-auto"> <img src="{{asset('assets/images/permanent-job.svg')}}" alt=""/></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex">
                      <div class="col">
                        <h2 class="font-semi-bold">10</h2>
                        <h6 class="text-gray">عدد الاختبارات</h6>
                      </div>
                      <div class="col-auto"> <img src="{{asset('assets/images/permanent-job.svg')}}" alt=""/></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex">
                      <div class="col">
                        <h2 class="font-semi-bold">10</h2>
                        <h6 class="text-gray">عدد المهام والتقارير</h6>
                      </div>
                      <div class="col-auto"> <img src="{{asset('assets/images/permanent-job.svg')}}" alt=""/></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-12"> 
                <div class="card-profile d-flex align-items-start"> 
                  <div class="col-auto me-3">
                    <div class="circle-progress circle-small" id="graph" data-percent="70">
                      <div class="total-result">70%</div>
                    </div>
                  </div>
                  <div class="col-lg-9">
                    <h4 class="mb-3 font-bold">أستكمل ملفك الشخصي</h4>
                    <h6 class="mb-3">استكمالك لملفك الشخصي يساعدنا في ترشيح الوظائف الأنسب لك، ويزيد من فرص قبولك لدى الجهات. أضف معلوماتك الشخصية، مؤهلاتك، وخبراتك العملية لتظهر بشكل احترافي أمام أصحاب العمل.</h6><a class="btn btn-primary px-4" href="{{route('individual.profile')}}">أستكمل ملفك الشخصي </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row gx-lg-3">
              <div class="col-12">
                <div class="card">
                  <div class="card-head">
                    <div class="d-flex justify-content-between">
                      <div class="col-lg-7">
                        <h3 class="font-semi-bold mb-2"> الدورات الخاص بك</h3>
                        <h6 class="text-gray">تابع حالة الدورات الخاص بك، وابقَ على اطلاع بآخر التحديثات.</h6>
                      </div>
                      <div class="col-auto"><a class="btn btn-light" href="">مشاهدة الكل </a></div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="widget_item-card text-center d-flex flex-column align-items-center justify-content-center py-5"><img class="mb-3" src="{{asset('assets/images/catalogue2.svg')}}" alt=""/>
                      <h3 class="mb-3 font-bold">لا يوجد اي دورات خاصة بك</h3>
                      <h6 class="mb-4 text-gray">اكتشف مجموعة واسعة من الدورات التي نمكنك من تطوير من امكانياتك</h6><a class="btn btn-primary" href="">استكشف الوظائف </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row gx-lg-3">
              <div class="col-12">
                <div class="card">
                  <div class="card-head">
                    <div class="d-flex justify-content-between">
                      <div class="col-lg-7">
                        <h3 class="font-semi-bold mb-2"> طلباتي</h3>
                        <h6 class="text-gray">تابع حالة الوظائف التي تقدمت لها، وابقَ على اطلاع بآخر التحديثات من الجهات</h6>
                      </div>
                      <div class="col-auto"><a class="btn btn-light" href="">مشاهدة الكل </a></div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="widget_item-card text-center d-flex flex-column align-items-center justify-content-center py-5"><img class="mb-3" src="{{asset('assets/images/catalogue2.svg')}}" alt=""/>
                      <h3 class="mb-3 font-bold">لا يوجد اي طلبات عمل خاصة بك</h3>
                      <h6 class="mb-4 text-gray">اكتشف مجموعة واسعة من الفرص التي نمكنك من نطبيق معرفتك وقدم على وظيفة الان</h6><a class="btn btn-primary" href="">استكشف الوظائف </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @if(!$training_opportunities->isEmpty())  
            <div class="row gx-lg-3">
              <div class="col-12">
                <div class="card">
                  <div class="card-head">
                    <div class="d-flex justify-content-between">
                      <div class="col-lg-7">
                        <h3 class="font-semi-bold mb-2">استكشف الفرصة التدريبية المضافة مؤخرًا</h3>
                        <h6 class="text-gray">خدمات واستشارات تكنولوجيا المعلومات</h6>
                      </div>
                      <div class="col-auto"><a class="btn btn-light" href="{{route('individual.training-opportunities')}}">مشاهدة الكل </a></div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row"> 
                      @foreach($training_opportunities as $training_opportunity)
                       <div class="col-lg-4 col-md-6"> 
                        <div class="widget_item-card m-2 shadow-none">
                          <div class="widget_item-content">
                            <h4 class="widget_item-title font-semi-bold mb-2"><a href="{{route('individual.training-opportunity', $training_opportunity->slug)}}">{{$training_opportunity->title}}</a></h4>
                            <h6 class="widget_item-desc text-gray mb-3">{{$training_opportunity->short_description}}</h6>
                            <div class="widget_item-campany mb-4 d-flex align-items-center">
                              <div class="campany-image me-2"><img src="{{asset('assets/images/logo.svg')}}" alt=""/></div>
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
                  </div>
                </div>
              </div>
            </div>
            @endif
          </div>
</x-common.layout>