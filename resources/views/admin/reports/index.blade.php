<x-common.layout>
    <div class="row gx-lg-3">
            <div class="col-12 mb-4">
              <div class="d-flex justify-content-between">
                <div class="col-lg-7">
                  <h3 class="font-semi-bold mb-2">  التقارير</h3>
                  <h6 class="text-gray">الاطلاع على تقارير الطلاب</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="pannel">
                <div class="toolbar-action">
                  <div class="search-bar">
                    <input class="form-control" type="text" placeholder="البحث عن التقارير ..."/><span class="search-icon"><img src="{{asset('assets/images/search.svg')}}" alt=""/></span>
                  </div>
                  <div class="action-buttons">
                    <button class="btn btn-icon border rounded-4 drawer-toggle"><img src="{{asset('assets/images/filter.svg')}}" alt=""/></button>
                  </div>
                  <div class="action-buttons">
                    <select class="select2">
                      <option value="1"> الأحدث</option>
                      <option value="2"> الاقدم</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @if(!$reports->isEmpty())
          <div class="row"> 
            @foreach ($reports as $report)
            <div class="col-lg-4 col-md-6">
              <div class="card widget_item-card p-4 rounded-4">
                <div class="widget_item-content">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <h4 class="widget_item-title font-semi-bold"><a href="{{route('admin.reports.show', $report)}}">{{$report->title}}</a></h4>
                    <a class="btn btn-light p-1 rounded"><img src="{{asset('assets/images/download2.svg')}}" alt="" href="{{Storage::url($report->file)}}"/></a>
                  </div>
                  <h6 class="widget_item-desc text-gray mb-3">{{$report->description}}</h6>
                  <div class="widget_item-profile mb-4 d-flex align-items-center">
                    <div class="profile-image me-3"><img src="{{$report->application->user->profile?->image}}" alt=""/></div>
                    <h6 class="font-medium">{{$report->application->user->name}}</h6>
                  </div>
                  <div class="widget_item-info mt-3 pt-3 d-flex align-items-center">
                    <div class="col">
                      <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray">تاريخ التقرير<span class="font-bold d-block text-black mt-2">{{$report->created_at}}</span></span></div>
                    </div>
                    <div class="col">
                      <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/system-update.svg')}}" alt=""/><span class="info-title text-gray">الجهة المرسلة للتقرير<span class="font-bold d-block text-black mt-2">{{$report->application->training->association?->name}}</span></span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          </div>
          <div class="row"> 
            <div class="col-12"> 
             {{$reports->links('components.common.pagination')}}
            </div>
          </div>
          @endif
</x-common.layout>