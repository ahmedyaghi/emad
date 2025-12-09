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
                              <div class="col-12"> 
                                <div class="form-group"> 
                                  <label class="mb-2"> اسم الدورة <span class="text-danger"> *</span></label>
                                  <input class="form-control required" type="text" name="title" placeholder="مثال: مشرف حجاج…"/>
                                </div>
                              </div>
                              <div class="col-md-6"> 
                                <div class="form-group"> 
                                  <label class="mb-2">تاريخ بدء الدورة  <span class="text-danger"> *</span></label>
                                  <input class="form-control datetimepicker" type="text" name="start_date" placeholder="تاريخ بدء التدريب"/>
                                </div>
                              </div>
                              <div class="col-md-6"> 
                                <div class="form-group"> 
                                  <label class="mb-2">تاريخ نهاية الدورة   <span class="text-danger"> *</span></label>
                                  <input class="form-control datetimepicker" type="text" name="end_date" placeholder="تاريخ نهاية التدريب"/>
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
                                  <label class="mb-2">الفئة المستهدفة   </label>
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
                                  <textarea class="form-control summernote" rows="5" name="description"></textarea>
                                </div>
                              </div>
                              <div class="col-md-12"> 
                                <div class="form-group"> 
                                  <label class="mb-2">محاور الدورة</label>
                                  <textarea class="form-control summernote" rows="5" name="topics"></textarea>
                                </div>
                              </div>
                              <div class="col-md-12"> 
                                <div class="form-group"> 
                                  <label class="mb-2">الأهداف</label>
                                  <textarea class="form-control summernote" rows="5" name="goals"></textarea>
                                </div>
                              </div>
                              <hr/>
                                <div class="row mb-3" id="lecturers-container">
                                    <div class="row mb-4 lecturer-item">
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
                                       <div class="col-12">
                                          <div class="form-group"> 
                                            <button class="btn btn-white px-4" type="button" id="add-lecturer">  +  اضافة محاضر</button>
                                          </div>
                                        </div>
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
                                <div class="form-group">
                                  <label class="mb-2">اسم الوحدة   <span class="text-danger"> *</span></label>
                                  <input class="form-control bg-white" type="text" placeholder="مثال: الوحدة 1" name='unit[0][name]'/>
                                </div>
                                <div class="lessons-container">
                                  <div class="bg-white border p-4 rounded-4 mb-3">
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
            let data = get_data();
            send_data(url, data);
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
           if(ok && step === 2 && $('.trainee-card').length === 0){
              alert("يجب إضافة متدرب واحد على الأقل");
               ok = false;
           }
      
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
              <div class="col-12">
                <hr>
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
      
          // Add new lesson
        $(document).on('click', '.add-lesson', function(){
          let $unit = $(this).closest('.unit');
          let unitIndex = $('#units-container .unit').index($unit); // رقم الوحدة
          let lessonIndex = $unit.find('.lessons-container .lesson').length; // رقم الدرس الجديد داخل الوحدة

          var lesson = `
              <div class="bg-white border p-4 rounded-4 mb-3">
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
          $('#smartwizard').smartWizard("fixHeight");
      });

      // Add new unit
      $('#add-unit').on('click', function(){

      let unitIndex = $('#units-container .unit').length; // رقم الوحدة الجديدة
      var unit = `
          <div class="col-12 unit mt-4">
            <div class="bg-gray p-4 rounded-4">
              <div class="form-group">
                <label class="mb-2">اسم الوحدة <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-white" placeholder="مثال: الوحدة 1" name='unit[${unitIndex}][name]'/>
              </div>
              <div class="lessons-container">
                <div class="bg-white border p-4 rounded-4 mb-3">
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
                $('#smartwizard').smartWizard("fixHeight");
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
                        let image = "{{Storage::url('${user->profile->image}')}}";
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
      function get_data(){
          let data = {};
          
          // Course Information
          data.title = $('input[name="title"]').val();
          data.start_date = $('input[name="start_date"]').val();
          data.end_date = $('input[name="end_date"]').val();
          data.qualification_id = $('select[name="qualification_id"]').val();
          data.target_id = $('select[name="target_id"]').val();
          data.description = $('textarea[name="description"]').val();
          data.topics = $('textarea[name="topics"]').val();
          data.goals = $('textarea[name="goals"]').val();

          data.lecturers = [];

       
          $('#lecturers-container .lecturer-item').each(function(){
              let lecturer = {};
              lecturer.name = $(this).find('input[type="text"]').val();
              lecturer.bio = $(this).find('textarea').val();
              data.lecturers.push(lecturer);
          });

          // Units and Lessons
          data.units = [];
          $('#units-container .unit').each(function(unitIndex){
              let unit = {};
              unit.name = $(this).find('input[name^="unit"][name$="[name]"]').val();
              unit.lessons = [];

              $(this).find('.lessons-container .lesson').each(function(lessonIndex){
                  let lesson = {};
                  lesson.name = $(this).find('input[name$="[name]"]').val();
                  lesson.link = $(this).find('input[name$="[link]"]').val();
                  unit.lessons.push(lesson);
              });

              data.units.push(unit);
          });

          // Trainees
          data.trainees = [];
          $('#trainees-list .trainee-card').each(function(){
              data.trainees.push($(this).data('user-id'));
          });

          return data;
      }



      function send_data(url, data, method = 'POST'){
        $.ajax({
          url: url,
          type: method,
           data: {
            ...data,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response){
          if (response.success) {
              toastr.success(response.message);
              setTimeout(() => {
                  window.location.href = response.redirect;
              }, 1200); 
          }
        },
        error: function(xhr, status, error){
          console.log(error);
              if (error.success) {
                 toastr.error(response.message);
              }
          }
        });
      }
 </script>
@endsection
</x-common.layout>