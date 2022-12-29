@extends('layouts.app')

@section('content')
    <div class="divide-y divide-gray-200 dark:divide-gray-700">
        <div class="space-y-2 pt-6 pb-8 md:space-y-5">
            <h1
                class="text-3xl font-extrabold leading-9 tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl sm:leading-10 md:text-6xl md:leading-14">
                About</h1>
        </div>
        <div class="items-start space-y-2 xl:grid xl:grid-cols-3 xl:gap-x-8 xl:space-y-0">
            <div class="flex flex-col items-center pt-8">
                <span
                    style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;"><span
                        style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;">
                        <img alt="" aria-hidden="true" src="{{ asset('img/logo.jpeg') }}"
                            style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;">
                        {{-- </span>
                    <img alt="avatar" src="/_next/image?url=%2Fstatic%2Fimages%2Favatar.png&amp;w=384&amp;q=75"
                        decoding="async" data-nimg="intrinsic" class="h-48 w-48 rounded-full"
                        style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;"
                        srcset="/_next/image?url=%2Fstatic%2Fimages%2Favatar.png&amp;w=256&amp;q=75 1x, /_next/image?url=%2Fstatic%2Fimages%2Favatar.png&amp;w=384&amp;q=75 2x">
                    <noscript></noscript> --}}
                    </span>
                    <h3 class="pt-4 pb-2 text-2xl font-bold leading-8 tracking-tight">Shamim Shams</h3>
                    <div class="text-gray-500 dark:text-gray-400">Software Engineer</div>
                    <div class="text-gray-500 dark:text-gray-400">Dhaka, Bangladesh</div>
            </div>
            <div class="prose max-w-none pt-8 pb-8 dark:prose-dark xl:col-span-2">
                <p>Hi, my name is Shamsuddoha Majumder(Shamim shams). I am a 12+ year's experienced software engineer based
                    on
                    dhaka, bangladesh.Throughout my career, I have worked on a variety of technology and languages, like
                    php, dotnet, mysql,
                    javascript,python. I also have working
                    experince on basic devops</p>
                <p>I love reading books, travelling and exploring new technology. I am also dad of
                    two children.</p>
                <p>You can contact me on my social accounts or <a class="text-green-500"
                        href="https://www.fiverr.com/shamimshams" target="_blank">Fiverr</a></p>
            </div>
        </div>
    </div>
@endsection
