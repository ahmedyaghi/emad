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
                <div class="col-auto"> 
                  <a class="btn btn-primary" href="{{route('admin.users.create')}}"> إضافة المستخدم</a>
                 <a href="{{ route('admin.users.export') }}" class="btn btn-secondary">تصدير Excel</a>
              </div>
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
                  <div class="col-auto">
                        <div class="d-flex align-items-center">
                            <div class="dropdown ms-2">
                                <button class="btn btn-icon bg-light py-1 px-2 h-auto w-auto border-0" data-bs-toggle="dropdown" aria-expanded="false"><img src="{{asset('assets/images/more-vertical.svg')}}" alt=""></button>
                                <div class="dropdown-menu">
                              
                                   <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                      @csrf
                                      @method('PATCH')

                                      <input type="hidden" name="status" value="{{ $user->status === \App\Enums\UserStatus::ACCEPTED ? \App\Enums\UserStatus::REJECTED : \App\Enums\UserStatus::ACCEPTED }}">

                                      <button type="submit" class="dropdown-item">
                                          <span class="dropdown-item-icon me-2">
                                              @if($user->status === \App\Enums\UserStatus::ACCEPTED)
                                                  <i class="fas fa-user-slash  text-danger"></i> &nbsp;
                                                  تعطيل المستخدم &nbsp;
                                              @else
                                                  <i class="fas fa-user-check text-success"></i> &nbsp;
                                                  تفعيل المستخدم &nbsp;
                                              @endif
                                          </span>
                                      </button>
                                  </form>
                                   <a class="dropdown-item" href="{{ route('admin.users.edit', $user->id) }}">
                                      <span class="dropdown-item-icon me-2">
                                          <i class="fas fa-user-edit text-primary"></i>
                                      </span>
                                      <span class="font-medium"> تعديل المستخدم </span>
                                  </a>
                                   <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف المستخدم؟')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="dropdown-item">
                                        <span class="dropdown-item-icon me-2">
                                            <i class="fas fa-user-times text-danger"></i>
                                        </span>
                                        <span class="font-medium"> حذف المستخدم </span>
                                    </button>
                                </form>
                                </div>
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
</x-common.layout>
