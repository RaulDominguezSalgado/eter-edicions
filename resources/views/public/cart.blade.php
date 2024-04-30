<x-layouts.app>

    {{-- <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot> --}}

    {{-- <link rel="stylesheet" href="{{ asset('css/public/bookstores.css') }}"> --}}
    <div class="container">
        <h2>Cistella</h2>

        @if (count(Cart::content()) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Producte</th>
                        <th>Preu</th>
                        <th>Quantitat</th>
                        <th>Accions</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Cart::content() as $item)
                        <tr>
                            <td>
                                <div>
                                    <label for="name">{{ $item->name}}</label>
                                <img style="width: 100px; height: auto;"
                                    src="{{ asset("img/books/thumbnails/" . $item->options->image) }}"
                                    alt="{{ $item->name . $item->options->image }}">
                                </div>
                            </td>
                            <td>{{ round($item->price*1.04)}}€</td>
                            <td><input type="number" class=" border border-black" name="number_of_items" min="0" placeholder="1" value="{{ $item->qty }}"></td>

                            <td>
                                <form action="{{route('cart.remove', $item->rowId)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><img src="{{ asset("img/icons/dark/trash.webp") }}" width="30px" alt="Eliminar"></button>
                                </form>
                            </td>
                            <td>{{ $item->total() }}€</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-right">
                <h4>Total: {{ Cart::total() }}€</h4>
                <a href="" class="btn btn-primary">Procedir al pagament</a>
            </div>
        @else
            <p>La seva cistella es troba buida</p>
        @endif
    </div>
</x-layouts.app>
