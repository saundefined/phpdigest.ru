---
title: Команда
description: Наша команда, которая ежемесячно с любовью подготавливает для вас дайджест из мира PHP
pagination:
    collection: authors
    perPage: 12
---
@extends('_layouts.main')

@section('body')
    <div class="bg-white my-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $page->title }}</div>
            <div class="mt-6 text-base leading-7 text-gray-600">{{ $page->description }}</div>

            <div class="mt-12">
                <ul class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                    @foreach ($pagination->items as $author)
                        <li>
                            <img class="aspect-[3/2] w-full rounded-2xl object-cover"
                                 src="{{ $author->image }}"
                                 alt="{{ $author->name }}">
                            <div class="mt-6 text-lg font-semibold leading-8 tracking-tight text-gray-900">
                                <a href="{{ $author->url }}" target="_blank"
                                   rel="noopener noreferrer"
                                >{{ $author->name }}</a>
                            </div>
                            <div class="text-base leading-7 text-gray-600">{{ $author->job }}</div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
