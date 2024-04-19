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
                                        <h5>Dades del llibre</h5>
                                        <p>Títol: <span>{{ $book['title'] }}</span></p>
                                        <div class="flex space-x-1">
                                            <h5>Autoria: </h5>
                                            @foreach ($book['authors'] as $author)
                                                {{-- if not last iteration --}}
                                                @if (!$loop->last)
                                                    <span>{{ $author }}</span>,
                                                    {{-- if last iteration --}}
                                                @else
                                                    <span>{{ $author }}</span>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="flex space-x-1">
                                            <h5>Traducció:</h5>
                                            @foreach ($book['translators'] as $translator)
                                                {{-- if not last iteration --}}
                                                @if (!$loop->last)
                                                    <span>{{ $translator }},</span>
                                                    {{-- if last iteration --}}
                                                @else
                                                    <span>{{ $translator }}</span>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div id="book-description">
                                            <h5>Descripció:</h5>
                                            <span>{{ $book['description'] }}</span>
                                        </div>

                                        <div>
                                            <button onclick="openPdf()">View PDF</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="flex flex-col space-y-2.5">
                            {{-- dades de edicio --}}
                            <div>
                                <h5>Dades de l’edició</h5>
                                <p>ISBN: <span>{{ $book['isbn'] }}</span></p>
                                <div class="flex space-x-1">
                                    <h5>Idioma:</h5>
                                    @foreach ($book['lang'] as $lang)
                                        {{-- if not last iteration --}}
                                        @if (!$loop->last)
                                            <span> {{ $lang }},</span>
                                            {{-- if last iteration --}}
                                        @else
                                            <span>{{ $lang }}</span>
                                        @endif
                                    @endforeach
                                </div>
                                <h5>Edita: <span>{{ $book['publisher'] }}</span></h5>
                                <h5>Pàgines: <span>{{ $book['number_of_pages'] }}</span></h5>
                                <h5>Publicació: <span>{{ $book['publication_date'] }}</span></h5>
                                <h5>Petjada de carboni: <span>{{ $book['enviromental_footprint'] }}</span></h5>
                                <h5>Dipòsit legal: <span>{{ $book['legal_diposit'] }}</span></h5>

                            </div>
                            {{-- dades extres del llibre --}}
                            <div>
                                <h5>Dades extres del llibre</h5>
                                <h5>Pròleg: <span>{{ $book['legal_diposit'] }}</span></h5>
                                <h5>Disseny de coberta: <span>{{ $book['legal_diposit'] }}</span></h5>
                                <h5>Il·lustracions: <span>{{ $book['legal_diposit'] }}</span></h5>
                                <h5>Maquetació: <span>{{ $book['legal_diposit'] }}</span></h5>
                                <h5>Correcció: <span>{{ $book['legal_diposit'] }}</span></h5>
                            </div>

                        </div>

                        <div>
                            {{-- Preu --}}
                            <div class="flex space-x-1.5" id="pvp">
                                @if ($book['discounted_price'])
                                    <h5 class="line-through text-red-600">{{ $book['pvp'] }}€</h5>
                                    <h5 class="">{{ $book['discounted_price'] }}€</h5>
                                @else
                                    <h5 class="">{{ $book['pvp'] }}€</h5>
                                @endif
                            </div>
                        </div>

                        <div>
                            {{-- Col·leccions --}}
                            <div>
                                <a href="{{ route('stock.edit', $book['id']) }}">Gestionar stock</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layouts.admin.app>
