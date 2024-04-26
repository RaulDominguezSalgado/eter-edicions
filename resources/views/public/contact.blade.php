<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/static.css') }}">

    <main class="body flex flex-col justify-between items-center space-y-8 mb-12">
        <div class="space-y-4 content w-2/3">
            <div id="title">
                <h2>{{ $page['contents']['h1'] }}</h2>
            </div>
            <div class="space-y-1">
                <p class="text-justify">{{ $page['contents']['p1'] }}</p>
            </div>
        </div>
        {{-- <hr> --}}
        <div class="content w-2/3">
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
    </main>

</x-layouts.app>
