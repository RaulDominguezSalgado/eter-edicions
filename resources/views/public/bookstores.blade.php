<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot>

    {{-- <link rel="stylesheet" href="{{ asset('css/public/bookstores.css') }}"> --}}

    <main class="body mt-20 mb-20">
        <div class="flex flex-col items-center space-y-10">
            <div class="flex flex-col items-center space-y-6">
                <h2>{{__('orthographicRules.¿')}}{{ucfirst(__('phrases.on ens podeu trobar'))}}?</h2>

                {{-- <div class="mb-8">
                    <ul class="flex space-x-4">
                        @foreach ($provinces as $province)
                            <li><a><h5>{{ $province }}</h5></a></li>
                        @endforeach
                    </ul>
                </div> --}}
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 2xl:grid-cols-8 h-auto" id="bookstores">
                @foreach ($bookstores as $bookstore)
                    <div class="bookstore w-40 px-1 mb-4">
                        <div class="p16 font-bold">
                            <a href="{{$bookstore['website']}}" target="_blank">
                                {{$bookstore['name']}}
                            </a>
                        </div>
                        <div>
                            <div class="p14">{{$bookstore['address']}}</div>
                            <div class="p14">{{$bookstore['city']}}</div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </main>

</x-layouts.app>
