<x-site.layout :internal="false">
    <!-- start:: section -->  
        <section class="section section-bg-light section-wizard">
          <div class="container"> 
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="section-content">
                        <div class="mb-4 pb-lg-3">
                            <h2 class="font-bold mb-3">استعادة كلمة المرور</h2>
                            <h5 class="mb-2">قم بتعبئة النموذج ادناه ليتم استعادة كلمة المرور</h5>
                        </div>
                        
                            <form method="POST" action="{{ route('password.update', request('token')) }}">
                            @csrf

                                <input type="hidden" name="email" value="{{ request('email') }}">

                            <div class="form-group"> 
                            <label class="form-label font-bold">كلمة المرور الجديدة </label>
                            <input class="form-control" type="password" placeholder="كلمة المرور الجديدة" value="{{old('password')}}" name="password"/>
                            </div>

                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="form-group"> 
                            <label class="form-label font-bold">تأكيد كلمة المرور </label>
                            <input class="form-control" type="password" placeholder="تأكيد كلمة المرور" value="{{old('password_confirmation')}}" name="password_confirmation"/>
                            </div>

                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                            <div class=" gap-2 d-flex justify-content-between mt-4">
                                <a class="btn btn-white px-5" href="{{route('main')}}">إلغاء</a>
                                <button class="btn btn-primary px-5" type="submit"> استعادة</button>
                            </div>
                    </div>
                      </form>
                </div>
              </div>
            </div>
          </div>
        </section><!-- end:: section --> 
</x-site.layout>