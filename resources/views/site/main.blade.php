<x-site.layout>
        <!-- start:: section -->
        <section class="section section-home" style="background:url({{asset('assets/images/bg-home.png')}}); background-repeat: no-repeat; background-size: cover;">
          <div class="container">
            <div class="row mb-4">
              <div class="col-lg-7 mx-auto">
                <div class="text-center">
                  <h1 class="home-title font-bold mb-3 text-white"> منصة عماد نحو العمل الهادف</h1>
                  <h4 class="home-text mb-4 text-white">منصة رائدة تربط المنظمات غير الربحية بشبكة من الطلاب والباحثين المهرة في المملكة العربية السعودية. نحن نسهل عملية دمج العمل لمساعدتك في بناء مجتمع أقوى.</h4><a class="btn btn-play font-medium" href="https://www.youtube.com/embed/tgbNymZ7vqY" data-fancybox="gallery"><span>تشغيل الفيديو</span><span class="icon ms-3"><img src="{{asset('assets/images/play.svg')}}" alt=""/></span></a>
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
            <div class="text-center"> 
              <div class="row">
                <div class="col-lg-6 mx-auto">
                  <h2 class="section-title font-bold mb-4"> ﻣﻨﺼـــﺔ ﺗﻘﻨﻴﺔ ﺗﺮﺑﻂ اﻟﻤﻨﻈﻤﺎت ﻏﻴﺮ اﻟﺮﺑﺤﻴﺔ ﺑﺎﻟﻄﻼب واﻟﺒﺎﺣﺜﻴﻦ </h2>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-8 mx-auto">
                  <h5 class="mb-4 text-gray">ﻟﺘﻨﺴــــﻴﻖ اﻟﺘﻜﺎﻣﻞ ﻋﻦ ﻋﻤﻞ ﻋﺒﺮ ﻣﻠﻔﺎت ﺷــــﺨﺼــــﻴﺔ ﻟﻠﻄﺮﻓﻴﻦ، ﻓﻲ ﺗﻄـﺒـﻴـﻖ اﻟﻤﺸــــــــــﺎرﻳﻊ اﻟﻌـﻤـﻠـﻴـــﺔ ﻟﻤـﻨـﻈـﻤـــﺎت ﻏﻴـﺮ اﻟﺮﺑﺤـﻴـــﺔ ﻟﺘﺴـــــﻬﻴﻞ اﻟﺘﻮﻇﻴﻒ، اﻟﺘﺪرﻳﺐ، واﻟﺘﻄﻮع ﺑﺸـــــﻜﻞ ﻣﻨﻈﻢ، ﻣﻊ ﺗﻮﻓﻴﺮ ﻣﻘــﺎﻻت إﺛﺮاﺋﻴــﺔ وﺑﻮﺳــــــﺘــﺎت وﻇﻴﻔﻴــﺔ وﻧﻈــﺎم دﻓﻊ ﻻﺷﺘﺮاﻛﺎت المنظمات ﻏﻴﺮ اﻟﺮﺑﺤﻴﺔ.</h5>
                </div>
              </div><a class="btn btn-primary" href="{{route('training-opportunities')}}"> استعرض جميع الفرص التدريبية</a>
            </div>
          </div>
        </section>
        <!-- end:: section -->  

        <!-- start:: section -->
        @if(!$training_opportunities->isEmpty())  
        <section class="section section-bg">
          <div class="container">
            <div class="row mb-5 justify-content-between">
              <div class="col-lg-7">
                <h2 class="section-title font-bold mb-2">الفرص التدريبية </h2>
                <h4 class="text-gray">تصفح فرص التدريب والتطوع المتاحة، وقم بتطبيق مهاراتك في مشاريع مؤثرة.</h4>
              </div>
              <div class="col-auto"> <a class="btn btn-white" href="{{route('training-opportunities')}}">استعرض جميع الفرص</a></div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="swiper-wrapper-wrapper">
                <div class="swiper swiper-training">
                  <div class="swiper-wrapper">

                    @foreach ($training_opportunities as $training_opportunity)
                      <x-site.training_opportunity :model="$training_opportunity" />
                    @endforeach
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row"> 
              <div class="col-12"> 
                <div class="d-flex align-items-center justify-content-end">
                  <div class="swiper-action swiper-action-training d-flex align-items-center">
                    <div class="swiper-prev me-2"> السابق  </div>
                    <div class="swiper-next">  التالي</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        @endif
        <!-- end:: section -->  

        <!-- start:: section -->  
        @if(!$associations->isEmpty())
        <section class="section">
          <div class="container"> 
            <div class="row mb-5">
              <div class="col-lg-7">
                <h2 class="section-title font-bold mb-2">أبرز الجمعيات المقدمة للفرصة التدريبية</h2>
                <h4 class="text-gray">تعرف على الجهات التي يمكنك العمل معها خلال موسم الحج والعمرة، وابدأ رحلتك المهنية مع كيانات موثوقة ومتميزة في خدمة ضيوف الرحمن.</h4>
              </div>
            </div>
          </div>
          <div class="swiper-wrapper-wrapper">
            <div class="swiper swiper-brand">
              <div class="swiper-wrapper">
                    @foreach($associations as $association)
                        <x-site.association :model="$association" />
                    @endforeach
              </div>
            </div>
          </div>
        </section>
        @endif
        <!-- end:: section -->
        
        <!-- start:: section -->
        @if(!$articles->isEmpty())  
        <section class="section">
          <div class="container">
            <div class="row mb-5">
              <div class="col-lg-7">
                <h2 class="section-title font-bold mb-2">المقالات</h2>
                <h4 class="text-gray">تعرف على الجهات التي يمكنك العمل معها خلال موسم الحج والعمرة، وابدأ رحلتك المهنية مع كيانات موثوقة ومتميزة في خدمة ضيوف الرحمن.</h4>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="swiper-wrapper-wrapper">
                <div class="swiper swiper-training">
                  <div class="swiper-wrapper">
                    @foreach ($articles as $article)
                      <x-site.article :model="$article" />
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        @endif
        <!-- end:: section --> 


        <!-- start:: section -->  
        <section class="section section-join">
          <div class="container">
            <div class="section-content">
              <div class="row mb-4">
                <div class="col-lg-6 mx-auto">
                  <div class="text-center">
                    <h2 class="section-title font-bold">هل أنت طالب أو باحث تبحث عن فرصة لإحداث فرق؟</h2>
                  </div>
                </div>
              </div>
              <div class="row mb-4 pb-lg-3">
                <div class="col-lg-8 mx-auto">
                  <div class="text-center">
                    <h4 class="section-desc">سجّل الآن وكن جزءًا من فرق العمل للمنظمات الغير ربحية التي تخدم ملايين الاشخاص في المملكة. نحن نسهل عملية دمج العمل لمساعدتك في بناء مجتمع أقوى.</h4>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12"> 
                  @guest
                    <div class="text-center"> <a class="btn btn-primary px-5" href="" data-bs-toggle="modal" data-bs-target="#loginModal"> أستكمل ملفك الشخصي </a></div>
                  @endguest
                </div>
              </div>
            </div>
          </div>
        </section><!-- end:: section -->
     
</x-site.layout>