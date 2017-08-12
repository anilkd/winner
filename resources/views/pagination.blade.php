<?php
/*
|--------------------------------------------------------------------------
| Laravel 5, Bootstrap 4 Pagination
|--------------------------------------------------------------------------
|
| A partial view to handle pagination for collections in Laravel's query
| builder or Eloquent ORM, styled with Bootstrap 4.
|
| The pagination displays like the following, where * denotes the current
| page, and there are 60 total pages:
| [Previous] [1] [*2] [3] [4] [...] [60] [Next]
|
*/
// The range of numbers the pagination should extend either side of the current active page
// This should be considered to move to a configuration file instead of leaving in the view
$pagination_range = 2;
?>

<nav aria-label="Page navigation">
    <ul class="pagination justify-content-end">

        <li class="page-item {{ $collection->previousPageUrl()==null ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $collection->previousPageUrl() ?? '#' }}">Previous</a>
        </li>


        @if ($collection->currentPage() > 1+$pagination_range )

            <li class="page-item">
                <a class="page-link" href="{{ $collection->url(1) ?? '#' }}">{{ 1 }}</a>
            </li>

            @if ($collection->currentPage() > 1+$pagination_range+1 )
                <li class="page-item disabled">
                    <span class="page-link">&hellip;</span>
                </li>
            @endif

        @endif

        @for ($i=-$pagination_range; $i<=$pagination_range; $i++)

            @if ($collection->currentPage()+$i > 0 && $collection->currentPage()+$i <= $collection->lastPage())
                <li class="page-item {{ $i==0 ? 'active' : '' }}">
                    <a class="page-link" href="{{ $collection->url($collection->currentPage()+$i) }}">{{ $collection->currentPage()+$i }}</a>
                </li>
            @endif

        @endfor

        @if ($collection->currentPage() < $collection->lastPage()-$pagination_range )

            @if ($collection->currentPage() < $collection->lastPage()-$pagination_range-1 )
                <li class="page-item disabled">
                    <span class="page-link">&hellip;</span>
                </li>
            @endif

            <li class="page-item">
                <a class="page-link" href="{{ $collection->url($collection->lastPage()) ?? '#' }}">{{ $collection->lastPage() }}</a>
            </li>

        @endif

        <li class="page-item {{ $collection->nextPageUrl()==null ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $collection->nextPageUrl() ?? '#' }}">Next</a>
        </li>


    </ul>
</nav>