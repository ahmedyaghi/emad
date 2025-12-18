<!-- start:: modal -->
<div class="modal fade" id="profileCompletionFormModal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0">
    <div class="modal-header flex-column align-items-start">
        <h3 class="mb-2 font-semi-bold">التقديم على التدريب</h3>
        <h6 class="text-gray">أنت على بُعد خطوة واحدة من التقديم على هذه التدريب.</h6>
    </div>
    <div class="modal-body p-0">
        <form action="{{route('individual.training-opportunities.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="training_id" value="{{$training_opportunity->id}}">
        <div class="row">
            <div class="col-12">
            <div class="p-4">
                <div class="form-group"> 
                <label class="form-label">السيرة الذاتية </label>
                <div class="upload-box">
                    <input id="fileInput" type="file" accept=".pdf,.doc,.docx" name="cv"/>
                    <div class="upload-placeholder"><img class="mb-3" src="{{asset('assets/images/upload.svg')}}"/>
                    <h3 class="font-bold mb-2 text-main">اسحب وأفلِت أو اختر الملف الذي تريد تحميله</h3>
                    <h6 class="mb-2 text-sub">الحد الأقصى للحجم 5 ميجا بايت</h6>
                    </div>
                    <div class="file-list"></div>
                </div>
                @if ($errors->has('cv'))
                    <span class="text-danger">{{ $errors->first('cv') }}</span>
                @endif
                </div>
                <div class="form-group"> 
                <label class="form-label">خطاب تعريفي </label>
                <textarea name="cover_letter" id="" cols="30" rows="4" class="form-control"></textarea>
                @if ($errors->has('cover_letter'))
                    <span class="text-danger">{{ $errors->first('cover_letter') }}</span>
                @endif
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <div class="modal-footer d-flex align-items-center justify-content-between"> 
                <button class="btn btn-white" type="button" data-bs-dismiss="modal">إلغاء</button>
                <button class="btn btn-primary" type="submit">التقديم</button>
            </div>
            </div>
        </div>
        </form>
    </div>
    </div>
</div>
</div>
<!-- end:: modal -->

<!-- start:: modal -->
<div class="modal fade" id="profileCompletionModal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0">
    <div class="modal-body p-0">
        <form action=""> 
        <div class="row">
            <div class="col-lg-8 mx-auto">
            <div class="text-center p-4 p-lg-5">
                <div class="profile-completion mb-4">
                <div class="profile-image"><img src="../assets/images/avatar.png" alt=""/></div>
                <div class="profile-percentage text-white font-semi-bold">76%</div>
                <div class="profile-progress"><img src="../assets/images/circle.png" alt=""/></div>
                </div>
                <h3 class="font-semi-bold mb-4">لا يمكنك التقديم على هذه التدريب قبل استكمال ملفك الشخصي.</h3>
                <h6 class="text-gray">يرجى إضافة معلوماتك الأساسية، المؤهلات، والخبرات العملية لضمان ظهورك بشكل احترافي أمام الجهات المعلنة.</h6>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <div class="modal-footer d-flex align-items-center justify-content-between"> 
                <button class="btn btn-white" data-bs-dismiss="modal">إلغاء</button><a class="btn btn-primary" href="">التقديم</a>
            </div>
            </div>
        </div>
        </form>
    </div>
    </div>
</div>
</div><!-- end:: modal -->