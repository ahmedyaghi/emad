<x-site.layout>
        <!-- start:: section -->
       <section class="section section-home" style="background:url({{asset('assets/images/bg-training.png')}}); background-repeat: no-repeat; background-size: cover;background-position: bottom;">
          <div class="container">
            <div class="row mb-4">
              <div class="col-lg-6 mx-auto">
                <div class="text-center">
                  <h1 class="home-title font-bold mb-4 text-white" data-aos="fade-up" data-aos-delay="100">{{$article->title}}</h1>
                  <h4 class="home-text mb-4 text-white px-5" data-aos="fade-up" data-aos-delay="200">{{$article->short_description}}</h4>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end:: section -->

        <!-- start:: section -->
        <section class="section" data-aos="fade-up" data-aos-delay="100">
          <div class="container">
            <div class="row">
              <div class="col-lg-9 mx-auto">
                <div class="row mb-4">
                  <div class="col-12">
                    <h2 class="font-bold mb-3">{{$article->title}}</h2>
                    <div class="d-lg-flex align-items-center justify-content-between">
                      <h6>{{$article->published_at}}</h6>
                      <ul class="social-media mt-3 mt-lg-0 justify-content-center justify-content-lg-start social-media-black">
                        {{-- <li><a href=""><img src="{{asset('assets/images/instagram.svg')}}" alt=""/></a></li> --}}
                        <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank"><img src="{{asset('assets/images/x.svg')}}" alt=""/></a></li>
                        <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank"><img src="{{asset('assets/images/facebook.svg')}}" alt=""/></a></li>
                        <li><a href="" target="_blank"> <img src="{{asset('assets/images/link.svg')}}" alt=""/></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="row mb-4">
                   <div class="col-12"> <img class="w-100" src="{{$article->image}}" alt=""/></div>
                </div>
                <div class="row">
                  <div class="col-12">
                  {!! $article->description !!}
                 </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end:: section -->
</x-site.layout>
