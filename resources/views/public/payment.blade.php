<?php
$locale = 'ca';
$order = old() ?? [];
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
    <form action="{{ route('payment') }}" method="POST">
        <div class="flex">
            <div id="checkout-main-content" class="flex-col w-1/2 pr-5 space-y-4 ">
                @csrf
                <h2>{{ __('form.payment-method') }}</h2>
                <div class="">
                    <ul class="space-y-2.5">
                        @error('payment_method')
                            <small class="text-systemerror">{{ $message }}</small>
                        @enderror
                        <li class="w-2/5 flex items-center space-x-4 ">
                            <input value="paypal" @if (isset($order['payment_method']) && $order['payment_method'] == 'paypal') checked @endif type="radio"
                                class="" name="payment_method" id="paypal" value="paypal">
                            <label for="paypal" class="w-full">
                                <div class="flex justify-between text-lg">
                                    {{-- {{ __('form.paypal') }} --}}
                                    <img src="{{ asset('img/icons/third-party-logos/paypal.svg') }}"
                                        alt="{{ __('Pay with PayPal') }}">
                                </div>
                            </label>
                        </li>
                        <li class="w-1/3 flex items-center space-x-4 ">
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
                {{-- <input type="text" name="total" value="{{ Cart::instance('default')->total() + $order->shipment_taxes }}" id="total"
                    hidden> --}}
                <div>
                    <input type="text" name="orderId" value="{{ $orderId }}" id="total" hidden>
                    <button class="send-button">
                        {{ __('checkout.continue-with-payment') }}
                    </button>
                </div>
    </form>
</x-layouts.app>
