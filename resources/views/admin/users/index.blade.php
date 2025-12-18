<x-common.layout>
      <div class="row gx-lg-3">
            <div class="col-12 mb-4">
              <div class="d-flex justify-content-between">
                <div class="col-lg-7">
                  <h3 class="font-semi-bold mb-2">  إدارة المستخدمين</h3>
                  <h6 class="text-gray"> الاطلاع على المستخدمين و صلاحياتهم</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-4"> 
            <div class="col-12">
              <div class="d-lg-flex">
                <div class="col">
                  <div class="profile-nav">
                    <ul class="nav nav-pills mb-3 gap-3" role="tablist">
                      <li class="nav-item"><a class="nav-link active" href="{{route('admin.users.index')}}">المستخدمين</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{route('admin.roles.index')}}">الصلاحيات</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-auto"> <a class="btn btn-primary" href="{{route('admin.users.create')}}"> إضافة المستخدم</a></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="pannel">
                <div class="toolbar-action">
                  <div class="search-bar">
                    <input class="form-control" type="text" placeholder="البحث عن المستخدمين ..."/><span class="search-icon"><img src="../assets/images/search.svg" alt=""/></span>
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
          @if(!$users->isEmpty())
          <div class="row gx-lg-3">
            @foreach ($users as $user)
                 <div class="col-lg-4 col-md-6">
              <div class="widget_item-card p-4 bg-white">
                <div class="d-flex align-items-start">
                  <div class="col">
                    <div class="widget_item-user d-flex align-items-center">
                      <div class="widget_item-user-avatar col-auto me-2"><img src="{{asset('assets/images/avatar.png')}}" alt=""/></div>
                      <div class="widget_item-user-info">
                        <h6 class="mb-1 font-medium">{{$user->name}}</h6>
                        <h6 class="text-gray">  {{$user->id_number}}</h6>
                      </div>
                    </div>
                  </div>
                </div>
                <hr/>
                <div class="widget_item-info mt-3 d-flex align-items-center flex-wrap border-0">
                  <div class="col-6 mb-4">
                    <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/call.svg')}}" alt=""/><span class="info-title text-gray">رقم الجوال<span class="font-bold d-block text-black mt-2">{{$user->phone}}</span></span></div>
                  </div>
                  <div class="col-6 mb-4">
                    <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/mail.svg')}}" alt=""/><span class="info-title text-gray"> البريد الإلكتروني<span class="font-bold d-block text-black mt-2">{{$user->email}}</span></span></div>
                  </div>
                  <div class="col-6">
                    <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray">تاريخ الانضمام <span class="font-bold d-block text-black mt-2">  {{$user->created_at}}</span></span></div>
                  </div>
                  <div class="col-6">
                    <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/city.svg')}}" alt=""/><span class="info-title text-gray"> الدور<span class="font-bold d-block text-black mt-2"> {{$user->getType()}}</span></span></div>
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
                {{$users->links('components.common.pagination')}}
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