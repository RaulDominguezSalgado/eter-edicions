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

                                            <input type="text" name="id" value={{ $book['id'] }} hidden>

                                            <h5>Stock en magatzem:</h5>
                                            <input type="number" id="defaultStock" name="stock"
                                                value="{{ $book['stock'] }}">
                                            <br><br>
                                            {{-- Boton que al darle salga select de todas las librerias con nombre de la libreria
                                                y como value el id de la libreria. y abajo un inpunt del stock:
                                                <input type="number" name="bookstores[{{$store['id']}}][stock]"
                                                            id="storeStock_{{ $loop->index }}"
                                                            value="{{ $store['stock'] }}">
                                                y tambien un boton de guardar stock, y hacer los metodos correspondientes en el controllador
                                                 --}}
                                                 @if (count($bookstores)>0)
                                                 <button id="add-stock-button" class="btn btn-primary">+</button>


                                                <div id="option-form" style="display: none;">
                                                    <select name="bookstore_id" id="bookstore_id">
                                                        <option value="">Select a bookstore</option>
                                                        @foreach ($bookstores as $bookstore)
                                                            <option value="{{ $bookstore['id'] }}"
                                                                @if (in_array($bookstore['id'], old('bookstores', []))) selected @endif>
                                                                {{ $bookstore['name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <input type="number" name="input-value[]" class="form-control">
                                                    <button class="btn btn-primary">Añadir</button>
                                                </div>
                                            @endif
                                            {{-- Mostrar librerias y stocks --}}
                                            @if (array_key_exists('bookstores', $book))
                                                <div class="space-y-4">
                                                    <h5>Llibreries:</h5>
                                                    {{-- <input type="text" name="prova" value="prova"> --}}
                                                    @foreach ($book['bookstores'] as $store)
                                                        <hr>
                                                        <span>{{ $store['name'] }}</span>


                                                        <input type="text"
                                                            name="bookstores[{{ $store['id'] }}][id]"
                                                            value={{ $store['id'] }} hidden>
                                                        <input type="number"
                                                            name="bookstores[{{ $store['id'] }}][stock]"
                                                            id="storeStock_{{ $loop->index }}"
                                                            value="{{ $store['stock'] }}">
                                                        <span>{{ $store['address'] }}, {{ $store['city'] }}</span>

                                                        <button id="edit_{{ $loop->index }}">Editar</button>
                                                    @endforeach


                                                </div>
                                            @endif
                                            <input type="submit" class="btn btn-primary"
                                                        value="Desa Canvis"></input>
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

<script src="{{ asset('js/form/stock.js') }}"></script>
