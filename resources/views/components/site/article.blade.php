<div class="swiper-slide">
    <div class="widget_item-card m-2 widget_2">
        <div class="widget_item-image mb-3"><a href="">
                <picture> <img src="assets/images/image.png" alt="" /></picture>
            </a></div>
        <div class="widget_item-content">
            <h4 class="widget_item-title font-semi-bold mb-2"><a href="">{{$model->title}}</a></h4>
            <h6 class="widget_item-desc text-gray mb-3">{{$model->short_description}}</h6>
            <div class="widget_item-campany mb-4 d-flex align-items-center">
                <div class="campany-image me-2"><img src="assets/images/logo.svg" alt="" /></div>
                <h6 class="campany-name">شركة عماد </h6>
            </div>
            <div class="widget_item-info mt-3 pt-3">
                <div class="d-flex align-items-start"><img class="info-icon me-2" src="assets/images/calendar.svg"
                        alt="" /><span class="info-title text-gray">تاريخ النشر<span
                            class="font-bold d-block text-black mt-2">{{$model->published_at}}</span></span></div>
            </div>
        </div>
    </div>
</div>
