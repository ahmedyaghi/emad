<x-common.layout>
    <div class="row gx-lg-3">
            <div class="col-12 mb-4">
              <div class="d-flex justify-content-between">
                <div class="col-lg-7">
                  <h3 class="font-semi-bold mb-2"> عرض {{count($courses)}} دورات</h3>
                  <h6 class="text-gray">بناءً على الدورات الخاصة بك</h6>
                </div>
                <div class="col-lg-auto"><a class="btn btn-primary px-4" href="{{route('admin.courses.create')}}">اضافة دورة</a></div>
              </div>
            </div>
          </div>
          @if(!$courses->isEmpty())
          <div class="row"> 
            @foreach($courses as $course)
            <div class="col-lg-4 col-sm-6">
              <div class="widget_item-card bg-white">
                <div class="widget_item-image mb-3"><a href="{{route('admin.courses.show', ['course' => $course])}}"> 
                    <picture> <img src="{{asset('assets/images/image.png')}}" alt=""/></picture></a></div>
                <div class="widget_item-content">
                  <h4 class="widget_item-title font-semi-bold mb-2"><a href="{{route('admin.courses.show', ['course' => $course])}}">{{$course->title}}</a></h4>
                  <h6 class="widget_item-desc text-gray mb-3">{{$course->short_description}}</h6>
                  <div class="widget_item-details">
                    <div class="widget_item-info border-0 d-flex align-items-center">
                      <div class="col">
                        <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray">تاريخ البدء<span class="font-bold d-block text-black mt-2">{{$course->published_at}}</span></span></div>
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
              {{$courses->links('components.common.pagination')}}
            </div>
          </div>
</x-common.layout>