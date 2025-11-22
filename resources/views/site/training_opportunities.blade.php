<x-site.layout >
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
          <x-site.search :types="$training_opportunity_types" :associations="$associations" :cities="$cities"/>
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
                {{$training_opportunities->links('site.pagination')}}
              </div>
            </div>
          </div>
        </section><!-- end:: section --> 
</x-site.layout>