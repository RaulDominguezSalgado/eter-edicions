<div class="book flex flex-col items-center mb-8 lg:mr-10">
    <div class="cover mb-4 relative h-[15em] lg:h-[19.7em]">
        <a href="{{ route("book-detail.{$locale}", $book['slug']) }}">
            <img src="{{ asset('img/books/thumbnails/' . $book['image']) }}"
                alt="{{ $book['title'] }}">
        </a>
        <a href="{{ route("book-detail.{$locale}", $book['slug']) }}" class="flex items-end w-full h-[19.7em] opacity-0 hover:opacity-100 duration-150 ease-in-out absolute bottom-0">
            <div class="w-full flex justify-between items-center p-2 bg-light/[.75]">
                <p class="font-bold text-xl">{{$book['pvp']}}€</p>
                <form action="{{ route('cart.insert') }}" method="POST">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book['id'] }}">

                    <input hidden type="number" class=" border border-black" name="number_of_items"
                        placeholder="1" value="1" min="1">
                        <button>
                            <i class="icon text-3xl add-to-cart"></i>
                        </button>
                </form>
            </div>
        </a>
    </div>
    <div id="book-info-{{ $book['slug'] }}" class="flex flex-col items-center space-y-2 w-64">
        <div class="book-title w-fit h-12 flex justify-center items-center text-center">{{ $book['title'] }}</div>
        <div class="flex space-x-1">
            @foreach ($book['authors'] as $author)
                {{-- if not last iteration --}}
                @if (!$loop->last)
                    <div class="book-author">{{ $author }},</div>
                    {{-- if last iteration --}}
                @else
                    <div class="book-author">{{ $author }}</div>
                @endif
            @endforeach
        </div>

        @if(array_key_exists('translators', $book))
        <div class="book-translator flex space-x-1 text-center">
            <div class="book-translator">{{('general.translation')}} {{  $locale == 'ca' ? (\App\Services\Translation\OrthographicRules::startsWithDe("de ". $book['translators'][0]) ? __('orthographicRules.with_d') : __('orthographicRules.with_de')) : __('orthographicRules.by') }}<!--
                    @foreach ($book['translators'] as $translator)
                        @if($loop->first && !$loop->last)
                            -->{{ $translator }},
                        @elseif($loop->first && $loop->last)
                            -->{{ $translator }}
                        @elseif (!$loop->last)
                            {{ $translator }},
                            {{-- if last iteration --}}
                        @else
                            {{ $translator }}
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
