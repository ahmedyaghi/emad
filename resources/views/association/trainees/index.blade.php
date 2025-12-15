<x-common.layout>
     <div class="row mb-4">
            <div class="col-12"> 
              <div class="accordion" id="accordion">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                      <p class="d-block mb-1 font-bold">تصفية<br/><span class="fw-normal text-gray mt-1 d-block">قم بتخصيص نتائج البحث لعرض الوظائف التي تناسبك بشكل أفضل. </span></p>
                    </button>
                  </h2>
                  <div class="accordion-collapse collapse show" id="collapseOne">
                    <div class="accordion-body px-0">
                      <form action="{{route('association.trainees.index')}}" method="get">
                        <div class="row"> 
                          <div class="col-md-4"> 
                            <div class="form-group"> 
                              <label class="form-label">تاريخ التسجيل </label>
                              <input class="form-control datetimepicker" type="text" placeholder="تاريخ التسجيل" name="created_at" value="{{request('created_at')}}"/>
                            </div>
                          </div>
                          <div class="col-md-4"> 
                            <div class="form-group"> 
                              <label class="form-label">اسم الدورة </label>
                              <input class="form-control" type="text" placeholder="اسم الدورة" name="course_title" value="{{request('course_title')}}"/>
                            </div>
                          </div>
                          <div class="col-md-4"> 
                            <div class="form-group"> 
                              <label class="form-label">اسم المتدرب </label>
                              <input class="form-control" type="text" placeholder="اسم المتدرب" name="trainee_name" value="{{request('trainee_name')}}"/>
                            </div>
                          </div>
                          <div class="col-12"> 
                            <hr/>
                            <div class="d-flex align-items-center justify-content-between"> 
                              <a class="btn btn-white" type="reset" href="{{route('association.trainees.index')}}">إعادة تعيين</a>
                              <button class="btn btn-primary" type="submit">تطبيق</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row"> 
            <div class="col-12 mb-4">
              <div class="d-flex justify-content-between">
                <div class="col-lg-7">
                  <h3 class="font-semi-bold mb-2"> عرض {{count($trainees)}} المتدربين</h3>
                  <h6 class="text-gray"> بناءً على الدورات الخاصة بك</h6>
                </div>
              </div>
            </div>
          </div>
          @if(!$trainees->isEmpty())
          <div class="row">
            @foreach($trainees as $trainee)
            <div class="col-lg-4 col-md-6">
              <div class="card">
                <div class="d-flex align-items-start">
                  <div class="col">
                    <div class="widget_item-user d-flex align-items-center">
                      <div class="widget_item-user-avatar col-auto me-2"><img src="{{$trainee->user->profile?->image}}" alt=""/></div>
                      <div class="widget_item-user-info">
                        <h6 class="mb-1 font-medium">{{$trainee->user->name}}</h6>
                        <h6 class="text-gray">{{$trainee->user->profile?->bio}}</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="d-flex align-items-center"> 
                      <div class="dropdown ms-2">
                        <button class="btn btn-icon bg-light py-1 px-2 h-auto w-auto border-0" data-bs-toggle="dropdown"><img src="{{asset('assets/images/more-vertical.svg')}}" alt=""/></button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="{{route('association.assessments.create',  ['application_id' => $trainee->id])}}"> <span class="dropdown-item-icon"><img class="me-2" src="{{asset('assets/images/file-add.svg')}}" alt=""/></span><span class="font-medium">تقييم المتدرب </span></a>
                          <a class="dropdown-item" href="{{route('association.reports.create', ['application_id' => $trainee->id])}}"> <span class="dropdown-item-icon"><img class="me-2" src="{{asset('assets/images/file-add.svg')}}" alt=""/></span><span class="font-medium">اضافة تقرير  </span></a>
                          <a class="dropdown-item" href="{{route('association.trainees.show', $trainee)}}"> <span class="dropdown-item-icon"><img class="me-2" src="{{asset('assets/images/user.svg')}}" alt=""/></span><span class="font-medium">عرض الملف الشخصي </span></a>
                          <a class="dropdown-item" href="{{route('association.trainees.destroy', $trainee)}}"> <span class="dropdown-item-icon"><img class="me-2" src="{{asset('assets/images/delete2.svg')}}" alt=""/></span><span class="font-medium">حذف من التدريب </span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr/>
                <div class="widget_item-info mt-3 d-flex align-items-center flex-wrap mb-3">
                  <div class="col-6">
                    <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray"> تاريخ التسجيل<span class="font-bold d-block text-black mt-2">{{$trainee->user->created_at}}</span></span></div>
                  </div>
                  <div class="col-6">
                    <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray">التقييم العام<span class="text-success font-bold d-block mt-2">ممتاز</span></span></div>
                  </div>
                </div>
                <div class="widget_item-details bg-gray rounded-4 p-3">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <h6 class="font-light">نسبة التقدم</h6>
                    <h6 class="font-bold bg-white px-2 py-1 rounded"> 30%</h6>
                  </div>
                  <div class="progress bg-white">
                    <div class="progress-bar" div="div" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="row"> 
            {{$trainees->links('common.pagination')}}
          </div>
          @endif
</x-common.layout>