<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/catalog.css') }}">

    <main class="body">
        <div class="flex flex-col items-center space-y-14">
            <div class="flex flex-col items-center space-y-6">
                <h2>{{__('general.catalog')}}</h2>

                {{-- <div class="mb-8">
                    <ul class="flex space-x-4">
                        @foreach ($collections as $i => $collection)
                            <li><a><h5>{{ $collection['name'] }}</h5></a></li>
                        @endforeach
                    </ul>
                </div> --}}
            </div>
            <div id="catalog-tabs">
                <div id="tabs-links" class="w-full pb-20">
                    <ul class="flex justify-between w-full">
                        <li class="active">Tots els llibres</li>
                        @foreach($collections as $collection)
                            <li>{{ $collection["name"] }}</li>
                        @endforeach
                    </ul>
                </div>
                <div id="tabs-contents">
                    <div style="border-bottom: 1px solid black;" class="tab-content w-full flex flex-wrap justify-center h-auto px-16 catalog" id="catalog{{ $collection["name"] }}">
                        @foreach ($books as $i => $book)
                            <x-partials.bookPreview :locale="$locale" :book="$book" :i="$i"/>
                        @endforeach
                    </div>
                    @foreach ($collections as $collection)
                        <div style="border-bottom: 1px solid black;" class="tab-content w-full flex flex-wrap justify-center h-auto px-16 catalog" id="catalog{{ $collection["name"] }}">
                            @foreach ($books as $i => $book)
                                @foreach ($book["collections"] as $bookCollection)
                                    @if ($collection["id"] === $bookCollection[0])
                                        <x-partials.bookPreview :locale="$locale" :book="$book" :i="$i"/>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    <script src="/js/catalog/tabs.js"></script>
</x-layouts.app>
