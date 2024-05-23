<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $webTitle }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/collaborator.css') }}">

    {{-- @dump($collaborator) --}}

    <main class="md:px-6 max-w-6xl space-y-24 mb-12">
        <div class="collab">
            <div class="mb-12 md:mb-16">
                <a href="{{ route("collaborator-detail.{$locale}", $collaborator['slug']) }}">
                    <h3 class="font-bold mb-3">{{ $collaborator['first_name'] }}
                        {{ $collaborator['last_name'] }}
                    </h3>
                </a>
                <div class="w-full pic mb-3">
                    <a class="md:float-start md:mr-6 mb-2.5"
                        href="{{ route("collaborator-detail.{$locale}", $collaborator['slug']) }}">
                        <img class="md:min-w-[13.5em] md:max-w-[18em] md:min-h-[11.8em] md:max-h-[12.85em]"
                            src="{{ asset('img/collab/covers/' . $collaborator['image']) }}"
                            alt="Fotografia de {{ $collaborator['first_name'] }} {{ $collaborator['last_name'] }}">
                    </a>
                </div>
                <p class="text-justify">{{ $collaborator['biography'] }}</p>
            </div>
            <br class="clear-both">
            @if ($collaborator['books'] && count($collaborator['books']) > 0)
                <div id="books" class="flex flex-col items-center space-y-4">
                    <h2 class="text-center">{{ __('general.books-available') }}</h2>

                    <div class="flex flex-wrap justify-center">
                        @foreach ($collaborator['books'] as $i => $book)
                            <div class="related-book flex flex-col items-center mb-6 w-36 md:w-48 lg:w-64 mx-3 lg:px-6">
                                <div class="cover mb-4 flex justify-center relative">
                                    <a href="{{ route("book-detail.{$locale}", $book['slug']) }}">
                                        <img src="{{ asset('img/books/thumbnails/' . $book['image']) }}"
                                            alt="{{ $book['title'] }}" style="height: 13.75em" class="aspect-[2/3]">
                                    </a>
                                </div>
                                <a id="book-info-{{ $book['slug'] }}"
                                    class="flex flex-col items-center space-y-2 w-full"
                                    href="{{ route("book-detail.{$locale}", $book['slug']) }}">
                                    <div class="book-title flex justify-center items-center text-center">
                                        {{ $book['title'] }}
                                    </div>
                                </a>
                            </div>

                            {{-- <div class="book flex flex-col items-center mb-6 w-64 px-6">
                                <div class="cover mb-4 flex justify-center">
                                    <a href="{{ route("book-detail.{$locale}", $book['slug']) }}">
                                        <img src="{{ asset('img/books/thumbnails/' . $book['image']) }}"
                                            alt="{{ $book['title'] }}" style="height: 13.75em" class="aspect-[2/3]">
                                    </a>
                                </div>
                                <div id="book-info-{{ $book['slug'] }}"
                                    class="flex flex-col items-center space-y-2 w-full">
                                    <div class="book-title flex justify-center items-center text-center">
                                        {{ $book['title'] }}
                                    </div>
                                </div>

                            </div> --}}
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        {{-- <div class="collaborator flex justify-between space-x-10 px-10 mb-4">
            <div class="mr-6 cover">
                <img class="" src="{{ asset('img/collab/covers/' . $collaborator['image']) }}" alt="{{ $collaborator['first_name'] . " " . $collaborator['last_name'] }}">
            </div>
            <div class="details space-y-9">
                <div class="flex flex-row justify-between items-center">
                    <h2>{{ $collaborator['first_name'] . " " . $collaborator['last_name'] }}</h2>
                </div>
                <div id="description" class="text-justify">
                    <p>{{ $collaborator['biography'] }}</p>
                </div>
            </div>
        </div> --}}
    </main>

</x-layouts.app>
