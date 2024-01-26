@extends('_layouts.main')

@section('body')
    <div class="bg-white my-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Дайджесты по годам</div>

            <div class="mt-12 rounded-lg gap-4 flex flex-col">
                @foreach($years as $year)
                    <div class="group relative bg-white shadow p-6 px-6 py-10">
                        <div class="text-base font-semibold leading-6 text-gray-900">
                            <a href="{{ $year->getUrl() }}" class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                {{ $year->title }}
                            </a>
                        </div>
                        <div class="mt-2 text-sm text-gray-500">{{ $year->description }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
