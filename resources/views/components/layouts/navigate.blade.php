<?php
// $locale = 'ca';
// // Get the locale from the app or fallback to the URL
// $locale = app()->getLocale() ?: request()->segment(1) ?: 'ca';

$locale = app()->getLocale() ?: 'ca';
?>
<nav class="flex justify-end px-2.5 pt-3">
    <ul>
        <li class="relative">
            <div id="lang" {{-- href="{{ route("cart.view") }}" --}}>
                <button type="button" class="flex items-center">
                    <i class="icon lang text-[14px]"></i>
                    <div class="p14 flex leading-3 me-2">Idioma</div>
                    <i class="icon expand-arrow text-[10px]"></i>
                </button>
            </div>
            <div class="lang-select absolute top-8 bg-light">
                <form action="{{ route('lang.switch') }}" method="POST">
                    @csrf
                    <div class="lang-option relative w-full bg-light hover:bg-surfacemedium px-5 py-1 pb-2">
                        <button class="" type="submit" name="lang" value="ca">Català</button>
                    </div>
                    <div class="lang-option relative w-full bg-light  hover:bg-surfacemedium px-5 py-1 pb-2">
                        <button type="submit" name="lang" value="es">Español</button>
                    </div>
                    {{-- <div class="lang-option relative w-full bg-light hover:bg-surfacemedium px-5 py-1 rtl-wrapper pb-2">
                        <button type="submit" name="lang" value="arb">عربي</button>
                    </div> --}}
                </form>
            </div>
        </li>
    </ul>
</nav>
<nav id="main-nav" class="mb-6">
    <a href="{{ route("home.{$locale}") }}" class="logo">
        <img src="{{ asset('img/logo/lg/logo_eter_black.webp') }}" alt="Logotip d'Èter Edicions" style="width: 5em">
    </a>
    <ul class="nav-links">
        <li class=""><a href="{{ route("home.{$locale}") }}"
                @if (Route::currentRouteName() == "home.{$locale}") class="active" @endif>{{ __('general.home') }}</a></li>
        <li class=""><a href="{{ route("catalog.{$locale}") }}"
                @if (Route::currentRouteName() == "catalog.{$locale}") class="active" @endif>{{ __('general.catalog') }}</a></li>
        <li class=""><a href="{{ route("collaborators.{$locale}") }}"
                @if (Route::currentRouteName() == "collaborators.{$locale}") class="active" @endif>{{ __('general.authors') }}</a></li>
        <li class=""><a href="{{ route("agency.{$locale}") }}"
                @if (Route::currentRouteName() == "agency.{$locale}") class="active" @endif>{{ __('general.agency') }}</a></li>
        <li class=""><a href="{{ route("activities.{$locale}") }}"
                @if (Route::currentRouteName() == "activities.{$locale}") class="active" @endif>{{ __('general.activities') }}</a></li>
        <li class=""><a href="{{ route("posts.{$locale}") }}"
                @if (Route::currentRouteName() == "posts.{$locale}") class="active" @endif>{{ __('general.posts') }}</a></li>
        <li class=""><a href="{{ route("about.{$locale}") }}"
                @if (Route::currentRouteName() == "about.{$locale}") class="active" @endif>{{ __('general.about') }}</a></li>
    </ul>
    <div>
        <x-partials.searchBar></x-partials.searchBar>
    </div>
</nav>


{{-- <script>
    const navLinks = document.querySelector('.nav-links')
    function onToggleMenu(e){
        e.name = e.name === 'menu' ? 'close' : 'menu'
        navLinks.classList.toggle('top-[9%]')
    }
</script> --}}
