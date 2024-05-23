<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $webTitle }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/post.css') }}">

    <?php
    // @dump($post);
    ?>

    <main class="body flex flex-col items-center mb-12">
        <div class="max-w-5xl space-y-2">
            <div id="title" class="w-full">
                <h3>{{ $post['title'] }}</h3>
            </div>
            <div class="w-full header">
                <div class="flex space-x-2.5">
                    <div class="profile-pic">
                        <img src="{{ asset('img/collab/thumbnails/' . $post['author_image']) }}" alt="{{ $post['author'] }}"
                            class="flex-auto">
                    </div>
                    <div class="flex flex-col justify-center">
                        @if ($post['translator'])
                            <a href="{{route("collaborator-detail.{$locale}", $post['author_id'])}}">
                                <p class="p16">{{ $post['author'] }}</p>
                            </a>
                            <a href="{{route("collaborator-detail.{$locale}", $post['translator_id'])}}">
                                <p class="p14">{{ $post['translation'] }}{{ $post['translator'] }}</p>
                            </a>
                        @else
                            <a href="{{route("collaborator-detail.{$locale}", $post['author_id'])}}">
                                <h5>{{ $post['author'] }}</h5>
                            </a>
                        @endif
                    </div>
                </div>
                <div>
                    <p class="p14">{{ $post['publication_date'] }}</p>
                </div>
            </div>
            <div class="separator"></div>
            <div class="banner md:w-full md:h-64 max-h-[15em] overflow-hidden mb-4">
                <img src="{{ asset('img/posts/covers/' . $post['image']) }}" alt="{{ $post['title'] }}">
            </div>
            <div id="content" class="text-justify space-y-4">
                <div>
                    <b>{!! nl2br($post['description']) !!}</b>
                </div>
                <div>
                    {!! nl2br($post['content']) !!}
                </div>
            </div>
        </div>
    </main>

</x-layouts.app>
