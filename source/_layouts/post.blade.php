@extends('_layouts.main')

@section('body')
    <div class="bg-white px-6 py-24 lg:px-8">
        <div class="mx-auto max-w-3xl text-base leading-7 text-gray-700">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $page->title }}</h1>

            <div class="relative w-full mt-12">
                <img src="/assets/images/covers/{{ $page->getFilename() }}.png"
                     alt="{{ $page->title }}"
                     class="aspect-[16/9] w-full rounded-2xl bg-gray-100 object-fill">
                <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
            </div>

            <div class="prose mt-12">
                @yield('content')
            </div>

            @if($ad = $page->ad)
                <div class="mt-10 sm:mt-16">
                    <a href="{{ $ad['url'] }}" rel="noopener noreferrer" target="_blank">
                        <img src="{{ $ad['image'] }}" alt="{{ $ad['title'] }}"
                             class="h-full w-full object-cover object-center overflow-hidden rounded-lg"/>
                    </a>
                </div>
            @endif

            @if(is_array($page->author))
                <div class="mt-10 space-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16">
                    <div class="grid grid-cols-2">
                        @foreach($page->author as $author)
                            @isset($authors[$author])
                                <div class="relative flex items-center gap-x-4">
                                    <img src="{{ $authors[$author]->image }}"
                                         alt="{{ $authors[$author]->name }}"
                                         class="h-10 w-10 rounded-full bg-gray-50">
                                    <div class="text-sm leading-6">
                                        <div class="font-semibold text-gray-900">
                                            <a href="{{ $authors[$author]->url }}" target="_blank"
                                               rel="noopener noreferrer"
                                            >
                                                <span class="absolute inset-0"></span>
                                                {{ $authors[$author]->name }}
                                            </a>
                                        </div>
                                        <div class="text-gray-600">{{ $authors[$author]->job }}</div>
                                    </div>
                                </div>
                            @endisset
                        @endforeach
                    </div>
                </div>
            @endif

            @if(is_array($page->external))
                <div class="mt-10 space-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16">
                    <div class="rounded-lg gap-4 flex flex-col">
                        @foreach(array_merge(...$page->external) as $code => $url)
                            @includeIf('_partials.external.'.$code, [
                                'url' => $url,
                            ])
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <div class="mt-24">
            @include('_partials.subscribe')
        </div>
    </div>
@endsection