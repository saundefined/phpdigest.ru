---
permalink: 404.html
---

@extends('_layouts.main')

@section('body')
    <main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="text-center">
            <div class="text-base font-semibold text-indigo-600">404</div>
            <div class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">Страница не найдена</div>
            <div class="mt-6 text-base leading-7 text-gray-600">
                Вы случайно зашли на страницу или она уже была удалена
            </div>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="{{ $page->baseUrl }}"
                   class="button button--blue">Вернуться на главную</a>
            </div>
        </div>
    </main>
@endsection