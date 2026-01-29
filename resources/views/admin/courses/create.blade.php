<x-common.layout>
        <div class="pannel">
            <div class="row mb-4">
              <div class="col-12">
                <h3 class="font-bold mb-3"> اضافة دورة</h3>
                <h6>أضف تفاصيل الدورة لعرضها في المنصة، ليتمكن الباحثون عن تدريب من الاطلاع عليها والتقديم.  </h6>
              </div>
            </div>
            <hr class="mb-4"/>
            <div class="row">
              <div class="col-12">
                <div id="smartwizard">
                  <form class="sw" action="">
                    <ul class="nav mb-4">
                      <li class="nav-item"><a class="nav-link" href="#step-1"><span>معلومات الدورة</span></a></li>
                      <li class="nav-item"><a class="nav-link" href="#step-2"><span>محتوى الدورة</span></a></li>
                      <li class="nav-item"><a class="nav-link" href="#step-3"><span>المتدربين</span></a></li>
                    </ul>
                    <div class="tab-content">
                      <!-- Step 1 — Course Information-->
                      <div class="tab-pane" id="step-1">
                        <div class="row">
                          <div class="col-12">
                            <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                  <label class="mb-2"> اسم الدورة <span class="text-danger"> *</span></label>
                                  <input class="form-control required" type="text" name="title" placeholder="مثال: مشرف حجاج…"/>
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label class="mb-2"> رابط الدورة <span class="text-danger"> *</span></label>
                                  <input class="form-control required" type="text" name="video_url" placeholder="https://www.youtube.com/watch?v=uTmhyEABZ1k"/>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="mb-2">تاريخ بدء الدورة  <span class="text-danger"> *</span></label>
                                  <input class="form-control datetimepicker required" type="text" name="start_date" placeholder="تاريخ بدء التدريب" autocomplete="off"/>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="mb-2">تاريخ نهاية الدورة   <span class="text-danger"> *</span></label>
                                  <input class="form-control datetimepicker required" type="text" name="end_date" placeholder="تاريخ نهاية التدريب" autocomplete="off"/>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="mb-2">المؤهل المطلوب    <span class="text-danger"> *</span></label>
                                  <select class="select2 form-control required" data-placeholder="اختر" name="qualification_id">
                                    @if(!$qualifications->isEmpty())
                                        <option></option>
                                      @foreach($qualifications as $qualification)
                                        <option value="{{ $qualification->id }}">{{ $qualification->name }}</option>
                                      @endforeach
                                     @endif
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="mb-2">الفئة المستهدفة   <span class="text-danger"> *</span></label>
                                 <select class="select2 form-control required" data-placeholder="اختر" name="target_id">
                                    @if(!$targets->isEmpty())
                                        <option></option>
                                      @foreach($targets as $target)
                                        <option value="{{ $target->id }}">{{ $target->name }}</option>
                                      @endforeach
                                     @endif
                                  </select>
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="form-group">
                                  <label class="mb-2">وصف الدورة<span class="text-danger"> *</span></label>
                                  <textarea class="form-control summernote required" rows="5" name="description"></textarea>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="mb-2">محاور الدورة <span class="text-danger"> *</span></label>
                                  <textarea class="form-control summernote required" rows="5" name="topics"></textarea>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="mb-2">الأهداف <span class="text-danger"> *</span></label>
                                  <textarea class="form-control summernote required" rows="5" name="goals"></textarea>
                                </div>
                              </div>
                              <hr/>
                                <div class="row mb-3" id="lecturers-container">
                                    <div class="row mb-4 lecturer-item">
                                       <div class="col-12 d-flex justify-content-between align-items-center mb-3">
                                         <h6 class="mb-0">محاضر #1</h6>
                                         <button class="btn btn-danger px-4 btn-sm delete-lecturer" type="button">حذف المحاضر</button>
                                       </div>
                                       <div class="col-12">
                                        <div class="form-group">
                                          <label class="mb-2">صورة المحاضر <span class="text-danger"> *</span></label>
                                          <input class="form-control lecturer-image-input required" type="file" accept="image/*" name='lecturers[0][image]' style="display: none;"/>
                                          <div class="lecturer-image-preview mt-2" style="cursor: pointer; width: 150px; height:150px; border: 2px dashed #ddd; border-radius: 50%; display: flex; align-items: center; justify-content: center; background-color: #f8f9fa;">
                                            <img src="" alt="اضغط لرفع الصورة" class="lecturer-preview-img" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; display: none;"/>
                                            <div class="lecturer-placeholder" style="text-align: center; color: #999;">
                                              <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-bottom: 8px;">
                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                <polyline points="17 8 12 3 7 8"></polyline>
                                                <line x1="12" y1="3" x2="12" y2="15"></line>
                                              </svg>
                                              <p class="mb-0" style="font-size: 14px;">اضغط لرفع الصورة</p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-12">
                                        <div class="form-group">
                                          <label class="mb-2"> اسم المحاضر <span class="text-danger"> *</span></label>
                                          <input class="form-control" type="text" name='lecturers[0][name]' placeholder="مثال: مشرف حجاج، منظم صفوف، مرشد ميداني…"/>
                                        </div>
                                      </div>
                                      <div class="col-12">
                                        <div class="form-group">
                                          <label class="mb-2">وصف المحاضر<span class="text-danger"> *</span></label>
                                          <textarea class="form-control" rows="6" placeholder="أدخل وصف المحاضر..." name='lecturers[0][bio]'></textarea>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                   <div class="form-group">
                                     <button class="btn btn-white px-4" type="button" id="add-lecturer">  +  اضافة محاضر</button>
                                   </div>
                                 </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Step 2 — Course Content-->
                      <div class="tab-pane" id="step-2">
                        <div class="row mb-4">
                          <div class="row mb-3" id="units-container">
                            <div class="col-12 unit">
                              <div class="bg-gray p-4 rounded-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                  <h6 class="mb-0">الوحدة #1</h6>
                                  <button class="btn btn-danger px-4 btn-sm delete-unit" type="button">حذف الوحدة</button>
                                </div>
                                <div class="form-group">
                                  <label class="mb-2">اسم الوحدة   <span class="text-danger"> *</span></label>
                                  <input class="form-control bg-white" type="text" placeholder="مثال: الوحدة 1" name='unit[0][name]'/>
                                </div>
                                <div class="lessons-container">
                                  <div class="bg-white border p-4 rounded-4 mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                      <h6 class="mb-0">الدرس #1</h6>
                                      <button class="btn btn-danger px-4 btn-sm delete-lesson" type="button">حذف الدرس</button>
                                    </div>
                                    <div class="lesson">
                                      <div class="form-group">
                                        <label class="mb-2">اسم الدرس   <span class="text-danger"> *</span></label>
                                       <input class="form-control bg-white" type="text" placeholder="اسم الدرس" name='unit[0][lessons][0][name]'/>
                                      </div>
                                      <div class="form-group">
                                        <label class="mb-2">لينك الدرس   <span class="text-danger"> *</span></label>
                                      <input class="form-control bg-white" type="text" placeholder="لينك الدرس" name='unit[0][lessons][0][link]'/>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group mt-2">
                                  <button class="btn btn-white px-4 add-lesson" type="button">+ اضافة درس جديد</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <div class="form-group">
                              <button class="btn btn-white px-4" id="add-unit" type="button">+ اضافة وحدة جديدة </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Step 3 — Trainees-->
                      <div class="tab-pane" id="step-3">
                        <div class="row mb-3">
                          <div class="col-12">
                            <div class="bg-gray p-3 rounded-4">
                              <div class="row align-items-end">
                                <div class="col">
                                  <div class="form-group mb-2">
                                    <label class="mb-2"> اسم المتدرب  <span class="text-danger"> *</span></label>
                                    <input class="form-control bg-white" id="trainee-name" type="text" placeholder="اسم المتدرب"/>
                                  </div>
                                </div>
                                <div class="col-auto">
                                  <h6>او</h6>
                                </div>
                                <div class="col">
                                  <div class="form-group mb-2">
                                    <label class="mb-2">رقم هوية المتدرب   <span class="text-danger"> *</span></label>
                                    <input class="form-control bg-white" id="trainee-id" type="text" placeholder="رقم الهوية"/>
                                  </div>
                                </div>
                                <div class="col-auto d-flex align-items-end">
                                  <button class="btn btn-primary" id="add-trainee" type="button">اضافة المتدرب</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-12" id="trainees-list"></div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>


@section('scripts')
  <script>
    var url = @js(route('admin.courses.store'));
    var search_trainee_url = @js(route('admin.courses.search.trainee'));
      $(document).ready(function () {

        // Initialize SmartWizard
        $('#smartwizard').smartWizard({
            theme: 'default',
            autoAdjustHeight: true,
            justified: true,
            showStepURLhash: false,
            lang: { next: 'التالي', previous: 'السابق' },
            toolbar: {
                extraHtml: `<button class="btn btn-primary btn-submit px-4">اضافة دورة</button>`
            },
        });

       $(document).on('click', '.btn-submit', function(e){
          e.preventDefault();
          let allOk = true;

          $('#smartwizard .tab-pane').each(function(index){
              if(!validateStep(index)){
                  allOk = false;
                  $('#smartwizard').smartWizard("goToStep", index);
                  return false; // يوقف الـ each
              }
          });

          if(allOk){
            let formData = get_form_data();
            send_data(url, formData);
          }
        });

        $("#smartwizard").on("showStep", function (e, anchorObject, stepIndex, stepDirection, stepPosition) {
          $(".btn-submit").toggle(stepPosition === 'last');
          $(".btn-submit").prop('disabled', stepPosition !== 'last');
        });


        // Initialize Select2
        $('.select2').select2({ width: '100%' });

        // Step change validation
        $("#smartwizard").on("leaveStep", function(e, anchorObject, stepIndex, nextStepIndex, stepDirection){
              if(stepDirection === 'forward'){
                  const ok = validateStep(stepIndex);
                  console.log('validateStep returned:', ok);
                  if(!ok) return false;
              }
        });
        // Validate steps
        function validateStep(step){
          let ok = true;
          const $step = $('#smartwizard .tab-pane').eq(step);
          $step.find('.error-message').remove();
          $step.find('.error').removeClass('error');

          $step.find('.required').each(function () {
              const $field = $(this);
              const tag = $field.prop('tagName').toLowerCase();
              let value = $field.val();

              if ($field.hasClass('select2')) {
                  value = $field.val();
                  if (!value || value === '') {
                      ok = false;
                      $field.next('.select2').find('.select2-selection').addClass('error');
                      if ($field.next('.error-message').length === 0)
                          $('<div class="error-message text-danger">الحقل مطلوب</div>').insertAfter($field.next('.select2'));
                  } else {
                      $field.next('.select2').find('.select2-selection').removeClass('error');
                  }
              } else if ((tag === 'input' || tag === 'textarea') && (!value || value.trim() === '')) {
                  ok = false;
                  $field.addClass('error');
                  if ($field.next('.error-message').length === 0)
                      $('<div class="error-message text-danger">الحقل مطلوب</div>').insertAfter($field);
              }
          });

           if(ok && step === 1 && $('.unit').length === 0){
               alert("يجب إضافة وحدة واحدة على الأقل");
               ok = false;
           }
          //  if(ok && step === 2 && $('.trainee-card').length === 0){
          //     alert("يجب إضافة متدرب واحد على الأقل");
          //      ok = false;
          //  }

          $('#smartwizard').smartWizard('fixHeight');
          if(!ok) $('html, body').animate({ scrollTop: 0 }, 500);
          return ok;
        }

        // Add lecturer
        $('#add-lecturer').on('click', function () {
          console.log('Add Lecturer button clicked');
          let index = $('#lecturers-container .lecturer-item').length;

          var lecturerGroup = `
            <div class="row mb-4 lecturer-item">
              <div class="col-12 d-flex justify-content-between align-items-center mb-3">
                <h6 class="mb-0">محاضر #${index + 1}</h6>
                <button class="btn btn-danger px-4 btn-sm delete-lecturer" type="button">حذف المحاضر</button>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label class="mb-2">صورة المحاضر <span class="text-danger">*</span></label>
                  <input type="file" class="form-control lecturer-image-input" accept="image/*" name='lecturers[${index}][image]' style="display: none;"/>
                  <div class="lecturer-image-preview mt-2" style="cursor: pointer; width: 150px; height: 150px; border: 2px dashed #ddd; border-radius: 50%; display: flex; align-items: center; justify-content: center; background-color: #f8f9fa;">
                    <img src="" alt="اضغط لرفع الصورة" class="lecturer-preview-img" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; display: none;"/>
                    <div class="lecturer-placeholder" style="text-align: center; color: #999;">
                      <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-bottom: 8px;">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="17 8 12 3 7 8"></polyline>
                        <line x1="12" y1="3" x2="12" y2="15"></line>
                      </svg>
                      <p class="mb-0" style="font-size: 14px;">اضغط لرفع الصورة</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label class="mb-2">اسم المحاضر <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" placeholder="مثال: مشرف حجاج، منظم صفوف، مرشد ميداني…"
                   name='lecturers[${index}][name]'/>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label class="mb-2">وصف المحاضر <span class="text-danger">*</span></label>
                  <textarea rows="6" class="form-control" placeholder="أدخل وصف المحاضر..."
                  name='lecturers[${index}][bio]'></textarea>
                </div>
              </div>
            </div>
          `;

          $('#lecturers-container').append(lecturerGroup);
          $('#smartwizard').smartWizard("fixHeight");
        });

        // Delete lecturer
        $(document).on('click', '.delete-lecturer', function(){
          if($('#lecturers-container .lecturer-item').length > 1){
            $(this).closest('.lecturer-item').remove();
            // إعادة ترقيم المحاضرين
            $('#lecturers-container .lecturer-item').each(function(index){
              $(this).find('h6').text('محاضر #' + (index + 1));
            });
            $('#smartwizard').smartWizard("fixHeight");
          } else {
            alert('يجب أن يكون هناك محاضر واحد على الأقل');
          }
        });

        // Click on image preview to trigger file input
        $(document).on('click', '.lecturer-image-preview', function(){
          $(this).siblings('.lecturer-image-input').click();
        });

        // Preview lecturer image
        $(document).on('change', '.lecturer-image-input', function(e){
          const file = e.target.files[0];
          const $preview = $(this).siblings('.lecturer-image-preview');
          const $img = $preview.find('.lecturer-preview-img');
          const $placeholder = $preview.find('.lecturer-placeholder');
          
          if(file){
            if(file.type.startsWith('image/')){
              const reader = new FileReader();
              reader.onload = function(e){
                $img.attr('src', e.target.result);
                $img.show();
                $placeholder.hide();
                $preview.css('border', '2px solid #ddd');
                $preview.css('padding', '0');
              };
              reader.readAsDataURL(file);
            } else {
              alert('الرجاء اختيار ملف صورة');
              $(this).val('');
              $img.hide();
              $placeholder.show();
            }
          } else {
            $img.hide();
            $placeholder.show();
          }
        });

          // Add new lesson
        $(document).on('click', '.add-lesson', function(){
          let $unit = $(this).closest('.unit');
          let unitIndex = $('#units-container .unit').index($unit); // رقم الوحدة
          let lessonIndex = $unit.find('.lessons-container .lesson').length; // رقم الدرس الجديد داخل الوحدة

          var lesson = `
              <div class="bg-white border p-4 rounded-4 mb-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h6 class="mb-0">الدرس #${lessonIndex + 1}</h6>
                  <button class="btn btn-danger px-4 btn-sm delete-lesson" type="button">حذف الدرس</button>
                </div>
                <div class="lesson">
                  <div class="form-group">
                    <label class="mb-2">اسم الدرس <span class="text-danger">*</span></label>
                    <input class="form-control bg-white" type="text" placeholder="اسم الدرس" name='unit[${unitIndex}][lessons][${lessonIndex}][name]'/>
                  </div>
                  <div class="form-group">
                    <label class="mb-2">لينك الدرس <span class="text-danger">*</span></label>
                    <input class="form-control bg-white" type="text" placeholder="لينك الدرس" name='unit[${unitIndex}][lessons][${lessonIndex}][link]'/>
                  </div>
                </div>
              </div>
          `;

          $unit.find('.lessons-container').append(lesson);
          // إعادة ترقيم الدروس
          $unit.find('.lessons-container .bg-white').each(function(index){
            $(this).find('h6').text('الدرس #' + (index + 1));
          });
          $('#smartwizard').smartWizard("fixHeight");
      });

      // Delete lesson
      $(document).on('click', '.delete-lesson', function(){
        let $unit = $(this).closest('.unit');
        let $lessonsContainer = $unit.find('.lessons-container');
        
        if($lessonsContainer.find('.bg-white').length > 1){
          $(this).closest('.bg-white').remove();
          // إعادة ترقيم الدروس
          $unit.find('.lessons-container .bg-white').each(function(index){
            $(this).find('h6').text('الدرس #' + (index + 1));
          });
          $('#smartwizard').smartWizard("fixHeight");
        } else {
          alert('يجب أن يكون هناك درس واحد على الأقل في كل وحدة');
        }
      });

      // Add new unit
      $('#add-unit').on('click', function(){

      let unitIndex = $('#units-container .unit').length; // رقم الوحدة الجديدة
      var unit = `
          <div class="col-12 unit mt-4">
            <div class="bg-gray p-4 rounded-4">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="mb-0">الوحدة #${unitIndex + 1}</h6>
                <button class="btn btn-danger px-4 btn-sm delete-unit" type="button">حذف الوحدة</button>
              </div>
              <div class="form-group">
                <label class="mb-2">اسم الوحدة <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-white" placeholder="مثال: الوحدة 1" name='unit[${unitIndex}][name]'/>
              </div>
              <div class="lessons-container">
                <div class="bg-white border p-4 rounded-4 mb-3">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0">الدرس #1</h6>
                    <button class="btn btn-danger px-4 btn-sm delete-lesson" type="button">حذف الدرس</button>
                  </div>
                  <div class="lesson">
                    <div class="form-group">
                      <label class="mb-2">اسم الدرس <span class="text-danger">*</span></label>
                      <input class="form-control bg-white" type="text" placeholder="اسم الدرس" name='unit[${unitIndex}][lessons][0][name]'/>
                    </div>
                    <div class="form-group">
                      <label class="mb-2">لينك الدرس <span class="text-danger">*</span></label>
                      <input class="form-control bg-white" type="text" placeholder="لينك الدرس" name='unit[${unitIndex}][lessons][0][link]'/>
                    </div>
                  </div>
                </div>
              </div>
               <button class="btn btn-white px-4 add-lesson mt-2" type="button">+ اضافة درس جديد</button>
            </div>
          </div>`;

                $('#units-container').append(unit);
                // إعادة ترقيم الوحدات
                $('#units-container .unit').each(function(index){
                  $(this).find('.bg-gray h6').first().text('الوحدة #' + (index + 1));
                });
                $('#smartwizard').smartWizard("fixHeight");
            });

      // Delete unit
      $(document).on('click', '.delete-unit', function(){
        if($('#units-container .unit').length > 1){
          $(this).closest('.unit').remove();
          // إعادة ترقيم الوحدات
          $('#units-container .unit').each(function(index){
            $(this).find('.bg-gray h6').first().text('الوحدة #' + (index + 1));
          });
          $('#smartwizard').smartWizard("fixHeight");
        } else {
          alert('يجب أن يكون هناك وحدة واحدة على الأقل');
        }
      });


           // Add / Search trainee
          $('#add-trainee').on('click', function(){
              let name = $('#trainee-name').val().trim();
              let id   = $('#trainee-id').val().trim();

              if(name === "" && id === ""){
                  alert("يرجى إدخال اسم المتدرب أو رقم الهوية للبحث");
                  return;
              }

              // AJAX request to search trainee
              $.ajax({
                  url: search_trainee_url,
                  type: 'GET',
                  data: { name: name, id: id },
                  success: function(response){
                      // response يجب أن يكون مصفوفة من المتدربين { name, id, avatar(optional) }
                      if(response.length === 0){
                          alert('لم يتم العثور على متدربين مطابقين');
                          return;
                      }

                      $('#trainees-list').empty(); // يمكنك الإبقاء على السابق إذا أردت إضافة بدون مسح
                      response.forEach(function(user){

                        let image = user.profile.image;
                        let name = user.name;
                        let id_number = user.id_number;
                        let id = user.id;
                        let card = `
                          <div class="bg-gray p-3 rounded-4 mb-2 trainee-card"  data-user-id="${id}">
                            <div class="widget_item-user d-flex align-items-center justify-content-between bg-gray rounded-4">
                              <div class="widget_item-user-avatar col-auto me-2 image-small">
                                <img src="${image}" alt="">
                              </div>
                              <div class="widget_item-user-info me-auto">
                                <h6 class="font-bold font-12">${name}</h6>
                                <p class="font-12 text-gray">${id_number}</p>
                              </div>
                              <button class="btn btn-white px-2 rounded py-2 delete-trainee">
                                <img src="{{asset('assets/images/delete2.svg')}}">
                              </button>
                            </div>
                          </div>
                          `;
                          $('#trainees-list').append(card);
                      });

                      $('#trainee-name').val('');
                      $('#trainee-id').val('');
                      $('#smartwizard').smartWizard("fixHeight");
                  },
                  error: function(xhr){
                      alert('حدث خطأ أثناء البحث عن المتدربين. حاول مرة أخرى.');
                  }
              });
          });

          // Delete trainee card
          $(document).on('click', '.delete-trainee', function(){
              $(this).closest('.trainee-card').remove();
              $('#smartwizard').smartWizard("fixHeight");
          });


      });


      function get_form_data(){
        let formData = new FormData();

        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        // Course info
        formData.append('title', $('input[name="title"]').val());
        formData.append('video_url', $('input[name="video_url"]').val());
        formData.append('start_date', $('input[name="start_date"]').val());
        formData.append('end_date', $('input[name="end_date"]').val());
        formData.append('qualification_id', $('select[name="qualification_id"]').val());
        formData.append('target_id', $('select[name="target_id"]').val());
        formData.append('description', $('textarea[name="description"]').val());
        formData.append('topics', $('textarea[name="topics"]').val());
        formData.append('goals', $('textarea[name="goals"]').val());

        // Lecturers
        $('#lecturers-container .lecturer-item').each(function(index){
            formData.append(`lecturers[${index}][name]`,
                $(this).find('input[type="text"]').val()
            );

            formData.append(`lecturers[${index}][bio]`,
                $(this).find('textarea').val()
            );

            let imageInput = $(this).find('.lecturer-image-input')[0];
            if(imageInput.files.length > 0){
                formData.append(
                    `lecturers[${index}][image]`,
                    imageInput.files[0]
                );
            }
        });

        // Units & Lessons
        $('#units-container .unit').each(function(unitIndex){
            formData.append(
                `units[${unitIndex}][name]`,
                $(this).find('input[name$="[name]"]').val()
            );

            $(this).find('.lessons-container .lesson').each(function(lessonIndex){
                formData.append(
                    `units[${unitIndex}][lessons][${lessonIndex}][name]`,
                    $(this).find('input[name$="[name]"]').val()
                );
                formData.append(
                    `units[${unitIndex}][lessons][${lessonIndex}][link]`,
                    $(this).find('input[name$="[link]"]').val()
                );
            });
        });

        // Trainees
        $('#trainees-list .trainee-card').each(function(index){
            formData.append(`trainees[${index}]`, $(this).data('user-id'));
        });

        return formData;
    }


    function send_data(url, formData){
      $.ajax({
          url: url,
          type: 'POST',
          data: formData,
          processData: false, 
          contentType: false, 
          success: function(response){
              if (response.success) {
              toastr.success(response.message);
              setTimeout(() => {
                  window.location.href = response.redirect;
              }, 1200);
          }
          },
          error: function(xhr){
                var msg = 'حدث خطأ أثناء الإضافة';
              $.each(xhr.responseJSON.errors, function (key, value) {
                  msg += '<br>' + value;
              });
              toastr.error(msg);
          }
      });
  }

      // function send_data(url, data, method = 'POST'){
      //   $.ajax({
      //     url: url,
      //     type: method,
      //      data: {
      //       ...data,
      //       _token: $('meta[name="csrf-token"]').attr('content')
      //   },
      //   success: function(response){
      //     if (response.success) {
      //         toastr.success(response.message);
      //         setTimeout(() => {
      //             window.location.href = response.redirect;
      //         }, 1200);
      //     }
      //   },
      //   error: function(result){
      //    var msg = 'حدث خطأ أثناء الإضافة';
      //     $.each(result.responseJSON.errors, function (key, value) {
      //           msg += '<br>' + value;
      //       });
      //       toastr.error(msg);
      //   }
      //   });
      // }
 </script>
@endsection
</x-common.layout>
