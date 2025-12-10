<x-common.layout>
         <div class="row mb-4">
            <div class="col-12"> 
              <ol class="breadcrumb">
                <div class="breadcrumb-item"><a href="{{route('individual.courses')}}"> دوراتي</a></div>
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
                  <button class="nav-link " data-bs-toggle="pill" data-bs-target="#tab-5" type="button" role="tab">الشهادات</button>
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
                  @foreach ($course->lecturers()->get() as $lecturer)
                       <div class="card"> 
                        <div class="d-flex align-items-center"> 
                          <div class="col-auto me-2 lecturer-image"><img class="rounded-circle" src="{{asset('assets/images/avatar.png')}}" alt=""/></div>
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
                  @foreach ($course->exams()->get() as $exam)
                    <div class="card"> 
                      <div class="d-flex align-items-center"> 
                        <div class="col">
                          <h5 class="font-semi-bold mb-2">{{$exam->title}}</h5>
                          <h6 class="text-gray">{{$exam->datetime}}</h6>
                        </div>
                        <div class="col-auto"><a class="btn btn-primary" href="{{route('individual.exam.start', $exam)}}">بدء الاختبار </a></div>
                        <div class="col-auto"><a class="disabled btn btn-primary" href="{{route('individual.exam.start', $exam)}}">بدء الاختبار </a></div>
                        <div class="col-auto">
                        <div class="widget_item-card rounded-3 p-3 test-result mb-0">
                          <h4 class="mb-2"><span class="total-score"> 120 / </span><span class="achieved-score">90</span></h4>
                          <h6 class="font-light font-12">نتيجة الاختبار </h6>
                        </div>
                      </div>
                      </div>
                    </div>
                  @endforeach
                  @endif
                </div>
                <div class="tab-pane fade" id="tab-5">
                  @if(!is_null($course->certificates()->get())) 
                  @foreach ($course->certificates()->get() as $certificate)  
                  <div class="card rounded-4">
                    <div class="d-flex align-items-center gap-3">
                      <div class="col-auto certificate-image"><img src="{{asset('assets/images/img1.png')}}" alt=""/></div>
                      <div class="col">
                        <h5 class="font-semi-bold mb-1">{{$certificate->title}}</h5>
                        <h5 class="text-gray mb-1"> 2.67 ميجابايت </h5>
                        <h6 class="text-gray">PDF</h6>
                      </div>
                      <div class="col-auto"><a class="btn btn-primary px-4" href="{{Storage::url($certificate->file)}}">تحميل الشهادة<img class="ms-2 filter-icon-white" src="{{asset('assets/images/download.svg')}}" alt=""/></a></div>
                    </div>
                  </div>
                   @endforeach
                  @endif
                </div>
              </div>
            </div>
            <div class="col-lg-4"> 
              <div class="pannel">
                <h5 class="mb-3 font-bold">حالة التقدم</h5>
                <hr/>
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <h6 class="font-light">نسبة التقدم</h6>
                  <h6 class="font-bold">30%</h6>
                </div>
                <div class="progress mb-3">
                  <div class="progress-bar" div="div" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h6 class="font-light text-gray">تاريخ البدء: 7 يوليو 2025</h6>
              </div>
              <div class="pannel">
                <h5 class="mb-3 font-bold">الاختبارات القادمة</h5>
                <hr/>
                <div class="widget_item-card rounded-3">
                  <h6 class="font-semi-bold mb-2">اسم الاختبار</h6>
                  <h6 class="font-light text-gray">وقت الاختبار: 7 يوليو 2025 - 12:00 مساء</h6>
                  <hr/><a class="btn btn-primary w-100" href="testing.html">بدء الاختبار </a>
                </div>
                <div class="widget_item-card rounded-3">
                  <h6 class="font-semi-bold mb-2">اسم الاختبار</h6>
                  <h6 class="font-light text-gray">وقت الاختبار: 7 يوليو 2025 - 12:00 مساء</h6>
                  <hr/><a class="btn btn-primary w-100" href="testing.html">بدء الاختبار </a>
                </div>
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