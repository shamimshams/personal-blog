@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between text-base font-medium leading-6">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 text-sm font-medium text-gray-300 cursor-default">
                &#8249; Previous
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-300 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                &#8249; Previous
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-300 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                Next &#8250;
            </a>
        @else
            <span class="px-4 py-2 text-sm font-medium text-gray-300 cursor-default">
                Next &#8250;
            </span>
        @endif
    </nav>
@endif
