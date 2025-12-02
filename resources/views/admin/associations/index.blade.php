<x-common.layout>
     <div class="row gx-lg-3">
            <div class="col-12 mb-4">
              <div class="d-flex justify-content-between">
                <div class="col-lg-7">
                  <h3 class="font-semi-bold mb-2">  الجمعيات</h3>
                  <h6 class="text-gray"> الاطلاع على الجمعيات</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-4"> 
            <div class="col-12">
              <div class="profile-nav">
                <ul class="nav nav-pills mb-3 gap-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-1" type="button" role="tab">طلبات الانضمام</button>
                  </li>
                  <li class="nav-item">
                    <button class="nav-link " data-bs-toggle="pill" data-bs-target="#tab-2" type="button" role="tab">الجمعيات المسجلة</button>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="pannel">
                <div class="toolbar-action">
                  <div class="search-bar">
                    <input class="form-control" type="text" placeholder="البحث عن الجمعيات ..."/><span class="search-icon"><img src="../assets/images/search.svg" alt=""/></span>
                  </div>
                  <div class="action-buttons">
                    <button class="btn btn-icon border rounded-4 drawer-toggle"><img src="../assets/images/filter.svg" alt=""/></button>
                  </div>
                  <div class="action-buttons">
                    <select class="select2">
                      <option value="1"> الأحدث</option>
                      <option value="2"> الاقدم</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-4"> 
            <div class="col-12">
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="tab-1">
                  @if(!$pending_associations->isEmpty())
                  <div class="row gx-lg-3">

                    @foreach ($pending_associations as $user)
                      <div class="col-lg-4 col-ms-6">
                      <div class="card widget_item-card p-4 rounded-4 mb-3">
                        <div class="widget_item-content">
                          <h4 class="widget_item-title font-semi-bold mb-3"><a href="{{route('admin.association.profile', $user)}}">{{$user->name}}</a></h4>
                          <h6 class="widget_item-desc text-gray mb-3">{{$user->profile->bio}}</h6>
                          <div class="widget_item-info d-flex align-items-center border-0">
                            <div class="col">
                              <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray"> تاريخ الانضمام<span class="font-bold d-block text-black mt-2">{{$user->created_at}}</span></span></div>
                            </div>
                            <div class="col">
                              <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/city.svg')}}" alt=""/><span class="info-title text-gray">المجال<span class="font-bold d-block text-black mt-2"> لخدمات الحج والعمرة</span></span></div>
                            </div>
                          </div>
                          <hr/>
                          <div class="row gx-2">
                            <div class="col-6">
                              <a class="btn btn-light-danger w-100" href="{{route('admin.users.update.status', ['status' =>App\Enums\UserStatus::REJECTED, 'id' => $user->id])}}">رفض</a>
                            </div>
                            <div class="col-6">
                              <a class="btn btn-light-success w-100" href="{{route('admin.users.update.status', ['status' =>App\Enums\UserStatus::ACCEPTED, 'id' => $user->id])}}">قبول</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  @endif
                  <div class="row">
                   {{ $pending_associations->links('common.pagination') }}
                  </div>
                </div>
                <div class="tab-pane fade" id="tab-2">
                  @if(!$accepted_associations->isEmpty())
                  <div class="row gx-lg-3">
                    @foreach ($accepted_associations as $user)
                     <div class="col-lg-4 col-ms-6">
                      <div class="card widget_item-card p-4 rounded-4 mb-3">
                        <div class="widget_item-content">
                          <h4 class="widget_item-title font-semi-bold mb-3"><a href="{{route('admin.association.profile', $user)}}"> {{$user->name}}</a></h4>
                          <h6 class="widget_item-desc text-gray mb-3">{{$user->profile->bio}}</h6>
                          <div class="widget_item-info mt-3 pt-3 d-flex align-items-center">
                            <div class="col">
                              <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray"> تاريخ الانضمام<span class="font-bold d-block text-black mt-2">{{$user->created_at}}</span></span></div>
                            </div>
                            <div class="col">
                              <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/city.svg')}}" alt=""/><span class="info-title text-gray">المجال<span class="font-bold d-block text-black mt-2"> لخدمات الحج والعمرة</span></span></div>
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
                      <div class="pannel p-2">
                      {{ $accepted_associations->links('common.pagination') }}
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
                <button class="btn btn-icon btn-light h-auto w-auto p-1 rounded-pull drawer-toggle"><img src="../assets/images/close.svg" alt=""/></button>
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