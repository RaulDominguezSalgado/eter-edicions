<?php
    $shipment_tax = 4.99;
?>

<div class="flex">
    <div class="flex-col w-1/2">{{__("Subtotal")}}</div>
    <div class="flex-col w-1/2 text-right">{{ str_replace(".", ",", Cart::instance("default")->subTotal()) }}€</div>
</div>
<div class="flex">
    <div class="flex-col w-1/2">{{__("IVA")}}</div>
    <div class="flex-col w-1/2 text-right">{{ str_replace(".", ",", Cart::instance("default")->tax())}}€</div>
</div>
<div class="flex">
    <div class="flex-col w-1/2">{{__("Despeses d'enviament")}}</div>
    <div class="flex-col w-1/2 text-right">{{str_replace(".", ",", $shipment_tax)}}€</div>
</div>
<div class="border my-3"></div>
<div class="flex">
    <div class="flex-col w-1/2">{{__("Total")}}</div>
    <div class="flex-col w-1/2 text-right">{{ str_replace(".", ",", Cart::instance("default")->total()+$shipment_tax )}}€</div>
</div>
