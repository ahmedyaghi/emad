<x-common.layout>
     <div class="row"> 
            <div class="col-12 mb-3">
              <div class="d-flex justify-content-between">
                <div class="col-lg-7">
                  <h3 class="font-semi-bold mb-2">التقييم النهائي</h3>
                  <h6 class="text-gray">  الاطلاع على التقيمات الميدانية يمكن حفظ التقييم وتعديله حتى تاريخ الإغلاق.</h6>
                </div>
                <div class="col-lg-auto"><a class="btn btn-primary px-4" href="{{ route('consultant.assessments.create') }}">إضافة التقييم</a></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="pannel">
                <div class="toolbar-action">
                  <div class="search-bar">
                    <input class="form-control" type="text" placeholder="البحث عن التقييم ..."/><span class="search-icon"><img src="{{asset('assets/images/search.svg')}}" alt=""/></span>
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
          @if(!$assessments->isEmpty())
          <div class="row">
            @php
              $role = auth()->user()->getRoleNames()->first();
            @endphp
            @foreach ($assessments as $assessment)
              <x-common.assessment :assessment="$assessment" :role="$role" />
            @endforeach
          </div>
          @endif
          <div class="row"> 
            <div class="col-12"> 
              <div class="pannel p-3">
                {{$assessments->links('components.common.pagination')}}
              </div>
            </div>
          </div>
</x-common.layout>