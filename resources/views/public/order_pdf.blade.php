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
            border-bottom: 1px solid #ccc;
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

    <div class="ticket">
        <h2>Ticket</h2>

        <div class="order-details">
            <p>Nom: {{ $order->first_name. " ".$order->last_name }}</p>
            <p>Direcció d'entrega: {{ $order->address.", ". $order->zip_code.", ".$order->city."."}}</p>
            <p>Data: {{ $order->date }}</p>
            <p>Nº referència: {{ $order->reference }}</p>
            <p>Total: {{ $order->total }}€</p>
            <!-- Other order details -->
        </div>

        <table class="order-items">
            <thead>
                <tr>
                    <th>Llibre</th>
                    <th>Quantitat</th>
                    <th>Preu unitari</th>
                    <th>Total</th>
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
        Gràcies por la teva compra.
    </footer>

</body>

</html>
