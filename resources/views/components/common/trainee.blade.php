<div class="col-lg-4 col-md-6">
    <div class="pannel">
        <div class="d-flex align-items-start">
        <div class="col">
            <div class="widget_item-user d-flex align-items-center">
            <div class="widget_item-user-avatar col-auto me-2"><img src="{{$trainee->applications->first()->user->profile?->image}}" alt=""/></div>
            <div class="widget_item-user-info">
                <h5 class="mb-1 font-medium">{{$trainee->applications->first()->user->name}}</h5>
                <h6 class="text-gray">{{$trainee->applications->first()->user->profile?->bio}}</h6>
            </div>
            </div>
        </div>
        {{-- <div class="col-auto">
            <div class="d-flex align-items-center"> 
            <div class="dropdown ms-2">
                <button class="btn btn-icon bg-light py-1 px-2 h-auto w-auto border-0" data-bs-toggle="dropdown"><img src="../assets/images/more-vertical.svg" alt=""/></button>
                <div class="dropdown-menu"><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/user.svg" alt=""/></span><span class="font-medium">عرض الملف الشخصي </span></a></div>
            </div>
            </div>
        </div> --}}
        </div>
        <hr/>
        <div class="widget_item-info mt-3 d-flex align-items-center flex-wrap border-0">
        <div class="col-6 mb-4">
            <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/user-group2.svg')}}" alt=""/><span class="info-title text-gray">المؤهل العلمي<span class="font-bold d-block text-black mt-2">{{$trainee->applications->first()->user->profile?->specialization?->name}}</span></span></div>
        </div>
        <div class="col-6 mb-4">
            <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray"> تاريخ التسجيل<span class="font-bold d-block text-black mt-2">{{$trainee->applications->first()->user->created_at}}</span></span></div>
        </div>
        <div class="col-6">
            <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/call.svg')}}" alt=""/><span class="info-title text-gray">رقم الجوال <span class="font-bold d-block text-black mt-2">  {{$trainee->applications->first()->user->phone}}</span></span></div>
        </div>
        <div class="col-6">
            <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/city2.svg')}}" alt=""/><span class="info-title text-gray"> المدينة<span class="font-bold d-block text-black mt-2"> {{$trainee->applications->first()->user->profile?->city?->name}}</span></span></div>
        </div>
        </div>
    </div>
</div>