<x-common.layout>
    <div class="row mb-lg-2">
        <div class="col-12">
            <ol class="breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">إدارة الأدوار</a></div>
                <div class="breadcrumb-item">اضافة دور</div>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf
                <div class="row mb-4">
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <h3 class="font-semi-bold mb-0">اضافة دور</h3>
                        <div>
                            <a class="btn btn-white" href="{{ route('admin.roles.index') }}">رجوع</a>
                            <button class="btn btn-primary px-3 ms-2" type="submit">إضافة</button>
                        </div>
                    </div>
                </div>

                <div class="pannel mb-4">
                    <h3 class="font-semi-bold">تفاصيل الدور</h3>
                    <hr/>
                    <div class="form-group mb-3">
                        <label class="form-label">اسم الدور</label>
                        <input type="text" name="role" class="form-control" placeholder="اسم الدور" required>
                    </div>
                </div>

                <div class="pannel">
                    <h3 class="font-semi-bold mb-3">صلاحيات الدور</h3>
                    @foreach($tables as $table)
                        @php $tableKey = Str::slug($table); @endphp
                        <div class="perms mb-3">
                            <div class="perm-row d-flex align-items-center justify-content-between gap-4">
                                <div class="perm-label col-auto">
                                    <label class="checkbox" for="manage-{{$tableKey}}">
                                        <input type="checkbox" id="manage-{{$tableKey}}" 
                                               name="permissions[{{$table}}][manage]" value="1"/>
                                        <span class="checkmark"></span>ادارة {{$table}}
                                    </label>
                                </div>
                                <div class="perm-actions d-flex flex-wrap gap-3">
                                    <label class="checkbox" for="view-{{$tableKey}}">
                                        <input type="checkbox" id="view-{{$tableKey}}" 
                                               name="permissions[{{$table}}][view]" value="1"/>
                                        <span class="checkmark"></span>عرض
                                    </label>
                                    <label class="checkbox" for="edit-{{$tableKey}}">
                                        <input type="checkbox" id="edit-{{$tableKey}}" 
                                               name="permissions[{{$table}}][edit]" value="1"/>
                                        <span class="checkmark"></span>تعديل
                                    </label>
                                    <label class="checkbox" for="delete-{{$tableKey}}">
                                        <input type="checkbox" id="delete-{{$tableKey}}" 
                                               name="permissions[{{$table}}][delete]" value="1"/>
                                        <span class="checkmark"></span>حذف
                                    </label>
                                    <label class="checkbox" for="create-{{$tableKey}}">
                                        <input type="checkbox" id="create-{{$tableKey}}" 
                                               name="permissions[{{$table}}][create]" value="1"/>
                                        <span class="checkmark"></span>اضافة
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>
</x-common.layout>
