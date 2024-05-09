<ul class="cart-info">
    <!--
        $item->name
        $item->price
        $item->options->isbn
        $item->options->author
        $item->options->publisher
        $item->options->image
        -->
    @foreach (Cart::instance("default")->content() as $item)
        <li>
            <div class="flex mb-5">
                <div class="w-1/3 flex items-center">
                    <img class="w-full h-full object-contain" src="{{ asset('img/books/thumbnails/' . $item->options->image) }}" alt="{{ $item->name }}">
                </div>
                <div class="w-2/3 px-6 py-4">
                    <div class="font-bold text-xl mb-2">
                        {{ $item->name }}
                        @if (gettype($item->options->author) == "array")
                            <p class="text-gray-700 text-base">
                                {{-- {{trans_choice('general.authors', count($item->options->author))}} --}}
                                @foreach ($item->options->author as $author)
                                    {{-- if not last iteration --}}
                                    @if (!$loop->last)
                                        {{ $author }},
                                        {{-- if last iteration --}}
                                    @else
                                        {{ $author }}
                                    @endif
                                @endforeach
                            </p>
                        @elseif (gettype($item->options->author) == "string")
                            <p class="text-gray-700 text-base">{{ $item->options->author }}</p>{{-- {{trans_choice('general.authors', count($item->options->author))}} --}}
                        @endif
                        <p class="text-gray-700 text-base">{{ $item->options->publisher }}</p>
                        <p class="text-gray-700 text-base">{{ $item->options->isbn }}</p>
                        <p class="font-bold text-base">{{ $item->price }}€</p>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
