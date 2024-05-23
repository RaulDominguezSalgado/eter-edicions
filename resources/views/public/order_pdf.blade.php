<?php
$paymentMethod = $order->payment_method;
if ($paymentMethod == 'wire') {
    $paymentMethod = __('checkout.payment-wire');
} elseif ($paymentMethod == 'paypal') {
    $paymentMethod = __('checkout.payment-paypal');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Order Ticket</title>
    <link rel="stylesheet" href="{{ asset('css/public/order_pdf.css') }}">
</head>


<?php
$path = 'img/logo/lg/logo_eter_black.webp';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>

<body>

    <div class="w-full max-w-max flex flex-col justify-center space-y-4">
        <div class="ticket md:w-[500px] bg-[#f9f9f9] p-5 space-y-4">
            <div class="items-baseline pb-1">
                <h2 class="float-left">{{ __('checkout.ticket') }}</h2>
                <img src="{{ $base64 }}" alt="Èter Edicions" style="width: 3em; height: 3em" class="float-right">
            </div>
            <br class="clear-both">
            <hr>
            <div class="order-details">
                <p><strong>{{ __('form.name') }}:</strong></p>
                <p class="mb-1"> {{ $order->first_name . ' ' . $order->last_name }}</p>
                <p><strong>{{ __('form.shipping-address') }}:</strong></p>
                <p class="mb-1">{{ $order->address }}, @if ($order->apartment)
                        {{ $order->apartment }},
                    @endif <br>{{ $order->locality }}, {{ $order->zip_code }}</p>
                <p><strong>{{ __('form.date') }}:</strong></p>
                <p class="mb-1"> {{ $order->date }}</p>
                <p><strong>{{ __('form.reference-number') }}:</strong></p>
                <p class="mb-1"> {{ $order->reference }}</p>
                <p><strong>{{ __('form.payment-method') }}:</strong></p>
                <p class="mb-1"> {{ $paymentMethod }}</p>
                <!-- Other order details -->
            </div>

            <table class="order-items">
                <thead>
                    <tr>
                        <th class="text-start px-1 md:px-3">{{ __('shopping-cart.product') }}</th>
                        <th class="text-end px-1 md:px-3">#</th>
                        <th class="text-end px-1 md:px-3">{{ __('shopping-cart.price') }}</th>
                        <th class="text-end px-1 md:px-3">{{ __('shopping-cart.total') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->details()->get() as $detail)
                        <tr>
                            <td class="text-start px-1 md:px-3">{{ $detail->book->title }}</td>
                            <td class="text-end   px-1 md:px-3">{{ $detail->quantity }}</td>
                            <td class="text-end   px-1 md:px-3">{{ $detail->price_each }}€</td>
                            <td class="text-end   px-1 md:px-3">
                                <strong>{{ number_format($detail->quantity * $detail->price_each, 2) }}€</strong></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div>
                <p><strong>{{ __('shopping-cart.subtotal') }}:</strong></p>
                <p class="mb-1"> {{ number_format($order->total) }}€</p>
                <p><strong>{{ __('form.shipping-cost') }}:</strong></p>
                <p class="mb-1"> {{ $order->shipment_taxes }}€</p>
                <p><strong>{{ __('shopping-cart.total') }}:</strong></p>
                <p class="mb-1"> {{ number_format((float)$order->total + $order->shipment_taxes, '2', '.', '') }}€</p>
            </div>
        </div>
        <div class="footer">
            {{ __('checkout.thanks-for-your-purchase') }}
        </div>
    </div>


</body>

</html>
