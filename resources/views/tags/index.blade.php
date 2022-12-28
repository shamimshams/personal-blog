@extends('layouts.app')

@section('content')
    <div
        class="flex flex-col items-start justify-start divide-y divide-gray-200 dark:divide-gray-700 md:mt-24 md:flex-row md:items-center md:justify-center md:space-x-6 md:divide-y-0">
        <div class="space-x-2 pt-6 pb-8 md:space-y-5">
            <h1
                class="text-3xl font-extrabold leading-9 tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl sm:leading-10 md:border-r-2 md:px-6 md:text-6xl md:leading-14">
                Tags</h1>
        </div>
        <div class="flex max-w-lg flex-wrap">
            @foreach ($tags as $tag)
                <div class="mt-2 mb-2 mr-5">
                    <a class="mr-3 text-sm font-medium uppercase text-gray-500 hover:text-gray-600 dark:hover:text-gray-400"
                        href="{{ route('posttag', ['posttag' => $tag->slug]) }}">{{ $tag->name }}</a>
                    <a class="-ml-2 text-sm font-semibold uppercase text-gray-600 dark:text-gray-300"
                        href="{{ route('posttag', ['posttag' => $tag->slug]) }}">
                        ({{ $tag->posts_count }})
                    </a>
                </div>
            @endforeach

        </div>
    </div>
@endsection
