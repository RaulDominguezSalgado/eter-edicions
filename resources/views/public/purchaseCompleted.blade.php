<?php
$path = 'img/logo/lg/logo_eter_black.webp';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

$paymentMethod = $order->payment_method;
if ($paymentMethod == 'wire') {
    $paymentMethod = __('checkout.payment-wire');
} elseif ($paymentMethod == 'paypal') {
    $paymentMethod = __('checkout.payment-paypal');
}
?>
<x-layouts.app>
    {{-- <h1>Checkout</h1> --}}
    <div class="">
        <div class="w-full lg:w-2/3 float-left px-3">
            <div class="space-y-4">
                <h2 class="">{{__('checkout.purchase-completed')}}</h2>
                @if ($order->payment_method == 'wire')
                    <div>
                        <h5 class="mb-4">{{__('checkout.wire-payment-data')}}:</h5>
                        <ul>
                            <li class="mb-2">{{__('checkout.bank-account-data')}}: <br> {{$iban}}</li>
                            <li>{{__('checkout.wire-payment-subject')}}: <br> {{ $order->reference }}</li>
                        </ul>
                    </div>
                @endif
                {{-- @include('public.order_pdf', ['order' => $order]) --}}
                <div class="w-full max-w-max flex flex-col justify-center space-y-4">
                    <div class="ticket md:w-[500px] bg-[#f9f9f9] p-5 space-y-4">
                        <div class="items-baseline pb-1">
                            <h2 class="float-left">{{ __('checkout.ticket') }}</h2>
                            <img src="{{ $base64 }}" alt="Èter Edicions" style="width: 3em; height: 3em" class="float-right">
                        </div>
                        <br class="clear-both">
                        <hr>
                        <div class="order-details">
                            <p><strong>{{ __('form.name') }}:</strong></p><p class="mb-1"> {{ $order->first_name . ' ' . $order->last_name }}</p>
                            <p><strong>{{ __('form.shipping-address') }}:</strong></p><p class="mb-1">{{ $order->address }}, @if($order->apartment) {{$order->apartment}},@endif <br>{{$order->locality}}, {{$order->zip_code}}</p>
                            <p><strong>{{ __('form.date') }}:</strong></p><p class="mb-1"> {{ $order->date }}</p>
                            <p><strong>{{ __('form.reference-number') }}:</strong></p><p class="mb-1"> {{ $order->reference }}</p>
                            <p><strong>{{ __('form.payment-method') }}:</strong></p><p class="mb-1"> {{ $paymentMethod }}</p>
                            <!-- Other order details -->
                        </div>

                        <table class="order-items">
                            <thead>
                                <tr>
                                    <th class="text-start px-1 md:px-2">{{ __('shopping-cart.product') }}</th>
                                    <th class="text-end px-1 md:px-2">#</th>
                                    <th class="text-end px-1 md:px-6">{{ __('shopping-cart.price') }}</th>
                                    <th class="text-end px-1 md:px-6">{{ __('shopping-cart.total') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->details()->get() as $detail)
                                    <tr>
                                        <td class="text-start px-1">{{ $detail->book->title }}</td>
                                        <td class=" text-end px-1">{{ $detail->quantity }}</td>
                                        <td class="text-end px-1">{{ $detail->price_each }}€</td>
                                        <td class="text-end px-1"><strong>{{ number_format($detail->quantity * $detail->price_each, 2) }}€</strong></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div>
                            <p><strong>{{ __('shopping-cart.subtotal') }}:</strong></p><p class="mb-1"> {{ number_format((float)$order->total, 2, '.', '') }}€</p>
                            <p><strong>{{ __('form.shipping-cost') }}:</strong></p><p class="mb-1"> {{ $order->shipment_taxes }}€</p>
                            <p><strong>{{ __('shopping-cart.total') }}:</strong></p><p class="mb-1"> {{ number_format((float)$order->total + $order->shipment_taxes, 2, '.', '') }}€</p>
                        </div>
                    </div>
                    <div class="footer">
                        {{ __('checkout.thanks-for-your-purchase') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/3 float-right pl-3">


        </div>
    </div>
    <div class="clear-both"></div>
</x-layouts.app>
<link rel="stylesheet" href="{{ asset('css/public/order_pdf.css') }}">
