<x-common.layout>
     <div class="row"> 
            <div class="col-12 mb-3">
              <div class="d-flex justify-content-between">
                <div class="col-lg-7">
                  <h3 class="font-semi-bold mb-2"> المقالات</h3>
                  <h6 class="text-gray"> الاطلاع على المقالات</h6>
                </div>
                <div class="col-lg-auto"><a class="btn btn-primary px-4" href="{{route('association.articles.create')}}">اضافة مقال</a></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="pannel">
                <form action="{{route('association.articles.index')}}" method="GET">
                <div class="toolbar-action">
                  <div class="search-bar">
                    <input class="form-control" type="text" placeholder="البحث عن المقالات ..." name="keyword" value="{{request('keyword')}}"/><span class="search-icon"><img src="{{asset('assets/images/search.svg')}}" alt=""/></span>
                  </div>
                  <div class="action-buttons">
                    <select class="select2" name="order">
                      <option value="DESC"> الأحدث</option>
                      <option value="ASC"> الاقدم</option>
                    </select>
                  </div>
                    <button class="btn btn-primary px-3 ms-2" type="submit">بحث </button>
                </div>
                </form>
              </div>
            </div>
          </div>
          @if(!$articles->isEmpty())
          <div class="row">
            @foreach ($articles as $article)
            <div class="col-lg-4 col-md-6">
              <div class="widget_item-card card">
                <div class="widget_item-image mb-3"><a href="{{route('association.articles.show', $article)}}"> 
                    <picture> <img src="{{Storage::url($article->image)}}" alt="{{$article->title}}"/></picture></a></div>
                <div class="widget_item-content">
                  <h4 class="widget_item-title font-semi-bold mb-2"><a href="{{route('association.articles.show', $article)}}">{{$article->title}}</a></h4>
                  <h6 class="widget_item-desc text-gray mb-3">{{$article->short_description}}</h6>
                  <div class="widget_item-info mt-3 pt-3">
                    <div class="d-flex align-items-start">
                      <img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/>
                      <span class="info-title text-gray">تاريخ النشر<span class="font-bold d-block text-black mt-2">{{$article->created_at}}</span></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="row"> 
            <div class="col-12"> 
              <div class="pannel p-3">
                {{$articles->links('components.common.pagination')}}
              </div>
            </div>
          </div>
          @endif
</x-common.layout>