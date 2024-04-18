<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/static.css') }}">

    <?php
    // dd($page);
    ?>

    <main class="body content w-2/3 flex flex-col justify-between space-y-8 mb-4">
        <div class="space-y-4">
            <div id="title">
                <h2>{{ $page['contents']['title'] }}</h2>
            </div>
            <div class="space-y-4">
                <div class="flex space-x-8">
                    {{-- <div class="">
                        <p class="text-justify">{!! nl2br($page['contents']['p1']) !!}</p>
                        <p>{!! nl2br($page['contents']['more-info']) !!}</p>
                    </div> --}}
                    <div class="">
                        <p class="text-justify">{!! nl2br($pageEn['contents']['p1']) !!}</p>
                        <p>{!! nl2br($pageEn['contents']['more-info']) !!}</p>
                    </div>
                </div>
                <div>
                    <h4>{{ $page['contents']['agency'] }}</h5>
                    <div class="flex space-x-4">
                        <h5>{{ $page['contents']['contact-person'] }}</h5>
                        <h5>{{ $page['contents']['contact-email'] }}</h5>
                    </div>
                </div>
            </div>
        </div>
        {{-- <hr>
        <div>
            <a href="{{asset("files/foreign-rights/{$page['contents']['download-file']}")}}" class="flex space-x-4">
                <img src="{{asset('img/icons/pdf-download.webp')}}" alt="Download PDF" style="width: 1.8125em">
                <p>{{$pageEn['contents']['download-label']}}</p>
            </a>
        </div> --}}
    </main>

</x-layouts.app>
