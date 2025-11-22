  <!-- start:: footer -->   
  <footer class="main-footer"> 
        <div class="container">
          <div class="row">
            <div class="col-12 mb-4 mb-lg-0">
              <div class="text-center"><img src="{{asset('assets/images/logo.svg')}}" alt="{{$settings['site_title'] ?? ''}}"/></div>
            </div>
            <div class="col-12"> 
              <ul class="link-footer d-flex flex-wrap justify-content-center mb-4">
                <li><a href="{{route('main')}}">الرئيسية</a></li>
                <li><a href="#">عن المنصة</a></li>
                <li><a href="{{route('training-opportunities')}}">الفرص التدريبية</a></li>
                <li><a href="{{route('news')}}">الأخبار</a></li>
                <li><a href="{{route('contact-us')}}">تواصل معنا</a></li>
              </ul>
            </div>
            <div class="col-12">
              <h6 class="font-light text-center">جميع الحقوق محفوظة لعماد © 2025</h6>
            </div>
          </div>
        </div>
      </footer><!-- end:: footer -->
