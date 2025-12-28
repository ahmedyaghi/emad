<x-common.layout>
      <div class="main-content-inner"> 
            <div class="row gx-lg-3 mb-3">
              <div class="col-lg-3 col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex">
                      <div class="col">
                        <h2 class="font-semi-bold">{{$trainees_count}}</h2>
                        <h6 class="text-gray">المتدربين</h6>
                      </div>
                      <div class="col-auto"> <img src="{{asset('assets/images/user-group3.svg')}}" alt=""/></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex">
                      <div class="col">
                        <h2 class="font-semi-bold">{{$reports_count}}</h2>
                        <h6 class="text-gray">عدد التقارير</h6>
                      </div>
                      <div class="col-auto"> <img src="{{asset('assets/images/file2.svg')}}" alt=""/></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex">
                      <div class="col">
                        <h2 class="font-semi-bold">{{$assessments_count}}</h2>
                        <h6 class="text-gray">عدد  التقييمات الميدانية</h6>
                      </div>
                      <div class="col-auto"> <img src="{{asset('assets/images/catalogue3.svg')}}" alt=""/></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex">
                      <div class="col">
                        <h2 class="font-semi-bold">{{$notes_count}}</h2>
                        <h6 class="text-gray">عدد  الملاحظات</h6>
                      </div>
                      <div class="col-auto"> <img src="{{asset('assets/images/property-edit2.svg')}}" alt=""/></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @if(!$trainees->isEmpty())
            <div class="row">
              <div class="col-12">
                <div class="pannel">
                  <div class="pannel-head">
                    <div class="d-flex justify-content-between">
                      <div class="col-lg-7">
                        <h3 class="font-semi-bold mb-2">المتدربين</h3>
                        <h6 class="text-gray"> الطلاب المسجلين لديك  والتي تراقب أدائهم</h6>
                      </div>
                      <div class="col-auto"><a class="btn btn-light" href="{{route('faculty-member.trainees.index')}}"> مشاهدة الكل </a></div>
                    </div>
                  </div>
                  <div class="pannel-body">
                    <div class="row"> 
                      @foreach ($trainees as $trainee)
                        <x-common.trainee :trainee="$trainee" />
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endif
            @if(!$reports->isEmpty())
            <div class="row">
              <div class="col-12">
                <div class="pannel">
                  <div class="pannel-head">
                    <div class="d-flex justify-content-between">
                      <div class="col-lg-7">
                        <h3 class="font-semi-bold mb-2">التقارير</h3>
                        <h6 class="text-gray">  الاطلاع على تقارير الطلاب</h6>
                      </div>
                      <div class="col-auto"><a class="btn btn-light" href="{{route('faculty-member.reports.index')}}"> مشاهدة الكل </a></div>
                    </div>
                  </div>
                  <div class="pannel-body">
                    <div class="row"> 
                       @foreach ($reports as $report)
                          <x-common.report :report="$report" />
                        @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endif


          @if(!$assessments->isEmpty())
            <div class="row">
              <div class="col-12">
                <div class="pannel">
                  <div class="pannel-head">
                    <div class="d-flex justify-content-between">
                      <div class="col-lg-7">
                        <h3 class="font-semi-bold mb-2">التقييمات</h3>
                        <h6 class="text-gray">  الاطلاع على تقييمات الطلاب</h6>
                      </div>
                      <div class="col-auto"><a class="btn btn-light" href="{{route('faculty-member.assessments.index')}}"> مشاهدة الكل </a></div>
                    </div>
                  </div>
                  <div class="pannel-body">
                    <div class="row"> 
                       @php
                          $role = auth()->user()->getRoleNames()->first();
                        @endphp
                       @foreach ($assessments as $assessment)
                          <x-common.assessment :assessment="$assessment" :role="$role" />
                        @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endif

          </div>
</x-common.layout>