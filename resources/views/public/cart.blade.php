<x-layouts.app>

    {{-- <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot> --}}

    {{-- <link rel="stylesheet" href="{{ asset('css/public/bookstores.css') }}"> --}}
    <div class="max-w-[1080px] px-4 mx-auto space-y-4">
        <div class="flex justify-between items-baseline ">
            <h2>{{ __('shopping-cart.shopping-bag') }}</h2>
            <a href="{{ route("catalog.{$locale}") }}" class="underline">{{ __('shopping-cart.keep-shopping') }}</a>
        </div>
        @if (session('success'))
            {{-- <div class="alert alert-danger">{{ session('error') }}</div> --}}
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ session('success') }}</strong>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" onclick="removeParentDiv(this.parentNode)">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error: </strong>
                <span class="block sm:inline">{{ session('error') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-systemerror" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" onclick="removeParentDiv(this.parentNode)">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        @endif


        @if (count($errors) > 0)
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative"
                role="alert">
                <strong class="font-bold"></strong>
                <ul>
                    @foreach ($errors as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-systemerror" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" onclick="removeParentDiv(this.parentNode)">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        @endif

        <div class="space-y-8 cart-content">
            <div id="cart-content">
                <x-partials.cart :locale=$locale/>
            </div>
            @if (count($relatedBooks) > 0)
                <div id="related-books" class="flex flex-col items-center space-y-4">
                    <h2>{{ __('general.you-may-also-like') }}</h2>

                    <div class="flex">
                        @foreach ($relatedBooks as $i => $relatedBook)
                            <div class="related-book flex flex-col items-center mb-6 w-64 px-6">
                                <div class="cover mb-4 flex justify-center relative">
                                    <a href="{{ route("book-detail.{$locale}", $relatedBook['id']) }}">
                                        <img src="{{ asset('img/books/thumbnails/' . $relatedBook['image']) }}"
                                            alt="{{ $relatedBook['title'] }}" style="height: 13.75em"
                                            class="aspect-[2/3]">
                                    </a>
                                    <div class="flex items-end w-[9.16em] opacity-0 hover:opacity-100 duration-150 ease-in-out absolute bottom-0">
                                        <div class="w-full flex justify-between items-center p-2 bg-light/[.75]">
                                            <p class="font-bold text-xl">{{ $relatedBook['pvp'] }}€</p>
                                            <div>
                                                @csrf
                                                <input type="hidden" name="book_id"
                                                    value="{{ $relatedBook['id'] }}">

                                                <input hidden type="number" class=" border border-black"
                                                    name="number_of_items" placeholder="1" value="1"
                                                    min="1">
                                                <button class="ajax-add-to-cart" book-id="{{ $relatedBook['id'] }}">
                                                    <i class="icon text-3xl add-to-cart"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
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
        </div>
    </div>

</x-layouts.app>

<script src="/js/form/messages.js"></script>
