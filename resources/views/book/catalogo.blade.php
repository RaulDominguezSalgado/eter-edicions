<x-layouts.app>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <h1>{{ __('Tots els llibres') }}</h1>
                            </span>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $i => $book)
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td>
                                                <a href="/catalogo/{{ $book['slug'] }}/"><img style="width: 100px; height: auto;" src="{{ asset('img/book/'.$book['image']) }}" alt="{{ ($book['image']) }}"></a>
                                            </td>
                                            <td>{{ $book['isbn'] }}</td>
                                            <td>{{ $book['lang'] }}</td>
                                            <td>{{ $book['title'] }}</td>
                                            <td>{{ $book['authory'] }}</td>
                                            <td>{{ $book['pvp'] }}€</td>
                                            <td>{{ $book['discounted_price'] == -1 ? '0' : $book['discounted_price'] }}€</td>
                                            <td><button>-</button>{{ $book['stock'] }}<button>+</button></td>
                                            @if ($book['visible'])
                                                <td>✔</td>
                                            @else
                                                <td><span>x</span></td>
                                            @endif
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
</x-layouts.app>