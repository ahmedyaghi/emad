<x-site.layout>
    <div class="main-wrapper">
      <!-- begin:: Header --> 
        <x-site.header />
      <!-- end:: Header --> 
        <main>

        <!-- start:: section -->
        <section class="section section-home" style="background:url(../assets/images/bg-training.png); background-repeat: no-repeat; background-size: cover;background-position: bottom;">
          <div class="container">
            <div class="row mb-4">
              <div class="col-lg-6 mx-auto">
                <div class="text-center">
                  <h1 class="home-title font-bold mb-4 text-white"> اكتشف الفرص تدريبية </h1>
                  <h4 class="home-text mb-4 text-white px-5">تصفح فرص التدريب والتطوع المتاحة، وقم بتطبيق مهاراتك في مشاريع مؤثرة.</h4>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end:: section -->  

        <!-- start:: section -->
        <section class="section section-filter pb-2">
          <div class="container">
            <div class="section-content">
              <form action="" method="post"> 
                <div class="row align-items-end">
                  <div class="col-12 col-lg">
                    <div class="form-group mb-3 mb-lg-0">
                      <label class="label-form font-medium mb-2">نوع الفرصة التدريبية</label>
                      <select class="form-control select2" data-placeholder="اختار">
                        <option value=""> </option>
                        <option value="2"> تدريب 1</option>
                        <option value="3"> تدريب 2</option>
                        <option value="4"> تدريب 3</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12 col-lg">
                    <div class="form-group mb-3 mb-lg-0">
                      <label class="label-form font-medium mb-2">المنطقة</label>
                      <select class="form-control select2" data-placeholder="اختار">
                        <option value=""> </option>
                        <option value="2"> المنطقة 1</option>
                        <option value="3"> المنطقة 2</option>
                        <option value="4"> المنطقة 3</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12 col-lg">
                    <div class="form-group mb-3 mb-lg-0">
                      <label class="label-form font-medium mb-2">الجنس</label>
                      <select class="form-control select2" data-placeholder="اختار">
                        <option value=""> </option>
                        <option value="2"> ذكر</option>
                        <option value="3">انثى</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12 col-lg">
                    <div class="form-group mb-3 mb-lg-0">
                      <label class="label-form font-medium mb-2"> الجهة</label>
                      <select class="form-control select2" data-placeholder="اختار">
                        <option value=""> </option>
                        <option value="2">الجهة 1</option>
                        <option value="3">الجهة 2</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12 col-lg-auto"> 
                    <div class="form-group mb-3 mb-lg-0">
                      <button class="btn btn-primary w-100" type="submit">البحث</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </section>
        <!-- end:: section -->  

        <!-- start:: section -->  
        <section class="section">
          <div class="container"> 
            <div class="row mb-4">
              <div class="col-12"> 
                <h4 class="font-semi-bold mb-3">عرض {{count($training_opportunities)}} نتيجة فرصة تدريب</h4>
                <h6>بناءً على ملفك الشخصي وتفضيلاتك</h6>
              </div>
            </div>
            <div class="row">
              @if(!$training_opportunities->isEmpty())  
                @foreach($training_opportunities as $training_opportunity)
                   <div class="col-lg-4 col-md-6">
                    <div class="widget_item-card">
                    <div class="widget_item-content">
                        <h4 class="widget_item-title font-semi-bold mb-2"><a href="{{route('training-opportunity', $training_opportunity->slug)}}">{{$training_opportunity->title}}</a></h4>
                        <h6 class="widget_item-desc text-gray mb-3">{{$training_opportunity->short_description}}</h6>
                        <div class="widget_item-campany mb-4 d-flex align-items-center">
                        <div class="campany-image me-2"><img src="../assets/images/logo.svg" alt=""/></div>
                        <h6 class="campany-name">شركة عماد </h6>
                        </div>
                        <div class="widget_item-info mt-3 pt-3 mb-4">
                        <div class="d-flex align-items-center mb-3"><img class="info-icon me-2" src="{{asset('assets/images/location.svg')}}" alt=""/><span class="info-title text-gray">{{$training_opportunity->location}}</span></div>
                        <div class="d-flex align-items-center mb-3"><img class="info-icon me-2" src="{{asset('assets/images/briefcase.svg')}}" alt=""/><span class="info-title text-gray">{{$training_opportunity->attendance}}</span></div>
                        <div class="d-flex align-items-center mb-3"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray">{{$training_opportunity->duration}}</span></div>
                        </div>
                        <div class="widget_item-action row gx-2">
                        <div class="col-lg-7"><a class="btn btn-white px-0 w-100" href="{{route('training-opportunity', $training_opportunity->slug)}}">عرض تفاصيل </a></div>
                        <div class="col-lg-5"><a class="btn btn-primary px-0 w-100" href="{{route('training-opportunity', $training_opportunity->slug)}}">قدّم الآن </a></div>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
              @endif

            </div>
            <div class="row"> 
              <div class="col-12">
                <div class="d-lg-flex align-items-center justify-content-between">
                  <div class="d-lg-flex align-items-center">
                    <select class="form-control  select2 rounded" data-width="70px">
                      <option value="9">9</option>
                      <option value="8">8</option>
                      <option value="7">7</option>
                      <option value="6">6</option>
                    </select>
                    <h4 class="ms-2 my-4 my-lg-0">تم عرض من 1 إلى 9 من أصل 40</h4>
                  </div>
                  <ul class="pagination">
                    <li class="page-item active"><a class="page-link" href=""> 1</a></li>
                    <li class="page-item"><a class="page-link" href=""> 2</a></li>
                    <li class="page-item"><a class="page-link" href=""> 3</a></li>
                    <li class="page-item"><a class="page-link" href=""> 4</a></li>
                    <li class="page-item"><a class="page-link" href=""> 5</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section><!-- end:: section --> 
      </main>
</x-site.layout>