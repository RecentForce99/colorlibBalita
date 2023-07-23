@if ($paginator->hasPages() && $currentPage = $paginator->currentPage())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link">Prev</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}#posts" >Prev</a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if($page == $currentPage)
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                        @elseif($page > $currentPage - $pageRadius &&
                        $page < $currentPage + $pageRadius ||
                        ($currentPage == 1 && $page < $pageRadius+2) || //For display third button on the first page
                        ($currentPage == $paginator->lastPage() && $page >= $currentPage - $pageRadius) //For display third button on the last page
                        )
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}#posts">Next</a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link">Next</a>
                </li>
            @endif
        </ul>
    </nav>
@endif

