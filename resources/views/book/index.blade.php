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
                                        <th>Lang</th>
                                        <th>Títol</th>
                                        <th>Autoría</th>
                                        <th>PVP </th>
                                        <th>Preu amb descompte</th>
                                        <th colspan="1">Stock</th>
                                        <th>Visible</th>
                                        <th>Opcions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $i => $book)
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td>
                                                <img style="width: 100px; height: auto;" src="{{ asset('img/book/'.$book['image']) }}" alt="{{ ($book['image']) }}"></a>
                                            </td>
                                            <td>{{ $book['isbn'] }}</td>
                                            <td>{{ $book['lang'] }}</td>
                                            <td>{{ $book['title'] }}</td>
                                            <td>{{ $book['collaborators']['authors'] }}</td>
                                            <td>{{ $book['pvp'] }}€</td>
                                            <?php
                                                $book['discounted_price'] == -1 ? '0' : $book['discounted_price']
                                            ?>
                                            <td>{{ $book['discounted_price'] }}€</td>
                                            <td><button>-</button>{{ $book['stock'] }}<button>+</button></td>
                                            @if ($book['visible'])
                                                <td>✔</td>
                                            @else
                                                <td><span>x</span></td>
                                            @endif
                                            {{-- Crud --}}
                                            <td>
                                            <form action="{{ route('books.destroy', $book['id']) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('libro', $book['slug']) }}" target="_blank"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Mostrar en catalogo') }}</a>
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
