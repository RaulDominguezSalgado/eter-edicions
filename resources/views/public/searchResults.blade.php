<?php
    $locale = 'ca';
?>
<x-layouts.app>
    <h1 class="text-center">Resultats de cerca per a "{{ $results['term'] }}".</h1>
    <x-partials.searchBar :term="$results['term']"></x-partials.searchBar>
    @if ($results['books'] != [])
        <h2>Llibres</h2>
        <div class="w-full flex flex-wrap justify-center space-x-10 h-auto px-16" id="catalog">
            @foreach ($results['books'] as $i => $book)
                <div class="book flex flex-col items-center mb-6">
                    <div class="cover mb-4">
                        <a href="{{ route("book-detail.{$locale}", $book['id']) }}">
                            <img src="{{ asset('img/books/thumbnails/' . $book['image']) }}"
                                alt="{{ $book['title'] }}" style="height: 19.7em">
                        </a>
                    </div>
                    <div id="book-info-{{ $book['slug'] }}" class="flex flex-col items-center space-y-2 w-64">
                        <div class="book-title w-fit h-12 flex justify-center items-center text-center">{{ $book['title'] }}</div>
                        <div class="flex space-x-1">
                            @foreach ($book['collaborators']['authors'] as $author)
                                {{-- if not last iteration --}}
                                @if (!$loop->last)
                                    <div class="book-author">{{ $author['full_name'] }},</div>
                                    {{-- if last iteration --}}
                                @else
                                    <div class="book-author">{{ $author['full_name'] }}</div>
                                @endif
                            @endforeach
                        </div>

                        <div class="book-translator flex space-x-1 text-center">
                            <div class="book-translator">Traducció de
                            @foreach ($book['collaborators']['translators'] as $translator)
                                @if (!$loop->last)
                                    {{ $translator['full_name'] }},
                                    {{-- if last iteration --}}
                                @else
                                    {{ $translator['full_name'] }}
                                @endif
                            @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    @endif
    @if ($results['authors'] != [])
        <h2>Autors</h2>
        <div class="w-full grid xl:grid-cols-4 lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 px-16" id="catalog">
            @foreach ($results['authors'] as $i => $author)
                <div class="collaborator flex flex-col items-center mb-6">
                    <div class="cover mb-2">
                        <a href="{{ route("collaborator-detail.{$locale}", $author['id']) }}">
                            <img src="{{ asset('img/collab/thumbnails/' . $author['image']) }}"
                                alt="{{ $author['first_name'] }} {{ $author['last_name'] }}"
                                style="height: 19.7em">
                        </a>
                    </div>
                    <div id="author-info-{{ $author['slug'] }}"
                        class="flex flex-col items-center space-y-2 w-64">
                        <div class="book-title w-fit h-12 flex justify-center items-center text-center">
                            {{ $author['first_name'] }} {{ $author['last_name'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    @if ($results['translators'] != [])
        <h2>Traductors</h2>
        <div class="w-full grid grid-cols-4 px-16" id="catalog">
            @foreach ($results['translators'] as $i => $translator)
                <div class="collaborator flex flex-col items-center mb-6">
                    <div class="cover mb-2">
                        <a href="{{ route("collaborator-detail.{$locale}", $translator['id']) }}">
                            <img src="{{ asset('img/collab/thumbnails/' . $translator['image']) }}"
                                alt="{{ $translator['first_name'] }} {{ $translator['last_name'] }}"
                                style="height: 19.7em">
                        </a>
                    </div>
                    <div id="author-info-{{ $translator['slug'] }}"
                        class="flex flex-col items-center space-y-2 w-64">
                        <div class="book-title w-fit h-12 flex justify-center items-center text-center">
                            {{ $translator['first_name'] }} {{ $translator['last_name'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    @if ($results['articles'] != [])
        <h2>Publicacions</h2>
    @endif
    @if ($results['activities'] != [])
        <h2>Events</h2>
    @endif
</x-layouts.app>