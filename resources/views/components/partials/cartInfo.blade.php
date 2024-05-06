<ul>
    @foreach (Cart::content() as $item)
        <!--
            $item->name
            $item->price
            $item->options->isbn
            $item->options->author
            $item->options->publisher
            $item->options->image
        -->
        <li>
            <div class="flex mb-5">
                <div class="w-1/3 flex items-center">
                    <img class="w-full h-full object-contain" src="{{ asset('img/books/thumbnails/' . $item->options->image) }}" alt="{{ $item->name }}">
                </div>
                <div class="w-2/3 px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $item->name }}</div>
                        <p class="text-gray-700 text-base">{{__('general.authors')}}: {{ $item->options->author }}</p>{{-- {{trans_choice('general.authors', count($item->options->author))}} --}}
                        <p class="text-gray-700 text-base">{{__('general.published-by')}}: {{ $item->options->publisher }}</p>
                        <p class="text-gray-700 text-base">{{__('general.isbn')}}: {{ $item->options->isbn }}</p>
                        <p class="font-bold text-base">{{__('general.price')}}: {{ $item->price }}€</p>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>