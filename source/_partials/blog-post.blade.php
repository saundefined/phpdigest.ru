<article class="flex flex-col items-start justify-between border rounded-2xl overflow-hidden">
    <a href="{{ $post->getUrl() }}" class="relative w-full">
        <img src="/assets/images/covers/{{ $post->getFilename() }}.png"
             alt="{{ $post->title }}"
             class="aspect-[16/9] w-full bg-gray-100 object-fill">
        <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
    </a>
    <div class="max-w-xl p-4 py-6">
        <div class="flex items-center gap-x-4 text-xs">
            <div class="text-gray-500">{{ $post->getDate()  }}</div>
            <a href="{{ $page->baseUrl }}/posts/year/{{ date('Y', $post->date) }}"
               class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ date('Y', $post->date) }}</a>
        </div>
        <div class="group relative">
            <div class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                <a href="{{ $post->getUrl() }}">
                    <span class="absolute inset-0"></span>
                    {{ $post->title }}
                </a>
            </div>
            <div class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ $post->excerpt() }}</div>
        </div>
    </div>
</article>