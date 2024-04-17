<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/static.css') }}">

    <?php
    // dd($page);
    dd(json_decode($page['contents']['form-subjects']));
    ?>

    <div class="body flex flex-col justify-between space-y-4 mb-4">
        <div class="space-y-4">
            <div id="title">
                <h2>{{ $page['contents']['h1'] }}</h2>
            </div>
            <div class="space-y-1">
                <h5 class="font-bold">{!! nl2br($page['contents']['company-name']) !!}</h5>
                <p>{!! nl2br($page['contents']['address']) !!}</p>
                <p>{!! nl2br($page['contents']['zip-code-city']) !!}</p>
            </div>
        </div>
        <hr>
        <div>
            <h4>{{$page['contents']['form-title']}}</h4>
            <form action="" method="POST" class="space-y-2">
                @csrf
                <div class="flex space-x-4">
                    <label for="">{{$page['contents']['form-subject']}}</label>
                    <select name="" id="">
                        @foreach (json_decode($page['contents']['form-subjects']) as $subject)

                        @endforeach
                    </select>
                </div>
                <div class="flex space-x-4">
                    <label for="">{{$page['contents']['form-name']}}</label>
                    <input type="text">
                </div>
                <div class="flex space-x-4">
                    <label for="">{{$page['contents']['form-name']}}</label>
                    <input type="text">
                </div>
                <div class="flex space-x-4">
                    <label for="">{{$page['contents']['form-name']}}</label>
                    <input type="text">
                </div>
            </form>
        </div>
    </div>

</x-layouts.app>
