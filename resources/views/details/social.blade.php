<div class="flex space-x-2">
    @php
        $socialLinks = (new \App\SocialShare())
            ->page(url()->full(), $article->title)
            ->facebook()
            ->twitter()
            ->linkedin()
            ->getRawLinks();
    @endphp

    <a href="{{ $socialLinks['facebook'] }}">
        @include('icons.facebook')
    </a>
    <a href="{{ $socialLinks['twitter'] }}">
        @include('icons.twitter')
    </a>
    <a href="{{ $socialLinks['linkedin'] }}">
        @include('icons.linkedin')
    </a>
</div>
