<x-common.layout>
    <div class="row mb-4">
            <div class="col-12"> 
              <ol class="breadcrumb">
                <div class="breadcrumb-item"><a href="{{route('admin.courses.index')}}"> الدورات</a></div>
                <div class="breadcrumb-item">{{$course->title}}</div>

              </ol>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col-12"> 
              <div class="video-container">
                {{-- <video id="player" controls="controls">
                  <source src="{{asset('assets/images/video.mp4')}}" type="video/mp4"/>
                </video> --}}
                <iframe 
                  id="course-player"
                  width="100%" 
                  height="450" 
                  src="{{$course->video_url}}" 
                  title="YouTube video player" 
                  frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  allowfullscreen>
              </iframe>
              </div>
            </div>
          </div>
          <div class="row mb-4"> 
            <div class="col-12">
              <ul class="nav nav-pills mb-3 gap-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-1" type="button" role="tab">معلومات الدورة</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link " data-bs-toggle="pill" data-bs-target="#tab-2" type="button" role="tab">محتوي الدورة</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link " data-bs-toggle="pill" data-bs-target="#tab-3" type="button" role="tab">المحاضرين</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link " data-bs-toggle="pill" data-bs-target="#tab-4" type="button" role="tab">الاختبارات</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link " data-bs-toggle="pill" data-bs-target="#tab-5" type="button" role="tab">المتدربين</button>
                </li>
              </ul>
            </div>
          </div>
          <div class="row"> 
            <div class="col-lg-8">
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="tab-1">
                  <div class="card">
                    <div class="card-head">
                      <h5 class="font-semi-bold mb-2"> وصف الدورة</h5>
                    </div>
                    <div class="card-body">
                      {!! $course->description !!}
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-head">
                      <h5 class="font-semi-bold mb-2"> محاور الدورة</h5>
                    </div>
                    <div class="card-body">
                      <ul class="description-list">
                        {!! $course->topics !!}
                      </ul>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-head">
                      <h5 class="font-semi-bold mb-2"> الأهداف</h5>
                    </div>
                    <div class="card-body">
                      <ul class="description-list">
                        {!! $course->goals !!}
                      </ul>
                    </div>
                  </div>
                </div>
               <div class="tab-pane fade" id="tab-2"> 
                 @if(!is_null($course->units()->get()))   
                  <div class="accordion" id="accordion">
                    @foreach ($course->units()->get() as $unit)
                      <div class="accordion-item border mb-3">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$unit->id}}">
                          <p class="d-block mb-1 font-bold">{{$unit->name}}</p>
                        </button>
                      </h2>
                      <div class="accordion-collapse collapse show" id="collapse-{{$unit->id}}">
                        @if(!is_null($course->units()->get()))   
                        <div class="accordion-body px-0">
                            @foreach ( $unit->lessons()->get() as $lesson)
                             <div class="widget_item-lesson d-flex align-items-center gap-2">
                                <div class="col-auto">
                                <div class="widget_item-icon">
                                  <a href="#" class="lesson-link" data-url="{{$lesson->video_url}}">
                                  <img src="{{asset('assets/images/video.svg')}}" alt="{{$lesson->title}}"/>
                                  </a>
                                </div>
                                </div>
                                <div class="col">
                                <div class="widget_item-content">
                                 <a href="#" class="lesson-link" data-url="{{$lesson->video_url}}">
                                    <h6 class="widget_item-title">{{$lesson->title}}</h6>
                                  </a>
                                </div>
                                </div>
                                <div class="col-auto">
                                <h6 class="widget_item-time">{{$lesson->duration}}</h6>
                                </div>
                            </div>
                          @endforeach
                        </div>
                        @endif
                      </div>
                    </div>  
                    @endforeach
                  </div>
                  @endif
                </div>
                <div class="tab-pane fade" id="tab-3">
                    @if(!is_null($course->lecturers()->get()))   
                        @foreach ( $course->lecturers()->get() as $lecturer)
                           <div class="card"> 
                            <div class="d-flex align-items-center"> 
                            <div class="col-auto me-2 lecturer-image"><img class="rounded-circle" src="{{$lecturer->image}}" alt=""/></div>
                            <div class="col">
                                <h5 class="font-semi-bold mb-2">{{$lecturer->name}}</h5>
                                <h6 class="text-gray">{{$lecturer->bio}}</h6>
                            </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
                <div class="tab-pane fade" id="tab-4">
                  @if(!is_null($course->exams()->get()))   
                   @foreach ( $course->exams()->get() as $exam)
                    <div class="card"> 
                      <div class="d-flex align-items-center"> 
                        <div class="col">
                          <h5 class="font-semi-bold mb-2">{{$exam->title}}</h5>
                          <h6 class="text-gray">{{$exam->datetime->locale('ar')->translatedFormat('d F Y h:i A')}}</h6>
                        </div>
                        {{-- <div class="col-auto">
                          <a class="disabled btn btn-primary" href="">بدء الاختبار </a>
                        </div> --}}
                      </div>
                    </div>
                    @endforeach
                   @endif
                </div>
                <div class="tab-pane fade" id="tab-5">
                  <div class="pannel"> 
                    <div class="d-flex align-items-center justify-content-between mb-4">
                      <h3 class="font-bold">المتدربين</h3>
                      {{-- <div class="d-flex align-items-center">
                        <div class="col">
                          <input class="form-control" type="text" placeholder="ابحث عن متدرب"/>
                        </div>
                        <div class="col-auto"><a class="px-3 ms-2 btn btn-primary" href="trainings-add.html"> إضافة متدرب</a></div>
                      </div> --}}
                    </div>
                    <hr/>
                     @if(!is_null($course->users()->get()))   
                    <div class="row">
                      @foreach ( $course->users()->get() as $user)
                      <div class="col-lg-6 col-md-6">
                        <div class="card">
                          <div class="d-flex align-items-start">
                            <div class="col">
                              <div class="widget_item-user d-flex align-items-center">
                                <div class="widget_item-user-avatar col-auto me-2"><img src="{{$user->profile->image}}" alt=""/></div>
                                <div class="widget_item-user-info">
                                  <h6 class="mb-1 font-medium">{{$user->name}}</h6>
                                  <h6 class="text-gray">{{$user->profile->bio}}</h6>
                                </div>
                              </div>
                            </div>
                            <div class="col-auto">
                              <div class="d-flex align-items-center"> 
                                <div class="dropdown ms-2">
                                  <button class="btn btn-icon bg-light py-1 px-2 h-auto w-auto border-0" data-bs-toggle="dropdown"><img src="../assets/images/more-vertical.svg" alt=""/></button>
                                  <div class="dropdown-menu"><a class="dropdown-item" href="add-student-report.html"> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/file-add.svg" alt=""/></span><span class="font-medium">اضافة تقرير </span></a><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/user.svg" alt=""/></span><span class="font-medium">عرض الملف الشخصي </span></a><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/delete2.svg" alt=""/></span><span class="font-medium">حذف من التدريب </span></a></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <hr/>
                          <div class="widget_item-info mt-3 d-flex align-items-center flex-wrap mb-3">
                            <div class="col-6">
                              <div class="d-flex align-items-start"><img class="info-icon me-2" src="../assets/images/calendar.svg" alt=""/><span class="info-title text-gray"> تاريخ التسجيل<span class="font-bold d-block text-black mt-2">{{$user->created_at}}</span></span></div>
                            </div>
                            <div class="col-6">
                              <div class="d-flex align-items-start"><img class="info-icon me-2" src="../assets/images/calendar.svg" alt=""/><span class="info-title text-gray">التقييم العام<span class="text-success font-bold d-block mt-2">ممتاز</span></span></div>
                            </div>
                          </div>
                          <div class="widget_item-details bg-gray rounded-4 p-2">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                              <h6 class="font-light">نسبة التقدم</h6>
                              <h6 class="font-bold bg-white px-2 py-1 rounded"> {{$course->progress()}}%</h6>
                            </div>
                            <div class="progress bg-white">
                              <div class="progress-bar" div="div" role="progressbar" style="width: {{$course->progress()}}%" aria-valuenow="{{$course->progress()}}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                       @endforeach
                    </div>
                    @endif
                    <div class="row"> 
                      <div class="col-12"> 
                       {{$course->users()->paginate(9)->links('components.common.pagination')}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
            <div class="pannel">
              <h5 class="mb-3 font-bold">أعلى المتدربين</h5>
              <hr/>

              @forelse($top_trainees as $item)
                <div class="widget_item-user d-flex align-items-center justify-content-between bg-gray p-2 rounded-4 mb-2">
                  
                  <div class="widget_item-user-avatar col-auto me-2 image-small">
                    <img src="{{ $item['user']->profile?->image}}" alt="">
                  </div>

                  <div class="widget_item-user-info me-auto">
                    <h6 class="font-12 mb-1 font-semi-bold">
                      {{ $item['user']->name }}
                    </h6>
                    <h6 class="font-12 text-gray">نسبة التقدم</h6>
                  </div>

                  <h6 class="font-12 font-medium bg-white rounded-3 py-1 px-2">
                    {{ $item['progress'] }}%
                  </h6>
                </div>
              @empty
                <p class="text-gray text-center">لا يوجد متدربين بعد</p>
              @endforelse

            </div>
          </div>
          </div>


  @section('scripts')
      <script>
    $(document).ready(function () {
        const player = $("#course-player");

        $(".lesson-link").on("click", function (e) {
            e.preventDefault();

            const videoUrl = $(this).data("url");

            if (videoUrl) {
                player.attr("src", videoUrl);
            }

            $(".widget_item-lesson").removeClass("active");
            $(this).closest(".widget_item-lesson").addClass("active");

        });
    });
    </script>
  @endsection
</x-common.layout>