<x-layouts.admin.app>
    <div class="body">
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

                    <div class="book mb-12 space-y-4">
                        <div class="container-fluid flex">
                            <div class="mr-6">
                                <img class="w-64" src="{{ asset('img/books/covers/' . $book['image']) }}"
                                    alt="{{ $book['title'] }}">
                            </div>

                            <div class="flex flex-col justify-between">
                                <div class="flex flex-col space-y-6">
                                    <div class="title-author flex flex-col space-y-">
                                        <h2>{{ $book['title'] }}</h2>
                                        <form action="{{ route('stock.update', $book['id']) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <input type="text" name="id" value={{$book['id']}} hidden>

                                            <h5>Stock en magatzem:</h5>
                                            <input type="number" id="defaultStock" name="stock" value="{{ $book['stock'] }}"
                                                >
                                            <br><br>
                                            @if (array_key_exists('bookstores', $book))
                                                <div class="space-y-4">
                                                    <h5>Llibreries:</h5>
                                                    {{-- <input type="text" name="prova" value="prova"> --}}
                                                    @foreach ($book['bookstores'] as $store)
                                                        <hr>
                                                        <span>{{ $store['name'] }}</span>


                                                        <input type="text" name="bookstores[{{$store['id']}}][id]"
                                                            value={{ $store['id'] }} hidden>
                                                        <input type="number" name="bookstores[{{$store['id']}}][stock]"
                                                            id="storeStock_{{ $loop->index }}"
                                                            value="{{ $store['stock'] }}">
                                                        <span>{{ $store['address'] }}, {{ $store['city'] }}</span>

                                                        <button id="edit_{{ $loop->index }}">Editar</button>
                                                    @endforeach
                                                    <input type="submit" class="btn btn-primary" value="Desa Canvis"></input>
                                                    <!-- Movido fuera del foreach -->
                                                </div>
                                            @endif
                                        </form>
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

{{-- <script src="{{ asset('js/form/stock.js') }}"></script> --}}
