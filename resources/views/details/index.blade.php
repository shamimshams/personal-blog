@extends('layouts.app')

@section('meta')
    @foreach ($article->meta as $meta)
        @foreach ($meta as $key => $value)
            @if (!$value)
                @continue
            @endif
            <meta name="{{ $key }}" content="{{ $value }}" />
        @endforeach
    @endforeach
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <meta property="og:title" content="{{ $article->title }}" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:description " content="{{ $article->summery }}" />
@endsection

@section('content')
    <div class="mx-auto max-w-3xl px-4 sm:px-6 xl:max-w-5xl xl:px-0">
        <div class="fixed right-8 bottom-8 hidden flex-col gap-3 md:hidden">
            <button aria-label="Scroll To Comment" type="button"
                class="rounded-full bg-gray-200 p-2 text-gray-500 transition-all hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <button aria-label="Scroll To Top" type="button"
                class="rounded-full bg-gray-200 p-2 text-gray-500 transition-all hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <article>
            <div class="xl:divide-y xl:divide-gray-200 xl:dark:divide-gray-700">
                <header class="pt-6 xl:pb-6">
                    <div class="space-y-1 text-center">
                        <dl class="space-y-10">
                            <div>
                                <dt class="sr-only">Published on</dt>
                                <dd class="text-base font-medium leading-6 text-gray-500 dark:text-gray-400"><time
                                        datetime="2021-05-02T00:00:00.000Z">{{ $article->published_at->format('l M d, Y') }}</time>
                                </dd>
                            </div>
                        </dl>
                        <div>
                            <h1
                                class="text-3xl font-extrabold leading-9 tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl sm:leading-10 md:text-5xl md:leading-14">
                                {{ $article->title }}
                            </h1>
                        </div>
                    </div>
                </header>
                <div class="divide-y divide-gray-200 pb-8 dark:divide-gray-700 xl:grid xl:grid-cols-4 xl:gap-x-6 xl:divide-y-0"
                    style="grid-template-rows: auto 1fr;">
                    <dl class="pt-6 pb-10 xl:border-b xl:border-gray-200 xl:pt-11 xl:dark:border-gray-700">
                        <dt class="sr-only">Authors</dt>
                        <dd>
                            <ul class="flex justify-center space-x-8 sm:space-x-12 xl:block xl:space-x-0 xl:space-y-8">
                                {{-- <li class="flex items-center space-x-2"><span
                                        style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;"><span
                                            style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;"><img
                                                alt="" aria-hidden="true"
                                                src="data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%2738%27%20height=%2738%27/%3e"
                                                style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;"></span><img
                                            alt="avatar"
                                            srcset="/_next/image?url=%2Fstatic%2Fimages%2Favatar.png&amp;w=48&amp;q=75 1x, /_next/image?url=%2Fstatic%2Fimages%2Favatar.png&amp;w=96&amp;q=75 2x"
                                            src="/_next/image?url=%2Fstatic%2Fimages%2Favatar.png&amp;w=96&amp;q=75"
                                            decoding="async" data-nimg="intrinsic" class="h-10 w-10 rounded-full"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;"></span>
                                    <dl class="whitespace-nowrap text-sm font-medium leading-5">
                                        <dt class="sr-only">Name</dt>
                                        <dd class="text-gray-900 dark:text-gray-100">Tails Azimuth</dd>
                                        <dt class="sr-only">Twitter</dt>
                                        <dd><a target="_blank" rel="noopener noreferrer" href="https://twitter.com/Twitter"
                                                class="text-gray-500 hover:text-gray-600 dark:hover:text-gray-400">@Twitter</a>
                                        </dd>
                                    </dl>
                                </li> --}}
                                <li>
                                    <h2 class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400 mb-2">Tags
                                    </h2>
                                    <div class="flex flex-wrap">
                                        @foreach ($article->tags as $tag)
                                            <a class="mr-3 text-sm font-medium uppercase text-gray-500 hover:text-gray-600 dark:hover:text-gray-400"
                                                href="">{{ $tag->name }}</a>
                                        @endforeach
                                    </div>
                                </li>
                                <li>
                                    <h2 class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400 mb-2">Share
                                    </h2>
                                    @include('details.social')
                                </li>
                            </ul>
                        </dd>
                    </dl>


                    <div class="divide-y divide-gray-200 dark:divide-gray-700 xl:col-span-3 xl:row-span-2 xl:pb-0">
                        <div class="prose max-w-none pt-10 pb-8 dark:prose-dark">
                            {!! $article->body !!}
                        </div>
                        {{-- <div class="pt-6 pb-6 text-sm text-gray-700 dark:text-gray-300"><a target="_blank" rel="nofollow"
                                href="https://mobile.twitter.com/search?q=https%3A%2F%2Ftailwind-nextjs-starter-blog.vercel.app%2Fblog%2Fnested-route%2Fintroducing-multi-part-posts-with-nested-routing">Discuss
                                on Twitter</a> • <a target="_blank" rel="noopener noreferrer"
                                href="https://github.com/timlrx/tailwind-nextjs-starter-blog/blob/master/data/blog/nested-route/introducing-multi-part-posts-with-nested-routing.md">View
                                on GitHub</a></div>
                        <div id="comment">
                            <div class="pt-6 pb-6 text-center text-gray-700 dark:text-gray-300"><button
                                    fdprocessedid="t5hzd">Load Comments</button>
                                <div class="giscus" id="comments-container"></div>
                            </div>
                        </div> --}}
                        <footer class="w-full">
                            <div
                                class="divide-gray-200 text-sm font-medium leading-5 dark:divide-gray-700 xl:col-start-1 xl:row-start-2 xl:divide-y">

                                <div class="flex justify-between py-4 xl:block1 xl:space-y-8 xl:py-8">

                                    @if ($article->previous)
                                        <div>
                                            <h2 class="text-xs uppercase tracking-wide text-gray-400 dark:text-gray-400">
                                                Previous
                                                Article</h2>
                                            <div class="text-gray-500 hover:text-gray-600 dark:hover:text-gray-400">
                                                <a
                                                    href="{{ route('details', ['slug' => $article->previous->slug]) }}">{{ $article->previous->title }}</a>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($article->next)
                                        <div>
                                            <h2 class="text-xs uppercase tracking-wide text-gray-400 dark:text-gray-400">
                                                Next
                                                Article</h2>
                                            <div class="text-gray-500 hover:text-gray-600 dark:hover:text-gray-400">
                                                <a
                                                    href="{{ route('details', ['slug' => $article->next->slug]) }}">{{ $article->next->title }}</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="pt-4 xl:pt-8"><a class="text-gray-500 hover:text-gray-600 dark:hover:text-gray-400"
                                    href="{{ route('home') }}">←
                                    Back to the articles</a></div>
                        </footer>
                    </div>

                </div>
            </div>
        </article>
    </div>
@endsection

{{-- @push('header')
    <link rel="stylesheet" href="//unpkg.com/@highlightjs/cdn-assets@11.7.0/styles/default.min.css">
@endpush

@push('footer')
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('pre').forEach((el) => {
                hljs.highlightElement(el);
            });
        });
    </script>
@endpush --}}
