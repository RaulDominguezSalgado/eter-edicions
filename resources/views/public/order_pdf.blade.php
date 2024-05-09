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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .ticket {
            width: 500px;
            margin: 20px auto;
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .ticket h2 {
            margin-top: 0;
            font-size: 1.2em;
            /* border-bottom: 1px solid #ccc; */
            padding-bottom: 10px;
        }

        .ticket p {
            margin: 0;
            line-height: 1.5;
        }

        .order-details {
            margin-bottom: 20px;
        }

        .order-details p {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .order-items {
            border-collapse: collapse;
            width: 100%;
        }

        .order-items th,
        .order-items td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .order-items th {
            background-color: #f2f2f2;
        }

        footer {
            margin-top: 20px;
            text-align: center;
            color: #666;
        }
    </style>
</head>

<body>

    <div class="ticket space-y-2">
        <div class="flex justify-between items-baseline pb-1 border-b border-b-lightgrey">
            <h2>{{ __('checkout.ticket') }}</h2>
            <img src="{{asset('img/logo/lg/logo_eter_black.webp')}}" alt="Èter Edicions" style="width: 3em">
        </div>

        <div class="order-details">
            <p>{{ __('form.name') }}: {{ $order->first_name . ' ' . $order->last_name }}</p>
            <p>{{ __('form.shipping_address') }}: {{ $order->address . ', ' . $order->zip_code . ', ' . $order->city . '.' }}</p>
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

    <footer>
        {{ __('checkout.thanks-for-your-purchase') }}
    </footer>

</body>

</html>
