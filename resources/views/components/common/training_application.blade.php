<div class="col-lg-6">
  <div class="pannel">
    <div class="d-flex align-items-start">
      <div class="col">
        <div class="widget_item-user d-flex align-items-center">
          <div class="widget_item-user-avatar col-auto me-2"><img src="{{asset('assets/images/avatar.png')}}" alt=""/></div>
          <div class="widget_item-user-info">
            <h5 class="mb-1 font-medium">{{$application->user->name}}</h5>
            <h6 class="text-gray">{{$application->user->profile?->bio}}</h6>
          </div>
        </div>
      </div>
      <div class="col-auto">
        <div class="d-flex align-items-center"> 
          <div class="{{$application->getStatusClass()}} font-medium px-3 py-1 rounded-2"> {{$application->getStatus()}}</div>
          {{-- <div class="new-text new-bg font-medium px-3 py-1 rounded-2">جديد</div> --}}
          {{-- <div class="ended-text ended-bg font-medium px-3 py-1 rounded-2"> تم رفض العقد </div> --}}
          <div class="dropdown ms-2">
            <button class="btn btn-icon bg-light py-1 px-2 h-auto w-auto border-0" data-bs-toggle="dropdown"><img src="{{asset('assets/images/more-vertical.svg')}}" alt=""/></button>
            <div class="dropdown-menu">
              @if($application->status == App\Enums\TrainingApplicationStatus::APPLIED)

              <form method="POST" action="{{ route('association.training-opportunities.update', $application->id) }}">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="status"
                        value="{{ App\Enums\TrainingApplicationStatus::REVIEWED }}">
                  <button type="submit" class="dropdown-item">
                      قيد المراجعة
                  </button>
              </form>

              <form method="POST" action="{{ route('association.training-opportunities.update', $application->id) }}">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="status"
                        value="{{ App\Enums\TrainingApplicationStatus::ACCEPTED }}">
                  <button type="submit" class="dropdown-item">
                      قبول
                  </button>
              </form>

              <form method="POST" action="{{ route('association.training-opportunities.update', $application->id) }}">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="status"
                        value="{{ App\Enums\TrainingApplicationStatus::REJECTED }}">
                  <button type="submit" class="dropdown-item text-danger">
                      رفض
                  </button>
              </form>


              @elseif($application->status == App\Enums\TrainingApplicationStatus::REVIEWED)


              <form method="POST" action="{{ route('association.training-opportunities.update', $application->id) }}">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="status"
                        value="{{ App\Enums\TrainingApplicationStatus::ACCEPTED }}">
                  <button type="submit" class="dropdown-item">
                      قبول
                  </button>
              </form>

              <form method="POST" action="{{ route('association.training-opportunities.update', $application->id) }}">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="status"
                        value="{{ App\Enums\TrainingApplicationStatus::REJECTED }}">
                  <button type="submit" class="dropdown-item text-danger">
                      رفض
                  </button>
              </form>

              @elseif($application->status == App\Enums\TrainingApplicationStatus::ACCEPTED)

                <a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="{{asset('assets/images/file-add.svg')}}" alt=""/></span><span class="font-medium">تقييم المتدرب </span></a>
                <a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="{{asset('assets/images/file-add.svg')}}" alt=""/></span><span class="font-medium">اضافة تقرير  </span></a>
                <a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="{{asset('assets/images/user.svg')}}" alt=""/></span><span class="font-medium">عرض الملف الشخصي </span></a>
                <a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="{{asset('assets/images/delete2.svg')}}" alt=""/></span><span class="font-medium">حذف من التدريب </span></a>
              
                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr/>
    <div class="widget_item-info mt-3 d-flex align-items-center flex-wrap">
      <div class="col-6 mb-4">
        <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/user-group2.svg')}}" alt=""/><span class="info-title text-gray">متقدم<span class="font-bold d-block text-black mt-2">89</span></span></div>
      </div>
      <div class="col-6 mb-4">
        <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/system-update.svg')}}" alt=""/><span class="info-title text-gray">اخر تحديث<span class="font-bold d-block text-black mt-2">12 مايو 2025</span></span></div>
      </div>
      <div class="col-6">
        <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray">تاريخ النشر<span class="font-bold d-block text-black mt-2">10 مايو 2025</span></span></div>
      </div>
      <div class="col-6">
        <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray">تاريخ الانتهاء<span class="font-bold d-block text-black mt-2">10 مايو 2025</span></span></div>
      </div>
    </div>
  </div>
</div>