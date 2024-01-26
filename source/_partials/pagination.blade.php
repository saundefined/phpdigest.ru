@if($pagination->totalPages > 1)
    <nav class="flex items-center justify-between border-t border-gray-200 px-4 sm:px-0 mt-12">
        <div class="-mt-px flex w-0 flex-1">
            @if ($previous = $pagination->previous)
                <a href="{{ $page->baseUrl }}{{ $previous }}"
                   class="inline-flex items-center border-t-2 border-transparent pr-1 pt-4 text-sm font-medium text-gray-500">
                    <svg class="mr-3 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M18 10a.75.75 0 01-.75.75H4.66l2.1 1.95a.75.75 0 11-1.02 1.1l-3.5-3.25a.75.75 0 010-1.1l3.5-3.25a.75.75 0 111.02 1.1l-2.1 1.95h12.59A.75.75 0 0118 10z"
                              clip-rule="evenodd"/>
                    </svg>
                    Предыдущая
                </a>
            @endif
        </div>
        <div class="hidden md:-mt-px md:flex">
            @foreach ($pagination->pages as $pageNumber => $path)
                <a href="{{ $page->baseUrl }}{{ $path }}"
                   class="inline-flex items-center border-t-2 px-4 pt-4 text-sm font-medium {{ $pagination->currentPage == $pageNumber ? 'border-gray-900 text-gray-900' : 'border-transparent text-gray-500' }}">
                    {{ $pageNumber }}
                </a>
            @endforeach
        </div>
        <div class="-mt-px flex w-0 flex-1 justify-end">
            @if ($next = $pagination->next)
                <a href="{{ $page->baseUrl }}{{ $next }}"
                   class="inline-flex items-center border-t-2 border-transparent pl-1 pt-4 text-sm font-medium text-gray-500">
                    Следующая
                    <svg class="ml-3 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z"
                              clip-rule="evenodd"/>
                    </svg>
                </a>
            @endif
        </div>
    </nav>
@endif