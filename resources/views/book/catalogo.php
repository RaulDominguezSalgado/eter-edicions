<x-layouts.app>
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
                                {{ __('Book') }}
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
                                    @foreach ($books as $book)
                                        <tr>
                                            <th>Imatge</th>
                                            <th>No</th>

                                            <th>ISBN</th>
                                            <th>Títol</th> {{-- hacer --}}
                                            @if (count($book['authors']) > 1)
                                            @foreach ($book['authors'] as $index => $author)
                                                <th>Autor {{ $index + 1 }}</th>
                                            @endforeach
                                        @else
                                            <th>Autor</th>
                                        @endif

                                        @if (count($book['illustrators']) > 1)
                                            @foreach ($book['illustrators'] as $index => $illustrators)
                                                <th>Il·lustrador {{ $index + 1 }}</th>
                                            @endforeach
                                        @else
                                            <th>Il·lustrador</th>
                                        @endif

                                        @if (count($book['translators']) > 1)
                                            @foreach ($book['translators'] as $index => $translators)
                                                <th>Traductor {{ $index + 1 }}</th>
                                            @endforeach
                                        @else
                                            <th>Traductor</th>
                                        @endif

                                            <th>PVP </th>
                                            <th>Preu amb descompte</th>
                                            <th colspan="1">Stock</th>
                                            <th>Visible</th>
                                            <th></th>
                                        </tr>
                                    @endforeach
                                </thead>
                                <tbody>
                                    @foreach ($books as $i => $book)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('images/'.$book['image']) }}" alt="{{ ($book['image']) }}"></a>
                                            </td>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $book['isbn'] }}</td>
                                            <td>{{ $book['title'] }}</td>

                                            {{-- Author/s  --}}
                                            @if (count($book['authors']) > 1)
                                                @foreach ($book['authors'] as $author)
                                                    <td>{{ $author }}</td>
                                                @endforeach
                                            @else
                                                <td>{{ $book['authors'][0] }}</td>
                                            @endif
                                            {{-- Illustrator/s  --}}
                                            @if (count($book['illustrators']) > 1)
                                                @foreach ($book['illustrators'] as $illustrator)
                                                    <td>{{ $illustrator }}</td>
                                                @endforeach
                                            @else
                                                <td>{{ $book['illustrators'][0] }}</td>
                                            @endif
                                            {{-- Translator/s  --}}
                                            @if (count($book['translators']) > 1)
                                                @foreach ($book['translators'] as $translator)
                                                    <td>{{ $translator }}</td>
                                                @endforeach
                                            @else
                                                <td>{{ $book['translators'][0] }}</td>
                                            @endif

                                            <td>{{ $book['pvp'] }}€</td>
                                            <td>{{ $book['discounted_price'] }}€</td>
                                            {{-- TODO AaÑADIR BOTÓN PARA SUMAR EL STOCK --}}
                                            <td><button>-</button>{{ $book['stock'] }}<button>+</button></td>
                                            {{-- TODO si es visible muestra un check, sino pues una x --}}
                                            @if ($book['visible'])
                                            <td>✔</td>
                                            @else
                                            <td><span>x</span></td>
                                            @endif


                                            {{-- Crud --}}
                                            <td>
                                                <form action="{{ route('books.destroy', $book['id']) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('books.show', $book['id']) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
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
</x-layouts.app>
