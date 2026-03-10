<x-common.layout>
    <div class="row mb-4">
            <div class="col-12">
              <div class="row"> 
                <div class="col-12"> 
                  <ol class="breadcrumb">
                    <div class="breadcrumb-item"><a href="{{route('admin.articles.index')}}">المقالات</a></div>
                    <div class="breadcrumb-item"> عرض مقال</div>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <div class="row"> 
            <div class="col-12"> 
              <div class="pannel">
                <div class="row mb-4">
                  <div class="col-12"> 
                    <h2 class="font-bold mb-3">{{$article->title}}</h2>
                    <div class="d-lg-flex align-items-center justify-content-between">
                      <h6>{{$article->created_at}}</h6>
                      <ul class="social-media mt-3 mt-lg-0 justify-content-center justify-content-lg-start social-media-black">
                        <li><a href=""><img src="{{asset('assets/images/instagram.svg')}}" alt=""/></a></li>
                        <li><a href=""><img src="{{asset('assets/images/x.svg')}}" alt=""/></a></li>
                        <li><a href=""><img src="{{asset('assets/images/facebook.svg')}}" alt=""/></a></li>
                        <li><a href=""> <img src="{{asset('assets/images/link.svg')}}" alt=""/></a></li>
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
</x-common.layout>