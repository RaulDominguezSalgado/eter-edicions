<x-layouts.admin.app>
    {{-- <x-slot name="title">
        {{ $pageTitle }} | {{ $pageDescription }} | {{ $webName }}
    </x-slot> --}}
    {{-- <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Collaborator</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('collaborators.index') }}">
                                {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                        <div class="form-group mb-2 mb20">
                            <strong>Imatge:</strong>
                            <img style="width: 100px; height: auto;"
                                src="{{ asset('img/collab/covers/' . ($collaborator['image'] ?? 'collab-default.webp')) }}"
                                alt="{{ ($collaborator['image'] ?? 'collab-default.webp') . ' - ' }}">
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Nom:</strong>
                            {{ $collaborator['first_name'] ?? '' }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Cognom:</strong>
                            {{ $collaborator['last_name'] ?? '' }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Llenguatge:</strong>
                            {{ $collaborator['lang'] ?? '' }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Biografia:</strong>
                            {{ $collaborator['biography'] ?? '' }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Xarxes socials:</strong>
                            <ul>
                                @php
                                    // $socialNetworks = json_decode($collaborator['social_networks'], true);
                                    if (is_array($collaborator['social_networks'])) {
                                        foreach ($collaborator['social_networks'] as $key => $value) {
                                            echo "<li>{$key}: {$value}</li>";
                                        }
                                    }
                                @endphp
                            </ul>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot> --}}

    <link rel="stylesheet" href="{{ asset('css/public/collaborator.css') }}">

    {{-- @dump($collaborator) --}}

    <main class="body space-y-24 mb-12">
        <h2>Vista previa</h2>
        <div class="float-right">
            <a class="btn btn-primary btn-sm" href="{{ route('collaborators.index') }}"> {{ __('Enrere') }}</a>
        </div>
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
</x-layouts.admin.app>
