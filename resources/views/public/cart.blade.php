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
                            <td>{{ number_format(round($item->price * 1.04, 2), 2, ',', '')}}€</td>
                            <td><input type="number" class=" border border-black" name="number_of_items" min="0" placeholder="1" value="{{ $item->qty }}"></td>

                            <td>
                                <form action="{{route('cart.remove', $item->rowId)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><img src="{{ asset("img/icons/dark/trash.webp") }}" width="30px" alt="Eliminar"></button>
                                </form>
                            </td>
                            <td>{{ number_format($item->total(),2,',','') }}€</td>
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

        @if (count($relatedBooks) > 0)
            <div id="related-books" class="flex flex-col items-center space-y-4">
                <h2>També et poden agradar</h2>

                <div class="flex">
                    @foreach ($related_books as $i => $relatedBook)
                        <div class="related-book flex flex-col items-center mb-6 w-64 px-6">
                            <div class="cover mb-4 flex justify-center">
                                <a href="{{ route("book-detail.{$locale}", $relatedBook['id']) }}">
                                    <img src="{{ asset('img/books/thumbnails/' . $relatedBook['image']) }}"
                                        alt="{{ $relatedBook['title'] }}" style="height: 13.75em"
                                        class="aspect-[2/3]">
                                </a>
                            </div>
                            <div id="book-info-{{ $relatedBook['slug'] }}"
                                class="flex flex-col items-center space-y-2 w-full">
                                <div class="book-title flex justify-center items-center text-center">
                                    {{ $relatedBook['title'] }}
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input[name="number_of_items"]').on('input', function() {
                var quantity = parseInt($(this).val());
                var price = parseFloat($(this).closest('tr').find('td:eq(1)').text().replace('€', ''));
                var subtotal = quantity * price;
                $(this).closest('tr').find('td:eq(4)').text(subtotal.toFixed(2) + '€');

                // Actualizar el total
                var total = 0;
                $('tbody tr').each(function() {
                    var subtotal = parseFloat($(this).find('td:eq(4)').text().replace('€', ''));
                    total += subtotal;
                });
                $('.total').text(total.toFixed(2) + '€');
            });
        });
    </script>
</x-layouts.app>
