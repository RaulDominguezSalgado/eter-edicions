<!DOCTYPE html>
<html lang="ca">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/icons.css">
    <link rel="stylesheet" href="/css/front/nav.css">
    <link rel="stylesheet" href="/css/front/footer.css">
    <script src="/js/ajax/cart.js"></script>
    <script async src="https://maps.googleapis.com/maps/api/js?key={{config('eter.placesApiKey')}}&libraries=places&callback=initMap"></script> {{-- Google Places API --}}
    <title>{{ $title ?? 'Èter Edicions' }}</title>
</head>
<body>
    <x-partials.cookieBanner/>
    <?php
        $recaptcha = config("services.recaptcha");
    ?>
    <input type="hidden" id="recaptcha_site_key" value="{{ $recaptcha["site_key"] }}">
    <input type="hidden" id="recaptcha_secret_key" value="{{ $recaptcha["secret_key"] }}">
    <x-layouts.navigate/>
    <main class="p-5 md:p-5 lg:p-10">
        {{$slot}}
    </main>
    {{-- <x-layouts.footer/> --}}
    @include('components.layouts.footer')
</body>
</html>
