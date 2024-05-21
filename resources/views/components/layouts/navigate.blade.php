<?php
// $locale = 'ca';
// // Get the locale from the app or fallback to the URL
// $locale = app()->getLocale() ?: request()->segment(1) ?: 'ca';

$locale = app()->getLocale() ?: 'ca';
?>
<nav id="desktop-nav" class="hidden lg:block">
    <nav class="flex justify-end px-4 pt-3">
        <ul class="flex space-x-2">
            <li class="relative">
                <div id="lang" class="">
                    <button type="button" id="langSelectExpand" class="flex items-center"
                        onclick="toggleLangSelect(this)">
                        <i class="icon lang text-[14px]"></i>
                        <div class="p14 flex leading-3 me-2">{{ __('general.language') }}</div>
                        <i class="icon expand-arrow text-[10px]"></i>
                    </button>
                </div>
                <div id="langForm"
                    class="lang-select absolute top-8 bg-light before:border-s-transparent before:border-t-transparent before:border-b-light before:border-e-transparent z-20">
                    <form action="{{ route('lang.switch') }}" method="POST">
                        @csrf
                        <input type="hidden" name="previousLang" value={{ app()->getLocale() }}>
                        <input type="hidden" name="queryParams" value="{{ http_build_query(request()->query()) }}"
                            id="queryParams">
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
                <a href="{{ route('cart.view') }}" class="">
                    <div class="icon shopping-bag relative">
                        <img src="{{ asset('img/icons/dark/shopping-bag.webp') }}"
                            alt="{{ __('shopping-cart.shopping-bag') }}" class="w-4 h-4">
                        <div class="bg-dark rounded-full text-light min-w-4 min-h-4 p-0.5 m-0 absolute top-2.5 left-2">
                            <p class="p12 not-italic leading-3 text-center">{{ Cart::instance('default')->count() }}</p>
                            {{-- number of items in cart in real time --}}
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
            <li class=""><a href="{{ route("home_default.{$locale}") }}"
                    @if (Route::currentRouteName() == "home_default.{$locale}" || Route::currentRouteName() == "home.{$locale}") class="active" @endif>{{ __('nav.home') }}</a></li>
            <li class=""><a href="{{ route("catalog.{$locale}") }}"
                    @if (Route::currentRouteName() == "catalog.{$locale}") class="active" @endif>{{ __('nav.catalog') }}</a></li>
            <li class=""><a href="{{ route("collaborators.{$locale}") }}"
                    @if (Route::currentRouteName() == "collaborators.{$locale}") class="active" @endif>{{ __('nav.authors') }}</a></li>
            <li class=""><a href="{{ route("agency.{$locale}") }}"
                    @if (Route::currentRouteName() == "agency.{$locale}") class="active" @endif>{{ __('nav.agency') }}</a></li>
            <li><a class="text-dark lg:text-light"
                    href="{{ route("bookstores.{$locale}") }}">{{ __('general.bookstores') }}</a></li>
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
</nav>



<nav id="mobile-nav" class="lg:hidden">
    <nav class="flex justify-between px-6 pt-3 ">
        <a href="{{ route("home.{$locale}") }}" class="logo">
            <img src="{{ asset('img/logo/lg/logo_eter_mobile_black.webp') }}" alt="Logotip d'Èter Edicions"
                style="width: 5em">
        </a>
        <ul class="flex items-center space-x-4">
            <li class="flex relative">
                <div id="lang" class="">
                    <button type="button" id="langSelectExpand" class="flex items-center"
                        onclick="toggleLangSelect(this)">
                        {{-- <i class="icon lang text-[14px]"></i> --}}
                        <p class="p16 flex leading-3 me-2">{{ strtoupper(app()->getLocale() ?: 'ca') }}</p>
                        <i class="icon expand-arrow text-[10px]"></i>
                    </button>
                </div>
                <div id="langForm"
                    class="lang-select absolute top-8 bg-light before:border-s-transparent before:border-t-transparent before:border-b-light before:border-e-transparent z-20">
                    <form action="{{ route('lang.switch') }}" method="POST">
                        @csrf
                        <input type="hidden" name="previousLang" value={{ app()->getLocale() }}>
                        <input type="hidden" name="queryParams" value="{{ http_build_query(request()->query()) }}"
                            id="queryParams">
                        <div class="lang-option relative w-full bg-light hover:bg-surfacemedium px-5 py-1 pb-2">
                            <button class="" type="submit" name="lang" value="ca">Català</button>
                        </div>
                        <div class="lang-option relative w-full bg-light  hover:bg-surfacemedium px-5 py-1 pb-2">
                            <button type="submit" name="lang" value="es">Español</button>
                        </div>
                    </form>
                </div>
            </li>
            <li class="flex">
                <a href="{{ route('cart.view') }}" class="">
                    <div class="icon shopping-bag relative">
                        <img src="{{ asset('img/icons/dark/shopping-bag.webp') }}"
                            alt="{{ __('shopping-cart.shopping-bag') }}" class="w-6 h-6">
                        <div
                            class="flex items-center justify-center bg-dark rounded-full text-light min-w-5 min-h-5 p-0.5 m-0 absolute top-3 left-3">
                            <p class="p12 not-italic leading-3 text-center">{{ Cart::instance('default')->count() }}
                            </p>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </nav>
    <nav class="mt-2 mb-6 px-6 relative ">
        <div class="w-full lg:px-0 flex justify-between items-center relative ">
            <div class="flex lg:hidden items-center h-auto  ">
                <button id="show-sidebar" type="button" onclick=showSidebar()>
                    <img src="{{ asset('img/icons/hamburger.svg') }}" alt="Icona per obrir el menú lateral"
                        width="32px" height="32px" />
                </button>
            </div>
            <div class="hidden lg:hidden items-center h-auto">
                <button id="hide-sidebar" type="button" onclick=hideSidebar()>
                    <img src="{{ asset('img/icons/close.svg') }}" alt="Creu per tancar el menú lateral"
                        width="32px" height="32px" />
                </button>
            </div>
            <div class="py-4">
                <x-partials.searchBar></x-partials.searchBar>
            </div>
        </div>
        <div id="sidebar" class="absolute z-10 bg-light">
            <div id="nav-options" class="flex flex-col space-y-4 bg-light mb-8">
                <ul class="nav-links">
                    <li class="py-1 pr-4"><a href="{{ route("home_default.{$locale}") }}"
                            @if (Route::currentRouteName() == "home_default.{$locale}" || Route::currentRouteName() == "home.{$locale}") class="active" @endif>{{ __('nav.home') }}</a></li>
                    <li class="py-1 pr-4"><a href="{{ route("catalog.{$locale}") }}"
                            @if (Route::currentRouteName() == "catalog.{$locale}") class="active" @endif>{{ __('nav.catalog') }}</a></li>
                    <li class="py-1 pr-4"><a href="{{ route("collaborators.{$locale}") }}"
                            @if (Route::currentRouteName() == "collaborators.{$locale}") class="active" @endif>{{ __('nav.authors') }}</a></li>
                    <li class="py-1 pr-4"><a href="{{ route("agency.{$locale}") }}"
                            @if (Route::currentRouteName() == "agency.{$locale}") class="active" @endif>{{ __('nav.agency') }}</a></li>
                    <li class="py-1 pr-4"><a href="{{ route("bookstores.{$locale}") }}"
                            @if (Route::currentRouteName() == "bookstores.{$locale}") class="active" @endif>{{ __('general.bookstores') }}</a>
                    </li>
                    <li class="py-1 pr-4"><a href="{{ route("activities.{$locale}") }}"
                            @if (Route::currentRouteName() == "activities.{$locale}") class="active" @endif>{{ __('nav.activities') }}</a>
                    </li>
                    <li class="py-1 pr-4"><a href="{{ route("foreign-rights.{$locale}") }}"
                            @if (Route::currentRouteName() == "foreign-rights.{$locale}") class="active" @endif>{{ __('general.foreign-rights') }}</a>
                    </li>
                    <li class="py-1 pr-4"><a href="{{ route("posts.{$locale}") }}"
                            @if (Route::currentRouteName() == "posts.{$locale}") class="active" @endif>{{ __('nav.posts') }}</a></li>
                    <li class="py-1 pr-4"><a href="{{ route("about.{$locale}") }}"
                            @if (Route::currentRouteName() == "about.{$locale}") class="active" @endif>{{ __('nav.about') }}</a></li>
                    <li class=""><a href="{{ route("contact.{$locale}") }}"
                            @if (Route::currentRouteName() == "contact.{$locale}") class="active" @endif>{{ __('general.contact') }}</a>
                    </li>
                </ul>
            </div>
            <x-layouts.footer />
        </div>
    </nav>
</nav>

<script src="/js/components/langSelect.js"></script>
<script src="/js/public/nav.js"></script>

{{-- <script>
    const navLinks = document.querySelector('.nav-links')
    function onToggleMenu(e){
        e.name = e.name === 'menu' ? 'close' : 'menu'
        navLinks.classList.toggle('top-[9%]')
    }
</script> --}}
