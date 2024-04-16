<x-layouts.admin.app>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <a href="{{ route('books.index') }}">Torna a l'index</a>
                                {{-- <h1>Editant "{{ $book['title'] }}"</h1> --}}
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="book mb-12">
                        <div class="container-fluid flex">
                            <div class="mr-6">
                                <img class="w-64" src="{{ asset('img/books/covers/' . $book['image']) }}"
                                    alt="{{ $book['title'] }}">
                            </div>
                            <div class="flex flex-col justify-between">
                                <div class="flex flex-col space-y-3">
                                    <div class="title-author flex flex-col space-y-">
                                        <h2>{{ $book['title'] }}</h2>
                                        <h5>Stock en magatzem: <input type="text" id="defaultStock" value="{{ $book['stock'] }}" disabled></h5>
                                        <h5>Llibreries:</h5>
                                        @if($book['bookstores'])
                                            @foreach ($book['bookstores'] as $store)
                                                <hr>
                                                <span>{{ $store['name'] }}</span>
                                                <input type="text" id="storeStock_{{ $loop->index }}" value="{{ $store['stock'] }}" disabled>
                                                <span>{{ $store['address'] }}, {{ $store['city'] }}</span>
                                                <button id="edit_{{ $loop->index }}">Editar</button>
                                            @endforeach
                                        @endif

                                        <button>Desar canvis</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</x-layouts.admin.app>

<script src="{{ asset('js/form/stock.js') }}"></script>
