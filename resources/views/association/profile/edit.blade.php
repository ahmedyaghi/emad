<x-common.layout>

          <div class="row mb-lg-2">
            <div class="col-12">
              <div class="row"> 
                <div class="col-12"> 
                  <ol class="breadcrumb">
                    <div class="breadcrumb-item"><a href="{{route('association.profile.index')}}">الملف الشخصي</a></div>
                    <div class="breadcrumb-item">تعديل</div>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-4"> 
            <div class="col-12">
              <div class="row"> 
                <div class="col-12 mb-4">
                  <div class="d-flex justify-content-between">
                    <div class="col">
                      <h3 class="font-semi-bold mb-3">تعديل الملف الشخصي</h3>
                    </div>
                    {{-- <div class="col-auto"> <a class="btn btn-white" href="{{route('association.profile.index')}}">رجوع </a>
                      <button class="btn btn-primary px-3 ms-2" type="submit" form="editProfileForm">حفظ </button>
                    </div> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row"> 
            <div class="col-12">
              <div class="pannel">
                <form id="editProfileForm" action="{{route('association.profile.update', $association->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="tab-content" id="pills-tabContent">
                    
                    <div class="tab-pane fade show active" id="tab-1">
                      <h5 class="mb-3 font-bold">البيانات الشخصية</h5>
                      <hr/>
                      
                      <div class="row mb-4">
                      
                        <div class="col-lg-3 mx-auto">
                          <div class="profile-upload-box p-4 text-center border-2 border-dashed rounded-4" style="background-color: #f8f9fa; border-color: #e0e0e0; cursor: pointer;">
                            <div class="profile-upload-image mb-3">
                              <img id="profileImagePreview" src="{{$association->profile?->image}}" alt="صورتك الشخصية" class="rounded-4" style="width: 120px; height: 120px; object-fit: cover; display: block; margin: 0 auto;"/>
                            </div>
                            <input type="file" id="profileImageInput" accept="image/*" class="d-none" style="display: none;" name="image"/>
                            <button type="button" class="btn btn-primary btn-sm px-4 mb-2" onclick="document.getElementById('profileImageInput').click()">تحميل صورة</button>
                          </div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-lg-6 mb-4">
                          <label class="form-label font-bold">الاسم </label>
                          <input type="text" class="form-control"  placeholder="الاسم " name="name" value="{{$association->name}}"/>
                        </div>
                          <div class="col-lg-6 mb-4">
                          <label class="form-label font-bold">الجنسية</label>
                          <select class="form-select form-control select2" name="nationality_id">
                            @foreach ($nationalities as $nationality)
                              <option value="{{$nationality->id}}" {{$association->profile->nationality_id == $nationality->id ? 'selected' : ''}}>{{$nationality->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      
                      <div class="row">
                      
                        
                        <div class="col-lg-6 mb-4">
                          <label class="form-label font-bold">رقم الهوية</label>
                          <input type="text" class="form-control" value="90127903891" placeholder="رقم الهوية" name= "id_number" value="{{$association->id_number}}"/>
                        </div>

                          <div class="col-lg-6 mb-4">
                          <label class="form-label font-bold">تاريخ الميلاد</label>
                          <input type="date" class="form-control" name="date_of_birth" value="{{$association->profile->date_of_birth}}"/>
                        </div>


                      </div>
                      
                      <div class="row">
                      
                        <div class="col-lg-6 mb-4">
                          <label class="form-label font-bold">الجنس</label>
                          <select class="form-select form-control select2" name="gender">
                            <option value="1" {{$association->profile->gender == '1' ? 'selected' : ''}}>ذكر</option>
                            <option value="2" {{$association->profile->gender == '2' ? 'selected' : ''}}>أنثى</option>
                          </select>
                        </div>

                          <div class="col-lg-6 mb-4">
                          <label class="form-label font-bold">البريد الإلكتروني</label>
                          <input type="email" class="form-control" value="{{$association->email}}" placeholder="البريد الإلكتروني" name="email"/>
                        </div>

                      </div>
                      
                      <div class="row">
                        <div class="col-lg-6 mb-4">
                          <label class="form-label font-bold">رقم الجوال</label>
                          <input type="tel" class="form-control" placeholder="رقم الجوال" name="phone" value="{{$association->phone}}"/>
                        </div>
                      </div>
                      

                  </div>

                    <div class="row mb-4">
                        <div class="col-12">
                        <div class="d-flex gap-3 justify-content-end">
                            <a class="btn btn-secondary px-5" href="{{route('association.profile.index')}}">إلغاء</a>
                            <button type="submit" form="editProfileForm" class="btn btn-primary px-5">حفظ التغييرات</button>
                        </div>
                        </div>
                    </div>
                </form>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

              </div>
            </div>
          </div>

        

          @section('scripts')

              <script>
      document.getElementById('profileImageInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        
        if (file) {
          const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
          if (!validTypes.includes(file.type)) {
            alert('الرجاء اختيار صورة بصيغة JPG أو PNG');
            return;
          }
          
          const maxSize = 5 * 1024 * 1024; // 5 MB
          if (file.size > maxSize) {
            alert('حجم الصورة يجب أن لا يتجاوز 5 MB');
            return;
          }
          
          const reader = new FileReader();
          reader.onload = function(event) {
            document.getElementById('profileImagePreview').src = event.target.result;
          };
          reader.readAsDataURL(file);
        }
      });
    </script>
          @endsection

</x-common.layout>