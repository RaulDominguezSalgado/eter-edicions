<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/static.css') }}">

    <?php
    // dd($page);
    // dd(json_decode(($page['contents']['form-subjects'])));
    ?>

    <div class="body flex flex-col justify-between items-center space-y-8 mb-12">
        {{-- <div class="space-y-4 ">
            <div id="title">
                <h2>{{ $page['contents']['h1'] }}</h2>
            </div>
            <div class="space-y-1">
                <h5 class="font-bold">{!! nl2br($page['contents']['company-name']) !!}</h5>
                <p>{!! nl2br($page['contents']['address']) !!}</p>
                <p>{!! nl2br($page['contents']['zip-code-city']) !!}</p>
            </div>
        </div> --}}
        <div class="space-y-4 w-1/2">
            <div id="title">
                <h2>{{ $page['contents']['h1'] }}</h2>
            </div>
            <div class="space-y-1">
                <p>{{ $page['contents']['p1'] }}</p>
            </div>
        </div>
        {{-- <hr> --}}
        <div class="w-1/2">
            <h4>{{$page['contents']['form-title']}}</h4>
            <form action="" method="POST" class="w-full flex flex-col items-center space-y-4">
                @csrf
                <div class="w-full flex justify-between space-x-4">
                    <div class="flex flex-col space-y-2 grow">
                        <label for="form-name">{{$page['contents']['form-name']}}</label>
                        <input type="text" name="name" id="form-name">
                    </div>
                    <div class="flex flex-col space-y-2 grow">
                        <label for="form-email">{{$page['contents']['form-email']}}</label>
                        <input type="text" name="email" id="form-email">
                    </div>
                </div>
                <div class="w-full flex flex-col space-y-2 ">
                    <label for="form-subject">{{$page['contents']['form-subject']}}</label>
                    <select name="subject" id="form-subject">
                        @foreach (json_decode($page['contents']['form-subjects']) as $subject)
                            {{-- <p></p> --}}
                            <option value={{$subject}}>{{$subject}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full flex flex-col space-y-2 ">
                    <label for="form-message">{{$page['contents']['form-message']}}</label>
                    <textarea name="message" cols="30" rows="8" id="form-message"></textarea>
                </div>
                <button type="submit" class="px-6 py-3 border border-black bg-black text-white hover:bg-white hover:text-black disabled:bg-slate-500 disabled:hover:text-white" disabled>{{$page['contents']['send-button']}}</button>
            </form>
        </div>
    </div>

</x-layouts.app>
