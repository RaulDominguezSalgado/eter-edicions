<?php
$locale = 'ca';
?>

<nav id="main-nav" class="mb-10">
    <a href="{{ route("home.{$locale}") }}" class="logo">
        <img src="{{ asset('img/logo/lg/logo_eter_black.webp') }}" alt="Logotip d'Èter Edicions" style="width: 5em">
    </a>
    <ul class="">
        <li class="h-14"><a href="{{ route("home.{$locale}") }}" @if(Route::currentRouteName() == "home.{$locale}") class="active" @endif><h5>Portada</h5></a></li>
        <li class="h-14"><a href="{{ route("catalog.{$locale}") }}" @if(Route::currentRouteName() == "catalog.{$locale}") class="active" @endif><h5>Catàleg</h5></a></li>
        <li class="h-14"><a href="{{ route("collaborators.{$locale}") }}" @if(Route::currentRouteName() == "collaborators.{$locale}") class="active" @endif><h5>Autors</h5></a></li>
        <li class="h-14"><a href="{{ route("agency.{$locale}") }}" @if(Route::currentRouteName() == "agency.{$locale}") class="active" @endif><h5>Agència</h5></a></li>
        <li class="h-14"><a href="{{ route("activities.{$locale}") }}" @if(Route::currentRouteName() == "activities.{$locale}") class="active" @endif><h5>Activitats</h5></a></li>
        <li class="h-14"><a href="{{ route("posts.{$locale}") }}" @if(Route::currentRouteName() == "posts.{$locale}") class="active" @endif><h5>Articles</h5></a></li>
        <li class="h-14"><a href="{{ route("about.{$locale}") }}" @if(Route::currentRouteName() == "about.{$locale}") class="active" @endif><h5>Qui som</h5></a></li>
    </ul>
    <a href="">
        <button>Buscar</button>
    </a>
</nav>
{{-- <hr> --}}
