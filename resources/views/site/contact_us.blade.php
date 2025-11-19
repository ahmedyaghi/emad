<x-site.layout :internal="false">

        <!-- start:: section -->
          <section class="section section-bg-light">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="section-content">
                  <form action="{{route('handle.contact-us')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label class="mb-2">الاسم الكامل</label>
                      <input type="text" class="form-control" placeholder="اكتب اسمك الكامل" name="name">
                      @if ($errors->has('name'))
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label class="mb-2">البريد الإلكتروني</label>
                      <input type="text" class="form-control" placeholder="اكتب بريدك الإلكتروني" name="email">
                      @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    </div>
                    <div class="form-group">
                      <label class="mb-2">الرسالة</label>
                      <textarea type="text" rows="7" class="form-control" placeholder="اكتب رسالتك هنا..." name="message"></textarea>
                      @if ($errors->has('message'))
                          <span class="text-danger">{{ $errors->first('message') }}</span>
                      @endif
                    </div>
                    <div class="form-group">
                     <button class="btn btn-primary w-100" type="submit">إرسال الرسالة</button>
                    </div>
                  </form>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="item-contact p-3 mb-3">
                        <div class="d-flex align-items-center mb-4">
                          <div class="item-contact-icon">
                            <img src="../assets/images/mail.svg" alt="">
                          </div>
                          <h5 class="ms-3">البريد الإلكتروني</h5>
                        </div>
                        <h5 class="font-semi-bold">info@amad.sa</h5>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="item-contact p-3 mb-3">
                        <div class="d-flex align-items-center mb-4">
                          <div class="item-contact-icon">
                            <img src="../assets/images/location.svg" alt="">
                          </div>
                          <h5 class="ms-3">موقعنا</h5>
                        </div>
                        <h5 class="font-semi-bold">info@amad.sa</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         </section>
        <!-- end:: section -->  
</x-site.layout>