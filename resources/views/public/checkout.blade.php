<?php
    $locale = "ca";
?>
<x-layouts.app>
    <h1>Checkout</h1>
    <div class="">
        <div class="w-2/3 float-left">
            <form action="{{ route('checkout.changeStep') }}" method="POST">
                <input type="hidden" name="step" value="{{ $step }}">
                @switch($step)
                    @case("personal_data")
                        <h2>Dades Personals</h2>

                    @break
                    @case("personal_data")
                        <h2>Direccións</h2>
                        
                    @break
                    @case("personal_data")
                        <h2>Mètodes d'enviament</h2>
                        
                    @break
                    @case("personal_data")
                        <h2>Pagament</h2>
                        
                    @break
                @endswitch
                <input type="submit" value="Previous step" name="prev" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                <input type="submit" value="Next step" name="next" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            </form>
        </div>
        <div class="w-1/3 float-right">
            <h2>Cistella</h2>
            <x-partials.cartInfo></x-partials.cartInfo>
        </div>
    </div>
    <div class="clear-both"></div>
</x-layouts.app>