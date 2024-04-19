<?php
$locale = 'ca';
//TODO Change locale
?>
<nav id="admin-nav" class="flex flex-col justify-between items-center">
    <a href="{{ route("home.{$locale}") }}" class="logo"><img src="/img/logo/lg/logo_eter_black.webp"></a>

    <ul class="">
        {{-- <li><a href="{{ route('admin_dashboard') }}">Portada</a></li> --}}
        <li><a class="has-icon" href="{{ route('orders.index') }}" @if(Route::currentRouteName() == 'orders.index') class="active" @endif><img src="/img/icons/order.webp"><span>Comandes</span></a></li>
        <li><a class="has-icon" href="{{ route('books.index') }}" @if(Route::currentRouteName() == 'books.index') class="active" @endif><img src="/img/icons/catalog.webp"><span>Catàleg</span></a></li>
        <li><a class="has-icon" href="{{ route('collections.index')}}" @if(Route::currentRouteName() == 'collections.index') class="active" @endif><img src="/img/icons/collections.webp"><span>Col·leccions</span></a></li>
        <li class="has-child">
            <a class="has-icon" href="{{ route('collaborators.index') }}" @if(Route::currentRouteName() == 'collaborators.index') class="active" @endif><img src="/img/icons/collaborators.webp"><span>Colaboradors</span></a>
            {{-- <ul>
                <li><a href="{{ route('authors.index') }}">Autors</a></li>
                <li><a href="{{ route('translators.index') }}">Traductors</a></li>
                <li><a href="{{ route('ilustrators.index') }}">Il·lustradors</a></li>
            </ul> --}}
            {{-- <span class="icon">&#8964;</span> --}}
        </li>
        <li><a class="has-icon" href="{{ route('bookstores.index')}}"><img src="/img/icons/bookstores.webp"><span>Llibreries</span></a></li>
        <li class="has-child">
            <a class="has-icon" href=""><img src="/img/icons/posts.webp"><span>Publicacions</span></a>
            {{-- <ul>
                <li><a href="">Activitats</a></li>
                <li><a href="{{ route('posts.index')}}">Articles</a></li>
            </ul>
            <span class="icon">&#8964;</span> --}}
        </li>
        <li><a class="has-icon" href=""><img src="/img/icons/pages.webp"><span>Págines</span></a></li>
        <li><a class="has-icon" href="{{ route('users.index')}}"><img src="/img/icons/users.webp"><span>Usuaris</span></a></li>
        <li><a class="has-icon" href="{{ route('users.index')}}"><img src="/img/icons/settings.webp"><span>Configuració</span></a></li>
    </ul>
</nav>
