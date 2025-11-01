@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
        <div class="flex items-center px-1">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span class="px-3 py-1 rounded-md text-sm bg-gray-200 text-gray-500 cursor-not-allowed">Previous</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                   class="px-3 py-1 rounded-md text-sm bg-[#ffa137] text-white hover:bg-[#e68c2c] transition">
                   Previous
                </a>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-center">
            <div>
                <span class="relative z-0 inline-flex -space-x-px rounded-md">
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <span class="px-3 py-1 bg-white dark:bg-zinc-800 border border-gray-200 text-sm text-gray-500">{{ $element }}</span>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page" class="px-3 py-1 bg-orange-400 text-sm font-medium border border-gray-300">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="px-3 py-1 text-sm bg-white dark:bg-zinc-800 border border-gray-300 dark:border-gray-200 hover:bg-gray-50 text-black dark:text-gray-400">{{ $page }}</a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </span>
            </div>
        </div>

        <div class="flex items-center px-1">
            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                   class="px-3 py-1 rounded-md text-sm bg-[#ffa137] text-white hover:bg-[#e68c2c] transition">
                   Next
                </a>
            @else
                <span class="px-3 py-1 rounded-md text-sm bg-gray-200 text-gray-500 cursor-not-allowed">Next</span>
            @endif
        </div>
    </nav>
@endif
