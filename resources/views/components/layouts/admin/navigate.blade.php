<?php
<<<<<<< HEAD
$locale = 'ca';
?>
<nav id="admin-nav">
    <a href="" class="logo"><img src="/img/logo/lg/logo_eter_black.webp"></a>
=======
    //TODO change ca for Lang::getLang
    $locale= "ca";
?>

<nav id="admin-nav">
    <img src="{{ asset('img/logo/lg/logo_eter_black.webp') }}" alt="Logotip d'Èter Edicions" style="width: 5em">
>>>>>>> jordi
    <ul>
        <li><a href="{{ route('admin_dashboard') }}">Portada</a></li>
        <li><a href="">Comandes</a></li>
        <li><a href="{{ route('books.index') }}" @if(Route::currentRouteName() == 'books.index') class="active" @endif>Llibres</a></li>
        <li><a href="{{ route('collections.index')}}">Col·leccions</a></li>
        <li>
            <a href="{{ route('collaborators.index') }}" @if(Route::currentRouteName() == 'collaborators.index') class="active" @endif>Colaboradors</a>
            <ul>
                <li><a href="{{ route('authors.index') }}">Autors</a></li>
                <li><a href="{{ route('translators.index') }}">Traductors</a></li>
                <li><a href="{{ route('ilustrators.index') }}">Il·lustradors</a></li>
            </ul>
        </li>
        <li>
            <a href="">Publicacions</a>
            <ul>
                <li><a href="">Activitats</a></li>
                <li><a href="{{ route('posts.index')}}">Articles</a></li>
            </ul>
        </li>
        <li><a href="">Págines</a></li>
        <li><a href="{{ route('users.index')}}">Usuaris</a></li>
    </ul>
<<<<<<< HEAD
    <a href="{{ route("home.{$locale}") }}">Go to public page</a>
=======
    <a href="{{ route("home.{$locale}") }}" @if(Route::currentRouteName() == "home.{$locale}") class="active" @endif>Portada</a>

    {{-- <a href="{{ route('home') }}">Go to public page</a> --}}
>>>>>>> jordi
</nav>
