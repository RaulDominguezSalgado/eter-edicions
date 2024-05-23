<?php
// $locale = 'ca';
// // Get the locale from the app or fallback to the URL
// $locale = app()->getLocale() ?: request()->segment(1) ?: 'ca';

$locale = app()->getLocale() ?: 'ca';
?>

<footer id="main-footer" class="hidden md:flex md:justify-between md:items-center">
    <div class="flex flex-col space-y-3">
        <a href="{{ route("home.{$locale}") }}" class="logo">
            <img src="{{ asset('img/logo/sm/' . $generalInfo['logo_white']) }}"
                alt="{{ __('phrases.logo', ['name' => $generalInfo['company_name'], 'de' => $locale == 'ca' ? (\App\Services\Translation\OrthographicRules::startsWithDe('de ' . $generalInfo['company_name']) ? __('orthographicRules.with_d') : __('orthographicRules.with_de')) : __('orthographicRules.by')]) }}">
        </a>
        <div>
            <p class="text-dark md:text-light">{{ $legalInfo['legal_name'] }}</p>
            <p class="text-dark md:text-light">{{ $legalInfo['address_1'] }}</p>
            <p class="text-dark md:text-light">{{ $legalInfo['address_2'] }}</p>
        </div>
    </div>
    <div class="flex space-x-6 items-center">
        @foreach ($socialsInfo as $social)
            <a href="{{ $social['url'] }}" target="_blank"><img
                    src="{{ asset('img/icons/socials/light/' . $social['name'] . '.webp') }}"
                    alt="{{ ucfirst($social['name']) }}
            {{ $locale == 'ca' ? (\App\Services\Translation\OrthographicRules::startsWithDe('de ' . $generalInfo['company_name']) ? __('orthographicRules.with_d') : __('orthographicRules.with_de')) : __('orthographicRules.by') }}{{ $generalInfo['company_name'] }}"
                    style="width:45px"></a>
        @endforeach
    </div>
    <div>
        <ul>
            <li><a class="text-dark md:text-light" href="">{{ __('general.privacy-policy') }}</a></li>
            <li><a class="text-dark md:text-light" href="">{{ __('general.cookie-policy') }}</a></li>
            <li><a class="text-dark md:text-light" href="">{{ __('general.legal') }}</a></li>
            <li><a class="text-dark md:text-light" href="{{ route("contact.{$locale}") }}">{{ __('general.contact') }}</a></li>
        </ul>
    </div>
    <div>
        <ul>
            <li><a class="text-dark md:text-light"
                    href="{{ route("catalog.{$locale}") }}">{{ __('general.catalog') }}</a></li>
            <li><a class="text-dark md:text-light"
                    href="{{ route("bookstores.{$locale}") }}">{{ __('general.bookstores') }}</a></li>
            <li><a class="text-dark md:text-light"
                    href="{{ route("agency.{$locale}") }}">{{ __('general.agency') }}</a></li>
            <li><a class="text-dark md:text-light"
                    href="{{ route("foreign-rights.{$locale}") }}">{{ __('general.foreign-rights') }}</a></li>
            <li><a class="text-dark md:text-light" href="{{ route("about.{$locale}") }}">{{ __('general.about') }}</a>
            </li>
        </ul>
    </div>
</footer>


<footer id="mobile-footer" class="md:hidden bg-lightgrey px-6 py-8 space-y-4">
    <div class="flex space-x-6 items-center">
        @foreach ($socialsInfo as $social)
            <a href="{{ $social['url'] }}" target="_blank"><img
                    src="{{ asset('img/icons/socials/dark/' . $social['name'] . '.webp') }}"
                    alt="{{ ucfirst($social['name']) }}
            {{ $locale == 'ca' ? (\App\Services\Translation\OrthographicRules::startsWithDe('de ' . $generalInfo['company_name']) ? __('orthographicRules.with_d') : __('orthographicRules.with_de')) : __('orthographicRules.by') }}{{ $generalInfo['company_name'] }}"
                    style="width:2em"></a>
        @endforeach
    </div>
    <div class="flex flex-col space-y-3">
        <a href="{{ route("home.{$locale}") }}" class="logo w-fit">
            <img src="{{ asset('img/logo/sm/' . $generalInfo['logo_black']) }}"
                alt="{{ __('phrases.logo', ['name' => $generalInfo['company_name'], 'de' => $locale == 'ca' ? (\App\Services\Translation\OrthographicRules::startsWithDe('de ' . $generalInfo['company_name']) ? __('orthographicRules.with_d') : __('orthographicRules.with_de')) : __('orthographicRules.by')]) }}">
        </a>
        <div class="text-dark lg:text-light">
            <p>{{ $legalInfo['legal_name'] }}</p>
            <p>{{ $legalInfo['address_1'] }}</p>
            <p>{{ $legalInfo['address_2'] }}</p>
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
