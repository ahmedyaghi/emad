<div class="col-lg-4 col-md-6">
    <div class="card widget_item-card p-4 rounded-4">
    <div class="widget_item-content">
        @php
          $role = auth()->user()->getRoleNames()->first();
        @endphp
        <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="widget_item-title font-semi-bold"><a href="{{route($role.'.reports.show', $report)}}">{{$report->title}}</a></h4>
        <a class="btn btn-light p-1 rounded" href="{{Storage::url($report->file)}}"><img src="{{asset('assets/images/download2.svg')}}" alt=""/></a>
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
            <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/system-update.svg')}}" alt=""/><span class="info-title text-gray">الجهة المرسلة للتقرير<span class="font-bold d-block text-black mt-2">{{$report->sender_name}}</span></span></div>
        </div>
        </div>
    </div>
    </div>
</div>