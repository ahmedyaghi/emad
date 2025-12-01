<x-common.layout>
     <div class="profile-container">
            <div class="row mb-4"> 
              <div class="col-12">
                <div class="pannel p-0">
                  <div class="profile-header">
                    <div class="profile-banner" style="background: url({{asset('assets/images/banner.png')}});background-size: cover; background-position: center;"></div>
                    <div class="profile-content">
                      <div class="profile-logo"><img src="{{asset('assets/images/logo.svg')}}" alt=""/></div>
                      <div class="text-end mb-3">
                        <div class="d-inline-flex align-items-center gap-2">
                            <a class="btn btn-light-danger" href="{{route('admin.users.update.status', ['status' => App\Enums\UserStatusEnum::REJECTED, 'id' => $user->id])}}">رفض</a>
                            <a class="btn btn-light-success" href="{{route('admin.users.update.status', ['status' => App\Enums\UserStatusEnum::ACCEPTED, 'id' => $user->id])}}">قبول </a></div>
                      </div>
                      <div class="profile-info">
                        <h3 class="font-semi-bold mb-2">{{$user->name}} </h3>
                        <h6 class="text-gray">{{$user->profile->bio}}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-4"> 
              <div class="col-12">
                <div class="profile-nav">
                  <ul class="nav nav-pills mb-3 gap-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                      <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-1" type="button" role="tab">عن الجهة</button>
                    </li>
                    <li class="nav-item">
                      <button class="nav-link " data-bs-toggle="pill" data-bs-target="#tab-2" type="button" role="tab">بيانات الاتصال</button>
                    </li>
                    <li class="nav-item">
                      <button class="nav-link " data-bs-toggle="pill" data-bs-target="#tab-3" type="button" role="tab">المتدربين</button>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="row mb-4"> 
              <div class="col-12">
                <div class="pannel">
                  <div class="profile-details">
                    <div class="tab-content" id="pills-tabContent">
                      <div class="tab-pane fade show active" id="tab-1">
                        <h5 class="mb-3 font-bold">بيانات الجهة</h5>
                        <hr/>
                        <div class="row"> 
                          <div class="col-lg-3 col-md-4 col-6 mb-4">
                            <div class="d-flex align-items-start">
                              <div class="col-auto me-3"><img src="../assets/images/city.svg" alt=""/></div>
                              <div class="col">
                                <h6 class="font-light mb-1 text-gray">المجال</h6>
                                <h6 class="font-12 font-semi-bold">لخدمات الحج والعمرة</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4 col-6 mb-4">
                            <div class="d-flex align-items-start">
                              <div class="col-auto me-3"><img src="../assets/images/city2.svg" alt=""/></div>
                              <div class="col">
                                <h6 class="font-light mb-1 text-gray">القطاع</h6>
                                <h6 class="font-12 font-semi-bold">اسم القطاع</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4 col-6 mb-4">
                            <div class="d-flex align-items-start">
                              <div class="col-auto me-3"><img src="../assets/images/permanent-job2.svg" alt=""/></div>
                              <div class="col">
                                <h6 class="font-light mb-1 text-gray">حجم الشركة</h6>
                                <h6 class="font-12 font-semi-bold">متوسطة</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4 col-6 mb-4">
                            <div class="d-flex align-items-start">
                              <div class="col-auto me-3"><img src="../assets/images/passport.svg" alt=""/></div>
                              <div class="col">
                                <h6 class="font-light mb-1 text-gray">رقم ال 700-100 </h6>
                                <h6 class="font-12 font-semi-bold">1829891</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4 col-6 mb-4">
                            <div class="d-flex align-items-start">
                              <div class="col-auto me-3"><img src="../assets/images/globe.svg" alt=""/></div>
                              <div class="col">
                                <h6 class="font-light mb-1 text-gray">الدولة</h6>
                                <h6 class="font-12 font-semi-bold">سعودي</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4 col-6 mb-4">
                            <div class="d-flex align-items-start">
                              <div class="col-auto me-3"><img src="../assets/images/city.svg" alt=""/></div>
                              <div class="col">
                                <h6 class="font-light mb-1 text-gray">المنطقة</h6>
                                <h6 class="font-12 font-semi-bold">الرياض</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4 col-6 mb-4">
                            <div class="d-flex align-items-start">
                              <div class="col-auto me-3"><img src="../assets/images/web-security.svg" alt=""/></div>
                              <div class="col">
                                <h6 class="font-light mb-1 text-gray">موقعك الإلكتروني </h6>
                                <h6 class="font-12 font-semi-bold">www.capitalx.com</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4 col-6 mb-4">
                            <div class="d-flex align-items-start">
                              <div class="col-auto me-3"><img src="../assets/images/new-twitter.svg" alt=""/></div>
                              <div class="col">
                                <h6 class="font-light mb-1 text-gray">موقع x  (تويتر)</h6>
                                <h6 class="font-12 font-semi-bold">twitter.com/CapitalX</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4 col-6 mb-4">
                            <div class="d-flex align-items-start">
                              <div class="col-auto me-3"><img src="../assets/images/facebook2.svg" alt=""/></div>
                              <div class="col">
                                <h6 class="font-light mb-1 text-gray">فيسبوك</h6>
                                <h6 class="font-12 font-semi-bold">Facebook.com/CapitalX</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4 col-6 mb-4">
                            <div class="d-flex align-items-start">
                              <div class="col-auto me-3"><img src="../assets/images/youtube.svg" alt=""/></div>
                              <div class="col">
                                <h6 class="font-light mb-1 text-gray">يوتيوب</h6>
                                <h6 class="font-12 font-semi-bold">YouTube.com/CapitalX</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="tab-2">
                        <h5 class="mb-3 font-bold">بيانات الاتصال</h5>
                        <hr/>
                        <div class="row"> 
                          <div class="col-lg-3 col-md-4 col-6 mb-4">
                            <div class="d-flex align-items-start">
                              <div class="col-auto me-3"><img src="../assets/images/user2.svg" alt=""/></div>
                              <div class="col">
                                <h6 class="font-light mb-1 text-gray">الإسم</h6>
                                <h6 class="font-12 font-semi-bold">احمد محمد</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4 col-6 mb-4">
                            <div class="d-flex align-items-start">
                              <div class="col-auto me-3"><img src="../assets/images/user-question.svg" alt=""/></div>
                              <div class="col">
                                <h6 class="font-light mb-1 text-gray">المنصب</h6>
                                <h6 class="font-12 font-semi-bold">مدير تنفيذي</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4 col-6 mb-4">
                            <div class="d-flex align-items-start">
                              <div class="col-auto me-3"><img src="../assets/images/globe.svg" alt=""/></div>
                              <div class="col">
                                <h6 class="font-light mb-1 text-gray">الجنسية</h6>
                                <h6 class="font-12 font-semi-bold">سعودي</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4 col-6 mb-4">
                            <div class="d-flex align-items-start">
                              <div class="col-auto me-3"><img src="../assets/images/call.svg" alt=""/></div>
                              <div class="col">
                                <h6 class="font-light mb-1 text-gray">رقم الجوال</h6>
                                <h6 class="font-12 font-semi-bold">+966 555 5555</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4 col-6 mb-4">
                            <div class="d-flex align-items-start">
                              <div class="col-auto me-3"><img src="../assets/images/mail.svg" alt=""/></div>
                              <div class="col">
                                <h6 class="font-light mb-1 text-gray">البريد الالكتروني</h6>
                                <h6 class="font-12 font-semi-bold">example@example.com</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="tab-3">
                        <h5 class="mb-3 font-bold">المتدربين</h5>
                        <hr/>
                        <div class="row"> 
                          <div class="col-lg-4 col-md-6">
                            <div class="card">
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
                                <div class="col-auto">
                                  <div class="d-flex align-items-center"> 
                                    <div class="dropdown ms-2">
                                      <button class="btn btn-icon bg-light py-1 px-2 h-auto w-auto border-0" data-bs-toggle="dropdown"><img src="../assets/images/more-vertical.svg" alt=""/></button>
                                      <div class="dropdown-menu"><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/file-add.svg" alt=""/></span><span class="font-medium">اضافة تقرير  </span></a><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/user.svg" alt=""/></span><span class="font-medium">عرض الملف الشخصي </span></a><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/delete2.svg" alt=""/></span><span class="font-medium">حذف من التدريب </span></a></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <hr/>
                              <div class="widget_item-info mt-3 d-flex align-items-center flex-wrap mb-3">
                                <div class="col-6">
                                  <div class="d-flex align-items-start"><img class="info-icon me-2" src="../assets/images/calendar.svg" alt=""/><span class="info-title text-gray"> تاريخ التسجيل<span class="font-bold d-block text-black mt-2">10 مايو 2025</span></span></div>
                                </div>
                                <div class="col-6">
                                  <div class="d-flex align-items-start"><img class="info-icon me-2" src="../assets/images/calendar.svg" alt=""/><span class="info-title text-gray">التقييم العام<span class="text-success font-bold d-block mt-2">ممتاز</span></span></div>
                                </div>
                              </div>
                              <div class="widget_item-details bg-gray rounded-4 p-2">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                  <h6 class="font-light">نسبة التقدم</h6>
                                  <h6 class="font-bold bg-white px-2 py-1 rounded"> 30%</h6>
                                </div>
                                <div class="progress bg-white">
                                  <div class="progress-bar" div="div" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 col-md-6">
                            <div class="card">
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
                                <div class="col-auto">
                                  <div class="d-flex align-items-center"> 
                                    <div class="dropdown ms-2">
                                      <button class="btn btn-icon bg-light py-1 px-2 h-auto w-auto border-0" data-bs-toggle="dropdown"><img src="../assets/images/more-vertical.svg" alt=""/></button>
                                      <div class="dropdown-menu"><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/file-add.svg" alt=""/></span><span class="font-medium">اضافة تقرير  </span></a><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/user.svg" alt=""/></span><span class="font-medium">عرض الملف الشخصي </span></a><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/delete2.svg" alt=""/></span><span class="font-medium">حذف من التدريب </span></a></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <hr/>
                              <div class="widget_item-info mt-3 d-flex align-items-center flex-wrap mb-3">
                                <div class="col-6">
                                  <div class="d-flex align-items-start"><img class="info-icon me-2" src="../assets/images/calendar.svg" alt=""/><span class="info-title text-gray"> تاريخ التسجيل<span class="font-bold d-block text-black mt-2">10 مايو 2025</span></span></div>
                                </div>
                                <div class="col-6">
                                  <div class="d-flex align-items-start"><img class="info-icon me-2" src="../assets/images/calendar.svg" alt=""/><span class="info-title text-gray">التقييم العام<span class="text-success font-bold d-block mt-2">ممتاز</span></span></div>
                                </div>
                              </div>
                              <div class="widget_item-details bg-gray rounded-4 p-2">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                  <h6 class="font-light">نسبة التقدم</h6>
                                  <h6 class="font-bold bg-white px-2 py-1 rounded"> 30%</h6>
                                </div>
                                <div class="progress bg-white">
                                  <div class="progress-bar" div="div" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 col-md-6">
                            <div class="card">
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
                                <div class="col-auto">
                                  <div class="d-flex align-items-center"> 
                                    <div class="dropdown ms-2">
                                      <button class="btn btn-icon bg-light py-1 px-2 h-auto w-auto border-0" data-bs-toggle="dropdown"><img src="../assets/images/more-vertical.svg" alt=""/></button>
                                      <div class="dropdown-menu"><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/file-add.svg" alt=""/></span><span class="font-medium">اضافة تقرير  </span></a><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/user.svg" alt=""/></span><span class="font-medium">عرض الملف الشخصي </span></a><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/delete2.svg" alt=""/></span><span class="font-medium">حذف من التدريب </span></a></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <hr/>
                              <div class="widget_item-info mt-3 d-flex align-items-center flex-wrap mb-3">
                                <div class="col-6">
                                  <div class="d-flex align-items-start"><img class="info-icon me-2" src="../assets/images/calendar.svg" alt=""/><span class="info-title text-gray"> تاريخ التسجيل<span class="font-bold d-block text-black mt-2">10 مايو 2025</span></span></div>
                                </div>
                                <div class="col-6">
                                  <div class="d-flex align-items-start"><img class="info-icon me-2" src="../assets/images/calendar.svg" alt=""/><span class="info-title text-gray">التقييم العام<span class="text-success font-bold d-block mt-2">ممتاز</span></span></div>
                                </div>
                              </div>
                              <div class="widget_item-details bg-gray rounded-4 p-2">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                  <h6 class="font-light">نسبة التقدم</h6>
                                  <h6 class="font-bold bg-white px-2 py-1 rounded"> 30%</h6>
                                </div>
                                <div class="progress bg-white">
                                  <div class="progress-bar" div="div" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 col-md-6">
                            <div class="card">
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
                                <div class="col-auto">
                                  <div class="d-flex align-items-center"> 
                                    <div class="dropdown ms-2">
                                      <button class="btn btn-icon bg-light py-1 px-2 h-auto w-auto border-0" data-bs-toggle="dropdown"><img src="../assets/images/more-vertical.svg" alt=""/></button>
                                      <div class="dropdown-menu"><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/file-add.svg" alt=""/></span><span class="font-medium">اضافة تقرير  </span></a><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/user.svg" alt=""/></span><span class="font-medium">عرض الملف الشخصي </span></a><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/delete2.svg" alt=""/></span><span class="font-medium">حذف من التدريب </span></a></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <hr/>
                              <div class="widget_item-info mt-3 d-flex align-items-center flex-wrap mb-3">
                                <div class="col-6">
                                  <div class="d-flex align-items-start"><img class="info-icon me-2" src="../assets/images/calendar.svg" alt=""/><span class="info-title text-gray"> تاريخ التسجيل<span class="font-bold d-block text-black mt-2">10 مايو 2025</span></span></div>
                                </div>
                                <div class="col-6">
                                  <div class="d-flex align-items-start"><img class="info-icon me-2" src="../assets/images/calendar.svg" alt=""/><span class="info-title text-gray">التقييم العام<span class="text-success font-bold d-block mt-2">ممتاز</span></span></div>
                                </div>
                              </div>
                              <div class="widget_item-details bg-gray rounded-4 p-2">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                  <h6 class="font-light">نسبة التقدم</h6>
                                  <h6 class="font-bold bg-white px-2 py-1 rounded"> 30%</h6>
                                </div>
                                <div class="progress bg-white">
                                  <div class="progress-bar" div="div" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 col-md-6">
                            <div class="card">
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
                                <div class="col-auto">
                                  <div class="d-flex align-items-center"> 
                                    <div class="dropdown ms-2">
                                      <button class="btn btn-icon bg-light py-1 px-2 h-auto w-auto border-0" data-bs-toggle="dropdown"><img src="../assets/images/more-vertical.svg" alt=""/></button>
                                      <div class="dropdown-menu"><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/file-add.svg" alt=""/></span><span class="font-medium">اضافة تقرير  </span></a><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/user.svg" alt=""/></span><span class="font-medium">عرض الملف الشخصي </span></a><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/delete2.svg" alt=""/></span><span class="font-medium">حذف من التدريب </span></a></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <hr/>
                              <div class="widget_item-info mt-3 d-flex align-items-center flex-wrap mb-3">
                                <div class="col-6">
                                  <div class="d-flex align-items-start"><img class="info-icon me-2" src="../assets/images/calendar.svg" alt=""/><span class="info-title text-gray"> تاريخ التسجيل<span class="font-bold d-block text-black mt-2">10 مايو 2025</span></span></div>
                                </div>
                                <div class="col-6">
                                  <div class="d-flex align-items-start"><img class="info-icon me-2" src="../assets/images/calendar.svg" alt=""/><span class="info-title text-gray">التقييم العام<span class="text-success font-bold d-block mt-2">ممتاز</span></span></div>
                                </div>
                              </div>
                              <div class="widget_item-details bg-gray rounded-4 p-2">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                  <h6 class="font-light">نسبة التقدم</h6>
                                  <h6 class="font-bold bg-white px-2 py-1 rounded"> 30%</h6>
                                </div>
                                <div class="progress bg-white">
                                  <div class="progress-bar" div="div" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 col-md-6">
                            <div class="card">
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
                                <div class="col-auto">
                                  <div class="d-flex align-items-center"> 
                                    <div class="dropdown ms-2">
                                      <button class="btn btn-icon bg-light py-1 px-2 h-auto w-auto border-0" data-bs-toggle="dropdown"><img src="../assets/images/more-vertical.svg" alt=""/></button>
                                      <div class="dropdown-menu"><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/file-add.svg" alt=""/></span><span class="font-medium">اضافة تقرير  </span></a><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/user.svg" alt=""/></span><span class="font-medium">عرض الملف الشخصي </span></a><a class="dropdown-item" href=""> <span class="dropdown-item-icon"><img class="me-2" src="../assets/images/delete2.svg" alt=""/></span><span class="font-medium">حذف من التدريب </span></a></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <hr/>
                              <div class="widget_item-info mt-3 d-flex align-items-center flex-wrap mb-3">
                                <div class="col-6">
                                  <div class="d-flex align-items-start"><img class="info-icon me-2" src="../assets/images/calendar.svg" alt=""/><span class="info-title text-gray"> تاريخ التسجيل<span class="font-bold d-block text-black mt-2">10 مايو 2025</span></span></div>
                                </div>
                                <div class="col-6">
                                  <div class="d-flex align-items-start"><img class="info-icon me-2" src="../assets/images/calendar.svg" alt=""/><span class="info-title text-gray">التقييم العام<span class="text-success font-bold d-block mt-2">ممتاز</span></span></div>
                                </div>
                              </div>
                              <div class="widget_item-details bg-gray rounded-4 p-2">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                  <h6 class="font-light">نسبة التقدم</h6>
                                  <h6 class="font-bold bg-white px-2 py-1 rounded"> 30%</h6>
                                </div>
                                <div class="progress bg-white">
                                  <div class="progress-bar" div="div" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
</x-common.layout>