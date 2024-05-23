<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $webTitle }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/post.css') }}">

    <?php
    // @dump($post);
    ?>

    <main class="body flex flex-col items-center space-y-6 mb-12">
        <div class="max-w-5xl">
            <div class="md:w-full md:h-64 max-h-[15em] overflow-hidden mb-4">
                <img class="w-full h-auto" src="{{ asset('img/posts/covers/' . $post['image']) }}" alt="{{ $post['title'] }}">
            </div>

            <div id="content" class="space-y-6">
                <div class="headline space-y-4 ">
                    <div class="space-y-2">
                        <div id="title" class="w-full">
                            <h3>{{ $post['title'] }}</h3>
                        </div>
                        <div>
                            <h4>{!! nl2br($post['description']) !!}</h4>
                        </div>
                    </div>
                    <div id="info" class="space-y-4">
                        <div id="location" class="flex flex-wrap items-end">
                            <div class="w-full md:w-auto event-info space-x-2 mr-2">
                                <span class="">
                                    <img src="{{ asset('img/icons/location-colored.webp') }}" alt="" class=""
                                        style="width: 1.95em; height: 1.95em;">
                                </span>
                                <span class="">
                                    <h5>{{ __('orthographicRules.¿') }}{{ __('general.where') }}?</h5>
                                </span>
                            </div>
                            <p class="text-start">{{ $post['location'] }}</p>
                        </div>
                        <div id="date" class="flex flex-wrap items-end">
                            <div class="w-full md:w-auto event-info space-x-2  mr-2">
                                <span><img src="{{ asset('img/icons/calendar-colored.webp') }}" alt=""
                                        class="" style="width: 1.95em; height: 1.95em;"></span>
                                <span class="">
                                    <h5>{{ __('orthographicRules.¿') }}{{ __('general.when') }}?</h5>
                                </span>
                            </div>
                            <p class=" flex align-end">{{ $post['date'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="text-justify">
                    {!! nl2br($post['content']) !!}
                </div>
            </div>
        </div>
    </main>

</x-layouts.app>
