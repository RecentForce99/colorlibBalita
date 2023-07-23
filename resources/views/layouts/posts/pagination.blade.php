<div class="row">
    <div class="col-md-12 text-center">
        <nav aria-label="Page navigation" class="text-center">
            <ul class="pagination">
                <li class="page-item{{$previousPageClass}}">
                    <a class="page-link" href="{{$previousPageHref}}#posts" >Prev</a>
                </li>

                @for($i = 1; $i <= $lastPage; $i++)
                    @if($i > $currentPage - $pageRadius &&
                    $i < $currentPage + $pageRadius ||
                    ($currentPage == 1 && $i < $pageRadius+2) || //Для вывода третьей кнопки на первой странице
                    ($currentPage == $lastPage && $i >= $currentPage - $pageRadius) //Для вывода третьей кнопки на последней странице
                    )
                        <li class="page-item{{$currentPage == $i ? " active" : ""}}">
                            <a class="page-link"@if($currentPage != $i) href="?pageId={{$i}}#posts"@endif>{{$i}}</a>
                        </li>
                    @endif
                @endfor

                <li class="page-item{{$nextPageClass}}">
                    <a class="page-link" href="{{$nextPageHref}}#posts">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
