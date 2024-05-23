<?php
$locale = 'ca';
$order = old() ?? [];

// dd(request()->all());

?>
<x-layouts.app>

    {{-- <h2 class="mb-8 text-center">{{ __('form.payment') }}</h2> --}}
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
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong>{{ __('errors.errors-in-form') }}</strong>
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
    <div class="flex flex-col md:flex-row w-full">
        <form action="{{ route('payment') }}" method="POST" class="flex flex-col md:flex-row w-full ps-1 pr-3">
            <div class="flex md:w-2/3">
                <div id="checkout-main-content" class="flex-col pr-5">
                    @csrf
                    <h2>{{ __('form.payment-method') }}</h2>
                    <div class="">
                        <ul class="space-y-2.5">
                            @error('payment_method')
                                <small class="text-systemerror">{{ $message }}</small>
                            @enderror
                            <li class="w-2/5 min-w-max flex items-center space-x-4 ">
                                <input value="paypal" @if (isset($order['payment_method']) && $order['payment_method'] == 'paypal') checked @endif type="radio"
                                    class="" name="payment_method" id="paypal" value="paypal">
                                <label for="paypal" class="w-full mt-4">
                                    <div class="flex justify-between text-lg">
                                        {{-- {{ __('form.paypal') }} --}}
                                        <img src="{{ asset('img/icons/third-party-logos/paypal.svg') }}"
                                            alt="{{ __('Pay with PayPal') }}">
                                    </div>
                                </label>
                            </li>
                            <li class="w-1/3 min-w-max flex items-center space-x-4 ">
                                <input value="wire" @if (isset($order['payment_method']) && $order['payment_method'] == 'wire') checked @endif type="radio"
                                    class="" name="payment_method" id="wire" value="wire">
                                <label for="wire">
                                    <div class="flex justify-between text-lg">
                                        {{ __('form.bank-transfer') }}
                                    </div>
                                </label>
                            </li>
                            {{-- <li class="w-80 flex items-center space-x-4 ">
                                    <input value="redsys" @if (isset($order['payment_method']) && $order['payment_method'] == 'redsys') checked @endif type="radio"
                                        class="shadow appearance-none round py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        name="payment_method" id="redsys" value="redsys">
                                    <label for="redsys">
                                        <div class="flex justify-between text-lg">
                                        {{__('form.redsys')}}
                                        <img src="{{ asset('img/icons/third-party-logos/paypal.svg') }}"
                                            alt="{{ __('Pay with PayPal') }}">
                                    </div>
                                    </label>
                                </li> --}}
                        </ul>
                    </div>
                    <div id="shipment">
                        <h2>{{ __('form.shipping-method') }}</h2>
                        <div class="flex">
                            <ul>
                                @error('shipment_method')
                                    <small class="text-systemerror">{{ $message }}</small>
                                @enderror
                                @foreach ($shipment_options as $shipment_method)
                                    <li class="w-2/5 min-w-max flex items-center space-x-4 ">
                                        <?php $nameTranslation = 'checkout.' . $shipment_method['name']; ?>
                                        <input type="radio" name="shipment_method" id="{{ __($nameTranslation) }}"
                                            value="{{ $shipment_method['price'] }}" class="py-2" @if($loop->first) checked @endif onchance="changePrince(this)">
                                        <label for="{{ __($nameTranslation) }}"
                                            class="py-2">{{ __($nameTranslation) }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    {{-- <input type="text" name="total" value="{{ Cart::instance('default')->total() + $order->shipment_taxes }}" id="total"
                        hidden> --}}
                    <div class="hidden md:block">
                        <input type="text" name="orderId" value="{{ $orderId }}" id="total" hidden>
                        <button class="send-button">
                            {{ __('checkout.continue-with-payment') }}
                        </button>
                    </div>
                </div>
            </div>
            <div id="" class="flex-col md:w-1/3 md:min-w-80 md:pl-5 mb-8">
                <div>
                    <h2>{{ trans_choice('words.producte', 2) }}</h2>
                    <x-partials.cartContent></x-partials.cartContent>
                </div>
                <div>
                    <div id="price_table" class="py-5">
                        {{-- <x-partials.cartInfo></x-partials.cartInfo> --}}
                        <div class="flex">
                            <div class="flex-col w-1/2  min-w-fit">{{__("Subtotal")}}</div>
                            <div class="flex-col w-1/2 text-right">{{ str_replace(".", ",", Cart::instance("default")->subTotal()) }}€</div>
                        </div>
                        <div class="flex">
                            <div class="flex-col w-1/2  min-w-fit">{{__("IVA")}}</div>
                            <div class="flex-col w-1/2 text-right">{{ str_replace(".", ",", Cart::instance("default")->tax())}}€</div>
                        </div>
                        <div class="flex">
                            <div class="flex-col w-1/2  min-w-fit">{{__("Despeses d'enviament")}}</div>
                            <div id="shipment_taxesDiv" class="flex-col w-1/2 text-right">{{str_replace(".", ",", !$shipment_tax ? "Per calcular" : $shipment_tax . "€")}}</div>
                            <input type="hidden" id="shipment_taxes" name="shipment_taxes" value="{{$shipment_tax}}">
                        </div>
                        <div class="border my-3"></div>
                        <div class="flex">
                            <div class="flex-col w-1/2 min-w-fit">{{__("Total")}}</div>

                            <div class="flex-col w-1/2 text-right" id="total">{{ str_replace(".", ",", Cart::instance("default")->total()+$shipment_tax )}}€</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block md:hidden">
                <input type="text" name="orderId" value="{{ $orderId }}" id="total" hidden>
                <button class="send-button">
                    {{ __('checkout.continue-with-payment') }}
                </button>
            </div>
        </form>
    </div>

</x-layouts.app>

<link rel="stylesheet" href="{{ asset('css/public/checkout.css') }}">
<script src="{{asset('js/form/payment.js')}}"></script>
