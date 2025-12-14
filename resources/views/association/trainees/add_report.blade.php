<x-common.layout>
       <div class="row">
            <div class="col-12">
              <form action="">
                <div class="row">
                  <div class="col-12 mb-3">
                    <div class="d-flex justify-content-between">
                      <div class="col-lg-7">
                        <h3 class="font-semi-bold mb-2">   اضافة تقرير </h3>
                        <h6 class="text-gray">   قم بتعبئة التقييم بناءً على أداء الطلاب خلال هذا الأسبوع.</h6>
                      </div>
                      <div class="col-lg-auto"><a class="me-2 btn btn-white" href=""> رجوع</a>
                        <button class="btn btn-primary px-4" type="submit">اضافة تقرير      </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
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
                </div>
                <div class="row">
                  <div class="col-12"> 
                    <div class="pannel">
                      <h3 class="font-semi-bold">ملاحظات عامة</h3>
                      <hr/>
                      <div class="form-group"> 
                        <textarea class="form-control" rows="5" placeholder="ملاحظات عامة ..."></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-12"> 
                    <div class="pannel">
                      <h3 class="font-semi-bold">مرفقات</h3>
                      <hr/>
                      <div class="form-group"> 
                        <div class="upload-box pt-4">
                          <input id="fileInput" type="file" accept=".pdf,.doc,.docx"/>
                          <div class="upload-placeholder"><img class="mb-3" src="../assets/images/upload.svg"/>
                            <h3 class="font-bold mb-2 text-main">اسحب وأفلِت أو اختر الملف الذي تريد تحميله</h3>
                            <h6 class="mb-2 text-sub">الحد الأقصى للحجم 5 ميجا بايت</h6>
                          </div>
                          <div class="file-list"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
</x-common.layout>