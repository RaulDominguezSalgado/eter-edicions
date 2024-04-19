<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/post.css') }}">

    <?php
    // @dump($post);
    ?>

    <main class="body flex flex-col items-center space-y-4 mb-12">
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
        <div class="banner w-full">
            <img src="{{ asset('img/posts/covers/' . $post['image']) }}" alt="{{ $post['title'] }}">
        </div>
        <div id="content" class="text-justify space-y-2">
            <div>
                <h4><b>{!! nl2br($post['description']) !!}</b></h4>
            </div>
            <div>
                {!! nl2br($post['content']) !!}
            </div>
        </div>
    </main>

</x-layouts.app>
