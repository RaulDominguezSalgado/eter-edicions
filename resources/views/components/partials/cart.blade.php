@if (count(Cart::instance('default')->content()) > 0)
    <div class="space-y-4">
        <table class="table w-full">
            <thead class="border-b border-lightgrey mb-3">
                <tr class="hidden md:table-row">
                    <th class="pt-2 pb-1 px-0 text-start text-xs font-normal uppercase  w-3/4">
                        {{ __('shopping-cart.product') }}</th>
                    <th class="table-cell md:hidden pt-2 px-0 text-end text-xs font-normal uppercase">
                        {{ __('shopping-cart.total') }}</th>
                    <th class="hidden md:table-cell pt-2 px-2 text-xs text-start font-normal uppercase ">
                        {{ __('shopping-cart.quantity') }}</th>
                    <th class="hidden md:table-cell pt-2 px-0 text-end text-xs font-normal uppercase ">
                        {{ __('shopping-cart.total') }}</th>
                </tr>
            </thead>
            <tbody class="border-b border-lightgrey mb-3">
                @foreach (Cart::instance('default')->content() as $item)
                    {{-- @dump($item) --}}
                    <tr class="" item-id="{{ $item->rowId }}">
                        <td class="py-2 pr-3 flex items-center space-x-3 ">
                            <a href="{{ route("book-detail.{$locale}", $item->options->id) }}">
                                <img class=" border border-lightgrey" style="height: 6em; width: 4.5em"
                                    src="{{ asset('img/books/thumbnails/' . $item->options->image) }}"
                                    alt="{{ $item->name }}">
                            </a>
                            <div class="py-2 flex flex-col justify-between">
                                <div class="">
                                    <a href="{{ route("book-detail.{$locale}", $item->options->id) }}">
                                        <h6 class="text-baseline md:text-lg font-bold w-max">
                                            {{ $item->name }}</h6>
                                    </a>
                                    <small class="hidden md:block">{{ $item->options->publisher }}</small>
                                    <small class="hidden md:block">{{ $item->options->isbn }}</small>
                                    <small class="md:font-semibold p12 item-price">{{ $item->priceTax() }}€</small>
                                </div>
                                <div class="flex md:hidden justify-between items-center space-x-2 ">
                                    <form action="{{ route('cart.remove', $item->rowId) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="flex justify-center items-center border border-lightgrey rounded p-1 w-8 h-8"><img
                                                src="{{ asset('img/icons/dark/trash.webp') }}"
                                                width="20px" alt="Eliminar"></button>
                                    </form>
                                    <div class="flex items-center space-x-4">
                                        <div class="flex items-center">
                                            <form action="{{ route('cart.less', $item->rowId) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                {{-- <input type="hidden" name="book_id" value="{{ $relatedBook['id'] }}"> --}}
                                                <button type="submit"
                                                    class="flex justify-center items-center border border-r-0 border-lightgrey rounded-l p-1 w-8 h-8">
                                                    <span class=""><img
                                                            src="{{ asset('img/icons/dark/less.webp') }}"
                                                            width="20px"
                                                            alt="Botó per sumar la quantitat d'un producte de la cistella"
                                                            style="width: 15px"></span>
                                                </button>
                                            </form>
                                            <input type="text" value="{{ $item->qty }}" readonly
                                                onblur=""
                                                class="inline-block text-center border border-lightgrey w-12 h-8">{{-- implement onblur submit form with new item value --}}
                                            <form action="{{ route('cart.add', $item->rowId) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                {{-- <input type="hidden" name="book_id" value="{{ $relatedBook['id'] }}"> --}}
                                                <button type="submit"
                                                    class="flex justify-center items-center border border-l-0 border-lightgrey rounded-r p-1 w-8 h-8">
                                                    <span class=""><img
                                                            src="{{ asset('img/icons/dark/add.webp') }}"
                                                            width="20px"
                                                            alt="Botó per sumar la quantitat d'un producte de la cistella"
                                                            style="width: 15px"></span>
                                                </button>
                                            </form>
                                        </div>
                                        <small class="font-semibold p12">{{ $item->total() }}€</small>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="hidden md:table-cell p-2 ">
                            <div class="flex justify-between items-center space-x-2">
                                <div>
                                    <button book-id="{{ $item->rowId }}" book-price="{{ $item->priceTax() }}" type="submit"
                                        class="ajax-remove-from-cart flex justify-center items-center border border-lightgrey rounded p-1 w-8 h-8"><img
                                            src="{{ asset('img/icons/dark/trash.webp') }}" width="20px"
                                            alt="Eliminar"></button>
                                </div>
                                <div class="flex items-center">
                                    <div class="inline-block">
                                        <button book-id="{{ $item->rowId }}" type="submit"
                                            class="ajax-less-item flex justify-center items-center border border-r-0 border-lightgrey rounded-l p-1 w-8 h-8">
                                            <span class=""><img
                                                    src="{{ asset('img/icons/dark/less.webp') }}"
                                                    width="20px"
                                                    alt="Botó per sumar la quantitat d'un producte de la cistella"
                                                    style="width: 15px"></span>
                                        </button>
                                    </div>

                                    <input type="text" value="{{ $item->qty }}" name="quantity"
                                        readonly onblur="" min="1"
                                        class="inline-block text-center border border-lightgrey w-14 h-8 appearance-none">
                                    <div class="inline-block">
                                        <button book-id="{{ $item->rowId }}" book-price="{{ $item->price }}" type="submit"
                                            class="ajax-more-item flex justify-center items-center border border-l-0 border-lightgrey rounded-r p-1 w-8 h-8">
                                            <span class=""><img
                                                    src="{{ asset('img/icons/dark/add.webp') }}"
                                                    width="20px"
                                                    alt="Botó per sumar la quantitat d'un producte de la cistella"
                                                    style="width: 15px"></span>
                                        </button>
                                    </div>
                                </div>
                                {{-- <div class="flex items-center">
                                    <form action="{{ route('cart.less', $item->rowId) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        <button type="submit"
                                            class="flex justify-center items-center border border-r-0 border-lightgrey rounded-l p-1 w-8 h-8">
                                            <span class=""><img
                                                    src="{{ asset('img/icons/dark/less.webp') }}"
                                                    width="20px"
                                                    alt="Botó per sumar la quantitat d'un producte de la cistella"
                                                    style="width: 15px"></span>
                                        </button>
                                    </form>

                                    <input type="text" value="{{ $item->qty }}" name="quantity"
                                        readonly onblur="" min="1"
                                        class="inline-block text-center border border-lightgrey w-14 h-8 appearance-none">
                                    <form action="{{ route('cart.add', $item->rowId) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        <button type="submit"
                                            class="flex justify-center items-center border border-l-0 border-lightgrey rounded-r p-1 w-8 h-8">
                                            <span class=""><img
                                                    src="{{ asset('img/icons/dark/add.webp') }}"
                                                    width="20px"
                                                    alt="Botó per sumar la quantitat d'un producte de la cistella"
                                                    style="width: 15px"></span>
                                        </button>
                                    </form>
                                </div> --}}
                            </div>
                        </td>
                        <td class="pl-3 py-2 hidden md:table-cell text-end item-total">{{ $item->total() }}€</td>

                        {{-- <td>{{$item->options->id}}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex flex-col items-center md:items-end space-y-4">
            <div>
                <h5>{{ __('shopping-cart.total') }}: {{ Cart::instance('default')->total() }}€</h5>
            </div>
            <div>
                <a href="{{ route("checkout.{$locale}") }}">
                    <button class="send-button">
                        {{ __('shopping-cart.checkout') }}
                    </button>
                </a>
            </div>
            {{-- <div>
                <form action="{{route('paypal')}}" method="POST">
                    @csrf
                    <input type="text" name="total" value="{{Cart::instance('default')->total()}}" id="total" hidden>
                    <button class="send-button">
                        {{ __('shopping-cart.paypal') }}
                    </button>
                </form>
            </div> --}}
        </div>
    </div>
@else
    <div>{{ __('shopping-cart.empty-cart') }}.</div>
@endif

@if (count(Cart::instance('outOfStock')->content()) > 0)
    <div class="space-y-4">
        <div class="bg-lightgrey border border-darkgrey text-darkgrey px-4 py-3 rounded relative"
            role="alert">
            <span class="block sm:inline">{{ __('shopping-cart.no-stock-following-products') }}.</span>
        </div>
        <table class="cart-content table w-full">
            <thead class="border-b border-lightgrey mb-3">
                <tr>
                    <th class="pt-1 px-0 text-start text-xs font-normal uppercase w-3/4">
                        {{ __('shopping-cart.product') }}</th>
                    {{-- <th class="text-start text-xs font-normal uppercase">{{__('shopping-cart.price')}}</th> --}}
                </tr>
            </thead>
            <tbody class="border-b border-lightgrey mb-3">
                @foreach (Cart::instance('outOfStock')->content() as $item)
                    <tr>
                        <td class="py-2 pr-3 w-3/4">
                            <div class="flex space-x-6">
                                {{-- <label for="name">{{ $item->name }}</label> --}}
                                <img class=" border border-lightgrey" style="height: 6em; width: 4.5em"
                                    src="{{ asset('img/books/thumbnails/' . $item->options->image) }}"
                                    alt="{{ $item->name }}">
                                <div>
                                    <h5>{{ $item->name }}</h5>
                                    {{-- @dump($item->options) --}}
                                    <small>{{ $item->options->publisher }}</small><br>
                                    <small class="">{{ $item->options->isbn }}</small><br>
                                    <small class="font-semibold p12">{{ $item->priceTax() }}€</small>
                                </div>
                            </div>
                        </td>
                        <td class="p-2 text-end">
                            <div class="flex justify-end items-center space-x-2">
                                <form action="{{ route('cart.remove', $item->rowId) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="text" value="outOfStock" hidden name="instance">
                                    <button type="submit"
                                        class="flex justify-center items-center border border-lightgrey rounded p-1 w-8 h-8"><img
                                            src="{{ asset('img/icons/dark/trash.webp') }}" width="20px"
                                            alt="Eliminar"></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif