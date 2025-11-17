<div class="swiper-slide">
    <div class="widget_item-card m-2 shadow-none">
        <div class="widget_item-content">
            <h4 class="widget_item-title font-semi-bold mb-2"><a href="">{{ $model->title}}</a></h4>
            <h6 class="widget_item-desc text-gray mb-3">{{ $model->short_description}}</h6>
            <div class="widget_item-campany mb-4 d-flex align-items-center">
                <div class="campany-image me-2"><img src="{{asset('assets/images/logo.svg')}}" alt="" /></div>
                <h6 class="campany-name">شركة عماد </h6>
            </div>
            <div class="widget_item-info mt-3 pt-3 mb-4">
                <div class="d-flex align-items-center mb-3"><img class="info-icon me-2" src="assets/images/location.svg"
                        alt="" /><span class="info-title text-gray">{{ $model->location}}</span></div>
                <div class="d-flex align-items-center mb-3"><img class="info-icon me-2"
                        src="assets/images/briefcase.svg" alt="" /><span class="info-title text-gray">{{ $model->attendance}} </span></div>
                <div class="d-flex align-items-center mb-3"><img class="info-icon me-2" src="assets/images/calendar.svg" alt="" /><span class="info-title text-gray">{{ $model->duration}}</span></div>
            </div>
            <div class="widget_item-action row gx-2">
                <div class="col-lg-7"><a class="btn btn-white px-0 w-100" href="">عرض تفاصيل </a></div>
                <div class="col-lg-5"><a class="btn btn-primary px-0 w-100" href="">قدّم الآن </a></div>
            </div>
        </div>
    </div>
</div>
