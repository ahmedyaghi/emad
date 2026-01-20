<x-common.layout>
    <div class="row mb-lg-2">
      <div class="col-12">
        <div class="row"> 
          <div class="col-12"> 
            <ol class="breadcrumb">
              <div class="breadcrumb-item"><a href="{{route('association.reports.index')}}">التقارير</a></div>
              <div class="breadcrumb-item">إضافة تقييم المتدرب</div>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
          <form action="{{route('association.reports.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="row">
            <div class="col-12 mb-3">
              <div class="d-flex justify-content-between">
                <div class="col-lg-7">
                  <h3 class="font-semi-bold mb-3">  اضافة تقرير المتدرب</h3>
                  <h6 class="text-gray">قم بتعبئة التقرير بناءً على أداء المتدرب خلال الفترة</h6>
                </div>
                <div class="col-lg-auto"><a class="me-2 btn btn-white" href="{{route('association.reports.index')}}"> رجوع</a>
                  <button class="btn btn-primary px-4" type="submit">اضافة تقرير</button>
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
                <h3 class="font-semi-bold">عنوان التقرير</h3>
                <hr/>
                <div class="form-group"> 
                  <input type="text" class="form-control" placeholder="عنوان التقرير ..." name="title" />
                  @if ($errors->has('title'))
                      <span class="text-danger">{{ $errors->first('title') }}</span>
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
            <div class="col-12"> 
              <div class="pannel">
                <h3 class="font-semi-bold">مرفقات</h3>
                <hr/>
                <div class="form-group"> 
                  <div class="upload-box pt-4">
                    <input id="fileInput" type="file" accept=".pdf,.doc,.docx" name="file"/>
                    <div class="upload-placeholder"><img class="mb-3" src="{{asset('assets/images/upload.svg')}}"/>
                      <h3 class="font-bold mb-2 text-main">اسحب وأفلِت أو اختر الملف الذي تريد تحميله</h3>
                      <h6 class="mb-2 text-sub">الحد الأقصى للحجم 5 ميجا بايت</h6>
                    </div>
                    <div class="file-list"></div>
                  </div>
                    @if ($errors->has('file'))
                      <span class="text-danger">{{ $errors->first('file') }}</span>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
</x-common.layout>