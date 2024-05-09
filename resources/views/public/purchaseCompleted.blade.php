<?php
    $locale = "ca";
?>
<x-layouts.app>
    <h1>{{__('checkout.checkout')}}</h1>
    <div class="">
        <div class="w-2/3 float-left pr-3">
            <div>
                <h2>{{__('checkout.purchase-completed')}}</h2>
                <x-partials.cartContent></x-partials.cartContent>
                {{ Cart::destroy() }}
            </div>
        </div>
        <div class="w-1/3 float-right pl-3">

        </div>
    </div>
    <div class="clear-both"></div>
</x-layouts.app>
