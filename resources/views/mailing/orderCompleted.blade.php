<h2>{{__('checkout.purchase-received')}}</h2>

@include('public.order_pdf', ['order' => $order])
@if ($order->payment_method == 'wire')
    <h5 class="mb-4">{{ __('checkout.wire-payment-data') }}:</h5>
    <ul>
        <li class="mb-2">{{ __('checkout.bank-account-data') }}: <br> {{ $iban }}</li>
        <li>{{ __('checkout.wire-payment-subject') }}: <br> {{ $order->reference }}</li>
    </ul>
@endif
