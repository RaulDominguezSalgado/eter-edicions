<?php
    $locale = "ca";
?>
<x-layouts.app>
    <h1 class="pb-20 text-center">Checkout</h1>   
    <div class="flex">
        <div id="checkout-main-content" class="flex-col w-2/3 pr-5">
            <form action="{{ route('checkout.toPayment') }}" method="POST">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
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
                @csrf
                <div>
                    <h2>Dades Personals</h2>
                    <div class="flex">
                        <label class="flex-col w-1/2 my-3" for="first_name">Nom
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="first_name" id="first_name">
                        </label>
                        <label class="flex-col w-1/2 my-3" for="last_name">Cognoms
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="last_name" id="last_name">
                        </label>
                    </div>
                    <div class="flex">
                        <label class="flex-col w-1/2 my-3" for="email">Correu electrónic
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email">
                        </label>
                        <label class="flex-col w-1/2 my-3" for="telephone">Teléfon
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="telephone" id="telephone">
                        </label>
                    </div>
                </div>
                <div>
                    <h2>Direccións</h2>
                    <div class="flex">
                        <label class="flex-col w-1/3 my-3" for="address">Direcció
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="address" id="address">
                        </label>
                        <label class="flex-col w-1/3 my-3" for="zip_code">Codi postal
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="zip_code" id="zip_code">
                        </label>
                        <label class="flex-col w-1/3 my-3" for="population">Població
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="population" id="population">
                        </label>
                    </div>
                    <div class="flex">
                        <label class="flex-col w-1/2 my-3" for="province">Provincia
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="province" id="province">
                        </label>
                        <label class="flex-col w-1/2 my-3" for="country">País
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="country" id="country">
                        </label>
                    </div>
                </div>
                <div id="payment">
                    <h2>Pagament</h2>
                    <div class="flex">
                        <ul>
                            <li>
                                <input value="paypal" type="radio" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="payment_method" id="paypal">
                                <label for="paypal">PayPal</label>
                            </li>
                            <li>
                            <input value="wire" type="radio" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="payment_method" id="wire">
                                <label for="wire">Transferéncia bancaria</label>
                            </li>
                            <li>
                                <input value="redsys" type="radio" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="payment_method" id="redsys">
                                <label for="redsys">RedSys</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="checkout-controls my-10">
                    <a href="{{ route('cart.view') }}" class="previous-button">{{__('form.return')}}</a>
                    <input type="submit" value="{{__('form.next')}}" name="next" class="next-button">
                </div>
            </form>
        </div>
        <aside id="checkout-aside" class="flex-col w-1/3 pl-5">
            <div>
                <h2>Articles</h2>
                <x-partials.cartContent></x-partials.cartContent>
            </div>
            <div>
                <h2>Mètodes d'enviament</h2>
                <div class="flex">
                    <label class="flex-col w-1/2 my-3" for="shipment_method">Métode d'enviament
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="shipment_method" id="shipment_method">
                    </label>
                </div>
            </div>
            <div>
                <div id="price_table" class="py-5">
                    <x-partials.cartInfo></x-partials.cartInfo>
                </div>
            </div>
        </aside>
    </div>
    <style>
        label {
            user-select: none;
        }
        form > div {
            margin-bottom: 60px;
        }
        form > div > div > label {
            margin: 20px !important;
        }
        form > div > div > label:first-of-type {
            margin-left: 0 !important;
        }
        form > div > div > label:last-of-type {
            margin-right: 0 !important;
        }
        #payment input {
            display: none;
        }
        #payment input:checked + label,
        #payment label:hover {
            background-color: #ccc;
            transition: .3s;
        }
        #payment label {
            display: block;
            width: 100%;
            transition: .3s;
            cursor: pointer;
            padding: 10px;
        }
        
        #payment > div > ul {
            list-style: none;
            width: 100%;
        }
        #payment > div > ul > li {
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