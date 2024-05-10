<?php
$paymentMethod = $order->payment_method;
if ($paymentMethod == 'wire') {
    $paymentMethod = 'Transferencia bancaria';
} elseif ($paymentMethod == 'paypal') {
    $paymentMethod = 'PayPal';
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Order Ticket</title>
    <link rel="stylesheet" href="{{asset('css/public/order_pdf.css')}}">
</head>


<?php
$path = 'img/logo/lg/logo_eter_black.webp';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>

<body>

    <div class="w-min flex flex-col justify-center">
        <div class="ticket space-y-2">
            <div class="items-baseline pb-1">
                <h2 class="float-left">{{ __('checkout.ticket') }}</h2>
                <img src="{{ $base64 }}" alt="Èter Edicions" style="width: 3em; height: 3em" class="float-right">
            </div>
            <br class="clear-both">
            <hr>
            <div class="order-details">
                <p>{{ __('form.name') }}: {{ $order->first_name . ' ' . $order->last_name }}</p>
                <p>{{ __('form.shipping-address') }}: {{ $order->address . ', ' . $order->zip_code . ', ' . $order->city . '.' }}</p>
                <p>{{ __('form.date') }}: {{ $order->date }}</p>
                <p>{{ __('form.reference-number') }}: {{ $order->reference }}</p>
                <p>{{ __('form.payment-method') }}: {{ $paymentMethod }}</p>
                <p>{{ __('form.shipping-cost') }}: {{ $order->shipment_taxes }}€</p>
                <p>{{ __('shopping-cart.total') }}: {{ $order->total }}€</p>
                <!-- Other order details -->
            </div>

            <table class="order-items">
                <thead>
                    <tr>
                        <th>{{ __('shopping-cart.product') }}</th>
                        <th>{{ __('shopping-cart.quantity') }}</th>
                        <th>{{ __('shopping-cart.price') }}</th>
                        <th>{{ __('shopping-cart.total') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->details()->get() as $detail)
                        <tr>
                            <td>{{ $detail->book->title }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ $detail->price_each }}€</td>
                            <td>{{ number_format($detail->quantity * $detail->price_each, 2) }}€</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="footer">
            {{ __('checkout.thanks-for-your-purchase') }}
        </div>
    </div>



</body>

</html>
