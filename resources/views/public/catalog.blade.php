<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/catalog.css') }}">

    <main class="body">
        <div class="flex flex-col items-center space-y-14">
            <div class="flex flex-col items-center space-y-6">
                <h2>Catàleg</h2>

                {{-- <div class="mb-8">
                    <ul class="flex space-x-4">
                        @foreach ($collections as $i => $collection)
                            <li><a><h5>{{ $collection['name'] }}</h5></a></li>
                        @endforeach
                    </ul>
                </div> --}}
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
                            <div class="book-title w-fit h-12 flex justify-center items-center text-center">{{ $book['title'] }}</div>
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
                                <div class="book-translator">Traducció de
                                @foreach ($book['translators'] as $translator)
                                    @if (!$loop->last)
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
    </main>

</x-layouts.app>
