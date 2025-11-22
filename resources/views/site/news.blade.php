<x-site.layout>
        <!-- start:: section -->
        <section class="section section-home" style="background:url(../assets/images/bg-training.png); background-repeat: no-repeat; background-size: cover;background-position: bottom;">
          <div class="container">
            <div class="row mb-4">
              <div class="col-lg-6 mx-auto">
                <div class="text-center">
                  <h1 class="home-title font-bold mb-4 text-white"> اكتشف الأخبار</h1>
                  <h4 class="home-text mb-4 text-white px-5">تصفح الأخبار والتطوع المتاحة، وقم بتطبيق مهاراتك في مشاريع مؤثرة.</h4>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end:: section -->  

        <!-- start:: section -->  
        <section class="section">
          <div class="container"> 
            <div class="row mb-4">
              <div class="col-12"> 
                <h4 class="font-semi-bold mb-3">عرض {{count($news)}} نتيجة خبر</h4>
                <h6>بناءً على ملفك الشخصي وتفضيلاتك</h6>
              </div>
            </div>
            <div class="row">
              @if(!$news->isEmpty())  
                @foreach($news as $item)

                <div class="col-lg-4 col-md-6">
                <div class="widget_item-card">
                  <div class="widget_item-image mb-3"><a href="{{route('news.details', $item->slug)}}"> 
                      <picture> <img src="../assets/images/image.png" alt=""/></picture></a></div>
                  <div class="widget_item-content">
                    <h4 class="widget_item-title font-semi-bold mb-2"><a href="{{route('news.details', $item->slug)}}">{{$item->title}}</a></h4>
                    <h6 class="widget_item-desc text-gray mb-3">{{$item->short_description}}</h6>
                    <div class="widget_item-campany mb-4 d-flex align-items-center">
                      <div class="campany-image me-2"><img src="../assets/images/logo.svg" alt=""/></div>
                      <h6 class="campany-name">شركة عماد </h6>
                    </div>
                    <div class="widget_item-info mt-3 pt-3">
                      <div class="d-flex align-items-start"><img class="info-icon me-2" src="../assets/images/calendar.svg" alt=""/><span class="info-title text-gray">تاريخ النشر<span class="font-bold d-block text-black mt-2">{{$item->published_at}}</span></span></div>
                    </div>
                  </div>
                </div>
              </div>
              
                @endforeach
              @endif

            </div>
            <div class="row"> 
              <div class="col-12">
                {{$news->links('site.pagination')}}
              </div>
            </div>
          </div>
        </section><!-- end:: section --> 
</x-site.layout>