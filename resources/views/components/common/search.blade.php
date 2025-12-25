<form action="{{$route}}" method="GET">
  <div class="row mb-4">
    <div class="col-12">
        <div class="pannel">
        <div class="toolbar-action">
            <div class="search-bar">
            <input class="form-control" type="text" placeholder="{{$placeholder}}" name="keyword" value="{{request('keyword')}}"/><span class="search-icon"><img src="{{asset('assets/images/search.svg')}}" alt=""/></span>
            </div>
            <div class="action-buttons">
            <select class="select2" name="order_by">
                <option value="desc" @selected(request('order_by') == 'desc')> الأحدث</option>
                <option value="asc" @selected(request('order_by') == 'asc')> الاقدم</option>
            </select>
            </div>
            {{-- <div class="action-buttons view-switch-buttons">
            <button class="btn btn-icon border rounded-4 list-view"><img src="{{asset('assets/images/row-vertical.svg')}}" alt=""/></button>
            <button class="btn btn-icon border rounded-4 grid-view active"><img src="{{asset('assets/images/categoray.svg')}}" alt=""/></button>
            </div> --}}

             <button type="submit" class="btn btn-primary ms-2">بحث</button>
        </div>
        </div>
    </div>
</div>
</form>