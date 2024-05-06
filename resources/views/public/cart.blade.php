<?php
$locale = 'ca'; //TODOD CHANGE WHEN IT'S IMPLEMENTED MULTILANGUAGE WEB
?>
<x-layouts.app>

    {{-- <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot> --}}

    {{-- <link rel="stylesheet" href="{{ asset('css/public/bookstores.css') }}"> --}}
    <div class="container">
        <h2>Cistella</h2>
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


        @if (count($errors)>0)
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
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

        @if (count(Cart::content()) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Producte</th>
                        <th>Preu</th>
                        <th>Quantitat</th>
                        <th>Accions</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Cart::content() as $item)
                        <tr>
                            <td>
                                <div>
                                    <label for="name">{{ $item->name }}</label>
                                    <img style="width: 100px; height: auto;"
                                        src="{{ asset('img/books/thumbnails/' . $item->options->image) }}"
                                        alt="{{ $item->name . $item->options->image }}">
                                </div>
                            </td>
                            <td>{{ $item->priceTax() }}€</td>
                            <td>
                                <div class="flex justify-between items-center">
                                    <form action="{{ route('cart.less', $item->rowId) }}" method="POST" class="inline-block">
                                        @csrf
                                        {{-- <input type="hidden" name="book_id" value="{{ $relatedBook['id'] }}"> --}}
                                        <button type="submit" class="py-2.5 px-3 flex space-x-2 items-center">
                                            <span class=""><img src="{{ asset('img/icons/dark/less.webp') }}" width="20px" alt="Botó per sumar la quantitat d'un producte de la cistella" style="width: 15px"></span>
                                        </button>
                                    </form>
                                    <input type="text" readonly value="{{ $item->qty }}" class="inline-block px-3 py-2.5">
                                    <form action="{{ route('cart.add', $item->rowId) }}" method="POST" class="inline-block">
                                        @csrf
                                        {{-- <input type="hidden" name="book_id" value="{{ $relatedBook['id'] }}"> --}}
                                        <button type="submit" class="py-2.5 px-3 flex space-x-2 items-center">

                                            <span class=""><img src="{{ asset('img/icons/dark/add.webp') }}" width="20px" alt="Botó per sumar la quantitat d'un producte de la cistella" style="width: 15px"></span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('cart.remove', $item->rowId) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><img
                                            src="{{ asset('img/icons/dark/trash.webp') }}" width="20px"
                                            alt="Eliminar"></button>
                                </form>
                            </td>
                            <td>{{ $item->total()}}€</td>

                            {{-- <td>{{$item->options->id}}</td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-right">
                <h4>Total: {{ Cart::total() }}€</h4>
                <a href="{{ route("cart.view_checkout") }}" class="btn btn-primary">Procedir al pagament</a>
            </div>
        @else
            <p>La seva cistella es troba buida</p>
        @endif

        @if (count(Cart::instance('outOfStock')->content()) > 0)
            <div class="bg-lightgrey border border-darkgrey text-darkgrey px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">No hi ha disponibilitat d'alguns productes de la teva cistella.</span>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Producte</th>
                        <th>Preu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Cart::instance('outOfStock')->content() as $item)
                        <tr>
                            <td>
                                <div>
                                    <label for="name">{{ $item->name }}</label>
                                    <img style="width: 100px; height: auto;"
                                        src="{{ asset('img/books/thumbnails/' . $item->options->image) }}"
                                        alt="{{ $item->name . $item->options->image }}">
                                </div>
                            </td>
                            <td>{{ $item->priceTax() }}€</td>
                            <td><form action="{{ route('cart.remove', $item->rowId) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="instance" value="outOfStock">
                                <button type="submit" class="btn btn-danger btn-sm"><img
                                        src="{{ asset('img/icons/dark/trash.webp') }}" width="20px"
                                        alt="Eliminar"></button>
                            </form></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        @if (count($relatedBooks) > 0)
            <div id="related-books" class="flex flex-col items-center space-y-4">
                <h2>També et poden agradar</h2>

                <div class="flex">
                    @foreach ($relatedBooks as $i => $relatedBook)
                        <div class="related-book flex flex-col items-center mb-6 w-64 px-6">
                            <div class="cover mb-4 flex justify-center">
                                <a href="{{ route("book-detail.{$locale}", $relatedBook['id']) }}">
                                    <img src="{{ asset('img/books/thumbnails/' . $relatedBook['image']) }}"
                                        alt="{{ $relatedBook['title'] }}" style="height: 13.75em" class="aspect-[2/3]">
                                </a>
                            </div>
                            <div id="book-info-{{ $relatedBook['slug'] }}"
                                class="flex flex-col items-center space-y-2 w-full">
                                <div class="book-title flex justify-center items-center text-center">
                                    {{ $relatedBook['title'] }}
                                </div>
                            </div>
                            <div class="add-to-cart">

                                <form action="{{ route('cart.insert') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $relatedBook['id'] }}">

                                    <input hidden type="number" class=" border border-black" name="number_of_items"
                                        placeholder="1" value="1" min="1">
                                    <button type="submit" class="py-2.5 px-3 flex space-x-2 items-center">
                                        <span class="flex items-center leading-none text-white">Afegir a la
                                            cistella</span>
                                        <span class="bg-dark"><img src="{{ asset('img/icons/add-to-cart-white.webp') }}"
                                                alt="Botó per afegir a la cistella" style="width: 20px"></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-layouts.app>
