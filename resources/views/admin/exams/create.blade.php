<x-common.layout>
<div class="row"> 
<div class="col-12"> 
    <div class="pannel"> 
    <div class="row mb-4">
        <div class="col-12">
        <div class="d-flex align-items-start"> 
            <div class="col">
            <h2 class="mb-3 font-semi-bold font-24"> اضافة اختبار</h2>
            <h6 class="text-gray"> أضف تفاصيل الاختبار لعرضها في المنصة، ليتمكن الباحثون عن تدريب من الاطلاع عليها والتقديم. </h6>
            </div>
            <div class="col-auto"> <a class="btn btn-white" href="{{route('admin.exams.index')}}"> إلغاء</a></div>
        </div>
        </div>
    </div>
    <div class="row"> 
        <div class="col-12">
                 <form action="" method="POST">
        <div class="accordion accordion-testing" id="accordion">
            <div class="accordion-item mb-2">
            <h2 class="accordion-header">
                <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1"><span class="testing-number me-3">1</span>
                <p class="d-block mb-1 font-bold"> سؤال جديد </p><span class="btn btn-white ms-auto px-1 py-1 me-3 rounded-4 delete-question"><img src="../assets/images/trash.svg" alt=""/></span>
                </button>
            </h2>
            <div class="accordion-collapse collapse show" id="collapse-1">
                <div class="accordion-body px-0">
         

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="form-label">اسم السؤال <span class="text-danger">*</span></label>
                <input type="text" class="form-control bg-white" name="name" placeholder="اسم السؤال" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">نوع السؤال <span class="text-danger">*</span></label>
                <select class="form-control select2" name="type_id" data-placeholder="نوع السؤال" required>
                    <option value=""></option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">درجة السؤال <span class="text-danger">*</span></label>
                <input type="number" class="form-control bg-white" name="score" placeholder="درجة السؤال" required>
            </div>
        </div>

        <div class="col-12 mb-3">
            <h5 class="font-medium">خيارات الإجابة</h5>
        </div>

      @for($i = 1; $i <= 4; $i++)
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">الإجابة رقم {{ $i }} <span class="text-danger">*</span></label>
                    <input 
                        type="text" 
                        class="form-control bg-white" 
                        name="answers[{{ $i }}][name]" 
                        placeholder="الإجابة رقم {{ $i }}" 
                        required
                    >
                </div>
            </div>
        @endfor

        <!-- Correct Answer -->
        <div class="col-12 mt-3">
            <label class="form-label">الإجابة الصحيحة <span class="text-danger">*</span></label>
            <select class="form-control" name="correct_answer" required>
                <option value="">اختر الإجابة الصحيحة</option>
                @for($i = 1; $i <= 4; $i++)
                    <option value="{{ $i }}">إجابة رقم {{ $i }}</option>
                @endfor
            </select>
        </div>

              
            </div>
        </form>

                </div>
            </div>
            </div>
           
        </div>

        <div class="text-center mt-4">
            <button class="btn btn-primary  px-5" id="save-exam">حفظ الاختبار</button>
        </div>
        </form>
    </div>
    <div class="row"> 
        <div class="co-12"><a class="btn btn-white mt-3 px-3" id="add-question" type="button">   +  اضافة سؤال جديد</a></div>
    </div>
    </div>
</div>
</div>
@section('scripts')
<script>
$(document).ready(function(){

    // تهيئة select2 على الموجود أصلاً
    $('.select2').select2({ width: '100%' });

    // دالة مساعدة لبناء HTML لسؤال جديد (بدون <form> داخل)
    function buildQuestionHtml(qIndex) {
        return `
        <div class="accordion-item mb-2 question-card" data-index="${qIndex}">
            <h2 class="accordion-header">
                <button class="accordion-button shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${qIndex}">
                    <span class="testing-number me-3">${qIndex}</span>
                    <p class="d-block mb-1 font-bold">سؤال جديد</p>
                    <span class="btn btn-white ms-auto py-1 px-1 rounded-4 delete-question me-3">
                        <img src="../assets/images/trash.svg" alt="">
                    </span>
                </button>
            </h2>

            <div id="collapse-${qIndex}" class="accordion-collapse collapse">
                <div class="accordion-body px-0">
                    <div class="row">

                        <!-- اسم السؤال -->
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">اسم السؤال <span class="text-danger">*</span></label>
                                <input type="text" class="form-control bg-white question-input" name="questions[${qIndex}][name]" placeholder="اسم السؤال" required>
                            </div>
                        </div>

                        <!-- نوع السؤال -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">نوع السؤال <span class="text-danger">*</span></label>
                                <select class="form-control select2 type-select" name="questions[${qIndex}][type_id]" data-placeholder="نوع السؤال" required>
                                    <option value=""></option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- درجة السؤال -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">درجة السؤال <span class="text-danger">*</span></label>
                                <input type="number" class="form-control bg-white score-input" name="questions[${qIndex}][score]" placeholder="درجة السؤال" required>
                            </div>
                        </div>

                        <!-- خيارات الإجابة -->
                        <div class="col-12 mb-3">
                            <h5 class="font-medium">خيارات الإجابة</h5>
                        </div>

                        ${[1,2,3,4].map(i => `
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">الإجابة رقم ${i} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control bg-white answer-input" name="questions[${qIndex}][answers][${i}][title]" placeholder="الإجابة رقم ${i}" required>
                                </div>
                            </div>
                        `).join('')}

                        <!-- الإجابة الصحيحة -->
                        <div class="col-12 mt-3">
                            <label class="form-label">الإجابة الصحيحة <span class="text-danger">*</span></label>
                            <select class="form-control correct-select" name="questions[${qIndex}][correct]" required>
                                <option value="">اختر الإجابة الصحيحة</option>
                                <option value="1">إجابة رقم 1</option>
                                <option value="2">إجابة رقم 2</option>
                                <option value="3">إجابة رقم 3</option>
                                <option value="4">إجابة رقم 4</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </div>`;
    }

    // الإضافة الأولى: تأكد أن العنصر الأول يتبع نفس البنية (إذا لديك HTML ثابت سابق عيّنه بنفس الأصناف)
    // لو العنصر الأول مكتوب يدوياً في HTML الحالي، تقدر إما تغيّره يدوياً ليتضمن class="question-card" وحقول بنفس الأسماء، أو إعادة بنائه هينا:
    if ($('.accordion-testing .question-card').length === 0) {
        // نعيد تصميم السؤال الأول ليطابق البنية
        $('.accordion-testing').empty();
        $('.accordion-testing').append(buildQuestionHtml(1));
        $('.select2').select2({ width: '100%' });
    }

    // زر إضافة سؤال جديد
    $('#add-question').on('click', function(){
        // نحسب الفهرس بناءً على عدد الأسئلة الحالية + 1
        let qIndex = $('.accordion-testing .question-card').length + 1;
        $('.accordion-testing').append(buildQuestionHtml(qIndex));
        // إعادة تهيئة select2 للنطاقات الجديدة
        $('.select2').select2({ width: '100%' });
    });

    // حذف سؤال
    $(document).on('click', '.delete-question', function(){
        $(this).closest('.accordion-item').remove();
        // إعادة ترقيم الأرقام والمعرفات
        $('.accordion-item').each(function(i){
            let newIndex = i+1;
            $(this).attr('data-index', newIndex);
            $(this).find('.testing-number').text(newIndex);
            $(this).find('.accordion-button').attr('data-bs-target', `#collapse-${newIndex}`);
            $(this).find('.accordion-collapse').attr('id', `collapse-${newIndex}`);

            // تحديث أسماء الحقول لتبقى مرقمة بشكل صحيح (مهم عند الإرسال للـ backend)
            $(this).find('.question-input').attr('name', `questions[${newIndex}][name]`);
            $(this).find('.type-select').attr('name', `questions[${newIndex}][type_id]`);
            $(this).find('.score-input').attr('name', `questions[${newIndex}][score]`);
            $(this).find('.answer-input').each(function(ansIdx){
                // ansIdx يبدأ من 0، نريد 1..4
                let a = ansIdx + 1;
                $(this).attr('name', `questions[${newIndex}][answers][${a}][title]`);
            });
            $(this).find('.correct-select').attr('name', `questions[${newIndex}][correct]`);
        });
    });

    // حفظ الامتحان — يجمع كل الحقول من DOM الحالي
    $('#save-exam').click(function(e){
        e.preventDefault();

        let questions = [];
        let valid = true;
        let firstError = '';

        $('.accordion-testing .question-card').each(function(index){
            // index هنا صفري لكن نستخدم data-index إذا أردنا
            let qIndex = $(this).data('index') ?? (index+1);

            let name = $(this).find('.question-input').val();
            let type_id = $(this).find('.type-select').val();
            let score = $(this).find('.score-input').val();
            let correct = $(this).find('.correct-select').val();

            if (!name || !type_id || !score || !correct) {
                valid = false;
                if (!firstError) firstError = `اكمل بيانات السؤال رقم ${qIndex}`;
            }

            let answers = [];
            $(this).find('.answer-input').each(function(){
                answers.push({
                    title: $(this).val()
                });
            });

            // optional: validate 4 answers present
            if (answers.length < 4) {
                valid = false;
                if (!firstError) firstError = `أضف 4 إجابات للسؤال رقم ${qIndex}`;
            }

            questions.push({
                index: qIndex,
                name: name,
                type_id: type_id,
                score: score,
                correct: correct,
                answers: answers
            });
        });

        if (!valid) {
            // استخدم toastr إن متوفر، وإلا console
            if (typeof toastr !== 'undefined') {
                toastr.error(firstError || 'تحقق من الحقول المطلوبة');
            } else {
                alert(firstError || 'تحقق من الحقول المطلوبة');
            }
            return;
        }

        // إذا أردت رؤية البينات في الكونسول
        console.log(questions);

                $.ajax({
            url: "{{ route('admin.exams.store') }}",
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                questions: questions
            },
                 success: function(response){

              if (response.success) {
             toastr.success(response.message);

            setTimeout(() => {
                window.location.href = response.redirect;
            }, 1200); 
        }


          //  window.location.href = @js(route('admin.courses.index'));
          },
          error: function(xhr, status, error){
            alert('حدث خطأ أثناء إضافة الدورة. يرجى المحاولة مرة أخرى.');
          }

        
        });

    });

});
</script>
@endsection


</x-common.layout>