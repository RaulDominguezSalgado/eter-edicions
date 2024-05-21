<h2>Hem rebut la teva comanda</h2>

@include("public.order_pdf", ["order" => $order])
@if ($order->payment_method == "wire")
    <p>Dades per a la transferencia:</p>
    <ul>
        <li>Titular del compte: Èter Edicions</li>
        <li>Número de la compte: ES-XXXXXXXXXXXXX</li>
        <li>Concepte de la transferéncia: Comanda:#{{ $order->reference }}</li>
    </ul>
@endif
