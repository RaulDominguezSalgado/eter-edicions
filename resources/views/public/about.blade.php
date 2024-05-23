<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $webTitle }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/static.css') }}">

    <main class="flex flex-col items-center space-y-16 md:px-8 mb-32">
        <div class="max-w-6xl  space-y-4">
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
