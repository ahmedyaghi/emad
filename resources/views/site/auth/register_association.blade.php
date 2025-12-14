<x-common.layout>
  <div class="row mb-lg-2">
    <div class="col-12">
      <div class="row">
        <div class="col-12">
          <ol class="breadcrumb">
            <div class="breadcrumb-item"><a href="{{route('association.trainees.index')}}">المتدربين</a></div>
            <div class="breadcrumb-item">إضافة تقييم المتدرب</div>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <form action="{{route('association.trainees.handle_assessment')}}" method="POST">
        @csrf

        <!-- رأس الفورم -->
        <div class="row mb-4">
          <div class="col-12">
            <div class="d-lg-flex justify-content-between">
              <div class="col-lg-7 mb-3 mb-lg-0">
                <h3 class="font-semi-bold mb-3">إضافة تقييم المتدرب</h3>
                <h6 class="text-gray">قم بتعبئة التقييم بناءً على أداء الطلاب خلال هذا الأسبوع.</h6>
              </div>
              <div class="col-auto">
                <a class="btn btn-white" href="{{route('association.trainees.index')}}">رجوع</a>
                <button class="btn btn-primary px-3 ms-2" type="submit">إضافة التقييم</button>
              </div>
            </div>
          </div>
        </div>

        <!-- معلومات الطالب -->
        <div class="row">
          <div class="col-12">
            <div class="pannel">
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
          </div>
        </div>

        @if(!$general_criterias->isEmpty())

        <div class="row">
          <div class="col-12">
            <div class="pannel">
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
                    @if(!$evaluations->isEmpty())
                    <select class="form-select select2" name="progress[{{$criteria->id}}][evaluation_id]" data-placeholder="اختر">
                      <option></option>
                      @foreach($evaluations as $evaluation)
                      <option value="{{$evaluation->id}}" {{ old('progress.'.$criteria->id.'.evaluation_id') == $evaluation->id ? 'selected' : '' }}>{{$evaluation->title}}</option>
                      @endforeach
                    </select>
                    @endif
                    @if ($errors->has('progress.'.$criteria->id.'.evaluation_id'))
                        <span class="text-danger">{{ $errors->first('progress.'.$criteria->id.'.evaluation_id') }}</span>
                    @endif
                  </div>
                </div>
                <div class="col-12 col-lg-4">
                  <div class="form-group">
                    <label class="form-label d-md-none">الملاحظات</label>
                    <input class="form-control" type="text" name="progress[{{$criteria->id}}][notes]" placeholder="حقل نصي اختياري" value="{{ old('progress.'.$criteria->id.'.notes') }}"/>
                    @if ($errors->has('progress.'.$criteria->id.'.notes'))
                        <span class="text-danger">{{ $errors->first('progress.'.$criteria->id.'.notes') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="pannel">
              <h3 class="font-semi-bold">المهام المنفذة خلال الفترة</h3>
              <hr/>
              <div class="row row-cols-lg-5 mb-3 d-none d-lg-flex">
                <div class="col"><h5>اليوم / التاريخ</h5></div>
                <div class="col"><h5>وصف المهمة</h5></div>
                <div class="col"><h5>عدد الساعات</h5></div>
                <div class="col"><h5>مستوى الانجاز</h5></div>
                <div class="col"><h5>ملاحظات الجمعية</h5></div>
              </div>

              @for($i = 0; $i < 5; $i++)
              <div class="row row-cols-lg-5 list-rows mb-3 mb-lg-0">
                  @php $fields = ['date','description','hours','achievement_level','notes']; @endphp
                  @foreach($fields as $field)
                  <div class="col-12">
                    <div class="form-group">
                      <label class="form-label d-md-none">{{ ucfirst(str_replace('_',' ',$field)) }}</label>
                      <input class="form-control" type="text" name="tasks[{{$i}}][{{$field}}]" placeholder="{{ ucfirst(str_replace('_',' ',$field)) }}" value="{{ old('tasks.'.$i.'.'.$field) }}">
                      @if ($errors->has('tasks.'.$i.'.'.$field))
                        <span class="text-danger">{{ $errors->first('tasks.'.$i.'.'.$field) }}</span>
                      @endif
                    </div>
                  </div>
                  @endforeach
              </div>
              @endfor
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="pannel">
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
                <div class="col-12">
                  <div class="form-group">
                    <label class="form-label d-md-none">الوزن النسبي</label>
                    <div class="input-icon icon-left">
                      <input class="form-control" type="text" name="progress[{{$criteria->id}}][hours]" placeholder="00" value="{{ old('progress.'.$criteria->id.'.hours') }}"/>
                      <div class="icon">%</div>
                    </div>
                    @if ($errors->has('progress.'.$criteria->id.'.hours'))
                      <span class="text-danger">{{ $errors->first('progress.'.$criteria->id.'.hours') }}</span>
                    @endif
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label class="form-label d-md-none">مستوى الانجاز</label>
                    <input class="form-control" type="text" name="progress[{{$criteria->id}}][achievement_level]" placeholder="مستوى الانجاز" value="{{ old('progress.'.$criteria->id.'.achievement_level') }}"/>
                    @if ($errors->has('progress.'.$criteria->id.'.achievement_level'))
                      <span class="text-danger">{{ $errors->first('progress.'.$criteria->id.'.achievement_level') }}</span>
                    @endif
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label class="form-label d-md-none">الملاحظات</label>
                    <input class="form-control" type="text" name="progress[{{$criteria->id}}][notes]" placeholder="الملاحظات" value="{{ old('progress.'.$criteria->id.'.notes') }}"/>
                    @if ($errors->has('progress.'.$criteria->id.'.notes'))
                      <span class="text-danger">{{ $errors->first('progress.'.$criteria->id.'.notes') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>

        <!-- التوصيات والمتابعة القادمة -->
        <div class="row">
          <div class="col-12">
            <div class="pannel">
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
                <div class="col-12 col-lg-3">
                  <div class="form-group">
                    <label class="form-label d-md-none">التوصية</label>
                    <input class="form-control" type="text" name="progress[{{$criteria->id}}][recommendation]" placeholder="التوصية" value="{{ old('progress.'.$criteria->id.'.recommendation') }}"/>
                    @if ($errors->has('progress.'.$criteria->id.'.recommendation'))
                      <span class="text-danger">{{ $errors->first('progress.'.$criteria->id.'.recommendation') }}</span>
                    @endif
                  </div>
                </div>
                <div class="col-12 col-lg-3">
                  <div class="form-group">
                    <label class="form-label d-md-none">الجهة المسؤولة</label>
                    <input class="form-control" type="text" name="progress[{{$criteria->id}}][responsible]" placeholder="الجهة المسؤولة" value="{{ old('progress.'.$criteria->id.'.responsible') }}"/>
                    @if ($errors->has('progress.'.$criteria->id.'.responsible'))
                      <span class="text-danger">{{ $errors->first('progress.'.$criteria->id.'.responsible') }}</span>
                    @endif
                  </div>
                </div>
                <div class="col-12 col-lg-3">
                  <div class="form-group">
                    <label class="form-label d-md-none">الإجراء المطلوب</label>
                    <input class="form-control" type="text" name="progress[{{$criteria->id}}][action]" placeholder="الإجراء المطلوب" value="{{ old('progress.'.$criteria->id.'.action') }}"/>
                    @if ($errors->has('progress.'.$criteria->id.'.action'))
                      <span class="text-danger">{{ $errors->first('progress.'.$criteria->id.'.action') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              @endforeach

            </div>
          </div>
        </div>

        @endif
      </form>
    </div>
  </div>
</x-common.layout>
