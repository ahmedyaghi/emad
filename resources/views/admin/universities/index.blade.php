<x-common.layout>

          <div class="row gx-lg-3">
            <div class="col-12 mb-4">
              <div class="d-flex justify-content-between">
                <div class="col-lg-7">
                  <h3 class="font-semi-bold mb-2">إدارة الجامعات</h3>
                  <h6 class="text-gray">إضافة وإدارة الجامعات المسجلة بالمنصة</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-4"> 
            <div class="col-12">
              <div class="d-lg-flex justify-content-end">
                <div class="col-auto">
                  <button class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#addUniversityModal">+ إضافة جامعة</button>
                </div>
              </div>
            </div>
          </div>
          <div class="row gx-lg-3">

            @foreach ($universities as $university)
                   <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100 shadow-sm">
                <div class="card-body">
                  <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="col">
                      <h5 class="card-title font-bold mb-0">{{ $university->name}}</h5>
                      {{-- <small class="text-gray">الرياض</small> --}}
                    </div>
                    <div class="col-auto">
                      <div class="dropdown">
                        <button class="btn btn-white border-0 btn-icon" type="button" data-bs-toggle="dropdown">
                          <img src="{{asset('assets/images/more-vertical.svg')}}" alt=""/>
                        </button>
                        <ul class="dropdown-menu">
                          <li>
                                <a class="dropdown-item"
                                href="#"
                                data-bs-toggle="modal"
                                data-bs-target="#editUniversityModal"
                                onclick="setEditUniversity('{{ $university->id }}', '{{ $university->name }}')">
                                    تعديل
                                </a>
                            </li>
                          <li><hr class="dropdown-divider"/></li>
                         <li>
                            <form action="{{ route('admin.universities.destroy', $university->id) }}" method="POST"
                                onsubmit="return confirm('هل أنت متأكد من حذف الجامعة؟')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="dropdown-item text-danger">
                                    حذف
                                </button>
                            </form>
                        </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  {{-- <hr/> --}}
                  {{-- <div class="university-info">
                    <div class="row g-2">
                      <div class="col-6">
                        <small class="text-gray">الطلاب المسجلين</small>
                        <h6 class="font-bold">150</h6>
                      </div>
                      <div class="col-6">
                        <small class="text-gray">الدورات</small>
                        <h6 class="font-bold">12</h6>
                      </div>
                    </div>
                  </div> --}}
                </div>
              </div>
            </div>
            @endforeach

            
            <div class="row"> 
            {{$universities->links('components.common.pagination')}}
          </div>

          </div>



           <div class="modal fade" id="addUniversityModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title font-bold">إضافة جامعة جديدة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="addUniversityForm" method="POST" action="{{ route('admin.universities.store') }}">
                    @csrf
                    <div class="modal-body">
                    <div class="form-group mb-4">
                        <label class="form-label font-bold mb-2">اسم الجامعة</label>
                        <input type="text" class="form-control" id="name" placeholder="أدخل اسم الجامعة" required name="name"/>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    </div>
                    <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary px-4">إضافة الجامعة</button>
                    </div>
                </form>
                </div>
            </div>
            </div>


            <div class="modal fade" id="editUniversityModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header border-0">
                <h5 class="modal-title font-bold">تعديل الجامعة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="editUniversityForm" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label class="form-label font-bold mb-2">اسم الجامعة</label>

                        <input type="text"
                               class="form-control"
                               id="edit_name"
                               name="name"
                               required />

                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary px-4">حفظ التعديل</button>
                </div>

            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
function setEditUniversity(id, name) {
    // تعبئة الاسم
    document.getElementById('edit_name').value = name;

    // تغيير action للفورم
    document.getElementById('editUniversityForm').action =
        "/admin/universities/" + id;
}
</script>
@endsection
</x-common.layout>