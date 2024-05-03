<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/collaborator.css') }}">

    {{-- @dump($collaborator) --}}

    <main class="body space-y-24 mb-12">
        <div class="collaborator flex justify-between space-x-10 px-10 mb-4">
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
        </div>

        @if($collaborator['books'] && count($collaborator['books'])>0)
        <div id="books" class="flex flex-col items-center space-y-4">
            <h2>{{__('general.books-available')}}</h2>

            <div class="flex">
                @foreach ($collaborator['books'] as $i => $book)
                <div class="book flex flex-col items-center mb-6 w-64 px-6">
                    <div class="cover mb-4 flex justify-center">
                        <a href="{{ route("book-detail.{$locale}", $book['id']) }}">
                            <img src="{{ asset('img/books/thumbnails/' . $book['image']) }}"
                                alt="{{ $book['title'] }}" style="height: 13.75em" class="aspect-[2/3]">
                        </a>
                    </div>
                    <div id="book-info-{{ $book['slug'] }}" class="flex flex-col items-center space-y-2 w-full">
                        <div class="book-title flex justify-center items-center text-center">
                            {{ $book['title'] }}
                        </div>
                    </div>

                </div>
            @endforeach
            </div>
        </div>
        @endif
    </main>

</x-layouts.app>

