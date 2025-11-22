  <section class="section section-filter">
    <div class="container">
    <div class="section-content">
        <form action="{{route('training-opportunities')}}" method="get"> 
        <div class="row align-items-end">
            <div class="col-12 col-lg">
            <div class="form-group mb-3 mb-lg-0">
                <label class="label-form font-medium mb-2">نوع الفرصة التدريبية</label>
                @if(!$types->isEmpty())
                <select class="form-control select2" data-placeholder="اختار" name="type_id">
                @foreach($types as $type)
                    <option value=""> </option>
                <option value="{{$type->id}}">{{$type->title}}</option>
                @endforeach
                </select>
                @endif
            </div>
            </div>
            <div class="col-12 col-lg">
            <div class="form-group mb-3 mb-lg-0">
                <label class="label-form font-medium mb-2">المنطقة</label>
                @if(!$associations->isEmpty())
                <select class="form-control select2" data-placeholder="اختار" name="city_id">
                    @foreach($cities as $city)
                    <option value=""> </option>
                    <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
                @endif
            </div>
            </div>
            <div class="col-12 col-lg">
            <div class="form-group mb-3 mb-lg-0">
                <label class="label-form font-medium mb-2">الجنس</label>
                <select class="form-control select2" data-placeholder="اختار" name="sex">
                <option value=""> </option>
                <option value="1"> ذكر</option>
                <option value="2">انثى</option>
                </select>
            </div>
            </div>
            <div class="col-12 col-lg">
            <div class="form-group mb-3 mb-lg-0">
                <label class="label-form font-medium mb-2"> الجهة</label>
                @if(!$associations->isEmpty())
                <select class="form-control select2" data-placeholder="اختار" name="association_id">
                    @foreach($associations as $association)
                    <option value=""> </option>
                    <option value="{{$association->id}}">{{$association->name}}</option>
                    @endforeach
                </select>
                @endif
            </div>
            </div>
            <div class="col-12 col-lg-auto"> 
            <div class="form-group mb-3 mb-lg-0">
                <button class="btn btn-primary w-100" type="submit">البحث</button>
            </div>
            </div>
        </div>
        </form>
    </div>
    </div>
</section>