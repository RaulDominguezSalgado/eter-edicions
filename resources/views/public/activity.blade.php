<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/post.css') }}">

    <?php
    // @dump($post);
    ?>

    <main class="body flex flex-col items-center space-y-6 mb-12">
        <div class="banner w-full">
            <img src="{{ asset('img/posts/covers/' . $post['image']) }}" alt="{{ $post['title'] }}">
        </div>

        <div id="content" class="text-justify space-y-6">
            <div class="headline space-y-2 ">
                <div id="title" class="w-full">
                    <h3>{{ $post['title'] }}</h3>
                </div>
                <div>
                    <h4>{!! nl2br($post['description']) !!}</h4>
                </div>
                <div id="info" class="space-y-1">
                    <div id="location" class="flex space-x-2">
                        <div class="event-info space-x-1">
                            <img src="{{ asset('img/icons/location-colored.webp') }}" alt=""
                                class="" style="height: 1.95em">
                            <p class="p18">On?</p>
                        </div>
                        <p class="p18 flex align-end">{{ $post['location'] }}</p>
                    </div>
                    <div id="date" class="flex space-x-2">
                        <div class="event-info space-x-1">
                            <img src="{{ asset('img/icons/calendar-colored.webp') }}" alt=""
                                class="" style="height: 1.95em">
                            <p class="p18">Quan?</p>
                        </div>
                        <p class="p18 flex align-end">{{ $post['date'] }}</p>
                    </div>
                </div>
            </div>
            <div>
                {!! nl2br($post['content']) !!}
            </div>
        </div>
    </main>

</x-layouts.app>