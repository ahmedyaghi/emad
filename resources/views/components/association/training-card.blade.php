<div class="col-lg-4 col-md-6">
    <div class="widget_item-card p-4 bg-white">
        <div class="widget_item-status {{$model->getStatusClass()}} font-medium">{{$model->getStatus()}}</div>
        <div class="widget_item-content">
        <h4 class="widget_item-title font-semi-bold mb-2 mt-3"><a href="{{route('association.training-opportunities.show', ['training_opportunity' => $model])}}">{{$model->title}}</a></h4>
        <h6 class="widget_item-desc text-gray mb-3">{{$model->short_description}}</h6>
        <div class="widget_item-info mt-3 pt-3 d-flex align-items-center flex-wrap">
            <div class="col-6 mb-4">
            <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/user-group2.svg')}}" alt=""/><span class="info-title text-gray">متقدم<span class="font-bold d-block text-black mt-2">{{$model->applications_count}}</span></span></div>
            </div>
            <div class="col-6 mb-4">
            <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/system-update.svg')}}" alt=""/><span class="info-title text-gray">اخر تحديث<span class="font-bold d-block text-black mt-2">{{$model->updated_at}}</span></span></div>
            </div>
            <div class="col-6">
            <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray">تاريخ النشر<span class="font-bold d-block text-black mt-2">{{$model->created_at}}</span></span></div>
            </div>
            <div class="col-6">
            <div class="d-flex align-items-start"><img class="info-icon me-2" src="{{asset('assets/images/calendar.svg')}}" alt=""/><span class="info-title text-gray">تاريخ الانتهاء<span class="font-bold d-block text-black mt-2">{{$model->end_date}}</span></span></div>
            </div>
        </div>
        </div>
    </div>
</div>