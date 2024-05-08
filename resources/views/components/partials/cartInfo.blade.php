<div class="flex">
    <div class="flex-col w-1/2">Subtotal</div>
    <div class="flex-col w-1/2 text-right">{{ Cart::instance("default")->subTotal() }}</div>
</div>
<div class="flex">
    <div class="flex-col w-1/2">Impostos</div>
    <div class="flex-col w-1/2 text-right">{{ Cart::instance("default")->tax() }}</div>
</div>
<div class="flex">
    <div class="flex-col w-1/2">Enviament</div>
    <div class="flex-col w-1/2 text-right">Per calcular</div>
</div>
<div class="border my-3"></div>
<div class="flex">
    <div class="flex-col w-1/2">Total</div>
    <div class="flex-col w-1/2 text-right">{{ Cart::instance("default")->total() }} + costos d'enviament</div>
</div>
