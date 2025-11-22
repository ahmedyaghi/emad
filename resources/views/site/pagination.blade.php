@if ($paginator->hasPages())
<div class="d-lg-flex align-items-center justify-content-between">
    <div class="d-lg-flex align-items-center">
     
    <select class="form-control  select2 rounded" data-width="70px">
        <option value="9">9</option>
        <option value="18">18</option>
        <option value="36">36</option>
        <option value="100">100</option>
    </select>
        <h4 class="ms-2 my-4 my-lg-0">
    تم عرض من {{$paginator->perPage()}} إلى {{$paginator->perPage() * $paginator->currentPage()}} من أصل  {{$paginator->total()}}
    </h4>

    </div>
    <ul class="pagination">
     @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span class="page-link" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
        </li>
    @else
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fas fa-chevron-right"></i></a>
        </li>
    @endif

     @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="fas fa-chevron-left"></i></a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                </li>
            @endif
    </ul>
</div>
@endif