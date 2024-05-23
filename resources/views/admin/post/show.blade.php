<x-layouts.admin.app>
    {{-- <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot> --}}

    <link rel="stylesheet" href="{{ asset('css/public/post.css') }}">

    <?php
    // @dump($post);
    ?>

    <main class="body flex flex-col items-center space-y-6 mb-12">
        <div class="w-full max-w-5xl flex justify-between mb-4">
            <div>
                <h2>Vista previa</h2>
            </div>
            <div class="space-y-6">
                <div>
                    <a class="navigation-button font-bold" href="{{ url()->previous() }}">Enrere</a>
                </div>
            </div>
        </div>

        @if(isset($post['date']) && isset($post['location']))
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
        @else
        {{-- @dd($post) --}}
        <div class="max-w-5xl space-y-2">
            <div id="title" class="w-full">
                <h3>{{ $post['title'] }}</h3>
            </div>
            <div class="w-full header">
                <div class="flex space-x-2.5">
                    <div class="profile-pic">
                        <img src="{{ asset('img/collab/thumbnails/' . $post['author_image']) }}" alt="{{ $post['author_name'] }}"
                            class="flex-auto">
                    </div>
                    <div class="flex flex-col justify-center">
                        @if ($post['translator_id'])
                            <a href="{{route("collaborator-detail.{$locale}", $post['author_slug'])}}">
                                <p class="p16">{{ $post['author'] }}</p>
                            </a>
                            <a href="{{route("collaborator-detail.{$locale}", $post['translator_slug'])}}">
                                <p class="p14">{{ $post['translation'] }}{{ $post['translator'] }}</p>
                            </a>
                        @else
                            <a href="{{route("collaborator-detail.{$locale}", $post['author_slug'])}}">
                                <h5>{{ $post['author_name'] }}</h5>
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
        @endif

        {{-- <div>
            <div class="banner w-full px-10">
                <img src="{{ asset('img/posts/covers/' . $post['image']) }}" alt="{{ $post['title'] }}"
                    class="w-full h-auto">
            </div>

            <div id="content" class="text-justify space-y-6">
                <div class="headline space-y-2 ">
                    <div id="title" class="w-full">
                        <h3>{{ $post['title'] }}</h3>
                    </div>
                    <div>
                        <h4>{!! nl2br($post['description']) !!}</h4>
                    </div>
                    <div id="info" class="space-y-1.5">
                        <div id="location" class="flex space-x-2">
                            <div class="event-info space-x-2">
                                <img src="{{ asset('img/icons/location-colored.webp') }}" alt="" class=""
                                    style="height: 1.95em">
                                <p class="">{{ __('orthographicRules.¿') }}{{ __('general.where') }}?</p>
                            </div>
                            <p class=" flex align-end">{{ $post['location'] }}</p>
                        </div>
                        <div id="date" class="flex space-x-2">
                            <div class="event-info space-x-2">
                                <img src="{{ asset('img/icons/calendar-colored.webp') }}" alt="" class=""
                                    style="height: 1.95em">
                                <p class="">{{ __('orthographicRules.¿') }}{{ __('general.when') }}?</p>
                            </div>
                            <p class=" flex align-end">{{ $post['date'] }}</p>
                        </div>
                    </div>
                </div>
                <div>
                    {!! nl2br($post['content']) !!}
                </div>
            </div>
        </div> --}}
    </main>

</x-layouts.admin.app>
