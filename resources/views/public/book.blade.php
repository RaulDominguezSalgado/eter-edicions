<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/book.css') }}">

    <main class="body space-y-4 mb-12">
        <div class="book">
            <div class="book-detail flex justify-between mb-4">
                <div class="mr-6 cover">
                    {{-- <div id="book-image" class="book-image"></div> --}}
                    {{-- <div class="object-fill cover border-guide-2"> --}}
                    <img class="" src="{{ asset('img/books/covers/' . $book['image']) }}" alt="{{ $book['title'] }}">
                    {{-- </div> --}}
                </div>

                <div class="details flex flex-col space-y-3 justify-between h-auto">

                    <div class="flex flex-col space-y-2">
                        <div class="flex justify-between">
                            <div class="title-author flex flex-col space-y-1 w-full">
                                <div class="flex flex-row justify-between items-center">
                                    <h2>{{ $book['title'] }}</h2>
                                </div>
                                <div class="flex space-x-1">
                                    @foreach ($book['authors'] as $author)
                                        {{-- if not last iteration --}}
                                        @if (!$loop->last)
                                            <h4>{{ $author['name'] }},</h4>
                                            {{-- if last iteration --}}
                                        @else
                                            <h4>{{ $author['name'] }}</h4>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="flex space-x-5 items-baseline">
                            <div class="flex space-x-1.5" id="pvp">
                                @if ($book['discounted_price'])
                                    <h5 class="line-through text-red-600">{{ $book['pvp'] }}€</h5>
                                    <h5 class="">{{ $book['discounted_price'] }}€</h5>
                                @else
                                    <h5 class="">{{ $book['pvp'] }}€</h5>
                                @endif
                            </div>
                        </div>

                        <div id="book-description" class="">
                            @if ($book['headline'])
                                <p class=""><strong>{{ $book['headline'] }}</strong></p>
                            @endif
                            <p>{{ $book['description'] }}</p>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <a href="" class="sample flex space-x-2.5">
                            <img src="{{ asset('img/icons/download.webp') }}"
                                alt="Descarregar sample de {{ $book['title'] }}" class="clickable" style="width: 15px">
                            <small class="text-slate-600">Comença a llegir</small>
                        </a>

                        <div class="add-to-cart">
                            <input type="number" class=" border border-black" name="number_of_items" placeholder="1"
                                value="1">
                            <button type="submit" class="py-2.5 px-3 flex space-x-2 items-center">
                                <span class="flex items-center leading-none text-white">Afegir a la cistella</span>
                                <span class=""><img src="{{ asset('img/icons/add-to-cart-white.webp') }}"
                                        alt="Botó per afegir a la cistella" style="width: 15px"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                @if ($book['stock'])
                    <div>
                        <small class="text-green-700">Disponible</small>
                    </div>
                @else
                    <div>
                        <small class="text-red-700">Ho sentim! Aquest llibre no està disponible</small>
                        <br>
                        <small>Pots trobar-lo a les <a href="" class="text-decoration-line: underline">llibreries
                                amb
                                qui treballem</a></small>
                    </div>
                @endif
            </div>
        </div>

        <div class="mb-8" id="infoTab">
            <div class="mb-8">
                <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block hover:border-gray-950 active:border-gray-950 rounded-t-lg py-2 px-4 font-medium text-center border-transparent border-b active"
                            id="description-tab" data-tabs-target="#description" type="button" role="tab"
                            aria-controls="description" aria-selected="true">
                            <h5 class="">Descripció</h5>
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block hover:border-gray-950 active:border-gray-950 rounded-t-lg py-2 px-4 font-medium text-center border-transparent border-b"
                            id="technical-sheet-tab" data-tabs-target="#technical-sheet" type="button" role="tab"
                            aria-controls="technical-sheet" aria-selected="false">
                            <h5 class="">Fitxa tècnica</h5>
                        </button>
                    </li>
                </ul>
            </div>
            <div id="myTabContent" class="mb-20">
                <div class="description flex flex-col space-y-4" id="description" role="tabpanel"
                    aria-labelledby="profile-tab">
                    @foreach ($authors as $author)
                        <div class="collab flex space-x-6">
                            <div class="max-h-fit pic">
                                <a href="{{ route("collaborator-detail.{$locale}", $author['id']) }}">
                                    <img class="" src="{{ asset('img/collab/covers/' . $author['image']) }}"
                                        alt="Fotografia de {{ $author['first_name'] }} {{ $author['last_name'] }}">
                                </a>
                            </div>
                            <div class="info">
                                <div class="mb-6">
                                    <a href="{{ route("collaborator-detail.{$locale}", $author['id']) }}">
                                        <h3 class="font-bold mb-3">{{ $author['first_name'] }}
                                            {{ $author['last_name'] }}
                                        </h3>
                                    </a>
                                    <p class="text-justify">{{ $author['biography'] }}</p>
                                </div>
                                <div>
                                    @if (array_key_exists('books', $author) && count($author['books']) > 1)
                                        <h3 class="font-bold mb-3">Altres obres disponibles</h3>
                                        <div class="flex flex-col space-y-4">
                                            @foreach ($author['books'] as $other_author_book)
                                                @if ($other_author_book['title'] != $book['title'])
                                                    <p>> <a
                                                            href="{{ route("book-detail.{$locale}", $other_author_book['id']) }}">{{ $other_author_book['title'] }}</a>
                                                    </p>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <hr>
                    @foreach ($translators as $translator)
                        <div class="collab flex space-x-6 justify-between">
                            <div class="info">
                                <div class="mb-8">
                                    <a href="{{ route("collaborator-detail.{$locale}", $translator['id']) }}">
                                        <h3 class="font-bold mb-3">{{ $translator['first_name'] }}
                                            {{ $translator['last_name'] }}
                                        </h3>
                                    </a>
                                    <p class="text-justify">{{ $translator['biography'] }}</p>
                                </div>
                                <div>
                                    @if (array_key_exists('books', $translator) && count($translator['books']) > 1)
                                        <h3 class="font-bold mb-3">Altres obres disponibles</h3>
                                        <div class="flex space-x-2">
                                            @foreach ($translator['books'] as $other_author_book)
                                                @if ($other_author_book['title'] != $book['title'])
                                                    <p>> <a
                                                            href="{{ route("book-detail.{$locale}", $other_author_book['id']) }}">{{ $other_author_book['title'] }}</a>
                                                    </p>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="pic">
                                <a href="{{ route("collaborator-detail.{$locale}",$translator["id"]) }}">
                                <img class="" src="{{ asset('img/collab/covers/' . $translator['image']) }}"
                                    alt="Fotografia de {{ $translator['first_name'] }} {{ $translator['last_name'] }}">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="technical-sheet hidden flex flex-col space-y-0.5" id="technical-sheet" role="tabpanel"
                    aria-labelledby="technical-sheet-tab">
                    <div class="mb-2">
                        <div class="flex" id="title">
                            <h4 class="font-bold text-transform:uppercase">{{ $book['title'] }}</h4>
                        </div>
                        <div class="flex space-x-1.5" id="original">
                            <p><i>{{ $book['original_title'] }}</i> ({{ $book['original_publication_date'] }}),
                                {{ $book['original_publisher'] }}</p>
                        </div>
                    </div>
                    <div class="flex space-x-1.5" id="authors">
                        <strong>Autoria: </strong>
                        <div class="flex space-x-1.5">
                            @foreach ($book['authors'] as $author)
                                {{-- if not last iteration --}}
                                @if (!$loop->last)
                                    <p>{{ $author['name'] }},</p>
                                    {{-- if last iteration --}}
                                @else
                                    <p>{{ $author['name'] }}</p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="flex space-x-1.5" id="translators">
                        <strong>Traducció: </strong>
                        <div class="flex space-x-1.5">
                            @foreach ($book['translators'] as $translator)
                                {{-- if not last iteration --}}
                                @if (!$loop->last)
                                    <p>{{ $translator['name'] }},</p>
                                    {{-- if last iteration --}}
                                @else
                                    <p>{{ $translator['name'] }}</p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @if (array_key_exists('extras', $book))
                        <div>
                            @foreach ($book['extras'] as $extra)
                                <div class="flex space-x-1.5" id="publisher">
                                    <strong>{{ $extra['key'] }}: </strong>
                                    <p>{{ $extra['value'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div class="flex space-x-1.5" id="publisher">
                        <strong>Edita: </strong>
                        <p>{{ $book['publisher'] }}</p>
                    </div>
                    <div class="flex space-x-1.5" id="collections">
                        @if (count($book['collections']) > 1)
                            <strong>Col·leccions: </strong>
                        @else
                            <strong>Col·lecció: </strong>
                        @endif

                        <div class="flex space-x-1.5">
                            @foreach ($book['collections'] as $collection)
                                {{-- if not last iteration --}}
                                @if (!$loop->last)
                                    <p>{{ $collection['name'] }},</p>
                                    {{-- if last iteration --}}
                                @else
                                    <p>{{ $collection['name'] }}</p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="flex space-x-1.5" id="number_of_pages">
                        <strong>Pàgines: </strong>
                        <p>{{ $book['number_of_pages'] }}</p>
                    </div>
                    <div class="flex space-x-1.5" id="lang">
                        @if (count($book['lang']) > 1)
                            <strong>Idiomes: </strong>
                        @else
                            <strong>Idioma: </strong>
                        @endif

                        <div class="flex space-x-1.5">
                            @foreach ($book['lang'] as $lang)
                                @if (!$loop->last)
                                    <p>{{ $lang['name'] }},</p>
                                @else
                                    <p>{{ $lang['name'] }}</p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="flex space-x-1.5" id="publication_date">
                        <strong>Publicació: </strong>
                        <p>{{ $book['publication_date'] }}</p>
                    </div>
                    <div class="flex space-x-1.5" id="isbn">
                        <strong>ISBN: </strong>
                        <p>{{ $book['isbn'] }}</p>
                    </div>
                    <div class="flex space-x-1.5" id="isbn">
                        <strong>Dipòsit legal: </strong>
                        <p>{{ $book['legal_diposit'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if (count($related_books) > 0)
            <div id="related-books" class="flex flex-col items-center space-y-4">
                <h2>També et poden agradar</h2>

                <div class="flex">
                    @foreach ($related_books as $i => $relatedBook)
                        <div class="related-book flex flex-col items-center mb-6 w-64 px-6">
                            <div class="cover mb-4 flex justify-center">
                                <a href="{{ route("book-detail.{$locale}", $relatedBook['id']) }}">
                                    <img src="{{ asset('img/books/thumbnails/' . $relatedBook['image']) }}"
                                        alt="{{ $relatedBook['title'] }}" style="height: 13.75em"
                                        class="aspect-[2/3]">
                                </a>
                            </div>
                            <div id="book-info-{{ $relatedBook['slug'] }}"
                                class="flex flex-col items-center space-y-2 w-full">
                                <div class="book-title flex justify-center items-center text-center">
                                    {{ $relatedBook['title'] }}
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        </main>

    {{-- tab component script --}}
    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
    <script src={{ asset('js/components/popover.js') }}></script>
</x-layouts.app>
