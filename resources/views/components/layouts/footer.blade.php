<?php
// $locale = 'ca';
// // Get the locale from the app or fallback to the URL
// $locale = app()->getLocale() ?: request()->segment(1) ?: 'ca';

$locale = app()->getLocale() ?: 'ca';
?>

<footer id="main-footer" class="flex space-between items-center">
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
            <li><a href="{{ route("catalog.{$locale}") }}">{{ __('general.catalog') }}</a></li>
            <li><a href="{{ route("bookstores.{$locale}") }}">{{ __('general.bookstores') }}</a></li>
            <li><a href="{{ route("agency.{$locale}") }}">{{ __('general.agency') }}</a></li>
            <li><a href="{{ route("foreign-rights.{$locale}") }}">{{ __('general.foreign-rights') }}</a></li>
            <li><a href="{{ route("about.{$locale}") }}">{{ __('general.about') }}</a></li>
        </ul>
    </div>
</footer>
