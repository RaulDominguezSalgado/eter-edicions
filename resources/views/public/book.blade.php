<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $webTitle }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/book.css') }}">

    <main class="body space-y-4 mb-12">
        <div class="book">
            {{-- @if ($message = Session::get('success'))
                <div class="alert alert-success m-4">
                    <p>{{ $message }}</p>
                </div>
            @endif --}}
            <div class="book-detail flex justify-between mb-4">
                <div class="mr-6 cover">
                    {{-- <div id="book-image" class="book-image"></div> --}}
                    {{-- <div class="object-fill cover border-guide-2"> --}}
                    <img class="" src="{{ asset('img/books/covers/' . $book['image']) }}"
                        alt="{{ $book['title'] }}">
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

                    <div class="space-y-4">
                        <a href="{{ route('book.sample', $book['sample']) }}" target="_blank"
                            class="sample flex space-x-2.5">
                            <img src="{{ asset('img/icons/download.webp') }}"
                                alt="{{ucfirst(__('phrases.descarregar sample'))}} {{  $locale == 'ca' ? (\App\Services\Translation\OrthographicRules::startsWithDe("de") ? __('orthographicRules.with_d') : __('orthographicRules.with_de')) : __('orthographicRules.by') }} {{ $book['title'] }}" class="clickable" style="width: 15px">
                            <small class="text-slate-600">{{__('general.sample')}}</small>
                        </a>
                        {{-- <div class="add-to-cart">
                            <form action="{{ route('cart.insert') }}" method="POST">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book['id'] }}">

                            <input type="number" class="border border-black mb-2" name="number_of_items" placeholder="1"
                                value="1" min="1">
                            <button type="submit" class="py-2.5 px-3 flex space-x-2 items-center">
                                <span class="flex items-center leading-none text-white">{{ucfirst(__('phrases.afegir a la cistella'))}}</span>
                                <span class=""><img src="{{ asset('img/icons/add-to-cart-white.webp') }}"
                                        alt="{{ucfirst(__('phrases.botó per'))}} {{__('phrases.afegir a la cistella')}}" style="width: 15px"></span>
                            </button>
                              </form>
                        </div> --}}
                        <div class="add-to-cart">
                            <div>

                            <input type="number" class="border border-black mb-2" name="number_of_items" placeholder="1"
                                value="1" min="1">
                            <button class="ajax-add-to-cart py-2.5 px-3 flex space-x-2 items-center" book-id="{{ $book['id'] }}">
                                <span class="flex items-center leading-none text-white">{{ucfirst(__('phrases.afegir a la cistella'))}}</span>
                                <span class=""><img src="{{ asset('img/icons/add-to-cart-white.webp') }}"
                                        alt="{{ucfirst(__('phrases.botó per'))}} {{__('phrases.afegir a la cistella')}}" style="width: 15px"></span>
                            </button>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                @if ($book['stock'])
                    <div>
                        <small class="text-green-700">{{__('general.available')}}</small>
                    </div>
                @else
                    <div>
                        <small class="text-red-700">{{__('general.not-available')}}</small>
                        <br>
                        <small>{{__('general.You can find it in')}} {{__('orthographicRules.les')}} <a href="{{ route("bookstores.{$locale}") }}" class="text-decoration-line: underline">
                            {{ strtolower(__('general.bookstores')) }}</a>
                                {{__('general.with whom we work')}}</small>
                    </div>
                @endif
            </div>
        </div>

        <div class="mb-8" id="infoTab">
            <div class="mb-8">
                <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2">
                        <button
                            class="inline-block border-gray-950 hover:border-gray-950 focus:border-gray-950 active:border-gray-950 rounded-t-lg py-2 px-4 font-medium text-center border-transparent border-b active"
                            id="description-tab" data-tabs-target="#description" type="button" role="tab"
                            aria-controls="description" aria-selected="true">
                            <h5 class="">{{__('general.description')}}</h5>
                        </button>
                    </li>
                    <li class="mr-2">
                        <button
                            class="inline-block hover:border-gray-950 focus:border-gray-950 active:border-gray-950 rounded-t-lg py-2 px-4 font-medium text-center border-transparent border-b"
                            id="technical-sheet-tab" data-tabs-target="#technical-sheet" type="button" role="tab"
                            aria-controls="technical-sheet" aria-selected="false">
                            <h5 class="">{{__('general.technical-sheet')}}</h5>
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
                                        <h3 class="font-bold mb-3">{{__('general.other-books-available')}}</h3>
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
                                    <h3 class="font-bold mb-3">{{__('general.other-books-available')}}</h3>
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
                                <a href="{{ route("collaborator-detail.{$locale}", $translator['id']) }}">
                                    <img class=""
                                        src="{{ asset('img/collab/covers/' . $translator['image']) }}"
                                        alt="Fotografia de {{ $translator['first_name'] }} {{ $translator['last_name'] }}">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="hidden technical-sheet flex-col space-y-0.5" id="technical-sheet" role="tabpanel"
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
                        <strong>{{__('general.authorship')}}: </strong>
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
                        <strong>{{__('general.translation')}}: </strong>
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
                        <strong>{{__('general.published-by')}}: </strong>
                        <p>{{ $book['publisher'] }}</p>
                    </div>
                    <div class="flex space-x-1.5" id="collections">
                            <strong>{{trans_choice('general.collections', count($book['collections']))}}: </strong>

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
                    <div class="flex space-x-1.5" id="lang">
                        <strong>{{trans_choice('general.languages', count($book['lang']))}}:</strong>
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
                    <div class="flex space-x-1.5" id="number_of_pages">
                        <strong>{{__('general.number_of_pages')}}: </strong>
                        <p>{{ $book['number_of_pages'] }}</p>
                    </div>
                    <div class="flex space-x-1.5" id="size">
                        <strong>{{__('general.size')}}: </strong>
                        <p>{{ $book['size'] }}</p>
                    </div>
                    <div class="flex space-x-1.5" id="publication_date">
                        <strong>{{__('general.publication_date')}}: </strong>
                        <p>{{ substr($book['publication_date'], -4, 4) }}</p>
                    </div>
                    <div class="flex space-x-1.5" id="isbn">
                        <strong>{{__('general.isbn')}}: </strong>
                        <p>{{ $book['isbn'] }}</p>
                    </div>
                    <div class="flex space-x-1.5" id="isbn">
                        <strong>{{__('general.legal_diposit')}}: </strong>
                        <p>{{ $book['legal_diposit'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if (count($related_books) > 0)
            <div id="related-books" class="flex flex-col items-center space-y-4">
                <h2>{{__('general.you-may-also-like')}}</h2>

                <div class="flex">
                    @foreach ($related_books as $i => $relatedBook)
                        <div class="related-book flex flex-col items-center mb-6 w-64 px-6">
                            <div class="cover mb-4 flex justify-center relative">
                                <a href="{{ route("book-detail.{$locale}", $relatedBook['id']) }}">
                                    <img src="{{ asset('img/books/thumbnails/' . $relatedBook['image']) }}"
                                        alt="{{ $relatedBook['title'] }}" style="height: 13.75em"
                                        class="aspect-[2/3]">
                                </a>
                                <a href="{{ route("book-detail.{$locale}", $relatedBook['id']) }}" class="flex items-end w-[9.16em] h-[13.75em] opacity-0 hover:opacity-100 duration-150 ease-in-out absolute bottom-0">
                                    <div class="w-full flex justify-between items-center p-2 bg-light/[.75]">
                                        <p class="font-bold text-xl">{{$relatedBook['pvp']}}€</p>
                                        <form action="{{ route('cart.insert') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="book_id" value="{{ $relatedBook['id'] }}">

                                            <input hidden type="number" class=" border border-black" name="number_of_items"
                                                placeholder="1" value="1" min="1">
                                                <button>
                                                    <i class="icon text-3xl add-to-cart"></i>
                                                </button>
                                        </form>
                                    </div>
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
    <script src="{{ asset('js/book/book.js') }}"></script>
    <script src={{ asset('js/components/popover.js') }}></script>
</x-layouts.app>
