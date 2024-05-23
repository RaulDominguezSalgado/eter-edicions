<x-layouts.admin.app>
    <?php
    // dd($books[0]);
    ?>
    {{-- <x-slot name="title">
        {{ $pageTitle }} | {{ $pageDescription }} | {{ $webName }}
    </x-slot> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <h2>Gestió del catàleg</h2>

                            <div class="float-right">

                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))

                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold"></strong>
                            <span class="block sm:inline">{{ $message }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-green-500" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    onclick="removeParentDiv(this.parentNode)">
                                    <title>Close</title>
                                    <path
                                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                </svg>
                            </span>
                        </div>
                    @elseif (session('error'))
                        {{-- <div class="alert alert-danger">{{ session('error') }}</div> --}}
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Error:</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    onclick="removeParentDiv(this.parentNode)">
                                    <title>Close</title>
                                    <path
                                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                </svg>
                            </span>
                        </div>
                    @elseif ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Error: .</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    onclick="removeParentDiv(this.parentNode)">
                                    <title>Close</title>
                                    <path
                                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                </svg>
                            </span>
                        </div>
                    @endif


                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <th></th>
                                    <th>Imatge</th>
                                    <th>ISBN</th>
                                    <th>Títol</th>
                                    <th>Autors</th>
                                    <th>Traductors</th>
                                    <th>PVP </th>
                                    <th>Preu amb descompte</th>
                                    <th colspan="1">Stock</th>
                                    <th>Visible</th>
                                    <th> <a href="{{ route('books.create') }}">
                                            <div
                                                class="navigation-button form-button flex items-center space-x-1 max-w-10">
                                                <img src="{{ asset('img/icons/plus.webp') }}" alt="Afegir nou llibre"
                                                    class="add w-2.5 h-2.5">
                                                <p class="">Nou</p>
                                            </div>
                                        </a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b-2 border-dark">
                                        <form action="{{ route('books.index.post') }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <td>
                                                <div class="flex">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <input type="text" name="isbn" id="isbn"
                                                        placeholder="ISBN" value="{{ $old['isbn'] ?? '' }}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <input type="text" name="title" id="title"
                                                        placeholder="Títol" value="{{ $old['title'] ?? '' }}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <input type="text" name="authors" id="authors"
                                                        placeholder="Autors" value="{{ $old['authors'] ?? '' }}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <input type="text" name="translators" id="translators"
                                                        placeholder="Traductors"
                                                        value="{{ $old['translators'] ?? '' }}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <input type="text" name="price-min" id="price-min"
                                                        placeholder="min" value="{{ $old['price-min'] ?? '' }}">
                                                    <input type="text" name="price-max" id="price-max"
                                                        placeholder="max" value="{{ $old['price-max'] ?? '' }}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <input type="text" name="discounted_price-min"
                                                        id="discounted_price-min" placeholder="min"
                                                        value="{{ $old['discounted_price-min'] ?? '' }}">
                                                    <input type="text" name="discounted_price-max"
                                                        id="discounted_price-max" placeholder="max"
                                                        value="{{ $old['discounted_price-max'] ?? '' }}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <input type="text" name="stock-min" id="stock-min"
                                                        placeholder="min" value="{{ $old['stock-min'] ?? '' }}">
                                                    <input type="text" name="stock-max" id="stock-max"
                                                        placeholder="max" value="{{ $old['stock-max'] ?? '' }}">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <select name="visible" id="visible">
                                                        <option value="" selected disabled>---</option>
                                                        <option @if (isset($old['visible']) && $old['visible'] == 'true') selected @endif
                                                            value="true">Visible</option>
                                                        <option @if (isset($old['visible']) && $old['visible'] == 'false') selected @endif
                                                            value="false">No visible</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <input type="submit" value="Cerca" name="search[search]">
                                                    <input type="submit" value="Restaura" name="search[clear]">
                                                </div>
                                            </td>
                                        </form>
                                    </tr>
                                    @foreach ($books as $book)
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td>
                                                <a href="{{ route('books.edit', $book['id']) }}"><img
                                                        style="width: 100px; height: auto;"
                                                        src="{{ asset('img/books/thumbnails/' . $book['image']) }}"
                                                        alt="{{ $book['title'] }}"></a>
                                            </td>
                                            <td>{{ $book['isbn'] }}</td>
                                            <td>{{ $book['title'] }}</td>
                                            <td>
                                                <?php
                                                for ($i = 0; $i < count($book['collaborators']['authors']); $i++) {
                                                    if ($i != 0) {
                                                        echo ', ';
                                                    }
                                                    echo $book['collaborators']['authors'][$i]['full_name'];
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                for ($i = 0; $i < count($book['collaborators']['translators']); $i++) {
                                                    if ($i != 0) {
                                                        echo ', ';
                                                    }
                                                    echo $book['collaborators']['translators'][$i]['full_name'];
                                                }
                                                ?>
                                            </td>
                                            <td>{{ $book['pvp'] }}€</td>
                                            <?php
                                            if ($book['discounted_price'] == null) {
                                                $book['discounted_price'] = 'N/D';
                                            } else {
                                                $book['discounted_price'] = $book['discounted_price'] . ' €';
                                            }
                                            ?>
                                            <td>{{ $book['discounted_price'] }}</td>
                                            <td>{{ $book['stock'] }}</td>
                                            @if ($book['visible'])
                                                <td>✔</td>
                                            @else
                                                <td><span>x</span></td>
                                            @endif
                                            {{-- Crud --}}
                                            <td>
                                                <form action="{{ route('books.destroy', $book['id']) }}"
                                                    method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary "
                                                        href="{{ route('libro', $book['slug']) }}" target="_blank"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Mostrar en catalogo') }}</a> --}}
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('books.show', $book['id']) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Vista prèvia') }}</a>

                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('books.edit', $book['id']) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="document.getElementById('confirmDelete-{{ $book['id'] }}').classList.remove('hidden');">
                                                        <i class="fa fa-fw fa-trash"></i>
                                                        {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('components.layouts.admin.delete-confirmation-modal', [
                                            'id' => $book['id'],
                                            'message' => __('Segur que voleu suprimir aquest recurs?'),
                                            'action' => route('books.destroy', $book['id']),
                                        ])
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $books->links() !!} --}}
            </div>
        </div>
    </div>
</x-layouts.admin.app>
<script src="{{ asset('js/form/alert.js') }}"></script>
