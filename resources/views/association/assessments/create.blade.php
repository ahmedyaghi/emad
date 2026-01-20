<x-common.layout>
    <div class="row mb-lg-2">
      <div class="col-12">
        <div class="row">
          <div class="col-12">
            <ol class="breadcrumb">
            <div class="breadcrumb-item"><a href="{{route('association.assessments.index')}}">التقييمات</a></div>
            <div class="breadcrumb-item">إضافة تقييم المتدرب</div>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <form action="{{route('association.assessments.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="row">
            <div class="col-12 mb-4">
              <div class="d-lg-flex justify-content-between">
                <div class="col-lg-7 mb-3 mb-lg-0">
                  <h3 class="font-semi-bold mb-3">  إضافة تقييم المتدرب</h3>
                  <h6 class="text-gray">قم بتعبئة التقييم بناءً على أداء المتدرب خلال الفترة</h6>
                </div>
                <div class="col-auto"> <a class="btn btn-white" href="{route('association.assessments.index')}}">رجوع </a>
                  <button class="btn btn-primary px-3 ms-2" type="submit">إضافة التقييم </button>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
                <div class="pannel">
                <h3 class="font-semi-bold">اختيار المتدرب - فرصة التدريب التعاوني</h3>
                <hr/>
                <div class="form-group">
                  <select class="select2" name="application_id">
                    <option value="">اختر</option>
                      @foreach ($applications as $application)
                          <option value="{{$application->id}}" @selected($application->id == request('application_id'))> {{$application->training->title . '-'. $application->user->name}}</option>
                      @endforeach
                  </select>
                    @if ($errors->has('application_id'))
                      <span class="text-danger">{{ $errors->first('application_id') }}</span>
                  @endif
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
                <div class="pannel">
                <h3 class="font-semi-bold">عنوان التقييم</h3>
                <hr/>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="عنوان التقييم ..." name="name" />
                  @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                </div>
              </div>
              <div class="pannel">
                <h3 class="font-semi-bold">ملاحظات عامة</h3>
                <hr/>
                <div class="form-group">
                  <textarea class="form-control" rows="5" placeholder="ملاحظات عامة ..." name="description"></textarea>
                    @if ($errors->has('description'))
                      <span class="text-danger">{{ $errors->first('description') }}</span>
                  @endif
                </div>
              </div>
            </div>
          </div>
          {{-- <div class="row">
            <div class="col-12">
              <div class="pannel">
                <h3 class="font-semi-bold">معلومات الطالب</h3>
                <hr/>
                <div class="card pb-0">
                  <div class="d-flex align-items-start">
                    <div class="col">
                      <div class="widget_item-user d-flex align-items-center">
                        <div class="widget_item-user-avatar col-auto me-2"><img src="../assets/images/avatar.png" alt=""/></div>
                        <div class="widget_item-user-info">
                          <h6 class="mb-1 font-medium">عبدالله محمود القحطاني</h6>
                          <h6 class="text-gray">مشرف تنظيم حشود</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr/>
                  <div class="widget_item-info mt-3 d-flex align-items-center flex-wrap mb-3">
                    <div class="col-6 col-lg-3">
                      <div class="d-flex align-items-start mb-4"><img class="info-icon me-2" src="../assets/images/city2.svg" alt=""/><span class="info-title text-gray">  الجهة<span class="font-bold d-block text-black mt-2"> اسم الجهة</span></span></div>
                    </div>
                    <div class="col-6 col-lg-3">
                      <div class="d-flex align-items-start mb-4"><img class="info-icon me-2" src="../assets/images/student-card.svg" alt=""/><span class="info-title text-gray">  الرقم الجامعي<span class="text-black font-bold d-block mt-2"> 90127903891</span></span></div>
                    </div>
                    <div class="col-6 col-lg-3">
                      <div class="d-flex align-items-start mb-4"><img class="info-icon me-2" src="../assets/images/user2.svg" alt=""/><span class="info-title text-gray">   اسم عضو هيئة التدريس المشرف<span class="text-black font-bold d-block mt-2"> د. فلان فلان</span></span></div>
                    </div>
                    <div class="col-6 col-lg-3">
                      <div class="d-flex align-items-start mb-4"><img class="info-icon me-2" src="../assets/images/user2.svg" alt=""/><span class="info-title text-gray">    اسم المستشار الميداني<span class="text-black font-bold d-block mt-2"> د. فلان فلان</span></span></div>
                    </div>
                    <div class="col-6 col-lg-3">
                      <div class="d-flex align-items-start mb-4"><img class="info-icon me-2" src="../assets/images/calendar.svg" alt=""/><span class="info-title text-gray">    تاريخ البداية<span class="text-black font-bold d-block mt-2">  25 مايو 2024</span></span></div>
                    </div>
                    <div class="col-6 col-lg-3">
                      <div class="d-flex align-items-start"><img class="info-icon me-2" src="../assets/images/calendar.svg" alt=""/><span class="info-title text-gray">     تاريخ النهاية<span class="text-black font-bold d-block mt-2">  25 مايو 2024</span></span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
          <div class="row">
            <div class="col-12">
              <div class="pannel">
                <h3 class="font-semi-bold"> التقييم السلوكي</h3>
                <hr/>
                <div class="row d-none d-lg-flex fw-bold mb-2 py-2">
                  <div class="col-4">
                    <h5>المعيار</h5>
                  </div>
                  <div class="col-4">
                    <h5>التقييم</h5>
                  </div>
                  <div class="col-4">
                    <h5>الملاحظات</h5>
                  </div>
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
                        <input class="form-control" type="text" name="progress[{{$criteria->id}}][notes]" value="{{ old('progress.'.$criteria->id.'.notes') }}" placeholder=""/>
                        @error('progress.'.$criteria->id.'.notes')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
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
                <div class="d-flex align-items-center justify-content-between">
                    <h3 class="font-semi-bold">  المهام المنفذة خلال الفترة </h3>
                    <button class="btn btn-primary add-row-task" type="button">  اضف جديد</button>
                </div>
                <hr/>
                <div class="row row-cols-lg-5 mb-3 d-none d-lg-flex">
                  <div class="col">
                    <h5> اليوم / التاريخ </h5>
                  </div>
                  <div class="col">
                    <h5> عنوان المهمة </h5>
                  </div>
                  <div class="col">
                    <h5> عدد الساعات </h5>
                  </div>
                  <div class="col">
                    <h5>مستوى الانجاز </h5>
                  </div>
                  <div class="col">
                    <h5> ملاحظات الجهة </h5>
                  </div>
                </div>

                <div class="list-task">

                @for($i=0; $i<1; $i++)
                <div class="row list-rows mb-3 mb-lg-0 align-items-center">
                @php
                  $fields =
                   [
                    'date'=>'اليوم / التاريخ',
                    'name'=>'عنوان المهمة',
                    'number_of_hours'=>'عدد الساعات',
                    'achievement_level'=>'مستوى الانجاز',
                    'notes'=>'ملاحظات الجهة'
                  ];
                @endphp

                @foreach($fields as $field => $label)
                <div class="col-12 col-md-6 col-lg">
                  <div class="form-group">
                    <label class="form-label d-md-none">{{$label}}</label>
                    <input class="form-control {{ $field === 'date' ? 'datepicker' : '' }}"  autocomplete="off" type="text" name="tasks[{{$i}}][{{$field}}]" value="{{ old('tasks.'.$i.'.'.$field) }}" placeholder="{{$label}}"/>
                    @error('tasks.'.$i.'.'.$field)
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                @endforeach
                <div class="col-auto">
                    <div class="form-group">
                        <button type="button" class="remove-task btn p-1 border-0">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                </div>
                @endfor
                </div>


                {{-- <div class="row row-cols-lg-5 list-rows mb-3 mb-lg-0">
                  <div class="col-12">
                    <div class="form-group">
                      <label class="form-label d-md-none">  اليوم /  التاريخ </label>
                      <input class="form-control" type="text" placeholder="اليوم /  التاريخ"/>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label class="form-label d-md-none">  عنوان المهمة </label>
                      <input class="form-control" type="text" placeholder="عنوان المهمة"/>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label class="form-label d-md-none">  عدد الساعات </label>
                      <input class="form-control" type="text" placeholder="00"/>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label class="form-label d-md-none"> مستوى الانجاز </label>
                      <select class="form-select select2" data-placeholder="اخنر">
                        <option> </option>
                        <option>  مكتمل</option>
                        <option> جيد جدًا</option>
                        <option> يحتاج تحسين</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label class="form-label d-md-none"> ملاحظات الجمعية </label>
                      <select class="form-select select2" data-placeholder="اخنر">
                        <option> </option>
                        <option>   انجز بدقة </option>
                        <option> جيد جدًا</option>
                        <option> يحتاج تحسين</option>
                      </select>
                    </div>
                  </div>
                </div> --}}

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="pannel">
                <h3 class="font-semi-bold">  التقييم المهاري </h3>
                <hr/>
                <div class="row row-cols-lg-4 mb-3 d-none d-lg-flex">
                  <div class="col">
                    <h5> المعيار </h5>
                  </div>
                  <div class="col">
                    <h5> الوزن النسبي </h5>
                  </div>
                  <div class="col">
                    <h5> مستوى الانجاز </h5>
                  </div>
                  <div class="col">
                    <h5>الملاحظات </h5>
                  </div>
                </div>

                 @foreach($general_criterias->where('type', 2) as $criteria)
                <div class="row row-cols-lg-4 list-rows mb-3 mb-lg-0">
                  <div class="col-12">
                    <div class="form-group">
                      <label class="form-label d-md-none">المعيار</label>
                      <h5 class="my-3 my-lg-0 form-control">{{$criteria->title}}</h5>
                    </div>
                  </div>
                  @php $numericFields = ['weight_percentage'=>'الوزن النسبي','achievement_level'=>'مستوى الانجاز','notes'=>'الملاحظات']; @endphp
                  @foreach($numericFields as $field => $label)
                  <div class="col-12">
                    <div class="form-group">
                      <label class="form-label d-md-none">{{$label}}</label>
                      @if($field=='weight_percentage' || $field=='achievement_level')
                      <div class="input-icon icon-right">
                        <input class="form-control" type="number" name="progress[{{$criteria->id}}][{{$field}}]" value="{{ old('progress.'.$criteria->id.'.'.$field) }}" placeholder="00"/>
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

                {{-- <div class="row row-cols-lg-4 list-rows mb-3 mb-lg-0">
                  <div class="col-12">
                    <div class="form-group">
                      <label class="form-label d-md-none">  المعيار </label>
                      <h5 class="my-3 my-lg-0 form-control">الانضباط</h5>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label class="form-label d-md-none">  عدد الساعات </label>
                      <div class="input-icon icon-left">
                        <input class="form-control" type="text" placeholder="00"/>
                        <div class="icon">%</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label class="form-label d-md-none"> مستوى الانجاز </label>
                      <select class="form-select select2" data-placeholder="اخنر">
                        <option> </option>
                        <option>  مكتمل</option>
                        <option> جيد جدًا</option>
                        <option> يحتاج تحسين</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label class="form-label d-md-none"> ملاحظات الجمعية </label>
                      <select class="form-select select2" data-placeholder="اخنر">
                        <option> </option>
                        <option>   انجز بدقة </option>
                        <option> جيد جدًا</option>
                        <option> يحتاج تحسين</option>
                      </select>
                    </div>
                  </div>
                </div> --}}

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="pannel">
                <h3 class="font-semi-bold">  التوصيات  </h3>
                <hr/>
                <div class="row d-none d-lg-flex fw-bold mb-2 py-2">
                  <div class="col-3">
                    <h5>المجال </h5>
                  </div>
                  <div class="col-3">
                    <h5>التوصية </h5>
                  </div>
                  <div class="col-3">
                    <h5> الإدارة المعنية </h5>
                  </div>
                  <div class="col-3">
                    <h5> الإجراءات المقترحة </h5>
                  </div>
                </div>
                @foreach($general_criterias->where('type', 3) as $criteria)
                <div class="row align-items-center list-rows mb-3 mb-lg-0">
                  <div class="col-12 col-lg-3">
                    <div class="form-group">
                      <h5 class="d-lg-none">المجال</h5>
                      <h5 class="my-3 my-lg-0 form-control">{{$criteria->title}}</h5>
                    </div>
                  </div>
                  @php $recommendFields = ['recommendations'=>'التوصية','responsible_side'=>'الإدارة المعنية','action_required'=>'الإجراءات المقترحة']; @endphp
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

                {{-- <div class="row align-items-center list-rows mb-3 mb-lg-0">
                  <div class="col-12 col-lg-3">
                    <div class="form-group">
                      <h5 class="d-lg-none">المجال: </h5>
                      <h5 class="my-3 my-lg-0 form-control">مهارات العرض</h5>
                    </div>
                  </div>
                  <div class="col-12 col-lg-3">
                    <div class="form-group">
                      <label class="form-label d-lg-none" for="eval-undefined">التوصبة:</label>
                      <input class="form-control" type="text" placeholder="تدريب اضافي داخلي"/>
                    </div>
                  </div>
                  <div class="col-12 col-lg-3">
                    <div class="form-group">
                      <label class="form-label d-lg-none" for="note-undefined">الجهة المسؤولة:</label>
                      <select class="form-select select2" data-placeholder="الجهة المسؤولة">
                        <option> </option>
                        <option> ممتاز</option>
                        <option> جيد جدًا</option>
                        <option> يحتاج تحسين</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12 col-lg-3">
                    <div class="form-group">
                      <label class="form-label d-lg-none" for="eval-undefined">الاجراء المطلوب:</label>
                      <input class="form-control" type="text" placeholder="تنسيق جلسة تدريب"/>
                    </div>
                  </div>
                </div> --}}
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
</x-common.layout>
