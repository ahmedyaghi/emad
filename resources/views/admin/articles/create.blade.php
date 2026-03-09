<x-common.layout>
<div class="row mb-4">
<div class="col-12">
    <div class="row"> 
    <div class="col-12"> 
        <ol class="breadcrumb">
        <div class="breadcrumb-item"><a href="{{route('admin.articles.create')}}">  المقالات</a></div>
        <div class="breadcrumb-item">إضافة مقال</div>
        </ol>
    </div>
    </div>
</div>
</div>
<div class="row"> 
<div class="col-12"> 
    <form action="{{route('admin.articles.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row"> 
        <div class="col-12 mb-3">
        <div class="d-flex justify-content-between">
            <div class="col-lg-7">
            <h3 class="font-semi-bold mb-2">  إضافة مقال</h3>
            <h6 class="text-gray">  قم بتعبئة التقييم بناءً على بيانات المقال</h6>
            </div>
            <div class="col-lg-auto">
            <div class="d-flex align-items-center"> <a class="me-2 btn btn-white" href="{{route('admin.articles.index')}}"> رجوع</a>
                <button class="btn btn-primary px-4" type="submit">إضافة المقال</button>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
        <div class="pannel">
            <h3 class="font-semi-bold">تفاصيل المقال</h3>
            <hr/>
            <div class="form-group">
            <label class="mb-2">عنوان المقال </label>
            <input class="form-control" type="text" placeholder="عنوان المقال" name="title"/>
            @if ($errors->has('title'))
                <span class="text-danger">{{ $errors->first('title') }}</span>
             @endif
            </div>
            <div class="form-group">
            <label class="mb-2">وصف مختصر </label>
            <input class="form-control" type="text" placeholder="وصف مختصر" name="short_description"/>
             @if ($errors->has('short_description'))
                <span class="text-danger">{{ $errors->first('short_description') }}</span>
             @endif
            </div>
            <div class="form-group">
            <label class="mb-2">محتوي المقال </label>
            <textarea class="summernote" name="description"> </textarea>
             @if ($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
             @endif
            </div>
            <div class="form-group"> 
            <label class="form-label"> اضافة صورة</label>
            <div class="upload-box">
                <input id="image" type="file" accept=".jpg,.jpeg,.png,.gif" name="image"/>
                <div class="upload-placeholder"><img class="mb-3" src="{{asset('assets/images/upload.svg')}}"/>
                <h3 class="font-bold mb-2 text-main">اسحب وأفلِت أو اختر الملف الذي تريد تحميله</h3>
                <h6 class="mb-2 text-sub">الحد الأقصى للحجم 5 ميجا بايت</h6>
                </div>
                <div class="file-list"></div>
            </div>
             @if ($errors->has('image'))
                <span class="text-danger">{{ $errors->first('image') }}</span>
             @endif
            </div>
        </div>
        </div>
    </div>
    </form>
</div>
</div>
@section('scripts')

<script>
    $('#image').on('change', function (e) {
    const file = e.target.files[0];

    if (file) {
    $(".upload-placeholder").hide();
    $(".file-list").empty();

    // Allow only non-image files
    if (file.type.startsWith("image/")) {
        const fileElement = `
        <div class="file-item d-flex align-items-center border rounded p-2" style="gap:8px;">
            <i class="fa fa-file text-main me-2"></i>
            <span>${file.name}</span>
        </div>
        `;
        $(".file-list").append(fileElement);
    } else {
        $(".upload-placeholder").show();
    }
    }

    // Reset input value
    //$(this).val("");
    });


</script>
@endsection
</x-common.layout>