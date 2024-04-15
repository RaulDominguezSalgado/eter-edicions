<x-layouts.admin.app>
    {{-- <x-slot name="title">
        {{ $pageTitle }} | {{ $pageDescription }} | {{ $webName }}
    </x-slot> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <h1>{{ __('Llibres') }}</h1>
                            </span>

                            <div class="float-right">
                                <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th></th>
                                        <th>Imatge</th>
                                        <th>ISBN</th>
                                        <th>Títol</th>
                                        <th>Autor/s</th>

                                        {{-- @foreach ($book['translators'] as $translator)
                                        <th>Traductor {{$loop->iteration}} </th>
                                        @endforeach --}}
                                        <th>PVP </th>
                                        <th>Preu amb descompte</th>
                                        <th colspan="1">Stock</th>
                                        <th>Visible</th>
                                        <th>Opcions</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                            @foreach ($book['authors'] as $author)
                                                {{ $author[0] }} <br>  {{-- Imprime el primer elemento de cada arreglo de autores --}}
                                            @endforeach
                                            </td>

                                            {{-- @foreach ($book['translators'] as $translator)
                                                <td>{{ $translator[0] }} </td>
                                            @endforeach --}}

                                            <td>{{ $book['pvp'] }}€</td>
                                            <?php
                                            if ($book['discounted_price'] == null) {
                                                $book['discounted_price'] = 'N/D';
                                            } else {
                                                $book['discounted_price'] = $book['discounted_price'] . ' €';
                                            }
                                            ?>
                                            <td>{{ $book['discounted_price'] }}</td>
                                            <td><button style="padding: 0px 10px;">-</button> {{ $book['stock'] }}
                                                <button style="padding: 0px 10px;">+</button></td>
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
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('books.edit', $book['id']) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
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