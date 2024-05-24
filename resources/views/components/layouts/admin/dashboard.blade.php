<?php
if (Auth::user()->role_id == 1) {
    $options = [
        ['name' => 'Comandes', 'image' => '/img/icons/order.webp', 'routeName' => 'orders.index', 'message' => 'Gestió de les comandes', 'visible' => true],
        ['name' => 'Catàleg', 'image' => '/img/icons/catalog.webp', 'routeName' => 'books.index', 'message' => "Gestió dels llibres del catàleg de l'editorial", 'visible' => true],
        ['name' => 'Col·leccions', 'image' => '/img/icons/collections.webp', 'routeName' => 'collections.index', 'message' => "Gestió de les col·leccions del catàleg de l'editorial", 'visible' => true],
        ['name' => 'Col·laboradors', 'image' => '/img/icons/collaborators.webp', 'routeName' => 'collaborators.index', 'message' => "Gestió dels autors i traductors de l'editorial", 'visible' => true],
        ['name' => 'Llibreries', 'image' => '/img/icons/bookstores.webp', 'routeName' => 'bookstores.index', 'message' => "Gestió de les llibreries amb llibres de l'editorial", 'visible' => true],
        ['name' => 'Publicacions', 'image' => '/img/icons/posts.webp', 'routeName' => 'posts.index', 'message' => 'Gestió de les activitats i articles de la web', 'visible' => true],
        ['name' => 'Pàgines', 'image' => '/img/icons/pages.webp', 'routeName' => 'pages.index', 'message' => 'Gestió del contingut de les pàgines de la web', 'visible' => false],
        ['name' => 'Usuaris', 'image' => '/img/icons/users.webp', 'routeName' => 'users.index', 'message' => 'Gestió dels usuaris privats de la web', 'visible' => true],
        ['name' => 'Configuració', 'image' => '/img/icons/settings.webp', 'routeName' => 'general-settings.index', 'message' => 'Gestió dels paràmetres generals de la web', 'visible' => true],
    ];
} else {
    $options = [
        ['name' => 'Publicacions', 'image' => '/img/icons/posts.webp', 'routeName' => 'posts.index', 'message' => 'Gestió de les activitats i articles de la web', 'visible' => true],
        ['name' => 'Pàgines', 'image' => '/img/icons/pages.webp', 'routeName' => 'pages.index', 'message' => 'Gestió del contingut de les pàgines de la web', 'visible' => false]
    ];
}

$visibleOptions = [];
foreach($options as $option){
    if($option['visible']){
        $visibleOptions[]=$option;
    }
}
?>
<x-layouts.admin.app>
    {{-- <h1>Dashboard</h1> --}}
    <div class="space-y-2">
        <h2>Hola, {{ Auth::user()->first_name }}!</h2>
        <p>Benvingut al Back Office de la web d’Èter Edicions. Des d’aquí pots gestionar el contingut de la web.</p>
    </div>

    {{-- @dump(Auth::user()) --}}
    {{-- @dump($options) --}}

    {{-- <div class="flex flex-wrap items-center space-x-10"> --}}
    <div class="flex justify-center">
        <div class=" flex flex-wrap justify-center">
            @foreach ($options as $option)
                @if ($option['visible'])
                    <div class="w-[14em] h-[14em] flex flex-col items-center border border-dark py-2.5 px-5 mx-5 mb-10 hover:bg-surfacedark focus:bg-surfacedark active:bg-surfacedark @if (Route::currentRouteName() == 'orders.index') bg-surfacedark @endif"
                        onmouseover ="showMessage(this)" onmouseout="hideMessage(this)">
                        <a href="{{ route($option['routeName']) }}">
                            <div class="flex flex-row md:flex-col items-center space-y-2.5 py-5">
                                <img class="w-[90px] h-[90px]" src={{ $option['image'] }}>
                                <h4 class="font-semibold">{{ $option['name'] }}</h4>
                                <p class="message hidden max-w-40 p12 text-center">{{$option['message']}}</p>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-layouts.admin.app>
<script src="{{asset('js/admin/dashboard.js')}}"></script>
