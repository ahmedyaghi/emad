<x-common.layout>
    <div class="row"> 
            <div class="col-12 mb-3">
              <div class="d-flex justify-content-between">
                <div class="col-lg-7">
                  <h3 class="font-semi-bold mb-2">التقارير</h3>
                  <h6 class="text-gray">  الاطلاع على تقارير الطلاب</h6>
                </div>
                <div class="col-lg-auto"><a class="btn btn-primary px-4" href="{{route('consultant.reports.create')}}">اضافة تقرير</a></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="pannel">
                <div class="toolbar-action">
                  <div class="search-bar">
                    <input class="form-control" type="text" placeholder="البحث عن التقارير ..."/><span class="search-icon"><img src="{{asset('assets/images/search.svg')}}" alt=""/></span>
                  </div>
                  <div class="action-buttons">
                    <select class="select2">
                      <option value="1"> الأحدث</option>
                      <option value="2"> الاقدم</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @if(!$reports->isEmpty())
          <div class="row"> 
            @foreach ($reports as $report)
              <x-common.report :report="$report" />
            @endforeach
          </div>
          @endif
          <div class="row"> 
            <div class="col-12"> 
             {{$reports->links('components.common.pagination')}}
            </div>
          </div>
</x-common.layout>