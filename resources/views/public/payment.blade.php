<?php
$locale = 'ca';
$order = old() ?? [];
?>
<x-layouts.app>

    <h1 class="pb-20 text-center">Checkout</h1>
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
    <form action="{{ route('paypal') }}" method="POST">
        <div class="flex">
            <div id="checkout-main-content" class="flex-col w-2/3 pr-5">

                @csrf
                <div id="payment">
                    <h2>Pagament</h2>
                    <div class="flex">
                        <ul>
                            @error('payment_method')
                                <small class="text-systemerror">{{ $message }}</small>
                            @enderror
                            <li>
                                <input value="paypal" @if (isset($order['payment_method']) && $order['payment_method'] == 'paypal') checked @endif type="radio"
                                    class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="payment_method" id="paypal" value="paypal">
                                <label for="paypal">PayPal</label>
                            </li>
                            <li>
                                <input value="wire" @if (isset($order['payment_method']) && $order['payment_method'] == 'wire') checked @endif type="radio"
                                    class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="payment_method" id="wire" value="wire">
                                <label for="wire">Transferéncia bancaria</label>
                            </li>
                            {{-- <li>
                                <input value="redsys" @if (isset($order['payment_method']) && $order['payment_method'] == 'redsys') checked @endif type="radio"
                                    class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="payment_method" id="redsys" value="redsys">
                                <label for="redsys">RedSys</label>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <input type="text" name="total" value="{{ Cart::instance('default')->total() }}" id="total"
                    hidden>
                <input type="text" name="orderId" value="{{$orderId }}" id="total"
                    hidden>
                <button class="send-button">
                    {{ __('shopping-cart.paypal') }}
                </button>
    </form>
</x-layouts.app>
