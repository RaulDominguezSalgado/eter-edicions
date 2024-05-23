<x-layouts.admin.app>
    {{-- <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot> --}}

    <link rel="stylesheet" href="{{ asset('css/public/post.css') }}">

    <?php
    // @dump($post);
    ?>

<main class="body flex flex-col items-center space-y-6 mb-12">
    <div class="w-full flex justify-between items-center px-10">
        <h2 class="text-2xl font-semibold">Vista previa</h2>
        <a class="btn btn-primary btn-sm" href="{{ route('posts.index') }}"> {{ __('Enrere') }}</a>
    </div>
    <div class="banner w-full px-10">
        <img src="{{ asset('img/posts/covers/' . $post['image']) }}" alt="{{ $post['title'] }}" class="w-full h-auto">
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
                            <img src="{{ asset('img/icons/location-colored.webp') }}" alt=""
                                class="" style="height: 1.95em">
                            <p class="">{{__('orthographicRules.¿')}}{{__('general.where')}}?</p>
                        </div>
                        <p class=" flex align-end">{{ $post['location'] }}</p>
                    </div>
                    <div id="date" class="flex space-x-2">
                        <div class="event-info space-x-2">
                            <img src="{{ asset('img/icons/calendar-colored.webp') }}" alt=""
                                class="" style="height: 1.95em">
                            <p class="">{{__('orthographicRules.¿')}}{{__('general.when')}}?</p>
                        </div>
                        <p class=" flex align-end">{{ $post['date'] }}</p>
                    </div>
                </div>
            </div>
            <div>
                {!! nl2br($post['content']) !!}
            </div>
        </div>
    </main>

</x-layouts.admin.app>
