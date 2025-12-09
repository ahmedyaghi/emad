<x-common.layout>
    <div class="row mb-4">
        <div class="col-12">
            <div class="row"> 
                <div class="col-12"> 
                    <ol class="breadcrumb">
                        <div class="breadcrumb-item"><a href="">ملاحظات</a></div>
                        <div class="breadcrumb-item">إضافة ملاحظة جديدة</div>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row"> 
        <div class="col-12"> 
            <form action="{{ route('consultant.notes.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row"> 
                    <div class="col-12 mb-3">
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-7">
                                <h3 class="font-semi-bold mb-2">إضافة ملاحظة</h3>
                                <h6 class="text-gray">قم بتعبئة التقييم بناءً على بيانات الملاحظة</h6>
                            </div>
                            <div class="col-lg-auto">
                                <div class="d-flex align-items-center">
                                    <a class="me-2 btn btn-white" href="{{ route('consultant.notes.index') }}">رجوع</a>
                                    <button class="btn btn-primary px-4" type="submit">إضافة الملاحظة</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="pannel">
                            <h3 class="font-semi-bold">معلومات الملاحظة</h3>
                            <hr/>

                            <div class="row"> 

                                {{-- العنوان --}}
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="mb-2">عنوان الملاحظة</label>
                                        <input class="form-control" type="text" placeholder="عنوان الملاحظة" name="title" />
                                        @if($errors->first('title'))
                                            <div class="text-danger mt-2">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                </div>

                                {{-- الجهة المرسلة --}}
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-2">الجهة المرسلة إليها</label>
                                        <select class="select2" data-placeholder="الجهة المرسلة إليها" name="send_to">
                                            <option></option>
                                            <option value="1">إدارة الجمعية</option>
                                        </select>
                                        @if($errors->first('send_to'))
                                            <div class="text-danger mt-2">{{ $errors->first('send_to') }}</div>
                                        @endif
                                    </div>
                                </div>

                                {{-- نوع الملاحظة --}}
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-2">نوع الملاحظة</label>
                                        @if(!$types->isEmpty())
                                            <select class="select2" data-placeholder="نوع الملاحظة" name="type_id">
                                                <option></option>
                                                @foreach($types as $type)
                                                    <option value="{{ $type->id }}">{{ $type->type }}</option>   
                                                @endforeach 
                                            </select>
                                        @endif

                                        @if($errors->first('type_id'))
                                            <div class="text-danger mt-2">{{ $errors->first('type_id') }}</div>
                                        @endif
                                    </div>
                                </div>

                                {{-- التفاصيل --}}
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="mb-2">تفاصيل الملاحظة</label>
                                        <textarea class="form-control" placeholder="تفاصيل الملاحظة" rows="7" name="description"></textarea>
                                        @if($errors->first('description'))
                                            <div class="text-danger mt-2">{{ $errors->first('description') }}</div>
                                        @endif
                                    </div>
                                </div>

                                {{-- المرفقات --}}
                                <div class="col-12">
                                    <div class="form-group"> 
                                        <label class="form-label">مرفقات</label>
                                        <div class="upload-box">
                                            <input id="fileInput" type="file" accept=".jpg,.jpeg,.png,.gif" name="file"/>
                                            <div class="upload-placeholder">
                                                <img class="mb-3" src="{{ asset('assets/images/upload.svg') }}"/>
                                                <h3 class="font-bold mb-2 text-main">اسحب وأفلِت أو اختر الملف الذي تريد تحميله</h3>
                                                <h6 class="mb-2 text-sub">الحد الأقصى للحجم 5 ميجا بايت</h6>
                                            </div>
                                            <div class="file-list"></div>
                                        </div>
                                        @if($errors->first('file'))
                                            <div class="text-danger mt-2">{{ $errors->first('file') }}</div>
                                        @endif
                                    </div>
                                </div>

                            </div> <!-- row -->
                        </div> <!-- pannel -->
                    </div> 
                </div>

            </form>
        </div>
    </div>
</x-common.layout>
