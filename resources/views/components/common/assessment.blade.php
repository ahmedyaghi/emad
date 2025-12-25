 <div class="col-lg-4 col-md-6">
    <div class="widget_item-card bg-white p-4">
    <div class="d-flex align-items-start mb-3">
        {{-- <div class="col">
        <h6 class="accepted-text accepted-bg d-inline-block px-3 py-2 rounded-3 font-medium">معتمد</h6>
        </div> --}}
        <div class="col-auto">
        <div class="d-flex align-items-center"> 
            {{-- <div class="dropdown ms-2">
            <button class="btn btn-icon bg-light py-1 px-2 h-auto w-auto border-0" data-bs-toggle="dropdown"><img src="../assets/images/more-vertical.svg" alt=""/></button>
            <div class="dropdown-menu"><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/file-add.svg" alt=""/></span><span class="font-medium">تقييم المتدرب </span></a><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/file-add.svg" alt=""/></span><span class="font-medium">اضافة تقرير  </span></a><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/user.svg" alt=""/></span><span class="font-medium">عرض الملف الشخصي </span></a><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/delete2.svg" alt=""/></span><span class="font-medium">حذف من التدريب </span></a></div>
            </div> --}}
        </div>
        </div>
    </div>
    <h4 class="widget_item-title font-semi-bold mb-3"><a href="{{route($role.'.assessments.show', $assessment)}}"> {{$assessment->name}}</a></h4>
    <h6 class="widget_item-desc text-gray mb-3"> {{$assessment->description}}</h6>
    <hr/>
    <div class="widget_item-info mt-3 d-flex align-items-center flex-wrap mb-3 border-0">
        <div class="col-6">
        <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray">  تاريخ الانشاء<span class="font-bold d-block text-black mt-2">{{$assessment->created_at}}</span></span></div>
        </div>
        <div class="col-6">
        <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/system-update.svg')}}" alt=""/><span class="info-title text-gray"> اخر تحديث<span class="font-bold d-block text-black mt-2">{{$assessment->updated_at}}</span></span></div>
        </div>
    </div>
    </div>
</div>