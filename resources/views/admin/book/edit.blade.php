<x-layouts.admin.app>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <a href="{{ route('books.index') }}">Torna a l'index</a>
                                <h1>Editant "{{ $book['title'] }}"</h1>
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    {{-- @include("admin.book.form") --}}
                    <div class="book mb-12">
                        <div class="book-detail flex justify-between mb-4">
                            <div class="mr-6 cover">
                                {{-- <div id="book-image" class="book-image"></div> --}}
                                {{-- <div class="object-fill cover border-guide-2"> --}}
                                <img class="" src="{{ asset('img/books/covers/' . $book['image']) }}"
                                    alt="{{ $book['title'] }}">
                                {{-- </div> --}}
                            </div>

                            <div class="details flex flex-col justify-between h-auto">

                                <div class="flex flex-col space-y-3">
                                    <div class="title-author flex flex-col space-y-">
                                        <h2>{{ $book['title'] }}</h2>
                                        <h3>Dades del llibre</h3>
                                        <h5>Títol: {{ $book['title'] }}</h5>
                                        <div class="flex space-x-1">
                                            @foreach ($book['authors'] as $author)
                                                {{-- if not last iteration --}}

                                                @if (!$loop->last)
                                                    <h5>Autoria: {{ $author }},</h5>
                                                    {{-- if last iteration --}}
                                                @else
                                                    <h5> Autoria: {{ $author }}</h5>
                                                @endif
                                            @endforeach
                                        </div>
                                        Traducció:
                                        @foreach ($book['translators'] as $translator)
                                            {{-- if not last iteration --}}

                                            @if (!$loop->last)
                                                <h5> {{ $translator }},</h5>
                                                {{-- if last iteration --}}
                                            @else
                                                <h5>{{ $translator }}</h5>
                                            @endif
                                        @endforeach
                                    </div>

                                    <div id="book-description">
                                        <h5>Descripció:</h5>
                                        <p>{{ $book['description'] }}</p>
                                    </div>

                                    <div class="flex space-x-1.5" id="pvp">
                                        @if ($book['discounted_price'])
                                            <h5 class="line-through text-red-600">{{ $book['pvp'] }}€</h5>
                                            <h5 class="">{{ $book['discounted_price'] }}€</h5>
                                        @else
                                            <h5 class="">{{ $book['pvp'] }}€</h5>
                                        @endif
                                    </div>

                                </div>

                                <div class="flex flex-col space-y-2.5">
                                    


                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layouts.admin.app>
