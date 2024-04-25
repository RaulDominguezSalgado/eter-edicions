<x-layouts.admin.app>
    <div class="body">
        <div class="row">
            <div class="">
                <div class="flex justify-end items-end px-2.5">
                    <div class="flex flex-col items-end space-y-6">
                        <div><a class="navigation-button font-bold" href="{{ route('books.index') }}">Enrere</a></div>
                    </div>
                </div>
            </div>

            <div class="book mb-12 space-y-4">
                <div class="container-fluid flex">
                    <div class="mr-6">
                        <img class="w-64" src="{{ asset('img/books/covers/' . $book['image']) }}"
                            alt="{{ $book['title'] }}">
                    </div>

                    <div class="w-full flex flex-col justify-between">
                        <div class="flex flex-col space-y-6">
                            <h3>{{$book['title']}}</h3>
                            <div class="title-author flex flex-col space-y-">
                                <form action="{{ route('stock.update', $book['id']) }}" method="POST"
                                    class="space-y-6">
                                    @csrf
                                    @method('PUT')

                                    <input type="text" name="id" value={{ $book['id'] }} hidden>

                                    <div class="max-w-fit">
                                        <h5>Stock en magatzem:</h5>
                                        <input type="number" id="defaultStock" name="stock"
                                            value="{{ $book['stock'] }}">
                                    </div>
                                    {{-- Boton que al darle salga select de todas las librerias con nombre de la libreria
                                                y como value el id de la libreria. y abajo un inpunt del stock:
                                                <input type="number" name="bookstores[{{$store['id']}}][stock]"
                                                            id="storeStock_{{ $loop->index }}"
                                                            value="{{ $store['stock'] }}">
                                                y tambien un boton de guardar stock, y hacer los metodos correspondientes en el controllador
                                                 --}}
                                    @if (count($bookstores) > 0)
                                        <div id="option-form" style="display: none;">
                                            {{-- <select name="bookstores[]" id="bookstore_id"> --}}
                                                <option value="">Tria una llibreria</option>
                                                @foreach ($bookstores as $store)
                                                    <option class="w-fit" value="{{ $store['id'] }}"
                                                        @if (in_array($store['id'], old('bookstores', []))) selected @endif>
                                                        {{ $store['name'] }}
                                                    </option>
                                                @endforeach
                                            {{-- </select> --}}
                                            {{-- <input type="number" name="input-value[]" class="form-control"> --}}
                                            {{-- <button class="btn btn-primary">Añadir</button> --}}
                                        </div>
                                    @endif
                                    {{-- Mostrar librerias y stocks --}}

                                    <div class="space-y-4">
                                        <div class="flex justify-between">
                                            <h3>Llibreries:</h3>
                                            <div class="flex justify-center">
                                                <button id="add-stock-button" class="btn btn-primary" type="button">
                                                    <img src="{{ asset('img/icons/dark/add.webp') }}"
                                                        alt="Afegir llibreria" style="width: 30px">
                                                </button>
                                            </div>
                                        </div>
                                        {{-- <input type="text" name="prova" value="prova"> --}}
                                        @if (array_key_exists('bookstores', $book))
                                            @foreach ($book['bookstores'] as $store)
                                                <hr>
                                                <span>{{ $store['name'] }}</span>

                                                <input type="text" name="bookstores[{{ $store['id'] }}][id]"
                                                    value="{{ $store['id'] }}" hidden>
                                                <input type="number" name="bookstores[{{ $store['id'] }}][stock]"
                                                    id="storeStock_{{ $loop->index }}" value="{{ $store['stock'] }}">
                                                <span>{{ $store['address'] }}, {{ $store['city'] }}</span>

                                                {{-- <button id="edit_{{ $loop->index }}">Editar</button> --}}
                                            @endforeach
                                        @else
                                            <span id="noBookstores">Aquest llibre encara no té estoc a cap llibreria.</span>
                                        @endif
                                    </div>
                                    <div id="save" class="flex justify-center">
                                        <button id="submit-button" class="send-button" type="submit" value="stay"
                                            name="action">Desar
                                            canvis</button>
                                    </div>
                                    {{-- <div id="save" class="flex justify-center">
                                        <button id="submit-button" class="send-button" type="submit" value="stay"
                                            name="action">Desar
                                            canvis</button>
                                    </div> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</x-layouts.admin.app>

<script src="{{ asset('js/form/stock.js') }}"></script>
