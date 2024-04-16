<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot>

    {{-- <link rel="stylesheet" href="{{ asset('css/public/bookstores.css') }}"> --}}

    <div class="body mt-20 mb-20">
        <div class="flex flex-col items-center space-y-10">
            <div class="flex flex-col items-center space-y-6">
                <h2>On ens podeu trobar?</h2>

                {{-- <div class="mb-8">
                    <ul class="flex space-x-4">
                        @foreach ($provinces as $province)
                            <li><a><h5>{{ $province }}</h5></a></li>
                        @endforeach
                    </ul>
                </div> --}}
            </div>

            <div class="grid grid-cols-6 h-auto" id="bookstores">
                @foreach ($bookstores as $bookstore)
                    <div class="bookstore w-40">
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
    </div>

</x-layouts.app>
