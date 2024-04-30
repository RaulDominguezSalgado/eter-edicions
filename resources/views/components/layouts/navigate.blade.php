<?php
$locale = 'ca';
?>
<nav class="flex justify-end px-2.5">
    <ul>
        <li>
            <button class="shopping-cart" type="button" {{-- href="{{ route("cart.view") }}" --}} >
                <div class="icon lang h-4">Idioma</div>
            </button>
        </li>
    </ul>
</nav>
<nav id="main-nav" class="mb-6">
    <a href="{{ route("home.{$locale}") }}" class="logo">
        <img src="{{ asset('img/logo/lg/logo_eter_black.webp') }}" alt="Logotip d'Èter Edicions" style="width: 5em">
    </a>
    <ul class="nav-links">
        <li class=""><a href="{{ route("home.{$locale}") }}" @if(Route::currentRouteName() == "home.{$locale}") class="active" @endif>{{__('general.home')}}</a></li>
        <li class=""><a href="{{ route("catalog.{$locale}") }}" @if(Route::currentRouteName() == "catalog.{$locale}") class="active" @endif>{{__('general.catalog')}}</a></li>
        <li class=""><a href="{{ route("collaborators.{$locale}") }}" @if(Route::currentRouteName() == "collaborators.{$locale}") class="active" @endif>{{__('general.authors')}}</a></li>
        <li class=""><a href="{{ route("agency.{$locale}") }}" @if(Route::currentRouteName() == "agency.{$locale}") class="active" @endif>{{__('general.agency')}}</a></li>
        <li class=""><a href="{{ route("activities.{$locale}") }}" @if(Route::currentRouteName() == "activities.{$locale}") class="active" @endif>{{__('general.activities')}}</a></li>
        <li class=""><a href="{{ route("posts.{$locale}") }}" @if(Route::currentRouteName() == "posts.{$locale}") class="active" @endif>{{__('general.posts')}}</a></li>
        <li class=""><a href="{{ route("about.{$locale}") }}" @if(Route::currentRouteName() == "about.{$locale}") class="active" @endif>{{__('general.about')}}</a></li>
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

