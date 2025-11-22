<x-site.layout>
        <!-- start:: section -->
       <section class="section section-home" style="background:url(../assets/images/bg-training.png); background-repeat: no-repeat; background-size: cover;background-position: bottom;">
          <div class="container">
            <div class="row mb-4">
              <div class="col-lg-6 mx-auto">
                <div class="text-center">
                  <h1 class="home-title font-bold mb-4 text-white">{{$news_details->title}}</h1>
                  <h4 class="home-text mb-4 text-white px-5">{{$news_details->short_description}}</h4>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end:: section -->  
        <!-- start:: section -->  
        <section class="section">
          <div class="container"> 
            <div class="row"> 
              <div class="col-lg-9 mx-auto">
                <div class="row mb-4">
                  <div class="col-12"> 
                    <h2 class="font-bold mb-3">{{$news_details->title}}</h2>
                    <div class="d-lg-flex align-items-center justify-content-between">
                      <h6>{{$news_details->published_at}}</h6>
                      <ul class="social-media mt-3 mt-lg-0 justify-content-center justify-content-lg-start social-media-black">
                        <li><a href=""><img src="../assets/images/instagram.svg" alt=""/></a></li>
                        <li><a href=""><img src="../assets/images/x.svg" alt=""/></a></li>
                        <li><a href=""><img src="../assets/images/facebook.svg" alt=""/></a></li>
                        <li><a href=""> <img src="../assets/images/link.svg" alt=""/></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="row mb-4"> 
                  <div class="col-12"> <img class="w-100" src="../assets/images/img1.png" alt=""/></div>
                </div>
                <div class="row">
                  <div class="col-12"> 
                  {!! $news_details->description !!}   
                 </div>
                </div>
              </div>
            </div>
          </div>
        </section><!-- end:: section --> 
</x-site.layout>