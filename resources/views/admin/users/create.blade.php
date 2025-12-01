<x-common.layout>
     <div class="row mb-lg-2">
            <div class="col-12">
              <div class="row"> 
                <div class="col-12"> 
                  <ol class="breadcrumb">
                    <div class="breadcrumb-item"><a href="{{route('admin.users.index')}}">  إدارة المستخدمين</a></div>
                    <div class="breadcrumb-item">  إضافة مستخدم</div>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <div class="row"> 
            <div class="col-12"> 
              <form action="{{route('admin.users.store')}}" method="POST">
                @csrf 
                <div class="row"> 
                  <div class="col-12 mb-4">
                    <div class="d-flex justify-content-between">
                      <div class="col">
                        <h3 class="font-semi-bold mb-3">   إضافة مستخدم</h3>
                      </div>
                      <div class="col-auto"> <a class="btn btn-white" href="{{route('admin.users.index')}}">رجوع </a>
                        <button class="btn btn-primary px-3 ms-2" type="submit">إضافة</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row"> 
                  <div class="col-12">
                    <div class="pannel">
                      <h3 class="font-semi-bold">تفاصيل المستخدم</h3>
                      <hr/>
                      <div class="row"> 
                        <div class="col-md-6"> 
                          <div class="form-group"> 
                            <label class="form-label">الاسم  </label>
                            <input class="form-control" type="text" placeholder="الاسم " name="name"/>
                            @if ($errors->has('name'))
                              <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group"> 
                            <label class="form-label">رقم الهوية الوطنية أو الإقامة  </label>
                            <input class="form-control" type="text" placeholder="رقم الهوية الوطنية أو الإقامة* " name="id_number"/>
                            @if ($errors->has('id_number'))
                              <span class="text-danger">{{ $errors->first('id_number') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group"> 
                            <label class="form-label">رقم الجوال  </label>
                            <input class="form-control" type="text" placeholder="رقم الجوال " name="phone"/>
                            @if ($errors->has('phone'))
                              <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group"> 
                            <label class="form-label">البريد الإلكتروني  </label>
                            <input class="form-control" type="text" placeholder="البريد الإلكتروني " name="email"/>
                            @if ($errors->has('email'))
                              <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group"> 
                            <label class="form-label"> كلمة المرور  </label>
                            <div class="input-icon icon-left">
                              <input class="form-control" type="password" placeholder=" كلمة المرور " name="password"/>
                              <button class="icon toggle-pass"><img src="{{asset('assets/images/eye.svg')}}" alt=""/></button>
                            </div>
                            @if ($errors->has('password'))
                              <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group"> 
                            <label class="form-label">تأكيد كلمة المرور  </label>
                            <div class="input-icon icon-left">
                              <input class="form-control" type="password" placeholder="تأكيد كلمة المرور " name="password_confirmation"/>
                              <button class="icon toggle-pass"><img src="{{asset('assets/images/eye.svg')}}" alt=""/></button>
                            </div>
                            @if ($errors->has('password_confirmation'))
                              <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group"> 
                            <label class="form-label">الدور  </label>
                            <select class="select2" data="data-placeholder='الدور'" name="role_id">
                              @if (!$roles->isEmpty())
                              <option value="">اختر</option>
                                @foreach ($roles as $role)
                                  <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                              @endif
                            </select>
                            @if ($errors->has('role_id'))
                              <span class="text-danger">{{ $errors->first('role_id') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
</x-common.layout>