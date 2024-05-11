<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot>


    <link rel="stylesheet" href="{{ asset('css/public/posts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/public/catalog.css') }}">

    <main class="mb-24 space-y-16">

        <div class="flex flex-col items-center space-y-16">
            <div class="flex flex-col items-center space-y-6">
                <h2>{{__('general.catalog')}}</h2>
            </div>

            <div class="w-full flex flex-wrap justify-center h-auto px-16" id="catalog">
                @foreach ($books as $i => $book)
                    <div class="book flex flex-col items-center mb-6 mr-10">
                        <div class="cover mb-4 relative">
                            <a href="{{ route("book-detail.{$locale}", $book['id']) }}">
                                <img src="{{ asset('img/books/thumbnails/' . $book['image']) }}"
                                    alt="{{ $book['title'] }}" style="height: 19.7em">
                            </a>
                            <a href="{{ route("book-detail.{$locale}", $book['id']) }}" class="flex items-end w-full h-[19.7em] opacity-0 hover:opacity-100 duration-150 ease-in-out absolute bottom-0">
                                <div class="w-full flex justify-between items-center p-2 bg-light/[.75]">
                                    <p class="font-bold text-xl">{{$book['pvp']}}€</p>
                                    <form action="{{ route('cart.insert') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="book_id" value="{{ $book['id'] }}">

                                        <input hidden type="number" class=" border border-black" name="number_of_items"
                                            placeholder="1" value="1" min="1">
                                            <button>
                                                <i class="icon text-3xl add-to-cart"></i>
                                            </button>
                                    </form>
                                </div>
                            </a>
                        </div>
                        <div id="book-info-{{ $book['slug'] }}" class="flex flex-col items-center space-y-2 w-64">
                            <div class="book-title w-fit h-12 flex justify-center items-center text-center">
                                {{ $book['title'] }}</div>
                            <div class="flex space-x-1">
                                @foreach ($book['authors'] as $author)
                                    {{-- if not last iteration --}}
                                    @if (!$loop->last)
                                        <div class="book-author">{{ $author }},</div>
                                        {{-- if last iteration --}}
                                    @else
                                        <div class="book-author">{{ $author }}</div>
                                    @endif
                                @endforeach
                            </div>

                            @if(array_key_exists('translators', $book))
                            <div class="book-translator flex space-x-1 text-center">
                                <div class="book-translator">{{__('general.translation')}} {{  $locale == 'ca' ? (\App\Services\Translation\OrthographicRules::startsWithDe("de ". $book['translators'][0]) ? __('orthographicRules.with_d') : __('orthographicRules.with_de')) : __('orthographicRules.by') }}<!--
                                        @foreach ($book['translators'] as $translator)
                                            @if($loop->first && !$loop->last)
                                                -->{{ $translator }},
                                            @elseif($loop->first && $loop->last)
                                                -->{{ $translator }}
                                            @elseif (!$loop->last)
                                                {{ $translator }},
                                                {{-- if last iteration --}}
                                            @else
                                                {{ $translator }}
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
                @endforeach
            </div>

        </div>

        <div class="flex flex-col items-center space-y-6" id="news">
            <div>
                <h2>{{__('general.news')}}</h2>
            </div>
            <div class="flex flex-wrap">
                @foreach ($posts as $i => $post)
                    <div class="post h-full space-y-2">
                        <div class="">
                            <h5 class="font-bold">{{ $post['title'] }}</h5>
                        </div>
                        <div class="cover-min">
                            <a href="{{ route("post-detail.{$locale}", $post['id']) }}">
                                <img src="{{ asset('img/posts/thumbnails/' . $post['image']) }}"
                                    alt="{{ $post['title'] }}" class="">
                            </a>
                        </div>
                        {{-- <div class="">
                            <h5 class="font-bold">{{ $post['title'] }}</h5>
                        </div> --}}
                        <div class="headline headline flex justify-between items-end">
                            <div class="min-w-max">
                                <p class="uppercase">{{ $post['post_type'] }}</p>
                            </div>
                            <div class="date-info h-auto">
                                <p class="p12">{{ $post['date'] }}</p>
                                @if (!is_null($post['location']))
                                    <p class="p12">{{ $post['location'] }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="description">
                            <p class="p14">{{ $post['description'] }}</p>
                        </div>
                        <div class="w-fi">
                            <a href="{{ route('post-detail.ca', $post['id']) }}">
                                <p class="p14 underline">{{__('general.read-more')}}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </main>

</x-layouts.app>
