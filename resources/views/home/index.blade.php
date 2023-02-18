@extends('layouts.app')

@section('meta')
<meta key="keywords" value="shamsuddoha majumder, 'shamsuddoha', shamimshams, php, laravel">
@endsection

@section('content')
    <div class="divide-y divide-gray-200 dark:divide-gray-700">
        <div class="space-y-2 pt-6 pb-8 md:space-y-5">
            <h1
                class="text-3xl font-extrabold leading-9 tracking-tight text-gray-700 dark:text-gray-100 sm:text-4xl sm:leading-10 md:text-6xl md:leading-14">
                Articles</h1>
            {{-- <p class="text-lg leading-7 text-gray-500 dark:text-gray-400">A blog created with Next.js
                and Tailwind.css</p> --}}
        </div>
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @if ($articles)
                @foreach ($articles as $article)
                    <li class="py-12">
                        <article>
                            <div class="space-y-2 xl:grid xl:grid-cols-4 xl:items-baseline xl:space-y-0">
                                <dl>
                                    <dt class="sr-only">Published on</dt>
                                    <dd class="text-base font-medium leading-6 text-gray-500 dark:text-gray-400">
                                        <time
                                            datetime="{{ $article->published_at }}">{{ $article->published_at->format('d M, Y') }}
                                        </time>
                                    </dd>
                                </dl>
                                <div class="space-y-5 xl:col-span-3">
                                    <div class="space-y-6">
                                        <div>
                                            <h2 class="text-2xl font-bold leading-8 tracking-tight"><a
                                                    class="text-gray-900 dark:text-gray-100"
                                                    href="{{ route('details', ['slug' => $article->slug]) }}">{{ $article->title }}</a>
                                            </h2>
                                            <div class="flex flex-wrap">
                                                @foreach ($article->tags as $tag)
                                                    <a class="mr-3 text-sm font-medium uppercase text-gray-500 hover:text-gray-600 dark:hover:text-gray-400"
                                                        href="{{ route('posttag', ['posttag' => $tag->slug]) }}">{{ $tag->name }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="prose max-w-none text-gray-500 dark:text-gray-400">
                                            {!! $article->summery !!}
                                        </div>
                                    </div>
                                    <div class="text-base font-medium leading-6"><a
                                            class="text-gray-500 hover:text-gray-600 dark:hover:text-gray-400"
                                            aria-label="Read &quot;New features in v1&quot;"
                                            href="{{ route('details', ['slug' => $article->slug]) }}">Read
                                            more →</a></div>
                                </div>
                            </div>
                        </article>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    {{ $articles->links() }}
    {{-- <div class="flex items-center justify-center pt-4">
        <div>
            <div class="pb-1 text-lg font-semibold text-gray-800 dark:text-gray-100">Subscribe to the
                newsletter</div>
            <form class="flex flex-col sm:flex-row">
                <div><label class="sr-only" for="email-input">Email address</label><input autocomplete="email"
                        class="w-72 rounded-md px-4 focus:border-transparent focus:outline-none focus:ring-2 focus:ring-primary-600 dark:bg-black"
                        id="email-input" name="email" placeholder="Enter your email" required="" type="email"
                        fdprocessedid="5doqwsk"></div>
                <div class="mt-2 flex w-full rounded-md shadow-sm sm:mt-0 sm:ml-3"><button
                        class="w-full rounded-md bg-primary-500 py-2 px-4 font-medium text-white sm:py-0 hover:bg-primary-700 dark:hover:bg-primary-400 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2 dark:ring-offset-black"
                        type="submit" fdprocessedid="fjq2fk">Sign up</button></div>
            </form>
        </div>
    </div> --}}
@endsection
