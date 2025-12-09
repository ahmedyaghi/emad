<x-common.layout>
     <div class="row"> 
            <div class="col-12 mb-3">
              <div class="d-flex justify-content-between">
                <div class="col-lg-7">
                  <h3 class="font-semi-bold mb-2">   الملاحظات</h3>
                  <h6 class="text-gray">  تمكين المستشار من رفع ملاحظاته أو تنبيهاته الإدارية أو التربوية إلى الجهة المسؤولة (الجمعية أو المشرف)</h6>
                </div>
                <div class="col-lg-auto"><a class="btn btn-primary px-4" href="{{route('consultant.notes.create')}}">إضافة ملاحظات</a></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="pannel">
                <div class="toolbar-action">
                  <div class="search-bar">
                    <input class="form-control" type="text" placeholder="البحث عن الملاحظة ..."/><span class="search-icon"><img src="{{asset('assets/images/search.svg')}}" alt=""/></span>
                  </div>
                  <div class="action-buttons">
                    <button class="btn btn-icon border rounded-4 drawer-toggle"><img src="{{asset('assets/images/filter.svg')}}" alt=""/></button>
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
          @if(!$notes->isEmpty())
          <div class="row">
            @foreach($notes as $note)
              <div class="col-lg-4 col-md-6">
              <div class="widget_item-card bg-white p-4">
                <h4 class="widget_item-title font-semi-bold mb-3"><a href="final-report.html">{{$note->title}}</a></h4>
                <h6 class="widget_item-desc text-gray mb-3">{{$note->description}}</h6>
                <hr/>
                <div class="widget_item-info mt-3 d-flex align-items-center flex-wrap mb-3 border-0">
                  <div class="col-6">
                    <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray">   تاريخ الملاحظة<span class="font-bold d-block text-black mt-2">{{$note->created_at}}</span></span></div>
                  </div>
                  <div class="col-6">
                    <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/system-update.svg')}}" alt=""/><span class="info-title text-gray">  الجهة المرسلة إليها<span class="font-bold d-block text-black mt-2">{{$note->send_to}}</span></span></div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="row"> 
            <div class="col-12"> 
              <div class="pannel p-3">
                {{$notes->links('common.pagination')}}
              </div>
            </div>
          </div>
          @endif
</x-common.layout>