@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="javascript:void(0)">
                    <i class="fa fa-arrow-left"></i>
                </a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
                    <i class="fa fa-arrow-left"></i>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item">
                    <a class="page-link disabled">
                        {{ $element }}
                    </a>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <a class="page-link">
                                {{ $page }}
                            </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="javascript:void(0)">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </li>
        @endif
    </ul>
@endif

<style>
    .page-item.disabled .page-link {
        background-color: #fff !important;
        border-color: #e4074e;
    }
    /*@media screen and ( max-width: 400px ){
        li.page-item {
            display: none;
        }
        .page-item:first-child,
        .page-item:nth-child(3),
        .page-item:nth-last-child(3),
        .page-item:last-child,
        .page-item.active,
        .page-item.disabled {
            display: block;
        }
    }*/
</style>
