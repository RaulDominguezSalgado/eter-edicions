<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $webTitle }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/book.css') }}">

    <main class="px-1 space-y-4 mb-12">
        {{-- Book view for mobile --}}
        <div class="block md:hidden book max-w-80">
            <div class="book-detail mb-4">
                <div class="flex justify-between mb-4">
                    <div class="max-w-32 cover mr-4">
                        <img class="" src="{{ asset('img/books/covers/' . $book['image']) }}"
                            alt="{{ $book['title'] }}">
                    </div>

                    <div class="w-full space-y-2">
                        <h2 class="text-xl">{{ $book['title'] }}</h2>


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

                        <div class="flex space-x-5 items-baseline">
                            <div class="" id="pvp">
                                @if ($book['discounted_price'])
                                    <span>
                                        <h5 class="text-base line-through text-red-600">{{ $book['pvp'] }}€</h5>
                                    </span>
                                    <span>
                                        <h5 class="text-base ">{{ $book['discounted_price'] }}€</h5>
                                    </span>
                                @else
                                    <span>
                                        <h5 class="text-base ">{{ $book['pvp'] }}€</h5>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="add-to-cart space-y-3 pr-4 mb-8">
                    <div>
                        @if ($book['stock'])
                            <div>
                                <small class="text-systemsuccess">{{ __('general.available') }}</small>
                            </div>
                        @else
                            <div>
                                <small class="text-systemerror">{{ __('general.not-available') }}</small>
                                <br>
                                <small>{{ __('general.You can find it in') }} {{ __('orthographicRules.les') }} <a
                                        href="{{ route("bookstores.{$locale}") }}"
                                        class="text-decoration-line: underline">
                                        {{ strtolower(__('general.bookstores')) }}</a>
                                    {{ __('general.with whom we work') }}</small>
                            </div>
                        @endif
                    </div>

                    <form class="flex flex-row" action="{{ route('cart.insert') }}" method="POST">
                        @csrf
                        <input type="hidden" name="book_id" value="{{ $book['id'] }}">

                        <input type="number" class="w-20 mr-4 border border-black" name="number_of_items"
                            placeholder="1" value="1" min="1">
                        <button type="submit" class="w-full flex justify-center items-center py-2.5 px-3  space-x-2 ">
                            <span
                                class="flex items-center text-center leading-none text-white">{{ ucfirst(__('phrases.afegir a la cistella')) }}</span>
                            <span class=""><img src="{{ asset('img/icons/add-to-cart-white.webp') }}"
                                    alt="{{ ucfirst(__('phrases.botó per')) }} {{ __('phrases.afegir a la cistella') }}"
                                    style="width: 15px"></span>
                        </button>
                    </form>
                </div>

                <div id="book-description" class="pr-3 mb-4">
                    @if ($book['headline'])
                        <p class="mb-2"><strong>{{ $book['headline'] }}</strong></p>
                    @endif
                    <p class="">{{ $book['description'] }}</p>
                </div>

                <div class="space-y-4">
                    <a href="{{ route('book.sample', $book['sample']) }}" target="_blank"
                        class="sample flex space-x-2.5">
                        <img src="{{ asset('img/icons/download.webp') }}"
                            alt="{{ ucfirst(__('phrases.descarregar sample')) }} {{ $locale == 'ca' ? (\App\Services\Translation\OrthographicRules::startsWithDe('de') ? __('orthographicRules.with_d') : __('orthographicRules.with_de')) : __('orthographicRules.by') }} {{ $book['title'] }}"
                            class="clickable" style="width: 15px">
                        <small class="text-slate-600">{{ __('general.sample') }}</small>
                    </a>
                </div>

            </div>
        </div>

        {{-- Book view for tablet --}}
        <div class="hidden md:block lg:hidden book px-12">
            <div class="book-detail  mb-4">
                <div class="flex justify-between mb-4">
                    <div class="max-w-32 max-h-48 mr-6 cover">
                        <img class="" src="{{ asset('img/books/covers/' . $book['image']) }}"
                            alt="{{ $book['title'] }}">
                    </div>

                    <div class="w-full flex flex-col justify-between h-auto max-h-48">
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
                        </div>

                        <div class="flex space-x-5 items-baseline">
                            <div class=" id="pvp">
                                @if ($book['discounted_price'])
                                    <span>
                                        <h5 class="line-through text-red-600">{{ $book['pvp'] }}€</h5>
                                    </span>
                                    <span>
                                        <h5 class="">{{ $book['discounted_price'] }}€</h5>
                                    </span>
                                @else
                                    <span>
                                        <h5 class="">{{ $book['pvp'] }}€</h5>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div>
                            <div class="add-to-cart flex flex-row justify-start">
                                <form class="flex items-center" action="{{ route('cart.insert') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $book['id'] }}">

                                    <input type="number"
                                        class="w-[4.5em] border border-black ps-[0.375em] mr-[0.625em]"
                                        name="number_of_items" placeholder="1" value="1" min="1">
                                    <button type="submit" class="py-2.5 px-3 flex space-x-2 items-center">
                                        <span
                                            class="flex items-center leading-none text-white">{{ ucfirst(__('phrases.afegir a la cistella')) }}</span>
                                        <span class=""><img src="{{ asset('img/icons/add-to-cart-white.webp') }}"
                                                alt="{{ ucfirst(__('phrases.botó per')) }} {{ __('phrases.afegir a la cistella') }}"
                                                style="width: 15px"></span>
                                    </button>
                                </form>
                            </div>
                            <div>
                                @if ($book['stock'])
                                    <div>
                                        <small class="text-systemsuccess">{{ __('general.available') }}</small>
                                    </div>
                                @else
                                    <div>
                                        <small class="text-systemerror">{{ __('general.not-available') }}</small>
                                        <br>
                                        <small>{{ __('general.You can find it in') }}
                                            {{ __('orthographicRules.les') }} <a
                                                href="{{ route("bookstores.{$locale}") }}"
                                                class="text-decoration-line: underline">
                                                {{ strtolower(__('general.bookstores')) }}</a>
                                            {{ __('general.with whom we work') }}</small>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div id="book-description" class="mb-4">
                    @if ($book['headline'])
                        <p class=""><strong>{{ $book['headline'] }}</strong></p>
                    @endif
                    <p>{{ $book['description'] }}</p>
                </div>

                <div class="space-y-4">
                    <a href="{{ route('book.sample', $book['sample']) }}" target="_blank"
                        class="sample flex space-x-2.5">
                        <img src="{{ asset('img/icons/download.webp') }}"
                            alt="{{ ucfirst(__('phrases.descarregar sample')) }} {{ $locale == 'ca' ? (\App\Services\Translation\OrthographicRules::startsWithDe('de') ? __('orthographicRules.with_d') : __('orthographicRules.with_de')) : __('orthographicRules.by') }} {{ $book['title'] }}"
                            class="clickable" style="width: 15px">
                        <small class="text-slate-600">{{ __('general.sample') }}</small>
                    </a>
                </div>

                {{-- <div class="space-y-4">
                        <a href="{{ route('book.sample', $book['sample']) }}" target="_blank"
                            class="sample flex space-x-2.5">
                            <img src="{{ asset('img/icons/download.webp') }}"
                                alt="{{ ucfirst(__('phrases.descarregar sample')) }} {{ $locale == 'ca' ? (\App\Services\Translation\OrthographicRules::startsWithDe('de') ? __('orthographicRules.with_d') : __('orthographicRules.with_de')) : __('orthographicRules.by') }} {{ $book['title'] }}"
                                class="clickable" style="width: 15px">
                            <small class="text-slate-600">{{ __('general.sample') }}</small>
                        </a>
                    </div> --}}
            </div>
        </div>

        {{-- Book view for desktop --}}
        <div class="hidden lg:block lg:min-w-[54.5em] lg:max-w-[61em] book px-8">
            <div class="book-detail min-h-[calc(350px + 5em)] flex justify-between mb-4">
                <div class="mr-6 cover mb-4">
                    <img class="" src="{{ asset('img/books/covers/' . $book['image']) }}"
                        alt="{{ $book['title'] }}">
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
                            <div class="" id="pvp">
                                @if ($book['discounted_price'])
                                    <span>
                                        <h5 class="line-through text-red-600">{{ $book['pvp'] }}€</h5>
                                    </span>
                                    <span>
                                        <h5 class="">{{ $book['discounted_price'] }}€</h5>
                                    </span>
                                @else
                                    <span>
                                        <h5 class="">{{ $book['pvp'] }}€</h5>
                                    </span>
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
                                alt="{{ ucfirst(__('phrases.descarregar sample')) }} {{ $locale == 'ca' ? (\App\Services\Translation\OrthographicRules::startsWithDe('de') ? __('orthographicRules.with_d') : __('orthographicRules.with_de')) : __('orthographicRules.by') }} {{ $book['title'] }}"
                                class="clickable" style="width: 15px">
                            <small class="text-slate-600">{{ __('general.sample') }}</small>
                        </a>

                        <div class="add-to-cart flex flex-row justify-start">
                            <form action="{{ route('cart.insert') }}" method="POST">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book['id'] }}">

                                <input type="number"
                                    class="w-[4.5em] border border-black ps-[0.375em] mr-[0.625em] mb-2"
                                    name="number_of_items" placeholder="1" value="1" min="1">
                                <button type="submit" class="py-2.5 px-3 flex space-x-2 items-center">
                                    <span
                                        class="flex items-center leading-none text-white">{{ ucfirst(__('phrases.afegir a la cistella')) }}</span>
                                    <span class=""><img src="{{ asset('img/icons/add-to-cart-white.webp') }}"
                                            alt="{{ ucfirst(__('phrases.botó per')) }} {{ __('phrases.afegir a la cistella') }}"
                                            style="width: 15px"></span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                @if ($book['stock'])
                    <div>
                        <small class="text-systemsuccess">{{ __('general.available') }}</small>
                    </div>
                @else
                    <div>
                        <small class="text-systemerror">{{ __('general.not-available') }}</small>
                        <br>
                        <small>{{ __('general.You can find it in') }} {{ __('orthographicRules.les') }} <a
                                href="{{ route("bookstores.{$locale}") }}" class="text-decoration-line: underline">
                                {{ strtolower(__('general.bookstores')) }}</a>
                            {{ __('general.with whom we work') }}</small>
                    </div>
                @endif
            </div>
        </div>

        <div class=" md:px-8" id="infoTab">
            <div class="mb-8">
                <ul class="flex flex-wrap -mb-px" id="myTab" role="tablist">
                    <li class="mr-2">
                        <button
                            class="inline-block border-gray-950 hover:border-gray-950 focus:border-gray-950 active:border-gray-950 rounded-t-lg py-2 px-4 font-medium text-center border-b active"
                            id="description-tab" type="button" role="tab" aria-controls="description"
                            aria-selected="true">
                            <h5 class="">{{ __('general.description') }}</h5>
                        </button>
                    </li>
                    <li class="mr-2">
                        <button
                            class="inline-block hover:border-gray-950 focus:border-gray-950 active:border-gray-950 rounded-t-lg py-2 px-4 font-medium text-center border-transparent border-b"
                            id="technical-sheet-tab" type="button" role="tab" aria-controls="technical-sheet"
                            aria-selected="false">
                            <h5 class="">{{ __('general.technical-sheet') }}</h5>
                        </button>
                    </li>
                </ul>
            </div>
            <div id="myTabContent" class="mb-28">
                <div id="description" aria-labelledby="description-tab">
                    {{-- Mobile description content --}}
                    <div class="description flex lg:hidden flex-col space-y-4 px-4" id="description-mobile"
                        role="tabpanel" aria-labelledby="profile-tab">
                        @foreach ($authors as $author)
                            <div class="collab">
                                <div class="mb-4">
                                    <a href="{{ route("collaborator-detail.{$locale}", $author['slug']) }}">
                                        <h3 class="font-bold mb-3">{{ $author['first_name'] }}
                                            {{ $author['last_name'] }}
                                        </h3>
                                    </a>
                                    <div class="w-full pic mb-3">
                                        <a class="md:float-start md:mr-6 mb-2.5"
                                            href="{{ route("collaborator-detail.{$locale}", $author['slug']) }}">
                                            <img class="md:min-w-[13.5em] md:max-w-[18em] md:min-h-[11.8em] md:max-h-[12.85em]"
                                                src="{{ asset('img/collab/covers/' . $author['image']) }}"
                                                alt="Fotografia de {{ $author['first_name'] }} {{ $author['last_name'] }}">
                                        </a>
                                    </div>
                                    <p class="text-justify">{{ $author['biography'] }}</p>
                                </div>
                                <div>
                                    @if (array_key_exists('books', $author) && count($author['books']) > 1)
                                        <h3 class="font-bold mb-3">{{ __('general.other-books-available') }}</h3>
                                        <div class="flex flex-col space-y-4">
                                            @foreach ($author['books'] as $other_author_book)
                                                @if ($other_author_book['title'] != $book['title'])
                                                    <p>> <a
                                                            href="{{ route("book-detail.{$locale}", $other_author_book['slug']) }}">{{ $other_author_book['title'] }}</a>
                                                    </p>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        <hr>
                        @foreach ($translators as $translator)
                            <div class="collab justify-between">
                                <div class="mb-4">
                                    <a href="{{ route("collaborator-detail.{$locale}", $translator['slug']) }}">
                                        <h3 class="font-bold mb-3">{{ $translator['first_name'] }}
                                            {{ $translator['last_name'] }}
                                        </h3>
                                    </a>
                                    <div class="pic mb-3">
                                        <a class="md:float-end md:ml-6 md:mb-3"
                                            href="{{ route("collaborator-detail.{$locale}", $translator['slug']) }}">
                                            <img class="md:min-w-[13.5em] md:max-w-[18em] md:min-h-[11.8em] md:max-h-[12.85em]"
                                                src="{{ asset('img/collab/covers/' . $translator['image']) }}"
                                                alt="Fotografia de {{ $translator['first_name'] }} {{ $translator['last_name'] }}">
                                        </a>
                                    </div>
                                    <p class="text-justify">{{ $translator['biography'] }}</p>
                                </div>
                                <div>
                                    @if (array_key_exists('books', $translator) && count($translator['books']) > 1)
                                        <h3 class="font-bold mb-3">{{ __('general.other-books-available') }}</h3>
                                        <div class="flex space-x-2">
                                            @foreach ($translator['books'] as $other_author_book)
                                                @if ($other_author_book['title'] != $book['title'])
                                                    <p>> <a
                                                            href="{{ route("book-detail.{$locale}", $other_author_book['slug']) }}">{{ $other_author_book['title'] }}</a>
                                                    </p>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </div>


                            </div>
                        @endforeach
                    </div>

                    {{-- Desktop description content --}}
                    <div class="description hidden lg:flex flex-col space-y-4" id="description-desktop"
                        role="tabpanel" aria-labelledby="profile-tab">
                        @foreach ($authors as $author)
                            <div class="collab">
                                <a href="{{ route("collaborator-detail.{$locale}", $author['slug']) }}">
                                    <h3 class="font-bold mb-3">{{ $author['first_name'] }}
                                        {{ $author['last_name'] }}
                                    </h3>
                                </a>
                                <a href="{{ route("collaborator-detail.{$locale}", $author['slug']) }}">
                                    <img class="float-start mr-6 mb-3 min-w-[13.5em] max-w-[18em] min-h-[11.8em] max-h-[12.85em]"
                                        src="{{ asset('img/collab/covers/' . $author['image']) }}"
                                        alt="Fotografia de {{ $author['first_name'] }} {{ $author['last_name'] }}">
                                </a>
                                <p class="text-justify">{{ $author['biography'] }}</p>
                                <div>
                                    @if (array_key_exists('books', $author) && count($author['books']) > 1)
                                        <h3 class="font-bold mb-3">{{ __('general.other-books-available') }}</h3>
                                        <div class="flex flex-col space-y-4">
                                            @foreach ($author['books'] as $other_author_book)
                                                @if ($other_author_book['title'] != $book['title'])
                                                    <p>> <a
                                                            href="{{ route("book-detail.{$locale}", $other_author_book['slug']) }}">{{ $other_author_book['title'] }}</a>
                                                    </p>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        <hr>
                        @foreach ($translators as $translator)
                            <div class="collab justify-between">
                                <a href="{{ route("collaborator-detail.{$locale}", $translator['slug']) }}">
                                    <h3 class="font-bold mb-3">{{ $translator['first_name'] }}
                                        {{ $translator['last_name'] }}
                                    </h3>
                                </a>
                                <a href="{{ route("collaborator-detail.{$locale}", $translator['slug']) }}">
                                    <img class="float-end ml-6 mb-2.5 min-w-[13.5em] max-w-[18em] min-h-[11.8em] max-h-[12.85em]"
                                        src="{{ asset('img/collab/covers/' . $translator['image']) }}"
                                        alt="Fotografia de {{ $translator['first_name'] }} {{ $translator['last_name'] }}">
                                </a>
                                <div class="mb-8">
                                    <p class="text-justify">{{ $translator['biography'] }}</p>
                                </div>
                                <div>
                                    @if (array_key_exists('books', $translator) && count($translator['books']) > 1)
                                        <h3 class="font-bold mb-3">{{ __('general.other-books-available') }}</h3>
                                        <div class="flex space-x-2">
                                            @foreach ($translator['books'] as $other_author_book)
                                                @if ($other_author_book['title'] != $book['title'])
                                                    <p>> <a
                                                            href="{{ route("book-detail.{$locale}", $other_author_book['slug']) }}">{{ $other_author_book['title'] }}</a>
                                                    </p>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="hidden technical-sheet flex-col space-y-0.5 mb-28" id="technical-sheet" role="tabpanel"
                    aria-labelledby="technical-sheet-tab">
                    <div class="mb-2">
                        <div class="flex" id="title">
                            <h4 class="font-bold">{{ $book['title'] }}</h4>
                        </div>
                        <div class="" id="original">
                            <span><i>{{ $book['original_title'] }}</i> ({{ $book['original_publication_date'] }}),
                                {{ $book['original_publisher'] }}</span>
                        </div>
                    </div>
                    <div class="" id="authors">
                        <span><strong>{{ __('general.authorship') }}: </strong></span>
                        <span class="">
                            @foreach ($book['authors'] as $author)
                                {{-- if not last iteration --}}
                                @if (!$loop->last)
                                    <span>{{ $author['name'] }},</span>
                                    {{-- if last iteration --}}
                                @else
                                    <span>{{ $author['name'] }}</span>
                                @endif
                            @endforeach
                        </span>
                    </div>
                    <div class="" id="translators">
                        <span><strong>{{ __('general.translation') }}: </strong></span>
                        <span class="">
                            @foreach ($book['translators'] as $translator)
                                {{-- if not last iteration --}}
                                @if (!$loop->last)
                                    <span>{{ $translator['name'] }},</span>
                                    {{-- if last iteration --}}
                                @else
                                    <span>{{ $translator['name'] }}</span>
                                @endif
                            @endforeach
                        </span>
                    </div>
                    @if (array_key_exists('extras', $book))
                        <div>
                            @foreach ($book['extras'] as $extra)
                                <div class="" id="publisher">
                                    <span><strong>{{ $extra['key'] }}: </strong></span>
                                    <span>{{ $extra['value'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div class="" id="publisher">
                        <span><strong>{{ __('general.published-by') }}: </strong></span>
                        <span>{{ $book['publisher'] }}</span>
                    </div>
                    <div class="" id="collections">
                        <span><strong>{{ trans_choice('general.collections', count($book['collections'])) }}:
                            </strong></span>

                        <span class="">
                            @foreach ($book['collections'] as $collection)
                                {{-- if not last iteration --}}
                                @if (!$loop->last)
                                    <span>{{ $collection['name'] }},</span>
                                    {{-- if last iteration --}}
                                @else
                                    <span>{{ $collection['name'] }}</span>
                                @endif
                            @endforeach
                        </span>
                    </div>
                    <div class="" id="lang">
                        <span><strong>{{ trans_choice('general.languages', count($book['lang'])) }}:</strong></span>
                        <span class="">
                            @foreach ($book['lang'] as $lang)
                                @if (!$loop->last)
                                    <span>{{ $lang['name'] }},</span>
                                @else
                                    <span>{{ $lang['name'] }}</span>
                                @endif
                            @endforeach
                        </span>
                    </div>
                    <div class="" id="number_of_pages">
                        <span><strong>{{ __('general.number_of_pages') }}: </strong></span>
                        <span>{{ $book['number_of_pages'] }}</span>
                    </div>
                    <div class="" id="size">
                        <span><strong>{{ __('general.size') }}: </strong></span>
                        <span>{{ $book['size'] }}</span>
                    </div>
                    <div class="" id="publication_date">
                        <span><strong>{{ __('general.publication_date') }}: </strong></span>
                        <span>{{ substr($book['publication_date'], -4, 4) }}</span>
                    </div>
                    <div class="" id="isbn">
                        <span><strong>{{ __('general.isbn') }}: </strong></span>
                        <span>{{ $book['isbn'] }}</span>
                    </div>
                    <div class="" id="legal_diposit">
                        <span><strong>{{ __('general.legal_diposit') }}: </strong></span>
                        <span>{{ $book['legal_diposit'] }}</span>
                    </div>
                </div>
            </div>
        </div>

        @if (count($related_books) > 0)
            <div id="related-books" class="flex flex-col items-center space-y-4 px-8">
                <h2 class="text-center">{{ __('general.you-may-also-like') }}</h2>

                <div class="flex flex-wrap justify-center">
                    @foreach ($related_books as $i => $relatedBook)
                        <div class="related-book flex flex-col items-center mb-6 w-36 md:w-48 lg:w-64 mx-3 lg:px-6">
                            <div class="cover mb-4 flex justify-center relative">
                                <a href="{{ route("book-detail.{$locale}", $relatedBook['slug']) }}">
                                    <img src="{{ asset('img/books/thumbnails/' . $relatedBook['image']) }}"
                                        alt="{{ $relatedBook['title'] }}" style="height: 13.75em"
                                        class="aspect-[2/3]">
                                </a>
                                <a href="{{ route("book-detail.{$locale}", $relatedBook['slug']) }}"
                                    class="flex items-end w-[9.16em] h-[13.75em] opacity-0 hover:opacity-100 duration-150 ease-in-out absolute bottom-0">
                                    <div class="w-full hidden lg:flex justify-between items-center p-2 bg-light/[.75]">
                                        <p class="font-bold text-xl">{{ $relatedBook['pvp'] }}€</p>
                                        <form action="{{ route('cart.insert') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="book_id" value="{{ $relatedBook['id'] }}">

                                            <input hidden type="number" class=" border border-black"
                                                name="number_of_items" placeholder="1" value="1"
                                                min="1">
                                            <button>
                                                <i class="icon text-3xl add-to-cart"></i>
                                            </button>
                                        </form>
                                    </div>
                                </a>
                            </div>
                            <a id="book-info-{{ $relatedBook['slug'] }}"
                                class="flex flex-col items-center space-y-2 w-full"
                                href="{{ route("book-detail.{$locale}", $relatedBook['slug']) }}">
                                <div class="book-title flex justify-center items-center text-center">
                                    {{ $relatedBook['title'] }}
                                </div>
                            </a>

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
