<?php
// Config::get('app.locale')
$locale = 'ca';
?>
<nav id="admin-nav"
    class="md:h-screen
                            flex flex-col
                            items-center
                            justify-evenly
                            bg-lightgrey
                            sticky
                            z-[100]">
    <div class="w-screen md:w-full px-5 md:px-0 flex relative">
        <div class="flex md:hidden items-center h-auto" >
            <button id="show-sidebar" type="button" onclick=showSidebar()>
                <img src="{{asset('img/icons/hamburger.svg')}}" alt="Icona per obrir el menú lateral" width="32px" height="32px"/>
            </button>
        </div>
        <div class="hidden md:hidden items-center h-auto" >
            <button id="hide-sidebar" type="button" onclick=hideSidebar()>
                <img src="{{asset('img/icons/close.svg')}}" alt="Creu per tancar el menú lateral" width="32px" height="32px"/>
            </button>
        </div>
        <a href="{{ route("home.{$locale}") }}"
            class="py-2.5 px-5 hover:bg-light focus:bg-light text-dark no-underline logo"><img
                src="/img/logo/lg/logo_eter_black.webp">
        </a>
    </div>

    <ul id="sidebar" class="hidden md:flex flex-col duration-100">
        {{-- <li><a href="{{ route('admin_dashboard') }}">Portada</a></li> --}}
        <li class="">
            <a class="py-2.5 px-5 hover:bg-light focus:bg-light" href="{{ route('orders.index') }}"
                @if (Route::currentRouteName() == 'orders.index') class="active" @endif>
                <div class="flex flex-row md:flex-col items-center space-x-4 md:space-x-0 space-y-2 md:space-y-0 ">
                    <img class="w-10 h-10" src="/img/icons/order.webp">
                    <div class="text-base">Comandes</div>
                </div>
            </a>
        </li>
        <li>
            <a class="py-2.5 px-5 hover:bg-light focus:bg-light" href="{{ route('books.index') }}"
                @if (Route::currentRouteName() == 'books.index') class="active" @endif>
                <div class="flex flex-row md:flex-col items-center space-x-4 md:space-x-0 space-y-2 md:space-y-0 ">
                    <img class="w-10 h-10" src="/img/icons/catalog.webp">
                    <div class="text-base">Catàleg</div>
                </div>
            </a>
        </li>
        <li>
            <a class="py-2.5 px-5 hover:bg-light focus:bg-light" href="{{ route('collections.index') }}"
                @if (Route::currentRouteName() == 'collections.index') class="active" @endif>
                <div class="flex flex-row md:flex-col items-center space-x-4 md:space-x-0 space-y-2 md:space-y-0 ">
                    <img class="w-10 h-10" src="/img/icons/collections.webp">
                    <div class="text-base">Col·leccions</div>
                </div>
            </a>
        </li>
        <li>
            <a class="py-2.5 px-5 hover:bg-light focus:bg-light" href="{{ route('collaborators.index') }}"
                @if (Route::currentRouteName() == 'collaborators.index') class="active" @endif>
                <div class="flex flex-row md:flex-col items-center space-x-4 md:space-x-0 space-y-2 md:space-y-0 ">
                    <img class="w-10 h-10" src="/img/icons/collaborators.webp">
                    <div class="text-base">Col·laboradors</div>
                </div>
            </a>
        </li>
        <li>
            <a class="py-2.5 px-5 hover:bg-light focus:bg-light" href="{{ route('bookstores.index') }}">
                <div class="flex flex-row md:flex-col items-center space-x-4 md:space-x-0 space-y-2 md:space-y-0 ">
                    <img class="w-10 h-10" src="/img/icons/bookstores.webp">
                    <div class="text-base">Llibreries</div>
                </div>
            </a>
        </li>
        <li>
            <a class="py-2.5 px-5 hover:bg-light focus:bg-light" href="{{ route('posts.index') }}">
                <div class="flex flex-row md:flex-col items-center space-x-4 md:space-x-0 space-y-2 md:space-y-0 ">
                    <img class="w-10 h-10" src="/img/icons/posts.webp">
                    <div class="text-base">Publicacions</div>
                </div>
            </a>
        </li>
        <li>
            <a class="py-2.5 px-5 hover:bg-light focus:bg-light" href="">
                <div class="flex flex-row md:flex-col items-center space-x-4 md:space-x-0 space-y-2 md:space-y-0 ">
                    <img class="w-10 h-10" src="/img/icons/pages.webp">
                    <div class="text-base">Pàgines</div>
                </div>
            </a>
        </li>
        <li>
            <a class="py-2.5 px-5 hover:bg-light focus:bg-light" href="{{ route('users.index') }}">
                <div class="flex flex-row md:flex-col items-center space-x-4 md:space-x-0 space-y-2 md:space-y-0 ">
                    <img class="w-10 h-10" src="/img/icons/users.webp">
                    <div class="text-base">Usuaris</div>
                </div>
            </a>
        </li>
        <li><a class="has-icon" href="{{ route('bookstores.index')}}"><img src="/img/icons/bookstores.webp"><span>Llibreries</span></a></li>
        <li class="has-child">
            <a class="has-icon" href="{{ route('posts.index') }}"><img src="/img/icons/posts.webp"><span>Publicacions</span></a>
            {{-- <ul>
                <li><a href="">Activitats</a></li>
                <li><a href="{{ route('posts.index')}}">Articles</a></li>
            </ul>
            <span class="icon">&#8964;</span> --}}
        </li>
    </ul>
</nav>
