<?php
// $locale = 'ca';
// // Get the locale from the app or fallback to the URL
// $locale = app()->getLocale() ?: request()->segment(1) ?: 'ca';

$locale = app()->getLocale() ?: 'ca';
?>

<footer id="main-footer" class="hidden lg:flex lg:space-between lg:items-center">
    <div class="flex flex-col space-y-3">
        <a href="{{ route("home.{$locale}") }}" class="logo">
            <img src="{{ asset('img/logo/sm/' . $generalInfo['logo_white']) }}" alt="{{ __('phrases.logo', ['name' => $generalInfo['company_name'], "de" => $locale == 'ca' ? (\App\Services\Translation\OrthographicRules::startsWithDe("de ". $generalInfo['company_name']) ? __('orthographicRules.with_d') : __('orthographicRules.with_de')) : __('orthographicRules.by')]) }}">
        </a>
        <div>
                <p>{{ $legalInfo['legal_name'] }}</p>
                <p>{{ $legalInfo['address_1'] }}</p>
                <p>{{ $legalInfo['address_2'] }}</p>
        </div>
    </div>
    <div class="flex space-x-6 items-center">
        @foreach ($socialsInfo as $social)
        <a href="{{$social['url']}}" target="_blank"><img
            src="{{ asset("img/icons/socials/" . $social['name'] . ".webp") }}" alt="{{ ucfirst($social['name']) }}
            {{  $locale == 'ca' ? (\App\Services\Translation\OrthographicRules::startsWithDe("de ". $generalInfo['company_name']) ? __('orthographicRules.with_d') : __('orthographicRules.with_de')) : __('orthographicRules.by') }}{{ $generalInfo['company_name'] }}" style="width:45px"></a>
        @endforeach
    </div>
    <div>
        <ul>
            <li><a href="">{{ __('general.privacy-policy') }}</a></li>
            <li><a href="">{{ __('general.cookie-policy') }}</a></li>
            <li><a href="">{{ __('general.legal') }}</a></li>
            <li><a href="{{ route("contact.{$locale}") }}">{{ __('general.contact') }}</a></li>
        </ul>
    </div>
    <div>
        <ul>
            <li><a class="text-dark lg:text-light" href="{{ route("catalog.{$locale}") }}">{{ __('general.catalog') }}</a></li>
            <li><a class="text-dark lg:text-light" href="{{ route("bookstores.{$locale}") }}">{{ __('general.bookstores') }}</a></li>
            <li><a class="text-dark lg:text-light" href="{{ route("agency.{$locale}") }}">{{ __('general.agency') }}</a></li>
            <li><a class="text-dark lg:text-light" href="{{ route("foreign-rights.{$locale}") }}">{{ __('general.foreign-rights') }}</a></li>
            <li><a class="text-dark lg:text-light" href="{{ route("about.{$locale}") }}">{{ __('general.about') }}</a></li>
        </ul>
    </div>
</footer>


<footer id="mobile-footer" class="lg:hidden bg-lightgrey px-6 py-8 space-y-4">
    <div class="flex space-x-6 items-center">
        <a class="text-dark lg:text-light" href="https://www.facebook.com/people/%C3%88ter-Edicions-%D8%AF%D8%A7%D8%B1-%D8%A7%D9%84%D8%A3%D8%AB%D9%8A%D8%B1/100089381536837"
            target="_blank"><img src="{{ asset('img/icons/FacebookF.webp') }}" alt="Instagram d'Èter Edicions"
                style="width:2em"></a>
        <a class="text-dark lg:text-light" href="https://www.instagram.com/eteredicions/" target="_blank"><img
                src="{{ asset('img/icons/Instagram.webp') }}" alt="Facebook d'Èter Edicions" style="width:2em"></a>
        <a class="text-dark lg:text-light" href="https://twitter.com/eteredicions" target="_blank"><img src="{{ asset('img/icons/TwitterX.webp') }}"
                alt="Twitter d'Èter Edicions" style="width:2em"></a>
    </div>
    <div class="flex flex-col space-y-3">
        <a href="{{ route("home.{$locale}") }}" class="">
            <img src="{{ asset('img/logo/sm/logo_eter_black.webp') }}" alt="Logotip d'Èter Edicions">
        </a>
        <div class="text-dark lg:text-light">
            <p>SERVEIS EDITORIALS ÈTER S.L</p>
            <p>Sant Gil 16, 3-1</p>
            <p>08001 Barcelona</p>
        </div>
    </div>
    <div>
        <ul>
            <li><a href="">{{ __('general.privacy-policy') }}</a></li>
            <li><a href="">{{ __('general.cookie-policy') }}</a></li>
            <li><a href="">{{ __('general.legal') }}</a></li>
        </ul>
    </div>
</footer>
