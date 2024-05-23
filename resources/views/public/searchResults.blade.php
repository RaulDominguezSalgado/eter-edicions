<?php
$locale = 'ca';
// dd($results);
?>
<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot>

    <link rel="stylesheet" href="/css/public/search.css">
    <div id="searchData">
        <input type="hidden" id="term" value="{{ $results['term'] ?? "" }}">
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
        <div id="searchResults">
            @foreach($results as $post_type => $content)
                @if ($post_type != "term")
                    <?php
                        $link = "";
                        $image = "";
                        switch ($post_type) {
                            case("books"):
                                $link = "book-detail";
                                $image = "books";
                                $title = "title";
                                $description = "description";
                                $contingut = "Llibre";
                            break;
                            case("collaborators"):
                                $link = "collaborator-detail";
                                $image = "collab";
                                $title = "full_name";
                                $contingut = "Collaborador";
                            break;
                            case("activities"):
                            case("articles"):
                                $link = "post-detail";
                                $image = "posts";
                                $title = "title";
                                $description = "description";
                                $contingut = "Article";
                            break;
                        }
                    ?>
                    @foreach($content as $item)
                        @if(!empty($content))
                            <div class="searchItem w-full flex content-between mb-5">
                                <div class="flex-col pr-5">
                                    <a class="relative inline-block border-2 border-transparent hover:border-black" href="{{ route($link.".{$locale}", $item['slug']) }}">
                                        <img class="object-cover w-[150px] h-[150px] max-w-[150px]" src="{{ asset('img/'. $image .'/thumbnails/' . $item['image']) }}"
                                            alt="{{ $item['title'] ?? $item['full_name'] }}">
                                            <p class="absolute text-center bg-lightgrey bottom-0 left-0 right-0">{{ $contingut }}</p>
                                    </a>
                                </div>
                                <div class="flex-col pl-5">
                                    <a class="hover:underline" href="{{ route($link.".{$locale}", $item['id']) }}"><h2 class="item-title">{{ $item[$title] }}</h2></a>
                                    <p class="item-description">{{ $item[$description] ?? ""}}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
    @else
        <div>{{__("phrases.no s'ha trobat cap resultat")}}</div>
    @endif

</x-layouts.app>
<script src="/js/search/search.js"></script>
