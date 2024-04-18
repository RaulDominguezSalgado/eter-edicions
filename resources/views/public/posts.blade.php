<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/posts.css') }}">

    <main class="">
        <div class="flex flex-col items-center space-y-10">
            <div class="flex flex-col items-center space-y-6">
                <h2>Articles</h2>
            </div>

            <div class="w-full flex flex-wrap justify-center space-x-10 h-auto px-16" id="catalog">
                @foreach ($posts as $i => $post)
                    <div class="post flex flex-col space-y-2">
                        <div class="">
                            <h5 class="font-bold">{{$post['title']}}</h5>
                        </div>
                        <div class="cover space-y-4">
                            <a href="{{ route("post-detail.{$locale}", $post['id']) }}">
                                <img src="{{ asset('img/posts/thumbnails/' . $post['image']) }}"
                                    alt="{{ $post['title'] }}">
                            </a>
                        </div>
                        <div class="w-full flex justify-between items-baseline h-8">
                            <p class="uppercase">{{$post['post_type']}}</p>
                            <div class="h-auto">
                                <p class="p12">{{$post['date']}}</p>
                                {{-- <p class="p12">{{$post['location']}}</p> --}}
                            </div>
                        </div>
                        <div class="description">
                            <p class="p14">{{$post['description']}}</p>
                        </div>
                        <div>
                            <a href="{{route('post-detail.ca', $post['id'])}}">
                                <p class="p14 underline">Saber-ne més</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </main>

</x-layouts.app>
