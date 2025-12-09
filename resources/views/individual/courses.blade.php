<x-common.layout>
    <div class="row gx-lg-3">
            <div class="col-12 mb-4">
              <div class="d-flex justify-content-between">
                <div class="col-lg-7">
                  <h3 class="font-semi-bold mb-2"> عرض {{count($courses)}} دورات</h3>
                  <h6 class="text-gray">بناءً على الدورات الخاصة بك</h6>
                </div>
                <div class="col-lg-auto"></div>
              </div>
            </div>
          </div>
          @if(!$courses->isEmpty())
          <div class="row"> 
            @foreach ($courses as $course)
                <div class="col-lg-4 col-sm-6">
                <div class="widget_item-card bg-white">
                  <div class="widget_item-image mb-3"><a href="{{route('individual.course.details', $course->slug)}}"> 
                      <picture> <img src="{{asset('assets/images/image.png')}}" alt=""/></picture></a></div>
                  <div class="widget_item-content">
                    <h4 class="widget_item-title font-semi-bold mb-2"><a href="{{route('individual.course.details', $course->slug)}}">{{$course->title}}</a></h4>
                    <h6 class="widget_item-desc text-gray mb-3">{{$course->short_description}}</h6>
                    <div class="widget_item-details">
                      <div class="d-flex align-items-center justify-content-between mb-3">
                        <h6 class="font-light">نسبة التقدم</h6>
                        <h6 class="font-bold">30%</h6>
                      </div>
                      <div class="progress">
                        <div class="progress-bar" div="div" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="widget_item-info mt-3 pt-3 d-flex align-items-center">
                        <div class="col">
                          <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray">تاريخ النشر<span class="font-bold d-block text-black mt-2">{{$course->created_at}}</span></span></div>
                        </div>
                        <div class="col">
                          <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/system-update.svg')}}" alt=""/><span class="info-title text-gray">اخر تحديث<span class="font-bold d-block text-black mt-2">{{$course->updated_at}}</span></span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            @endforeach
          </div>
          @endif
          <div class="row"> 
            <div class="col-12"> 
              {{$courses->links('common.pagination')}}
            </div>
          </div>
</x-common.layout>