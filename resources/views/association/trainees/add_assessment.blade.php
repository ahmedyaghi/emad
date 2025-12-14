<x-common.layout>
  <div class="row mb-lg-2">
    <div class="col-12">
      <ol class="breadcrumb">
        <div class="breadcrumb-item"><a href="{{route('association.trainees.index')}}">المتدربين</a></div>
        <div class="breadcrumb-item">إضافة تقييم المتدرب</div>
      </ol>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <form action="{{route('association.trainees.handle_assessment')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="application_id" value="{{ $application->id }}">

        <!-- معلومات الطالب -->
        <div class="pannel mb-4">
          <h3 class="font-semi-bold">معلومات الطالب</h3>
          <hr/>
          <div class="card pb-0">
            <div class="d-flex align-items-start">
              <div class="col">
                <div class="widget_item-user d-flex align-items-center">
                  <div class="widget_item-user-avatar col-auto me-2">
                    <img src="{{Storage::url($application->user->profile?->image)}}" alt=""/>
                  </div>
                  <div class="widget_item-user-info">
                    <h6 class="mb-1 font-medium">{{$application->user->name}}</h6>
                    <h6 class="text-gray">{{$application->user->profile?->bio}}</h6>
                  </div>
                </div>
              </div>
            </div>
            <hr/>
            <div class="widget_item-info mt-3 d-flex align-items-center flex-wrap mb-3">
              <!-- بيانات ثابتة للعرض -->
              <div class="col-6 col-lg-3">
                <div class="d-flex align-items-start mb-4">
                  <img class="info-icon me-2" src="{{asset('assets/images/city2.svg')}}" alt=""/>
                  <span class="info-title text-gray">الجهة
                    <span class="font-bold d-block text-black mt-2">اسم الجهة</span>
                  </span>
                </div>
              </div>
              <div class="col-6 col-lg-3">
                <div class="d-flex align-items-start mb-4">
                  <img class="info-icon me-2" src="{{asset('assets/images/student-card.svg')}}" alt=""/>
                  <span class="info-title text-gray">الرقم الجامعي
                    <span class="text-black font-bold d-block mt-2">90127903891</span>
                  </span>
                </div>
              </div>
              <div class="col-6 col-lg-3">
                <div class="d-flex align-items-start mb-4">
                  <img class="info-icon me-2" src="{{asset('assets/images/user2.svg')}}" alt=""/>
                  <span class="info-title text-gray">اسم عضو هيئة التدريس المشرف
                    <span class="text-black font-bold d-block mt-2">د. فلان فلان</span>
                  </span>
                </div>
              </div>
              <div class="col-6 col-lg-3">
                <div class="d-flex align-items-start mb-4">
                  <img class="info-icon me-2" src="{{asset('assets/images/user2.svg')}}" alt=""/>
                  <span class="info-title text-gray">اسم المستشار الميداني
                    <span class="text-black font-bold d-block mt-2">د. فلان فلان</span>
                  </span>
                </div>
              </div>
              <div class="col-6 col-lg-3">
                <div class="d-flex align-items-start mb-4">
                  <img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/>
                  <span class="info-title text-gray">تاريخ البداية
                    <span class="text-black font-bold d-block mt-2">25 مايو 2024</span>
                  </span>
                </div>
              </div>
              <div class="col-6 col-lg-3">
                <div class="d-flex align-items-start">
                  <img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/>
                  <span class="info-title text-gray">تاريخ النهاية
                    <span class="text-black font-bold d-block mt-2">25 مايو 2024</span>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- معلومات عامة عن تقدم الطالب -->
        @if(!$general_criterias->isEmpty())
        <div class="pannel mb-4">
          <h3 class="font-semi-bold">معلومات عامة عن تقدم الطالب</h3>
          <hr/>
          <div class="row d-none d-lg-flex fw-bold mb-2 py-2">
            <div class="col-4"><h5>المعيار</h5></div>
            <div class="col-4"><h5>التقييم</h5></div>
            <div class="col-4"><h5>الملاحظات</h5></div>
          </div>

          @foreach($general_criterias->where('type', 1) as $criteria)
          <div class="row align-items-center list-rows mb-3 mb-lg-0">
            <div class="col-12 col-lg-4">
              <div class="form-group">
                <h5 class="d-lg-none">المعيار</h5>
                <h5 class="my-3 my-lg-0 form-control">{{$criteria->title}}</h5>
              </div>
            </div>
            <div class="col-12 col-lg-4">
              <div class="form-group">
                <label class="form-label d-md-none">التقييم</label>
                <select class="form-select select2" name="progress[{{$criteria->id}}][evaluation_id]" data-placeholder="اختر">
                  <option></option>
                  @foreach($evaluations as $evaluation)
                  <option value="{{$evaluation->id}}" {{ old('progress.'.$criteria->id.'.evaluation_id') == $evaluation->id ? 'selected' : '' }}>{{$evaluation->title}}</option>
                  @endforeach
                </select>
                @error('progress.'.$criteria->id.'.evaluation_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-12 col-lg-4">
              <div class="form-group">
                <label class="form-label d-md-none">الملاحظات</label>
                <input class="form-control" type="text" name="progress[{{$criteria->id}}][notes]" value="{{ old('progress.'.$criteria->id.'.notes') }}" placeholder="حقل نصي اختياري"/>
                @error('progress.'.$criteria->id.'.notes')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>
          @endforeach
        </div>

        <!-- المهام المنفذة -->
        <div class="pannel mb-4">
          <h3 class="font-semi-bold">المهام المنفذة خلال الفترة</h3>
          <hr/>
          <div class="row row-cols-lg-5 mb-3 d-none d-lg-flex">
            <div class="col"><h5>اليوم / التاريخ</h5></div>
            <div class="col"><h5>وصف المهمة</h5></div>
            <div class="col"><h5>عدد الساعات</h5></div>
            <div class="col"><h5>مستوى الانجاز</h5></div>
            <div class="col"><h5>ملاحظات الجمعية</h5></div>
          </div>

          @for($i=0; $i<5; $i++)
          <div class="row row-cols-lg-5 list-rows mb-3 mb-lg-0">
            @php $fields = ['date'=>'اليوم / التاريخ', 'description'=>'وصف المهمة', 'hours'=>'عدد الساعات', 'achievement_level'=>'مستوى الانجاز', 'notes'=>'ملاحظات الجمعية']; @endphp
            @foreach($fields as $field => $label)
            <div class="col-12">
              <div class="form-group">
                <label class="form-label d-md-none">{{$label}}</label>
                <input class="form-control {{ $field === 'date' ? 'datepicker' : '' }}"  type="text" name="tasks[{{$i}}][{{$field}}]" value="{{ old('tasks.'.$i.'.'.$field) }}" placeholder="{{$label}}"/>
                @error('tasks.'.$i.'.'.$field)
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            @endforeach
          </div>
          @endfor
        </div>

        <!-- التقييم الرقمي -->
        <div class="pannel mb-4">
          <h3 class="font-semi-bold">التقييم الرقمي</h3>
          <hr/>
          <div class="row row-cols-lg-4 mb-3 d-none d-lg-flex">
            <div class="col"><h5>المعيار</h5></div>
            <div class="col"><h5>الوزن النسبي</h5></div>
            <div class="col"><h5>مستوى الانجاز</h5></div>
            <div class="col"><h5>الملاحظات</h5></div>
          </div>

          @foreach($general_criterias->where('type', 2) as $criteria)
          <div class="row row-cols-lg-4 list-rows mb-3 mb-lg-0">
            <div class="col-12">
              <div class="form-group">
                <label class="form-label d-md-none">المعيار</label>
                <h5 class="my-3 my-lg-0 form-control">{{$criteria->title}}</h5>
              </div>
            </div>
            @php $numericFields = ['hours'=>'الوزن النسبي','achievement_level'=>'مستوى الانجاز','notes'=>'الملاحظات']; @endphp
            @foreach($numericFields as $field => $label)
            <div class="col-12">
              <div class="form-group">
                <label class="form-label d-md-none">{{$label}}</label>
                @if($field=='hours')
                <div class="input-icon icon-left">
                  <input class="form-control" type="text" name="progress[{{$criteria->id}}][{{$field}}]" value="{{ old('progress.'.$criteria->id.'.'.$field) }}" placeholder="00"/>
                  <div class="icon">%</div>
                </div>
                @else
                <input class="form-control" type="text" name="progress[{{$criteria->id}}][{{$field}}]" value="{{ old('progress.'.$criteria->id.'.'.$field) }}" placeholder="{{$label}}"/>
                @endif
                @error('progress.'.$criteria->id.'.'.$field)
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            @endforeach
          </div>
          @endforeach
        </div>

        <!-- التوصيات والمتابعة -->
        <div class="pannel mb-4">
          <h3 class="font-semi-bold">التوصيات والمتابعة القادمة</h3>
          <hr/>
          <div class="row d-none d-lg-flex fw-bold mb-2 py-2">
            <div class="col-3"><h5>المجال</h5></div>
            <div class="col-3"><h5>التوصية</h5></div>
            <div class="col-3"><h5>الجهة المسؤولة</h5></div>
            <div class="col-3"><h5>الإجراء المطلوب</h5></div>
          </div>

          @foreach($general_criterias->where('type', 3) as $criteria)
          <div class="row align-items-center list-rows mb-3 mb-lg-0">
            <div class="col-12 col-lg-3">
              <div class="form-group">
                <h5 class="d-lg-none">المجال</h5>
                <h5 class="my-3 my-lg-0 form-control">{{$criteria->title}}</h5>
              </div>
            </div>
            @php $recommendFields = ['recommendation'=>'التوصية','responsible'=>'الجهة المسؤولة','action'=>'الإجراء المطلوب']; @endphp
            @foreach($recommendFields as $field => $label)
            <div class="col-12 col-lg-3">
              <div class="form-group">
                <label class="form-label d-md-none">{{$label}}</label>
                <input class="form-control" type="text" name="progress[{{$criteria->id}}][{{$field}}]" value="{{ old('progress.'.$criteria->id.'.'.$field) }}" placeholder="{{$label}}"/>
                @error('progress.'.$criteria->id.'.'.$field)
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            @endforeach
          </div>
          @endforeach
        </div>

        <div class="text-end mb-4">
          <button class="btn btn-primary px-3" type="submit">إضافة التقييم</button>
        </div>
        @endif
      </form>


      @if ($errors->any())
    <div class="alert alert-danger">
            <h5>قائمة الأخطاء:</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    </div>
  </div>
</x-common.layout>
