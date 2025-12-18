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
                       <x-association.training-card :model="$training_opportunity"/>
                      @endforeach
                    </div>
                  </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
</x-common.layout>