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
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
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
                                            <div  class="navigation-button form-button flex items-center space-x-1 max-w-10">
                                                <img src="{{asset('img/icons/plus.webp')}}" alt="Afegir nou llibre" class="add w-2.5 h-2.5">
                                                <p class="">Nou</p>
                                            </div>
                                        </a></th>
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
                                                            <a class="btn btn-sm btn-primary " href="{{ route('books.show',$book['id']) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Vista prèvia') }}</a>

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
                                        @include('components.layouts.admin.delete-confirmation-modal', ['id' => $book['id'], 'message' =>  __('Segur que voleu suprimir aquest recurs?'), 'action' => route('books.destroy', $book['id'])])
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
