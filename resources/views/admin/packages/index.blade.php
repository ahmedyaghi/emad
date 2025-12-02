<x-common.layout>
    <div class="row gx-lg-3">
            <div class="col-12 mb-4">
              <div class="d-flex justify-content-between">
                <div class="col-lg-7">
                  <h3 class="font-semi-bold mb-2">الباقات</h3>
                  <h6 class="text-gray">الاطلاع على الباقات</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="pannel">
                <form action="{{route('admin.packages.index')}}" method="GET">
                  <div class="toolbar-action">
                  <div class="search-bar">
                    <input class="form-control" type="text" placeholder="البحث عن الباقات ..." name="keyword" value="{{request('keyword')}}"/><span class="search-icon"><img src="{{asset('assets/images/search.svg')}}" alt=""/></span>
                  </div>
                  <div class="action-buttons">
                    <select class="select2" name="order">
                      <option value="DESC"> الأحدث</option>
                      <option value="ASC"> الاقدم</option>
                    </select>
                  </div>

                  <button class="btn btn-primary px-3 ms-2" type="submit">بحث </button>
                </div>
                </form>
              </div>
            </div>
          </div>
          @if(!$packages->isEmpty())
          <div class="row gx-2">
            
            @foreach($packages as $package)
            <div class="col-lg-4 mb-4">
              <div class="package-card h-100">
                <div class="package-header">
                  <div class="d-flex align-items-start"> 
                    <div class="col">
                      <p class="package-title font-bold mb-2">الباقة</p>
                      <h3 class="package-name font-bold mb-2">{{$package->name}}</h3>
                      <p class="package-price">
                        <spa class="text-gray">السعر : </spa><span class="font-bold">{{$package->price}} ريال / شهريًا </span>
                      </p>
                    </div>
                    <div class="col-auto"><a class="btn btn-light p-2 rounded-4 btn-edit" href="{{route('admin.packages.edit', ['package' => $package])}}"><img src="{{asset('assets/images/edit.svg')}}" alt=""/></a></div>
                  </div>
                </div>
                <hr/>
                <ul class="package-features">
                  {!! $package->description !!}
                  {{-- <li class="feature-item"><span class="checkmark me-2"><img src="{{asset('assets/images/checkmark.svg')}}" alt=""/></span>إنشاء حساب للجمعية</li>
                  <li class="feature-item"><span class="checkmark me-2"><img src="../assets/images/checkmark.svg" alt=""/></span>نشر حتى 3 فرص تدريبة</li>
                  <li class="feature-item"><span class="checkmark me-2"><img src="../assets/images/checkmark.svg" alt=""/></span>عرض الملفات الشخصية للطلاب والباحثين</li>
                  <li class="feature-item"><span class="checkmark me-2"><img src="../assets/images/checkmark.svg" alt=""/></span>لا تشمل نظام الدفع</li> --}}
                </ul>
                <hr/>
                <div class="package-footer mt-4">
                  <p class="text-gray text-center font-12 px-5"> الأسعار شاملة ضريبة القيمة المضافة. تُطبّق الشروط والأحكام على جميع الباقات.</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          @endif
</x-common.layout>