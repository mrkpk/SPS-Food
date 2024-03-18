@if ($paginator->haspages())

    <nav aria-label="Page navigation">

        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><a class="page-link" href="javascript:void(0)"><i
                            class="fa-solid fa-angles-left"></i></a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->previouspageUrl() }}"><i
                            class="fa-solid fa-angles-left"></i></a></li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled"><a class="page-link"
                            href="javascript:void(0)">{{ $element }}</a>
                    </li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link"
                                    href="javascript:void(0)">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->onLastPage())
                <li class="page-item disabled"><a class="page-link" href="javascript:void(0)"><i
                            class="fa-solid fa-angles-right"></i></a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->nextpageUrl() }}"><i
                            class="fa-solid fa-angles-right"></i></a></li>
            @endif

        </ul>
    </nav>
@endif
