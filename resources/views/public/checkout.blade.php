<?php
    $locale = "ca";
?>
<x-layouts.app>
    <h1>Checkout</h1>   
    <div class="">
        <div class="w-2/3 float-left pr-3">
            <form action="{{ route('checkout.changeStep') }}" method="POST">
                @csrf
                <div>
                    <h2>Dades Personals</h2>
                    <div class="flex">
                        <label class="flex-col w-1/2 my-3" for="first_name">Nom
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="first_name" id="first_name">
                        </label>
                        <label class="flex-col w-1/2 my-3" for="last_name">Cognoms
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="last_name" id="last_name">
                        </label>
                    </div>
                    <div class="flex">
                        <label class="flex-col w-1/2 my-3" for="email">Correu electrónic
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email">
                        </label>
                        <label class="flex-col w-1/2 my-3" for="telephone">Teléfon
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="telephone" id="telephone">
                        </label>
                    </div>
                </div>
                <div>
                    <h2>Direccións</h2>
                    <div class="flex">
                        <label class="flex-col w-1/3 my-3" for="address">Direcció
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="address" id="address">
                        </label>
                        <label class="flex-col w-1/3 my-3" for="zip_code">Codi postal
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="zip_code" id="zip_code">
                        </label>
                        <label class="flex-col w-1/3 my-3" for="population">Població
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="population" id="population">
                        </label>
                    </div>
                    <div class="flex">
                        <label class="flex-col w-1/2 my-3" for="province">Provincia
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="province" id="province">
                        </label>
                        <label class="flex-col w-1/2 my-3" for="country">País
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="country" id="country">
                        </label>
                    </div>
                </div>
                <div>
                    <h2>Mètodes d'enviament</h2>
                    <div class="flex">
                        <label class="flex-col w-1/2 my-3" for="shipment_method">Métode d'enviament
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="shipment_method" id="shipment_method">
                        </label>
                    </div>
                </div>
                <div>
                    <h2>Pagament</h2>
                    <div class="flex">
                        <label class="flex-col w-1/2 my-3" for="payment_method">Métode de pagament
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="payment_method" id="payment_method">
                        </label>
                    </div>
                </div>
                <div>
                    <h2>Comanda enregistrada correctament</h2>
                </div>
                @if ($step != "completed")
                    <div class="my-10">
                        <input type="submit" value="{{__('form.previous')}}" name="prev" class="previous-button">
                        <input type="submit" value="{{__('form.next')}}" name="next" class="next-button">
                    </div>
                @endif
            </form>
        </div>
        <div class="w-1/3 float-right pl-3">
            <h2>Cistella</h2>
            {{-- <x-partials.cartInfo></x-partials.cartInfo> --}}
        </div>
    </div>
    <div class="clear-both"></div>
    <style>
        form > div {
            margin-bottom: 60px;
        }
        form > div > div > label {
            margin: 20px !important;
        }
        form > div > div > label:first-of-type {
            margin-left: 0 !important;
        }
        form > div > div > label:last-of-type {
            margin-right: 0 !important;
        }
    </style>
</x-layouts.app>