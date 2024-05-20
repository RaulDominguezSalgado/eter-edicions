<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $webTitle }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/static.css') }}">

    <main class="body flex flex-col items-center px-8 space-y-16 mb-32">
        <div class="content w-2/3  space-y-4">
            <div id="title">
                <h2>{{$page['contents']['h1']}}</h2>
            </div>
            <div>
                <p class="text-justify">{!! nl2br($page['contents']['p1']) !!}</p>
            </div>
        </div>
        <div class="flex justify-center">
            <img src="{{asset('img/logo/xl/logo_eter_black.webp')}}" alt="Logotip d'Èter Edicions" style="height: 15em">
        </div>
    </main>

</x-layouts.app>
