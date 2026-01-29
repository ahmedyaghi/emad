<x-site.layout :internal="false">
    <!-- start:: section -->  
        <section class="section section-bg-light section-wizard">
          <div class="container"> 
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="section-content">
                        <div class="mb-4 pb-lg-3">
                            <h2 class="font-bold mb-3">استعادة كلمة المرور</h2>
                            <h5 class="mb-2">لا تقلق، نحن هنا لمساعدتك. أدخل البريد الالكتروني المرتبط بحسابك، وسنرسل لك رابطًا لإعادة تعيين كلمة المرور</h5>
                        </div>
                        
                            <form action="{{route('password.email')}}" method="POST">
                                @csrf

                            <div class="form-group"> 
                            <label class="form-label font-bold">البريد الإلكتروني </label>
                            <input class="form-control" type="email" placeholder="example@example.com" value="{{old('email')}}" name="email"/>
                            </div>

                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class=" gap-2 d-flex justify-content-between mt-4">
                                <a class="btn btn-white px-5" href="{{route('main')}}">إلغاء</a>
                                <button class="btn btn-primary px-5" type="submit"> ارسال</button>
                            </div>
                    </div>
                      </form>
                </div>
              </div>
            </div>
          </div>
        </section><!-- end:: section --> 
</x-site.layout>