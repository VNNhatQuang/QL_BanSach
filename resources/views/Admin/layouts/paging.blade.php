<div class="row justify-content-center">
    <div class="dataTables_paginate paging_simple_numbers">
        <ul class="pagination">
            <li class="paginate_button page-item previous @if ($list->currentPage() === 1) {{ 'disabled' }} @endif" id="dataTable_previous"><a href="{{ $list->previousPageUrl() }}&searchValue={{ $searchValue }}" class="page-link">Previous</a></li>
            @for($i = 1; $i <= $list->lastPage(); $i++)
                <li class="paginate_button page-item @if($i == $list->currentPage()) {{ 'active' }} @endif"><a href="?searchValue={{ $searchValue }}&page={{ $i }}" class="page-link">{{ $i }}</a></li>
            @endfor
            <li class="paginate_button page-item next @if ($list->currentPage() === $list->lastPage()) {{ 'disabled' }} @endif"><a href="{{ $list->nextPageUrl() }}&searchValue={{ $searchValue }}" class="page-link">Next</a></li>
        </ul>
    </div>
</div>
