<?php
// $locale = 'ca';
// // Get the locale from the app or fallback to the URL
// $locale = app()->getLocale() ?: request()->segment(1) ?: 'ca';

$locale = app()->getLocale() ?: 'ca';
?>
<nav class="flex justify-end px-4 pt-3">
    <ul class="flex space-x-2">
        <li class="relative">
            <div id="lang" class="">
                <button type="button" id="langSelectExpand" class="flex items-center" onclick="toggleLangSelect(this)">
                    <i class="icon lang text-[14px]"></i>
                    <div class="p14 flex leading-3 me-2">{{__('general.language')}}</div>
                    <i class="icon expand-arrow text-[10px]"></i>
                </button>
            </div>
            <div id="langForm" class="lang-select absolute top-8 bg-light before:border-s-transparent before:border-t-transparent before:border-b-light before:border-e-transparent z-20">
                <form action="{{ route('lang.switch') }}" method="POST">
                    @csrf
                    <input type="hidden" name="previousLang" value={{app()->getLocale()}}>
                    <input type="hidden" name="queryParams" value="{{ http_build_query(request()->query()) }}" id="queryParams">
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
        <li class="relative">
            <a href="{{ route("cart.view") }}" class="">
                <div class="icon shopping-bag relative">
                    <img src="{{asset('img/icons/dark/shopping-bag.webp')}}" alt="{{__('shopping-cart.shopping-bag')}}" class="w-4 h-4">
                    <div class="bg-dark rounded-full text-light min-w-4 min-h-4 p-0.5 m-0 absolute top-2.5 left-2">
                        <p class="p12 not-italic leading-3 text-center">{{Cart::instance('default')->count()}}</p> {{-- number of items in cart in real time --}}
                    </div>
                </div>
            </a>
        </li>
    </ul>
</nav>
<nav id="main-nav" class="mb-6 px-4">
    <a href="{{ route("home.{$locale}") }}" class="logo">
        <img src="{{ asset('img/logo/lg/logo_eter_black.webp') }}" alt="Logotip d'Èter Edicions" style="width: 5em">
    </a>
    <ul class="nav-links">
        <li class=""><a href="{{ route("home.{$locale}") }}"
                @if (Route::currentRouteName() == "home.{$locale}") class="active" @endif>{{ __('nav.home') }}</a></li>
        <li class=""><a href="{{ route("catalog.{$locale}") }}"
                @if (Route::currentRouteName() == "catalog.{$locale}") class="active" @endif>{{ __('nav.catalog') }}</a></li>
        <li class=""><a href="{{ route("collaborators.{$locale}") }}"
                @if (Route::currentRouteName() == "collaborators.{$locale}") class="active" @endif>{{ __('nav.authors') }}</a></li>
        <li class=""><a href="{{ route("agency.{$locale}") }}"
                @if (Route::currentRouteName() == "agency.{$locale}") class="active" @endif>{{ __('nav.agency') }}</a></li>
        <li class=""><a href="{{ route("activities.{$locale}") }}"
                @if (Route::currentRouteName() == "activities.{$locale}") class="active" @endif>{{ __('nav.activities') }}</a></li>
        <li class=""><a href="{{ route("posts.{$locale}") }}"
                @if (Route::currentRouteName() == "posts.{$locale}") class="active" @endif>{{ __('nav.posts') }}</a></li>
        <li class=""><a href="{{ route("about.{$locale}") }}"
                @if (Route::currentRouteName() == "about.{$locale}") class="active" @endif>{{ __('nav.about') }}</a></li>
    </ul>
    <div>
        <x-partials.searchBar></x-partials.searchBar>
    </div>
</nav>

<script src="/js/components/langSelect.js"></script>

{{-- <script>
    const navLinks = document.querySelector('.nav-links')
    function onToggleMenu(e){
        e.name = e.name === 'menu' ? 'close' : 'menu'
        navLinks.classList.toggle('top-[9%]')
    }
</script> --}}
