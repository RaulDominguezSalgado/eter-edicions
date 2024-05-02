<?php
// $locale = 'ca';
// // Get the locale from the app or fallback to the URL
// $locale = app()->getLocale() ?: request()->segment(1) ?: 'ca';

$locale = app()->getLocale() ?: 'ca';
?>
<x-layouts.app>


    <h1 class="text-center">{{ucfirst(__('phrases.resultats de cerca'))}} {{__('orthographic-rules.per a')}} "{{ $results['term'] }}".</h1>
    <div class="flex justify-center mb-20">
        <x-partials.searchBar :term="$results['term']"></x-partials.searchBar>
    </div>
    @if ($results['books'] != [])
        <h2 class="text-center mb-8">Llibres</h2>
        <div class="w-full flex flex-wrap justify-center space-x-10 h-auto px-16 mb-40" id="catalog">
            @foreach ($results['books'] as $i => $book)
                <div class="book flex flex-col items-center mb-6">
                    <div class="cover mb-4">
                        <a href="{{ route("book-detail.{$locale}", $book['id']) }}">
                            <img src="{{ asset('img/books/thumbnails/' . $book['image']) }}" alt="{{ $book['title'] }}"
                                style="height: 19.7em">
                        </a>
                    </div>
                    <div id="book-info-{{ $book['slug'] }}" class="flex flex-col items-center space-y-2 w-64">
                        <div class="book-title w-fit h-12 flex justify-center items-center text-center">
                            {{ $book['title'] }}</div>
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
                    {{-- @dd($book['filter']) --}}
                    @if ($book['filter']['key'] == 'description' && $book['filter']['value'])
                        <p><small>
                                @foreach ($book['filter']['value'][0] as $word)
                                    {{-- iterate through arrays of words previous to the result --}}
                                    @if (!$loop->last)
                                        <span>{!! $word !!}</span>
                                    @else
                                        <span>{!! $word !!}</span><!-- {{-- iterate through arrays of words previous to the result --}}
@endif
@endforeach
                                        --><span class="bg-secondary">{{ $book['filter']['value'][1] }}</span><!--
                                @foreach ($book['filter']['value'][2] as $word)
{{-- iterate through arrays of words after the result --}}
                                    @if ($loop->first)
--><span>{!! $word !!} </span>
                                    @else
                                        <span>{!! $word !!} </span>
                                    @endif
                                @endforeach
                            </small></p>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
    {{-- @if ($results['collaborators'] != [])
        <h2 class="text-center mb-8">Col·laboradors</h2>
        <div class="w-full grid xl:grid-cols-4 lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 px-16 mb-40" id="catalog">
            @foreach ($results['collaborators'] as $i => $author)
                <div class="collaborator flex flex-col items-center mb-6 m-5">
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
    @if ($results['activities'] != [])
        <h2 class="text-center mb-8">Activitats</h2>
        <div class="w-full flex flex-wrap justify-center space-x-10 h-auto px-16 mb-40" id="catalog">
            @foreach ($results['activities'] as $i => $post)
                <div class="post space-y-2">
                    <div class="">
                        <h5 class="font-bold">{{$post['title']}}</h5>
                    </div>
                    <div class="cover space-y-4">
                        <a href="{{ route("post-detail.{$locale}", $post['id']) }}">
                            <img src="{{ asset('img/posts/thumbnails/' . $post['image']) }}"
                                alt="{{ $post['title'] }}">
                        </a>
                    </div>
                    <div class="headline">
                        <div class="">
                            <p class="uppercase">{{$post['title']}}</p>
                        </div>
                        <div class="date-info h-auto">
                            <div class="w-fit">
                                <p class="p12">{{$post['date']}}</p>
                            </div>
                            <div>
                                <p class="p12">{{$post['location']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="description">
                        <p class="p14">{{$post['description']}}</p>
                    </div>
                    <div class="w-fit">
                        <a href="{{route('post-detail.ca', $post['id'])}}">
                            <p class="p14 underline">Saber-ne més</p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    @if ($results['articles'] != [])
        <h2 class="text-center mb-8">Publicacions</h2>
        <div class="w-full flex flex-wrap justify-center space-x-10 h-auto px-16 mb-40" id="catalog">
            @foreach ($results['articles'] as $i => $post)
                <div class="post space-y-2">
                    <div class="">
                        <h5 class="font-bold">{{$post['title']}}</h5>
                    </div>
                    <div class="cover space-y-4">
                        <a href="{{ route("post-detail.{$locale}", $post['id']) }}">
                            <img src="{{ asset('img/posts/thumbnails/' . $post['image']) }}"
                                alt="{{ $post['title'] }}">
                        </a>
                    </div>
                    <div class="headline">
                        <div class="">
                            <p class="uppercase">{{$post['title']}}</p>
                        </div>
                        <div class="date-info h-auto">
                            <div class="w-fit">
                                <p class="p12">{{$post['date']}}</p>
                            </div>
                            <div>
                                <p class="p12">{{$post['location']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="description">
                        <p class="p14">{{$post['description']}}</p>
                    </div>
                    <div class="w-fit">
                        <a href="{{route('post-detail.ca', $post['id'])}}">
                            <p class="p14 underline">Saber-ne més</p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif --}}
</x-layouts.app>
