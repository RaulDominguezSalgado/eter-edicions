<?php
// $locale = "ca";
// $shipment_taxes=4.99;
$order = old() ?? [];
?>
<x-layouts.app>
    <h1 class="pb-20 text-center">{{ __('checkout.checkout') }}</h1>
    <form action="{{ route('checkout.toPayment') }}" method="POST" class="validate">
        <div class="flex">
            <div id="checkout-main-content" class="flex-col w-2/3 pr-5">
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong>{{ __('errors.errors-in-form') }}</strong>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-systemerror" role="button"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                onclick="removeParentDiv(this.parentNode)">
                                <title>Close</title>
                                <path
                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br />
                        @endforeach
                    </div>
                @endif
                @csrf
                <div style="display:none">
                    @foreach (Cart::instance('default')->content() as $item)
                        <input type="hidden" name="products[]" value="{{ $item->id }}">
                        <input type="hidden" name="quantities[]" value="{{ $item->qty }}">
                        <input type="hidden" name="prices[]" value="{{ $item->priceTax() }}">
                    @endforeach

                    {{-- <input type="hidden" name="shipment_taxes" value="{{ $shipment_taxes }}" id="shipment_taxes"> --}}
                    <input type="hidden" name="total" value="{{ Cart::instance('default')->total() }}"
                        id="total">
                </div>
                <div>
                    <h2>{{ __('form.personal-data') }}</h2>
                    <div class="flex">
                        <label class="flex-col w-1/2 my-3" for="first_name">{{ __('form.first_name') }}
                            <input type="text" value="{{ $order['first_name'] ?? '' }}"
                                class="@error('first_name') border-systemerror @enderror field required shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="first_name" id="first_name">
                            <small class="text-systemerror">@error('first_name'){{ $message }}@enderror</small>
                        </label>
                        <label class="flex-col w-1/2 my-3" for="last_name">{{ __('form.last_name') }}
                            <input type="text" value="{{ $order['last_name'] ?? '' }}"
                                class="@error('last_name') border-systemerror @enderror field required shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="last_name" id="last_name">
                            <small class="text-systemerror">@error('last_name'){{ $message }}@enderror</small>
                        </label>
                    </div>
                    <div class="flex">
                        <label class="flex-col w-1/3 my-3" for="dni">NIF (DNI, NIE)
                            <input type="text" value="{{ $order['dni'] ?? '' }}"
                                class="@error('dni') border-systemerror @enderror field required shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="dni" id="dni">
                            <small class="text-systemerror">@error('dni'){{ $message }}@enderror</small>
                        </label>
                        <label class="flex-col w-1/3 my-3" for="email">{{ __('form.email') }}
                            <input type="email" value="{{ $order['email'] ?? '' }}"
                                class="@error('email') border-systemerror @enderror field required shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="email" id="email">
                            <small class="text-systemerror">@error('email'){{ $message }}@enderror</small>
                        </label>
                        <label class="flex-col w-1/3 my-3" for="phone_number">{{ __('form.phone') }}
                            <input type="tel" value="{{ $order['phone_number'] ?? '' }}"
                                class="@error('phone_number') border-systemerror @enderror field required shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="phone_number" id="phone_number">
                            <small class="text-systemerror">@error('phone_number'){{ $message }}@enderror</small>
                        </label>
                    </div>
                </div>
                <div>
                    <h2>{{ __('form.shipping') }}</h2>
                    <div class="flex flex-wrap w-full">
                        <label class="flex-col w-full max-w-[calc(100%-16rem)] mb-4"
                            for="address">{{ __('form.address') }}
                            <div
                                class="w-full hidden lg:flex items-center justify-between shadow appearance-none border border-dark rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline p-1">
                                <input type="text" class="w-full border-0 py-1 px-2" value="{{ $order['address'] ?? '' }}" name="search_input"
                                    id="search_input">
                                <i class="icon search"></i>
                            </div>
                            <input type="text" value="{{ $order['address'] ?? '' }}"
                                class="flex lg:hidden w-fullshadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="address" id="address">
                        </label>
                        <label class="flex-col w-min my-3" for="apartment">{{ __('form.apartment') }}
                            <input type="text" value="{{ $order['apartment'] ?? '' }}"
                                class="h-[42px] @error('apartment') border-systemerror @enderror w-min shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="apartment" id="apartment" placeholder="(opcional)">
                            <small class="text-systemerror">@error('apartment'){{ $message }}@enderror</small>
                        </label>
                    </div>
                    <div class="flex">
                        <label class="flex-col w-1/3 my-3" for="locality">{{ __('form.locality') }}
                            <input type="text" value="{{ $order['locality'] ?? '' }}"
                                class="@error('locality') border-systemerror @enderror field required shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="locality" id="locality">
                            <small class="text-systemerror">@error('locality'){{ $message }}@enderror</small>
                        </label>
                        <label class="flex-col w-1/3 my-3" for="province">{{ __('form.province') }}
                            <select
                                class="field required shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('province') border-systemerror @enderror"
                                name="province" id="province">
                                @foreach ($provinces as $code => $province)
                                    @if($loop->first)
                                    <option id="{{ $province['name'] }}" value="{{ $code }}">
                                        {{ __('provinces.' . $province['name']) }}</option>
                                    @else
                                        <option id="{{ $code }}" value="{{ $code }}"
                                        @if ($code == 'B') selected @endif>
                                            {{ __('provinces.' . $province['code']) }}</option>
                                    @endif
                                @endforeach
                            </select>

                            <small class="text-systemerror">@error('province'){{ $message }}@enderror</small>
                        </label>
                        <label class="flex-col w-1/3 my-3" for="country">{{ __('form.country') }}
                            <select
                                class="field required shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('country') border-systemerror @enderror"
                                name="country" id="country">
                                @foreach ($countries as $key => $country)
                                    <option value="{{ $key }}"
                                        @if ($key == 'ES') selected @endif>
                                        {{ __('countries.' . $key) }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" value="{{ $order['country'] ?? '' }}"
                                class="@error('country') border-systemerror @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="country" id="country"> --}}
                            <small class="text-systemerror">@error('country'){{ $message }}@enderror</small>
                        </label>
                    </div>
                    <div class="flex">
                        <label class="flex-col w-min my-3" for="zip_code">{{ __('form.zip-code') }}
                            <input type="text" value="{{ $order['zip_code'] ?? '' }}"
                                class="@error('zip_code') border-systemerror @enderror field required w-min shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="zip_code" id="zip_code">
                            <small class="text-systemerror">@error('zip_code'){{ $message }}@enderror</small>
                        </label>
                    </div>
                </div>
                {{-- <div id="payment">
                    <h2>Pagament</h2>
                    <div class="flex">
                        <ul>
                            @error('payment_method')
                                <small class="text-systemerror">{{ $message }}</small>
                            @enderror
                            <li>
                                <input value="paypal" @if (isset($order['payment_method']) && $order['payment_method'] == 'paypal') checked @endif type="radio" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="payment_method" id="paypal" value="paypal">
                                <label for="paypal">{{__('form.paypal')}}</label>
                            </li>
                            <li>
                            <input value="wire" @if (isset($order['payment_method']) && $order['payment_method'] == 'wire') checked @endif type="radio" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="payment_method" id="wire" value="wire">
                                <label for="wire">{{__('form.bank-transfer')}}</label>
                            </li>
                            <li>
                                <input value="redsys" @if (isset($order['payment_method']) && $order['payment_method'] == 'redsys') checked @endif type="radio" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="payment_method" id="redsys" value="redsys">
                                <label for="redsys">{{__('form.redsys')}}</label>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                <div class="checkout-controls my-10">
                    <a href="{{ route('cart.view') }}" class="previous-button">{{ __('form.back') }}</a>
                    <input type="submit" value="{{ __('form.next') }}" name="next" class="next-button">
                </div>
            </div>
            <aside id="checkout-aside" class="flex-col w-1/3 pl-5">
                <div>
                    <h2>{{ trans_choice('words.producte', 2) }}</h2>
                    <x-partials.cartContent></x-partials.cartContent>
                </div>
                {{-- <div id="shipment">
                    <h2>Mètodes d'enviament</h2>
                    <div class="flex">
                        <ul>
                            @error('shipment_method')
                                <small class="text-systemerror">{{ $message }}</small>
                            @enderror
                            <li>
                                <input type="radio" name="shipment_method" id="seur" value="seur" @if (isset($order['shipment_method']) && $order['shipment_method'] == 'seur') checked @endif class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <label for="seur">SEUR</label>
                            </li>
                            <li>
                                <input type="radio" name="shipment_method" id="ups" value="ups" @if (isset($order['shipment_method']) && $order['shipment_method'] == 'ups') checked @endif class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <label for="ups">UPS</label>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                <div>
                    <div id="price_table" class="py-5">
                        {{-- <x-partials.cartInfo shipment_tax="{{$shipment_tax}}"></x-partials.cartInfo> --}}
                        <div class="flex">
                            <div class="flex-col w-1/2  min-w-fit">{{ __('Subtotal') }}</div>
                            <div class="flex-col w-1/2 text-right">
                                {{ str_replace('.', ',', Cart::instance('default')->subTotal()) }}€</div>
                        </div>
                        <div class="flex">
                            <div class="flex-col w-1/2  min-w-fit">{{ __('IVA') }}</div>
                            <div class="flex-col w-1/2 text-right">
                                {{ str_replace('.', ',', Cart::instance('default')->tax()) }}€</div>
                        </div>
                        <div class="flex">
                            <div class="flex-col w-1/2  min-w-fit">{{ __("Despeses d'enviament") }}</div>
                            <div class="flex-col w-1/2 text-right">
                                {{ str_replace('.', ',', !$shipment_tax ? 'Per calcular' : $shipment_tax . '€') }}
                            </div>
                        </div>
                        <div class="border my-3"></div>
                        <div class="flex">
                            <div class="flex-col w-1/2 min-w-fit">{{ __('Total') }}</div>
                            <div class="flex-col w-1/2 text-right">
                                {{ number_format(str_replace(",", ".", Cart::instance('default')->total()) + $shipment_tax, 2, ',', '.') }}€
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </form>

    <link rel="stylesheet" href="{{ asset('css/public/checkout.css') }}">
</x-layouts.app>
<script src="{{ asset('js/form/checkout.js') }}"></script>
