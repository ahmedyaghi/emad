<x-common.layout>
      <div class="row mb-lg-2">
            <div class="col-12">
              <div class="row"> 
                <div class="col-12"> 
                  <ol class="breadcrumb">
                    <div class="breadcrumb-item"><a href="{{route('individual.assessments.index')}}">التقييمات</a></div>
                    <div class="breadcrumb-item">التقييم النهائي</div>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <div class="row"> 
            <div class="col-12 mb-4">
              <div class="d-lg-flex justify-content-between">
                <div class="col-lg-7 mb-3 mb-lg-0">
                  <h3 class="font-semi-bold mb-3">التقييم النهائي</h3>
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
                        <div class="widget_item-user-avatar col-auto me-2"><img src="{{$assessment->application->user->profile?->image}}" alt=""/></div>
                        <div class="widget_item-user-info">
                          <h6 class="mb-1 font-medium">{{$assessment->application->user->name}}</h6>
                          <h6 class="text-gray">{{$assessment->application->user->profile?->bio}}</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr/>
                  <div class="widget_item-info mt-3 d-flex align-items-center flex-wrap mb-3">
                    <div class="col-6 col-lg-3">
                      <div class="d-flex align-items-start mb-4"><img class="info-icon me-2" src="{{asset('assets/images/city2.svg')}}" alt=""/><span class="info-title text-gray">  الجهة<span class="font-bold d-block text-black mt-2"> {{$assessment->application->training->association->name}} </span></span></div>
                    </div>
                    {{-- <div class="col-6 col-lg-3">
                      <div class="d-flex align-items-start mb-4"><img class="info-icon me-2" src="{{asset('assets/images/student-card.svg')}}" alt=""/><span class="info-title text-gray">  الرقم الجامعي<span class="text-black font-bold d-block mt-2">11</span></span></div>
                    </div> --}}
                    <div class="col-6 col-lg-3">
                      <div class="d-flex align-items-start mb-4"><img class="info-icon me-2" src="{{asset('assets/images/user2.svg')}}" alt=""/><span class="info-title text-gray">   اسم عضو هيئة التدريس المشرف<span class="text-black font-bold d-block mt-2">{{$assessment->application->training->faculty_member->name}}</span></span></div>
                    </div>
                    <div class="col-6 col-lg-3">
                      <div class="d-flex align-items-start mb-4"><img class="info-icon me-2" src="{{asset('assets/images/user2.svg')}}" alt=""/><span class="info-title text-gray">    اسم المستشار الميداني<span class="text-black font-bold d-block mt-2">{{$assessment->application->training->consultant->name}}</span></span></div>
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
            <div class="col-12">
              <div class="pannel border">
                <h3 class="font-semi-bold">معلومات التقييم</h3>
                <hr/>
                <div class="widget_item-card rounded-4 p-4">
                  <h6 class="mb-3 font-light font-12">{{$assessment->name}}</h6>
                  <h6 class="font-medium">{{$assessment->description}}</h6>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="pannel border">
                <div class="d-flex align-items-start justify-content-between"> 
                  <div class="col"> 
                    <h3 class="font-semi-bold"> معلومات عامة عن تقدم الطالب</h3>
                  </div>
                  {{-- <div class="col-auto"> 
                    <div class="bg-light rounded-4 p-4 row gx-lg-5 align-items-center">
                      <div class="col-auto">
                        <h6 class="mb-2 text-gray font-12 font-light">المعدل العام</h6>
                        <h6 class="font-12 font-semi-bold"> 4.4 / 5</h6>
                      </div>
                      <div class="col-auto">
                        <h6 class="mb-2 text-gray font-12 font-light"> تصنيف الأداء</h6>
                        <h6 class="font-12 font-semi-bold text-success">متوسط</h6>
                      </div>
                    </div>
                  </div> --}}
                </div>
                <hr/>
                <div class="responsive-wrapper">
                  <div class="tasks-table-wrapper">
                    <div class="table-header table-row-group">
                      <div class="row-cell">المعيار</div>
                      <div class="row-cell">التقييم</div>
                      <div class="row-cell">الملاحظات</div>
                    </div>
                    <div class="table-body table-row-group">
                      @foreach($assessment->criterias as $criteria)
                        @if($criteria->criteria->type == 1)
                          <div class="table-row">
                              <div class="row-cell" data-label="المعيار">{{$criteria->criteria?->title}}</div>
                              <div class="row-cell" data-label="التقييم"> <span class="status-badge status-success">{{$criteria->evaluation->title}}</span></div>
                              <!-- status-success status-warning status-danger status-info -->
                            <div class="row-cell" data-label="الملاحظات">{{$criteria->notes}}</div>
                          </div>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="pannel border">
                <h3 class="font-semi-bold">المهام المنفذة خلال الفترة</h3>
                <hr/>
                <div class="responsive-wrapper">
                  <div class="tasks-table-wrapper">
                    <div class="table-header table-row-group">
                      <div class="row-cell">اليوم / التاريخ</div>
                      <div class="row-cell">وصف المهمة</div>
                      <div class="row-cell">عدد الساعات</div>
                      <div class="row-cell">مستوى الإنجاز</div>
                      <div class="row-cell">ملاحظات الجمعية</div>
                    </div>
                    <div class="table-body table-row-group">
                      @foreach($assessment->tasks as $task)
                        <div class="table-row">
                          <div class="row-cell" data-label="اليوم / التاريخ">{{$task->date}}</div>
                          <div class="row-cell" data-label="وصف المهمة">{{$task->name}}</div>
                          <div class="row-cell" data-label="عدد الساعات">{{$task->number_of_hours}}</div>
                          <div class="row-cell" data-label="مستوى الإنجاز">{{$task->achievement_level}}</div>
                          {{-- <div class="row-cell" data-label="مستوى الإنجاز"> <span class="status-badge status-success">{{$task->achievement_level}}</span></div> --}}
                          <div class="row-cell" data-label="ملاحظات الجمعية"> {{$task->notes}}</div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="pannel border">
                <h3 class="font-semi-bold">التقييم الرقمي</h3>
                <hr/>
                <div class="responsive-wrapper">
                  <div class="tasks-table-wrapper">
                    <div class="table-header table-row-group">
                      <div class="row-cell">المعيار</div>
                      <div class="row-cell">الوزن النسبي</div>
                      <div class="row-cell">مستوى الانجاز</div>
                      <div class="row-cell">الملاحظات</div>
                    </div>
                    <div class="table-body table-row-group">
                      @php
                          $finalScore = 0;
                          $weight_percentage = 0;
                      @endphp
                      @foreach($assessment->criterias as $criteria)
                        @if($criteria->criteria->type == 2)
                        @php
                            $finalScore += ($criteria->achievement_level / 100) * $criteria->weight_percentage;
                            $weight_percentage  += $criteria->weight_percentage;
                        @endphp
                         <div class="table-row">
                            <div class="row-cell" data-label="المعيار">{{$criteria->criteria?->title}}</div>
                            <div class="row-cell" data-label="الوزن النسبي">{{$criteria->weight_percentage}}%</div>
                            <div class="row-cell" data-label="مستوى الانجاز">{{$criteria->achievement_level}}</div>
                            <div class="row-cell" data-label="الملاحظات">{{$criteria->notes}}</div>
                         </div>
                        @endif
                      @endforeach
                      {{-- <div class="table-row-divider"></div>
                      <div class="table-row table-row-footer">
                        <div class="row-cell" data-label="المعيار">المجموع النهائي</div>
                        <div class="row-cell" data-label="الوزن النسبي">100%</div>
                        <div class="row-cell" data-label="التقييم (من 5)">22/25 = 88%</div>
                        <div class="row-cell" data-label="الملاحظات"> <span class="status-badge status-warning">جيد جدًا</span></div>
                      </div> --}}

                      <div class="table-row-divider"></div>

                        <div class="table-row table-row-footer">
                            <div class="row-cell" data-label="المعيار">المجموع النهائي</div>
                            <div class="row-cell" data-label="الوزن النسبي">{{$weight_percentage}} %</div>
                            <div class="row-cell" data-label="مستوى الإنجاز">
                                {{ round($finalScore, 2) }}%
                            </div>
                            <div class="row-cell" data-label="الملاحظات">
                                @if($finalScore >= 90)
                                    <span class="status-badge status-success">ممتاز</span>
                                @elseif($finalScore >= 75)
                                    <span class="status-badge status-info">جيد جدًا</span>
                                @elseif($finalScore >= 60)
                                    <span class="status-badge status-warning">جيد</span>
                                @else
                                    <span class="status-badge status-danger">ضعيف</span>
                                @endif
                            </div>
                        </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="pannel border">
                <h3 class="font-semi-bold">التوصيات والمتابعة القادمة</h3>
                <hr/>
                <div class="responsive-wrapper">
                  <div class="tasks-table-wrapper">
                    <div class="table-header table-row-group">
                      <div class="row-cell">المجال</div>
                      <div class="row-cell">التوصية</div>
                      <div class="row-cell">الجهة المسؤولة</div>
                      <div class="row-cell">الإجراء المطلوب</div>
                    </div>
                    <div class="table-body table-row-group">
                       @foreach($assessment->criterias as $criteria)
                        @if($criteria->criteria->type == 3)
                          <div class="table-row">
                            <div class="row-cell" data-label="المجال">{{$criteria->criteria?->title}}</div>
                            <div class="row-cell" data-label="التوصية">{{$criteria->recommendations}}</div>
                            <div class="row-cell" data-label="الجهة المسؤولة">{{$criteria->responsible_side}}</div>
                            <div class="row-cell" data-label="الإجراء المطلوب">{{$criteria->action_required}}</div>
                          </div>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>    
</x-common.layout>