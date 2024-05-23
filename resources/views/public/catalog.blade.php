<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $webTitle }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/catalog.css') }}">

    <main class="body">
        <div class="flex flex-col items-center space-y-8 lg:space-y-16">
            <div class="w-full flex flex-col items-center space-y-6">
                <h2>{{ __('general.catalog') }}</h2>

                <div id="catalog-tabs" class="w-full">
                    <div id="tabs-links" class="mb-16">
                        <ul class=" flex flex-wrap justify-center space-x-4">
                            <li class="active h-9 px-2 text-base mb-2">{{ __('general.all-books') }}</li>
                            @foreach ($collections as $i => $collection)
                                <li class="h-9 px-2 text-base mb-2">{{ $collection['name'] }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div id="tabs-contents">
                        <div class="tab-content active w-full flex flex-wrap justify-center h-auto px-4" id="catalog">
                            @foreach ($books as $i => $book)
                                <x-partials.bookPreview :locale="$locale" :book="$book" :i="$i" />
                            @endforeach
                        </div>
                        @foreach ($collections as $collection)
                            <div class="mb-20 tab-content w-full flex flex-wrap justify-center h-auto px-16 catalog"
                                id="catalog{{ $collection['name'] }}">
                                <?php $bookCounter = 0;
                                ?>
                                @foreach ($books as $i => $book)
                                    @foreach ($book['collections'] as $bookCollection)
                                        @if ($collection['id'] === $bookCollection[0])
                                            <x-partials.bookPreview :locale="$locale" :book="$book"
                                                :i="$i" />
                                            <?php $bookCounter = $bookCounter + 1;
                                            ?>
                                        @endif
                                    @endforeach
                                @endforeach
                                @if ($bookCounter == 0)
                                    <p>{{ __('Encara no hi han llibres en aquesta col·lecció') }}.</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layouts.app>
<!-- Tabs script -->
<script src="/js/catalog/tabs.js"></script>














{{-- Raul --}}
{{-- <x-layouts.app>

    <main class="body">
        <div class="flex flex-col items-center space-y-14">

            <!-- Titular -->
            <div class="flex flex-col items-center space-y-6">
                <h2>{{ 'general.catalog' }}</h2>
            </div>


            <!-- Pestanas -->
            <div id="catalog-tabs">


                <div id="tabs-links" class="w-full pb-20">
                    <ul class="flex justify-center w-full">
                        <li class="active px-5 text-xl">{{ __('general.all-books') }}</li>
                        @foreach ($collections as $collection)
                            <li class="px-5 text-xl">{{ $collection['name'] }}</li>
                        @endforeach
                    </ul>
                </div>



                <div id="tabs-contents">
                    <div class="active mb-20 tab-content w-full flex flex-wrap justify-center h-auto px-16 catalog"
                        id="catalog{{ $collection['name'] }}">
                        @foreach ($books as $i => $book)
                            <x-partials.bookPreview :locale="$locale" :book="$book" :i="$i" />
                        @endforeach
                    </div>
                    @foreach ($collections as $collection)
                        <div class="mb-20 tab-content w-full flex flex-wrap justify-center h-auto px-16 catalog"
                            id="catalog{{ $collection['name'] }}">
                            <?php // $libros = 0;
                            ?>
                            @foreach ($books as $i => $book)
                                @foreach ($book['collections'] as $bookCollection)
                                    @if ($collection['id'] === $bookCollection[0])
                                        <x-partials.bookPreview :locale="$locale" :book="$book" :i="$i" />
                                        <?php // $libros = $libros + 1;
                                        ?>
                                    @endif
                                @endforeach
                            @endforeach
                            @if ($libros == 0)
                                <p>Encara no hi han llibres en aquesta col·lecció</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>






        </div>
    </main>
    <!-- Script funcionamiento pestanas -->
    <script src="/js/catalog/tabs.js"></script>
</x-layouts.app> --}}
