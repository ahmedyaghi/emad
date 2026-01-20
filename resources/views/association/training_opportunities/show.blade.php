<x-common.layout>
      <div class="row mb-4">
            <div class="col-12">
              <div class="row"> 
                <div class="col-12"> 
                  <ol class="breadcrumb">
                    <div class="breadcrumb-item"><a href="{{route('association.training-opportunities.index')}}"> استكشف الفرص التدريبية</a></div>
                    <div class="breadcrumb-item">{{$training_opportunity->title}}</div>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <ul class="nav nav-pills mb-3 gap-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-1" type="button" role="tab">عن التدريب التعاوني</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link " data-bs-toggle="pill" data-bs-target="#tab-2" type="button" role="tab">المتقدمين للفرصة</button>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="tab-1">
                  <div class="pannel">
                    <div class="d-flex align-items-center mb-4">
                      <div class="col"> 
                        <h3 class="font-bold">{{$training_opportunity->title}}</h3>
                      </div>
                      <div class="col-atuo"> 
                        <h6 class="{{$training_opportunity->getStatusClass()}} font-medium px-4 py-2 rounded-3">{{$training_opportunity->getStatus()}}</h6>
                      </div>
                    </div>
                    <h6>{{$training_opportunity->short_description}}</h6>
                  </div>
                  <div class="card">
                    <div class="card-head">
                      <h5 class="font-semi-bold mb-2"> المهام والمسؤوليات</h5>
                    </div>
                    <div class="card-body">
                      <ul class="description-list">
                        {!! $training_opportunity->responsibilities !!}
                      </ul>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-head">
                      <h5 class="font-semi-bold mb-2"> شروط القبول</h5>
                    </div>
                    <div class="card-body">
                      <ul class="description-list">
                         {!! $training_opportunity->conditions !!}
                      </ul>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-head">
                      <h5 class="font-semi-bold mb-2"> المزايا والمكافأة</h5>
                    </div>
                    <div class="card-body">
                      <ul class="description-list">
                        {!! $training_opportunity->features !!}
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="tab-2">
                  <div class="row mb-4">
                    <div class="col-12">
                      <div class="pannel">
                        <ul class="nav nav-tabs nav-clip-path mb-3 gap-3" id="pills-tab" role="tablist">
                          <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-2-1" type="button" role="tab">المتقدمين ({{count($applied_applications)}})</button>
                          </li>
                          <li class="nav-item">
                            <button class="nav-link " data-bs-toggle="pill" data-bs-target="#tab-2-2" type="button" role="tab">قيد المراجعة ({{count($reviewed_applications)}})</button>
                          </li>
                          <li class="nav-item">
                            <button class="nav-link " data-bs-toggle="pill" data-bs-target="#tab-2-3" type="button" role="tab">وافق ({{count($accepted_applications)}})</button>
                          </li>
                          <li class="nav-item">
                            <button class="nav-link " data-bs-toggle="pill" data-bs-target="#tab-2-4" type="button" role="tab">رفض ({{count($rejected_applications)}})</button>
                          </li>
                        </ul>
                        <div class="toolbar-action">
                          <div class="search-bar">
                            <input class="form-control" type="text" placeholder="البحث عن المرشحين ..."/><span class="search-icon"><img src="../assets/images/search.svg" alt=""/></span>
                          </div>
                          <div class="action-buttons">
                            <button class="btn btn-icon border rounded-4"><img src="{{asset('assets/images/file-import.svg')}}" alt=""/></button>
                            <button class="btn btn-icon border rounded-4"><img src="{{asset('assets/images/file-export.svg')}}" alt=""/></button>
                            <button class="btn btn-icon border rounded-4 drawer-toggle"><img src="{{asset('assets/images/filter.svg')}}" alt=""/></button>
                          </div>
                          <div class="action-buttons">
                            <select class="select2">
                              <option value="1"> الأحدث</option>
                              <option value="2"> الاقدم</option>
                            </select>
                          </div>
                          <div class="action-buttons view-switch-buttons">
                            <button class="btn btn-icon border rounded-4 list-view"><img src="{{asset('assets/images/row-vertical.svg')}}" alt=""/></button>
                            <button class="btn btn-icon border rounded-4 grid-view active"><img src="{{asset('assets/images/categoray.svg')}}" alt=""/></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-12">
                      <div class="tab-content view-mode" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab-2-1">
                          @if(!$applied_applications->isEmpty())
                          <div class="row"> 
                            @foreach ($applied_applications as $application)
                              <x-common.training_application :application="$application"/>
                            @endforeach
                          </div>
                          <div class="row"> 
                              {{$applied_applications->links('components.common.pagination')}}
                          </div>
                          @endif
                        </div>
                        <div class="tab-pane fade " id="tab-2-2">
                          @if(!$reviewed_applications->isEmpty())
                          <div class="row"> 
                            @foreach ($reviewed_applications as $application)
                              <x-common.training_application :application="$application"/>
                            @endforeach
                          </div>
                          <div class="row"> 
                             {{$reviewed_applications->links('components.common.pagination')}}
                          </div>
                          @endif
                        </div>
                        <div class="tab-pane fade " id="tab-2-3">
                          @if(!$accepted_applications->isEmpty())
                          <div class="row"> 
                           @foreach ($accepted_applications as $application)
                            <x-common.training_application :application="$application"/>
                           @endforeach
                          </div>
                          <div class="row"> 
                            {{$accepted_applications->links('components.common.pagination')}}
                          </div>
                          @endif
                        </div>
                        <div class="tab-pane fade " id="tab-2-4">
                          @if(!$rejected_applications->isEmpty())
                          <div class="row"> 
                             @foreach ($rejected_applications as $application)
                             <x-common.training_application :application="$application"/>
                            @endforeach
                          </div>
                          <div class="row"> 
                             {{$rejected_applications->links('components.common.pagination')}}
                          </div>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="drawer bg-white p-4">
            <div class="drawer-head mb-4">
              <div class="d-flex align-items-center justify-content-between"> 
                <h4 class="font-bold">فلترة المتقدمين</h4>
                <button class="btn btn-icon btn-light h-auto w-auto p-1 rounded-pull drawer-toggle"><img src="{{asset('assets/images/close.svg')}}" alt=""/></button>
              </div>
            </div>
            <div class="drawer-body mb-4">
              <div class="row"> 
                <div class="col-lg-6">  
                  <div class="form-group"> 
                    <label class="mb-2">هل الموظف سعودي؟</label>
                    <select class="select2" data-placeholder="هل الموظف سعودي؟">
                      <option value="1">نعم </option>
                      <option value="1">لا </option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">  
                  <div class="form-group"> 
                    <label class="mb-2">الجنسية</label>
                    <select class="select2" data-placeholder="الجنسية">
                      <option value="1">نعم </option>
                      <option value="1">لا </option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">  
                  <div class="form-group"> 
                    <label class="mb-2">المؤهل العلمي</label>
                    <select class="select2" data-placeholder="المؤهل العلمي">
                      <option value="1">نعم </option>
                      <option value="1">لا </option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">  
                  <div class="form-group"> 
                    <label class="mb-2">التخصص</label>
                    <select class="select2" data-placeholder="التخصص">
                      <option value="1">نعم </option>
                      <option value="1">لا </option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">  
                  <div class="form-group"> 
                    <label class="form-label">تاريخ التقديم </label>
                    <input class="form-control datetimepicker" type="text" placeholder="تاريخ التقديم "/>
                  </div>
                </div>
                <div class="col-lg-6">  
                  <div class="form-group"> 
                    <label class="mb-2">هل الموظف قديم؟</label>
                    <select class="select2" data-placeholder="هل الموظف قديم؟">
                      <option value="1">نعم </option>
                      <option value="1">لا </option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="drawer-footer">
              <div class="row">
                <div class="col-lg-6">
                  <button class="btn btn-white w-100">مسح الفلاتر</button>
                </div>
                <div class="col-lg-6">
                  <button class="btn btn-primary w-100">تطبيق الفلتر (24 مشروع)</button>
                </div>
              </div>
            </div>
          </div>
</x-common.layout>