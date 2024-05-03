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

            <div class="w-full flex flex-wrap justify-center space-x-10 h-auto px-16" id="catalog">
                @foreach ($books as $i => $book)
                    <div class="book flex flex-col items-center mb-6">
                        <div class="cover mb-4">
                            <a href="{{ route("book-detail.{$locale}", $book['id']) }}">
                                <img src="{{ asset('img/books/thumbnails/' . $book['image']) }}"
                                    alt="{{ $book['title'] }}" style="height: 19.7em">
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

                            <div class="book-translator flex space-x-1 text-center">
                                <div class="book-translator">{{__('general.translation')}} {{  $locale == 'ca' ? (\App\Services\Translation\OrthographicRules::startsWithDe("de ". $book['translators'][0]) ? __('orthographic-rules.with_d') : __('orthographic-rules.with_de')) : __('orthographic-rules.by') }}<!--
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
                            <div class="">
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
