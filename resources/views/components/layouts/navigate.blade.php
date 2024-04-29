<?php
$locale = 'ca';
?>

<nav id="main-nav" class="mb-6">
    <a href="{{ route("home.{$locale}") }}" class="logo">
        <img src="{{ asset('img/logo/lg/logo_eter_black.webp') }}" alt="Logotip d'Èter Edicions" style="width: 5em">
    </a>
    <ul class="">
        <li class=""><a href="{{ route("home.{$locale}") }}" @if(Route::currentRouteName() == "home.{$locale}") class="active" @endif>Portada</a></li>
        <li class=""><a href="{{ route("catalog.{$locale}") }}" @if(Route::currentRouteName() == "catalog.{$locale}") class="active" @endif>Catàleg</a></li>
        <li class=""><a href="{{ route("collaborators.{$locale}") }}" @if(Route::currentRouteName() == "collaborators.{$locale}") class="active" @endif>Autors</a></li>
        <li class=""><a href="{{ route("agency.{$locale}") }}" @if(Route::currentRouteName() == "agency.{$locale}") class="active" @endif>Agència</a></li>
        <li class=""><a href="{{ route("activities.{$locale}") }}" @if(Route::currentRouteName() == "activities.{$locale}") class="active" @endif>Activitats</a></li>
        <li class=""><a href="{{ route("posts.{$locale}") }}" @if(Route::currentRouteName() == "posts.{$locale}") class="active" @endif>Articles</a></li>
        <li class=""><a href="{{ route("about.{$locale}") }}" @if(Route::currentRouteName() == "about.{$locale}") class="active" @endif>Qui som</a></li>
    </ul>
    <a href="">
        <button>Buscar</button>
    </a>
    <a href="{{ route("cart.get") }}">
        <button>Cistella</button>
    </a>
</nav>
{{-- <hr> --}}
