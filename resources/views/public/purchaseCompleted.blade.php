<?php
    $locale = "ca";
?>
<x-layouts.app>
    <h1>Checkout</h1>
    <div class="">
        <div class="w-2/3 float-left pr-3">
            <div>
                <h2>Comanda enregistrada correctament</h2>
                @if ($order->payment_method == "wire")
                    <p>Dades per a la transferencia:</p>
                    <ul>
                        <li>Número de la compte: ES-XXXXXXXXXXXXX</li>
                        <li>Concepte de la transferéncia: Comanda:#{{ $order->reference }}</li>
                    </ul>
                @endif
                @include("public.order_pdf", ['order' => $order])
            </div>
        </div>
        <div class="w-1/3 float-right pl-3">

        </div>
    </div>
    <div class="clear-both"></div>
</x-layouts.app>
