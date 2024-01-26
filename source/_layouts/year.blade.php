@extends('_layouts.main')

@section('body')
    <div class="bg-white my-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Дайджесты за {{ $page->title }} год</div>
            <div class="mt-6 text-base leading-7 text-gray-600">{{ $page->description }}</div>
            <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @foreach ($page->posts($posts) as $post)
                    @include('_partials.blog-post')
                @endforeach
            </div>
        </div>
    </div>
@endsection