<?php
    $locale = "ca";
?>
<x-layouts.app>
    <h1>Checkout</h1>
    <div class="">
        <div class="w-2/3 float-left">
            <form action="{{ route('checkout.changeStep') }}" method="POST">
                @csrf
                <input type="hidden" name="step" value="{{ $step }}">
                @switch($step)
                    @case("personal_data")
                        <h2>Dades Personals</h2>
                        <div class="flex">
                            <label class="flex-col w-1/2 m-5" for="first_name">Nom
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="first_name" id="first_name">
                            </label>
                            <label class="flex-col w-1/2 m-5" for="last_name">Cognoms
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="last_name" id="last_name">
                            </label>
                        </div>
                        <div class="flex">
                            <label class="flex-col w-1/2 m-5" for="email">Correu electrónic
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email">
                            </label>
                            <label class="flex-col w-1/2 m-5" for="telephone">Teléfon
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="telephone" id="telephone">
                            </label>
                        </div>
                    @break
                    @case("address")
                        <h2>Direccións</h2>
                        <div class="flex">
                            <label class="flex-col w-1/3 m-5" for="address">Direcció
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="address" id="address">
                            </label>
                            <label class="flex-col w-1/3 m-5" for="zip_code">Codi postal
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="zip_code" id="zip_code">
                            </label>
                            <label class="flex-col w-1/3 m-5" for="population">Població
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="population" id="population">
                            </label>
                        </div>
                        <div class="flex">
                            <label class="flex-col w-1/2 m-5" for="province">Provincia
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="province" id="province">
                            </label>
                            <label class="flex-col w-1/2 m-5" for="country">País
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="country" id="country">
                            </label>
                        </div>
                    @break
                    @case("shippment")
                        <h2>Mètodes d'enviament</h2>
                        <div class="flex">
                            <label class="flex-col w-1/2 m-5" for="shipment_method">Métode d'enviament
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="shipment_method" id="shipment_method">
                            </label>
                        </div>
                    @break
                    @case("payment")
                        <h2>Pagament</h2>
                        <div class="flex">
                            <label class="flex-col w-1/2 m-5" for="payment_method">Métode de pagament
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="payment_method" id="payment_method">
                            </label>
                        </div>
                    @break
                    @case("completed")
                        <h2>Comanda enregistrada correctament</h2>
                    @break
                @endswitch
                @if ($step != "completed")
                    <input type="submit" value="Previous step" name="prev" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    <input type="submit" value="Next step" name="next" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                @endif
            </form>
        </div>
        <div class="w-1/3 float-right">
            <h2>Cistella</h2>
            {{-- <x-partials.cartInfo></x-partials.cartInfo> --}}
        </div>
    </div>
    <div class="clear-both"></div>
</x-layouts.app>