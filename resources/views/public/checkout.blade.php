<?php
    $locale = "ca";
    $order = old() ?? [];
?>
<x-layouts.app>
    <h1 class="pb-20 text-center">Checkout</h1>
    <form action="{{ route('checkout.toPayment') }}" method="POST">
        <div class="flex">
            <div id="checkout-main-content" class="flex-col w-2/3 pr-5">
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong>Hi ha hagut algún error al formulari, reivsa tots els camps destacats.</strong>
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
                @csrf
                <div style="display:none">
                    @foreach (Cart::content() as $item)
                        <input type="hidden" name="products[]" value="{{ $item->id }}">
                        <input type="hidden" name="quantities[]" value="{{ $item->qty }}">
                    @endforeach
                    <input type="hidden" name="total" value="{{ Cart::total() }}" id="total">
                </div>
                <div>
                    <h2>Dades Personals</h2>
                    <div class="flex">
                        <label class="flex-col w-1/2 my-3" for="first_name">Nom
                            <input type="text" value="{{ $order['first_name'] ?? '' }}" class="@error('first_name') border border-systemerror @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="first_name" id="first_name">
                            @error('first_name')
                                <small class="text-systemerror">{{ $message }}</small>
                            @enderror
                        </label>
                        <label class="flex-col w-1/2 my-3" for="last_name">Cognoms
                            <input type="text" value="{{ $order['last_name'] ?? '' }}" class="@error('last_name') border border-systemerror @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="last_name" id="last_name">
                            @error('last_name')
                                <small class="text-systemerror">{{ $message }}</small>
                            @enderror
                        </label>
                    </div>
                    <div class="flex">
                        <label class="flex-col w-1/3 my-3" for="dni">NIF (DNI, NIE, pasaport)
                            <input type="text" value="{{ $order['dni'] ?? '' }}" class="@error('dni') border border-systemerror @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="dni" id="dni">
                            @error('dni')
                                <small class="text-systemerror">{{ $message }}</small>
                            @enderror
                        </label>
                        <label class="flex-col w-1/3 my-3" for="email">Correu electrónic
                            <input type="email" value="{{ $order['email'] ?? '' }}" class="@error('email') border border-systemerror @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email">
                            @error('email')
                                <small class="text-systemerror">{{ $message }}</small>
                            @enderror
                        </label>
                        <label class="flex-col w-1/3 my-3" for="phone_number">Teléfon
                            <input type="tel" value="{{ $order['phone_number'] ?? '' }}" class="@error('phone_number') border border-systemerror @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="phone_number" id="phone_number">
                            @error('phone_number')
                                <small class="text-systemerror">{{ $message }}</small>
                            @enderror
                        </label>
                    </div>
                </div>
                <div>
                    <h2>Direccións</h2>
                    <div class="flex">
                        <label class="flex-col w-1/3 my-3" for="address">Direcció
                            <input type="text" value="{{ $order['address'] ?? '' }}" class="@error('address') border border-systemerror @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="address" id="address">
                            @error('address')
                                <small class="text-systemerror">{{ $message }}</small>
                            @enderror
                        </label>
                        <label class="flex-col w-1/3 my-3" for="zip_code">Codi postal
                            <input type="text" value="{{ $order['zip_code'] ?? '' }}" class="@error('zip_code') border border-systemerror @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="zip_code" id="zip_code">
                            @error('zip_code')
                                <small class="text-systemerror">{{ $message }}</small>
                            @enderror
                        </label>
                        <label class="flex-col w-1/3 my-3" for="city">Població
                            <input type="text" value="{{ $order['city'] ?? '' }}" class="@error('city') border border-systemerror @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="city" id="city">
                            @error('city')
                                <small class="text-systemerror">{{ $message }}</small>
                            @enderror
                        </label>
                    </div>
                    <div class="flex">
                        <label class="flex-col w-1/2 my-3" for="province">Provincia
                            <input type="text" value="{{ $order['province'] ?? '' }}" class="@error('province') border border-systemerror @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="province" id="province">
                            @error('province')
                                <small class="text-systemerror">{{ $message }}</small>
                            @enderror
                        </label>
                        <label class="flex-col w-1/2 my-3" for="country">País
                            <input type="text" value="{{ $order['country'] ?? '' }}" class="@error('country') border border-systemerror @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="country" id="country">
                            @error('country')
                                <small class="text-systemerror">{{ $message }}</small>
                            @enderror
                        </label>
                    </div>
                </div>
                <div id="payment">
                    <h2>Pagament</h2>
                    <div class="flex">
                        <ul>
                            @error('payment_method')
                                <small class="text-systemerror">{{ $message }}</small>
                            @enderror
                            <li>
                                <input value="paypal" @if (isset($order['payment_method']) && $order['payment_method'] == "paypal") checked @endif type="radio" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="payment_method" id="paypal" value="paypal">
                                <label for="paypal">PayPal</label>
                            </li>
                            <li>
                            <input value="wire" @if (isset($order['payment_method']) && $order['payment_method'] == "wire") checked @endif type="radio" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="payment_method" id="wire" value="wire">
                                <label for="wire">Transferéncia bancaria</label>
                            </li>
                            <li>
                                <input value="redsys" @if (isset($order['payment_method']) && $order['payment_method'] == "redsys") checked @endif type="radio" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="payment_method" id="redsys" value="redsys">
                                <label for="redsys">RedSys</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="checkout-controls my-10">
                    <a href="{{ route('cart.view') }}" class="previous-button">{{__('form.return')}}</a>
                    <input type="submit" value="{{__('form.next')}}" name="next" class="next-button">
                </div>
            </div>
            <aside id="checkout-aside" class="flex-col w-1/3 pl-5">
                <div>
                    <h2>Articles</h2>
                    <x-partials.cartContent></x-partials.cartContent>
                </div>
                <div id="shipment">
                    <h2>Mètodes d'enviament</h2>
                    <div class="flex">
                        <ul>
                            @error('shipment_method')
                                <small class="text-systemerror">{{ $message }}</small>
                            @enderror
                            <li>
                                <input type="radio" name="shipment_method" id="seur" value="seur" @if (isset($order['shipment_method']) && $order['shipment_method'] == "seur") checked @endif class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <label for="seur">SEUR</label>
                            </li>
                            <li>
                                <input type="radio" name="shipment_method" id="ups" value="ups" @if (isset($order['shipment_method']) && $order['shipment_method'] == "ups") checked @endif class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <label for="ups">UPS</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <div id="price_table" class="py-5">
                        <x-partials.cartInfo></x-partials.cartInfo>
                    </div>
                </div>
            </aside>
        </div>
    </form>
    <style>
        label {
            user-select: none;
        }
        #checkout-main-content > div {
            margin-bottom: 60px;
        }
        #checkout-main-content > div > div > label {
            margin: 20px !important;
        }
        #checkout-main-content > div > div > label:first-of-type {
            margin-left: 0 !important;
        }
        #checkout-main-content > div > div > label:last-of-type {
            margin-right: 0 !important;
        }

        #payment input,
        #shipment input {
            display: none;
        }
        #payment input:checked + label,
        #payment label:hover,
        #shipment input:checked + label,
        #shipment label:hover {
            background-color: #ccc;
            transition: .3s;
        }
        #payment label,
        #shipment label {
            display: block;
            width: 100%;
            transition: .3s;
            cursor: pointer;
            padding: 10px;
        }

        #payment > div > ul,
        #shipment > div > ul {
            list-style: none;
            width: 100%;
        }
        #payment > div > ul > li,
        #shipment > div > ul > li {
            padding: 10px;
        }

        aside#checkout-aside > div {
            margin-bottom: 45px;
        }
        h2 {
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
            margin-bottom: 3px;
        }
        .cart-info {
            max-height: 450px;
            overflow-y: auto;
        }
        #price_table {
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding: 15px 0;
        }
    </style>
</x-layouts.app>
