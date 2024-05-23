<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $webTitle }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/static.css') }}">

    <main class="flex flex-col justify-between items-center space-y-8 md:px-8 mb-12">
        <div class="w-full max-w-6xl space-y-4">
            <div id="title">
                <h2>{{ $page['contents']['h1'] }}</h2>
            </div>
            <div class="space-y-1">
                <p class="text-justify">{{ $page['contents']['p1'] }}</p>
            </div>
        </div>

        <div class="w-full max-w-6xl space-y-4">
            <span><strong>{{__('form.email')}}:</strong></span>
            <span>{{$contactInfo['general_email']}}</span>
        </div>

        {{-- @dump($contactInfo) --}}
        {{-- <hr> --}}
        {{-- <div class="w-full max-w-6xl">
            <h4>{{$page['contents']['form-title']}}</h4>
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">{{ session('success') }}</strong>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            onclick="removeParentDiv(this.parentNode)">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-systemerror" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            onclick="removeParentDiv(this.parentNode)">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            @endif
            <form action="{{ route("contact.send.{$locale}") }}" method="POST" class="w-full flex flex-col items-center space-y-4 validate">
                @csrf
                <div class="w-full md:flex md:justify-between md:space-x-4">
                    <div class="flex flex-col space-y-2 grow mb-4">
                        <label for="form-name">{{$page['contents']['form-name']}}</label>
                        <input class="field required" type="text" name="name" id="form-name" class="field required">
                        <small class="text-systemerror">@error('name'){{ $message }}@enderror</small>
                    </div>
                    <div class="flex flex-col space-y-2 grow mb-4">
                        <label for="form-email">{{$page['contents']['form-email']}}</label>
                        <input class="field required email" type="text" name="email" id="form-email">
                        <small class="text-systemerror">@error('email'){{ $message }}@enderror</small>
                    </div>
                </div>
                <div class="w-full flex flex-col mb-4">
                    <label for="form-subject">{{$page['contents']['form-subject']}}</label>
                    <select class="field required" name="subject" id="form-subject">
                        <option value="" selected disabled>{{__('form.select-subject')}}</option>
                        @foreach (json_decode($page['contents']['form-subjects']) as $subject)
                            <option value={{$subject}}>{{$subject}}</option>
                        @endforeach
                    </select>
                    <small class="text-systemerror">@error('subject'){{ $message }}@enderror</small>
                </div>
                <div class="w-full flex flex-col mb-4">
                    <label for="form-message">{{$page['contents']['form-message']}}</label>
                    <textarea class="field required" name="message" cols="30" rows="8" id="form-message"></textarea>
                    <small class="text-systemerror">@error('message'){{ $message }}@enderror</small>
                </div>
                <button disabled type="submit" class="px-6 py-3 border border-black bg-black text-white hover:bg-white hover:text-black disabled:bg-slate-500 disabled:hover:text-white">{{$page['contents']['send-button']}}</button>
            </form>
        </div> --}}
    </main>

</x-layouts.app>
<script src="{{asset('/js/front/validations.js')}}"></script>
