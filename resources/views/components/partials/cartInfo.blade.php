<?php
    $shipment_tax = 0;
?>

<div class="flex">
    <div class="flex-col w-1/2  min-w-fit">{{__("Subtotal")}}</div>
    <div class="flex-col w-1/2 text-right">{{ str_replace(".", ",", Cart::instance("default")->subTotal()) }}€</div>
</div>
<div class="flex">
    <div class="flex-col w-1/2  min-w-fit">{{__("IVA")}}</div>
    <div class="flex-col w-1/2 text-right">{{ str_replace(".", ",", Cart::instance("default")->tax())}}€</div>
</div>
<div class="flex">
    <div class="flex-col w-1/2  min-w-fit">{{__("Despeses d'enviament")}}</div>
    <div class="flex-col w-1/2 text-right">{{str_replace(".", ",", $shipment_tax == 0 ? "Per calcular" : $shipment_tax . "€")}}</div>
</div>
<div class="border my-3"></div>
<div class="flex">
    <div class="flex-col w-1/2 min-w-fit">{{__("Total")}}</div>
    <div class="flex-col w-1/2 text-right">{{ str_replace(".", ",", Cart::instance("default")->total()+$shipment_tax )}}€</div>
</div>
