<x-common.layout>
       <div class="row mb-2">
            <div class="col-12">
              <ol class="breadcrumb">
                <div class="breadcrumb-item"><a href="{{route('admin.packages.index')}}">الباقات</a></div>
                <div class="breadcrumb-item">إضافة باقة</div>
              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <form action="{{route('admin.packages.store')}}" method="POST">
                @csrf
                <div class="row alifn-items-center mb-4">
                  <div class="col"> 
                    <h3 class="font-semi-bold mb-2">إضافة باقة</h3>
                  </div>
                  <div class="col-auto"> <a class="btn btn-white" href="{{route('admin.packages.index')}}">رجوع </a>
                    <button class="btn btn-primary px-3 ms-2" type="submit">إضافة الباقة </button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="package-card">
                      <h3 class="font-semi-bold mb-2">تفاصيل الباقة</h3>
                      <hr/>
                      <div class="form-group"> 
                        <label class="form-label"> اسم الباقة</label>
                        <input class="form-control" type="text" placeholder="ادخل اسم الباقة" name="name"/>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                      <div class="form-group"> 
                        <label class="form-label"> السعر</label>
                        <div class="input-icon icon-left">
                          <input class="form-control" type="text" placeholder="ادخل سعر الباقة" name="price"/>
                          <div class="w-auto icon font-12"> ريال / شهريًا </div>
                        </div>
                        @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                      </div>
                      <div class="form-group"> 
                        <label class="form-label"> تفاصيل الباقة</label>
                        <textarea class="form-control summernote" rows="7" placeholder="تفاصيل الباقة" name="description"></textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
</x-common.layout>