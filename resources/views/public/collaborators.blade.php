<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/public/collaborators.css') }}">

    <main class="body mb-20">
        <div class="flex flex-col items-center space-y-40">
            {{-- <div class="flex flex-col items-center space-y-6">
                <ul class="flex space-x-4">
                    @foreach ($collaboratorTypes as $i => $type)
                        <li><a><h5>{{ $type }}</h5></a></li>
                    @endforeach
                </ul>
            </div> --}}
            <div class="flex flex-col items-center justify-center space-y-5">
                <h2>{{__('general.authors')}}</h2>
                <div class="w-full grid xl:grid-cols-4 lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 px-16" id="catalog">
                    @foreach ($authors as $i => $author)
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
            </div>
            <div class="flex flex-col items-center justify-center space-y-5">
                <h2>{{__('general.translators')}}</h2>
                <div class="w-full grid xl:grid-cols-4 lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 px-16" id="catalog">
                    @foreach ($translators as $i => $translator)
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
            </div>
        </div>
    </main>
</x-layouts.app>
