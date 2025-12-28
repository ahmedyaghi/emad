<x-common.layout>
     <div class="row"> 
            <div class="col-12 mb-3">
              <div class="d-flex justify-content-between">
                <div class="col-lg-7">
                  <h3 class="font-semi-bold mb-2">التقييم النهائي</h3>
                  <h6 class="text-gray">  الاطلاع على التقيمات الميدانية يمكن حفظ التقييم وتعديله حتى تاريخ الإغلاق.</h6>
                </div>
                <div class="col-lg-auto"><a class="btn btn-primary px-4" href="{{ route('faculty-member.assessments.create') }}">إضافة التقييم</a></div>
              </div>
            </div>
          </div>
             <x-common.search  :placeholder="'البحث عن التقييمات ...'" :route="route('faculty-member.assessments.index')"/>

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