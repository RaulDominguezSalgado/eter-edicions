<?php
$locale = 'ca';
?>
<x-layouts.app>
    <link rel="stylesheet" href="/css/public/search.css">
    <div id="searchData">
        <input type="hidden" id="term" value="{{ $results['term'] }}">
    </div>
    <h1 class="text-center">
        @if (isset($results))
            {{ ucfirst(__('phrases.resultats de cerca')) }} {{ __('orthographicRules.with_de') }}
            "{{ $results['term'] }}"
        @else
            {{ ucfirst(__('phrases.faci una cerca')) }}
        @endif
    </h1>
    <div class="flex justify-center mb-10">
        <x-partials.searchBar :term="$results['term'] ?? ''"></x-partials.searchBar>
    </div>
    @if (isset($results) && ($results['books'] != [] || $results['collaborators'] != [] || $results['activities'] != [] || $results['articles'] != []))
        @if ($results['books'] != [])
            <h2 class="text-center mb-8">{{ trans_choice('words.llibre', 2) }}</h2>
            <div class="results-container w-full flex flex-wrap justify-center space-x-10 h-auto px-16 mb-40"
                id="catalog">
                @foreach ($results['books'] as $i => $book)
                    @if ($book['visible'])
                        <div class="book w-auto max-w-[40em] flex flex-col items-center mb-6">
                            <div class="cover mb-4">
                                <a href="{{ route("book-detail.{$locale}", $book['id']) }}">
                                    <img src="{{ asset('img/books/thumbnails/' . $book['image']) }}"
                                        alt="{{ $book['title'] }}" style="height: 19.7em">
                                </a>
                            </div>
                            <div id="book-info-{{ $book['slug'] }}" class="flex flex-col items-center space-y-2 w-64">
                                <div class="book-title w-fit h-12 text-center">
                                    {{-- @if ($book['filter']['key'] == 'title' && $book['filter']['value'])
                                        <div>{{ $book['filter']['value'][0] }}<span class="bg-secondary">{{ $book['filter']['value'][1]}}</span>{{$book['filter']['value'][2] }}</div>
                                    @else --}}
                                    <div>{{ $book['title'] }}</div>
                                    {{-- @endif --}}
                                </div>
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

                                @if (array_key_exists('translators', $book))
                                    <div class="book-translator flex space-x-1 text-center">
                                        <div class="book-translator">{{ __('general.translation') }}
                                            {{ $locale == 'ca' ? (\App\Services\Translation\OrthographicRules::startsWithDe('de ' . $book['translators'][0]) ? __('orthographicRules.with_d') : __('orthographicRules.with_de')) : __('orthographicRules.by') }}<!--
                                        @foreach ($book['translators'] as $translator)
                                            @if ($loop->first && !$loop->last)
                                                -->{{ $translator }},
                                            @elseif($loop->first && $loop->last)
                                                -->{{ $translator }}
                                            @elseif (!$loop->last)
                                                {{ $translator }},
                                                {{-- if last iteration --}}
                                            @else
                                                {{ $translator }}
                                            @endif
                                        @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                            {{-- @if ($book['filter']['key'] == 'description' && $book['filter']['value'])
                                <p class="book-description"><small>{{ $book['filter']['value'][0]}}<span class="bg-secondary">{{$book['filter']['value'][1]}}</span>{{$book['filter']['value'][2] }}</small></p>
                            @else --}}
                            <p class="book-description text-justify"><small>{{ $book['description'] }}</small></p>
                            {{-- @endif --}}
                        </div>
                    @endif
                @endforeach
            </div>
        @endif

        @if ($results['collaborators'] != [])
        <h2 class="text-center mb-8">{{trans_choice('general.authors',2)}} {{__('orthographicRules.and')}} {{trans_choice('general.translators',2)}}</h2>
        <div class="results-container w-full grid xl:grid-cols-4 lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 px-16 mb-40"
            id="catalog">
            @foreach ($results['collaborators'] as $i => $author)
                <div class="collaborator flex flex-col items-center mb-6 m-5">
                    <div class="cover mb-2">
                        <a href="{{ route("collaborator-detail.{$locale}", $author['id']) }}">
                            <img src="{{ asset('img/collab/thumbnails/' . $author['image']) }}"
                                alt="{{ $author['first_name'] }} {{ $author['last_name'] }}" style="height: 19.7em">
                        </a>
                    </div>
                    <div id="author-info-{{ $author['slug'] }}" class="flex flex-col items-center space-y-2 w-64">
                        <div class="collaborator-name w-fit h-12 flex justify-center items-center text-center">
                            {{ $author['first_name'] }} {{ $author['last_name'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif

        @if ($results['activities'] != [])
        <h2 class="text-center mb-8">{{__('general.activities')}}</h2>
        <div class="results-container w-full flex flex-wrap justify-center space-x-10 space-y-10 h-auto px-16 mb-40"
            id="catalog">
            @foreach ($results['activities'] as $i => $post)
                <div class="post space-y-2">
                    <div class="">
                        <h5 class="post-title font-bold">{{ $post['title'] }}</h5>
                    </div>
                    <div class="cover space-y-4">
                        <a href="{{ route("post-detail.{$locale}", $post['id']) }}">
                            <img src="{{ asset('img/posts/thumbnails/' . $post['image']) }}"
                                alt="{{ $post['title'] }}">
                        </a>
                    </div>
                    <div class="headline">
                        <div class="">
                            <p class="uppercase">{{ $post['title'] }}</p>
                        </div>
                        <div class="date-info h-auto">
                            <div class="w-fit">
                                <p class="p12">{{ $post['date'] }}</p>
                            </div>
                            <div>
                                <p class="p12">{{ $post['location'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="post-description">
                        <p class="p14">{{ $post['description'] }}</p>
                    </div>
                    <div class="w-fit">
                        <a href="{{ route('post-detail.ca', $post['id']) }}">
                            <p class="p14 underline">{{__('general.read-more')}}</p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        @endif
        @if ($results['articles'] != [])
        <h2 class="text-center mb-8">{{__('general.posts')}}</h2>
        <div class="results-container w-full flex flex-wrap justify-center space-x-10 space-y-10 h-auto px-16 mb-40"
            id="catalog">
            @foreach ($results['articles'] as $i => $post)
                <div class="post space-y-2">
                    <div class="">
                        <h5 class="post-title font-bold">{{ $post['title'] }}</h5>
                    </div>
                    <div class="cover space-y-4">
                        <a href="{{ route("post-detail.{$locale}", $post['id']) }}">
                            <img src="{{ asset('img/posts/thumbnails/' . $post['image']) }}"
                                alt="{{ $post['title'] }}">
                        </a>
                    </div>
                    <div class="headline">
                        <div class="">
                            <p class="uppercase">{{ $post['title'] }}</p>
                        </div>
                        <div class="date-info h-auto">
                            <div class="w-fit">
                                <p class="p12">{{ $post['date'] }}</p>
                            </div>
                            <div>
                                <p class="p12">{{ $post['location'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="post-description">
                        <p class="p14">{{ $post['description'] }}</p>
                    </div>
                    <div class="w-fit">
                        <a href="{{ route('post-detail.ca', $post['id']) }}">
                            <p class="p14 underline">{{__('general.read-more')}}</p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        @endif

    @else
        <div>{{__("phrases.no s'ha trobat cap resultat")}}</div>
    @endif

</x-layouts.app>
<script src="/js/search/search.js"></script>
