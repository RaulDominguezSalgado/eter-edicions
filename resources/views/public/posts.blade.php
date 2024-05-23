<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $webTitle }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/posts.css') }}">

    <main class="mb-10">
        <div class="flex flex-col items-center space-y-10">
            <div class="flex flex-col items-center space-y-6">
                <h2>{{__('general.posts')}}</h2>
            </div>

            <div class="w-full flex flex-wrap justify-center md:px-0" id="catalog">
                @foreach ($posts as $i => $post)
                    <div class="max-w-96 post h-full mb-8">
                        <div class="">
                            <h5 class="font-bold">{{ $post['title'] }}</h5>
                        </div>
                        <div class="cover-min">
                            <a href="{{ route("post-detail.{$locale}", $post['slug']) }}">
                                <img src="{{ asset('img/posts/thumbnails/' . $post['image']) }}"
                                    alt="{{ $post['title'] }}" class="">
                            </a>
                        </div>
                        {{-- <div class="">
                            <h5 class="font-bold">{{ $post['title'] }}</h5>
                        </div> --}}
                        <div class="headline headline flex justify-between items-end">
                            <div class="min-w-max">
                                <p class="text-start uppercase">{{ $post['post_type'] }}</p>
                            </div>
                            <div class="date-info h-auto">
                                <p class="p12 text-end">{{ $post['date'] }}</p>
                            </div>
                        </div>
                        <div class="description">
                            <p class="p14">{{ $post['description'] }}</p>
                        </div>
                        <div class="w-fi">
                            <a href="{{route('post-detail.ca', $post['slug'])}}">
                                <p class="p14 underline">{{__('general.read-more')}}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
                {{-- @foreach ($posts as $i => $post)
                    <div class="max-w-96 post space-y-2">
                        <div class="">
                            <h5 class="font-bold">{{$post['title']}}</h5>
                        </div>
                        <div class="cover space-y-4">
                            <a href="{{ route("post-detail.{$locale}", $post['slug']) }}">
                                <img src="{{ asset('img/posts/thumbnails/' . $post['image']) }}"
                                    alt="{{ $post['title'] }}">
                            </a>
                        </div>
                        <div class="headline flex justify-between items-end">
                            <div class="">
                                <p class="uppercase">{{$post['post_type']}}</p>
                            </div>
                            <div class="h-auto">
                                <p class="p12">{{$post['date']}}</p>
                            </div>
                        </div>
                        <div class="description">
                            <p class="p14">{{$post['description']}}</p>
                        </div>
                        <div class="w-fit">
                            <a href="{{route('post-detail.ca', $post['slug'])}}">
                                <p class="p14 underline">{{__('general.read-more')}}</p>
                            </a>
                        </div>
                    </div>
                @endforeach --}}
            </div>

        </div>
    </main>

</x-layouts.app>
