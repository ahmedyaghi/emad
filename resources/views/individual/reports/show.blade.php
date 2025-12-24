<x-common.layout>
      <div class="row mb-lg-2">
            <div class="col-12">
              <div class="row"> 
                <div class="col-12"> 
                  <ol class="breadcrumb">
                    <div class="breadcrumb-item"><a href="{{route('association.reports.index')}}">التقارير</a></div>
                    <div class="breadcrumb-item">تفاصيل تقييم المتدرب</div>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 mb-3">
              <div class="d-flex justify-content-between">
                <div class="col-lg-7">
                  <h3 class="font-semi-bold mb-2">تفاصيل تقرير المتدرب</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="pannel">
                <h3 class="font-semi-bold">معلومات الطالب</h3>
                <hr/>
                <div class="card pb-0">
                  <div class="d-flex align-items-start">
                    <div class="col">
                      <div class="widget_item-user d-flex align-items-center">
                        <div class="widget_item-user-avatar col-auto me-2"><img src="{{$report->application->user->profile?->image}}" alt=""/></div>
                        <div class="widget_item-user-info">
                          <h6 class="mb-1 font-medium">{{$report->application->user->name}}</h6>
                          <h6 class="text-gray">{{$report->application->user->profile?->bio}}</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr/>
                  <div class="widget_item-info mt-3 d-flex align-items-center flex-wrap mb-3">
                    <div class="col-6 col-lg-3">
                      <div class="d-flex align-items-start mb-4"><img class="info-icon me-2" src="{{asset('assets/images/city2.svg')}}" alt=""/><span class="info-title text-gray">  الجهة<span class="font-bold d-block text-black mt-2"> {{$report->application->training->association->name}} </span></span></div>
                    </div>
                    {{-- <div class="col-6 col-lg-3">
                      <div class="d-flex align-items-start mb-4"><img class="info-icon me-2" src="{{asset('assets/images/student-card.svg')}}" alt=""/><span class="info-title text-gray">  الرقم الجامعي<span class="text-black font-bold d-block mt-2">11</span></span></div>
                    </div> --}}
                    <div class="col-6 col-lg-3">
                      <div class="d-flex align-items-start mb-4"><img class="info-icon me-2" src="{{asset('assets/images/user2.svg')}}" alt=""/><span class="info-title text-gray">   اسم عضو هيئة التدريس المشرف<span class="text-black font-bold d-block mt-2">{{$report->application->training->faculty_member->name}}</span></span></div>
                    </div>
                    <div class="col-6 col-lg-3">
                      <div class="d-flex align-items-start mb-4"><img class="info-icon me-2" src="{{asset('assets/images/user2.svg')}}" alt=""/><span class="info-title text-gray">    اسم المستشار الميداني<span class="text-black font-bold d-block mt-2">{{$report->application->training->consultant->name}}</span></span></div>
                    </div>
                    {{-- <div class="col-6 col-lg-3">
                      <div class="d-flex align-items-start mb-4"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray">    تاريخ البداية<span class="text-black font-bold d-block mt-2">  25 مايو 2024</span></span></div>
                    </div>
                    <div class="col-6 col-lg-3">
                      <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray">     تاريخ النهاية<span class="text-black font-bold d-block mt-2">  25 مايو 2024</span></span></div>
                    </div> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12"> 
              <div class="pannel">
                <h3 class="font-semi-bold">ملاحظات عامة</h3>
                <hr/>
                <h4 class="text-gray">{{$report->description}}</h4>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12"> 
              <div class="pannel">
                <h3 class="font-semi-bold"> المرفقات</h3>
                <hr/>
                <div class="qualification-card mb-3 p-3">
                  <div class="d-flex align-items-center">
                    <div class="qualification-details w-100 row gx-2 mb-2 mb-lg-0">
                      <div class="d-flex align-items-center">
                        <div class="bg-white p-2 rounded"><img src="{{asset('assets/images/pdf-file.svg')}}" alt=""/></div>
                        <div class="ms-3">
                          <h6 class="mb-2 font-bold font-12">{{$report->title}}</h6>
                          <h6 class="font-light text-gray font-12">  {{ $report->file_size }}</h6>
                        </div>
                      </div>
                    </div>
                    <div class="action-buttons ms-4 d-flex gap-3 col-auto">
                      <a class="btn btn-white border-0 btn-icon" href="{{$report->file}}"><img src="{{asset('assets/images/download2.svg')}}" alt=""/></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
</x-common.layout>