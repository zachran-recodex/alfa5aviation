@if ($paginator->hasPages())
    <ul class="pagination flex flex-wrap items-center gap-2 justify-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item">
                <span class="page-link bg-white dark:bg-neutral-700 border border-neutral-200 dark:border-neutral-600 text-secondary-light font-medium rounded-lg px-5 py-2.5 flex items-center justify-center h-[48px]">Previous</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link bg-white dark:bg-neutral-700 border border-neutral-200 dark:border-neutral-600 text-secondary-light font-medium rounded-lg px-5 py-2.5 flex items-center justify-center h-[48px]" href="{{ $paginator->previousPageUrl() }}">Previous</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item">
                    <span class="page-link">{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item">
                            <span class="page-link bg-white dark:bg-neutral-700 border dark:border-neutral-600 text-secondary-light font-medium rounded-lg px-5 py-2.5 flex items-center justify-center h-[48px] w-[48px] border-primary-400 text-primary-600">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link bg-white dark:bg-neutral-700 border border-neutral-200 dark:border-neutral-600 text-secondary-light font-medium rounded-lg px-5 py-2.5 flex items-center justify-center h-[48px] w-[48px]" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link bg-white dark:bg-neutral-700 border border-neutral-200 dark:border-neutral-600 text-secondary-light font-medium rounded-lg px-5 py-2.5 flex items-center justify-center h-[48px]" href="{{ $paginator->nextPageUrl() }}">Next</a>
            </li>
        @else
            <li class="page-item">
                <span class="page-link bg-white dark:bg-neutral-700 border border-neutral-200 dark:border-neutral-600 text-secondary-light font-medium rounded-lg px-5 py-2.5 flex items-center justify-center h-[48px]">Next</span>
            </li>
        @endif
    </ul>
@endif
