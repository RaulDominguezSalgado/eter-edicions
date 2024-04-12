<x-layouts.app>

    <x-slot name="title">
        {{ $page['title'] }} | {{ $page['shortDescription'] }} | {{ $page['web'] }}
    </x-slot>

    <div>
        <h2>Catàleg</h2>

        <div>
            <ul>
                @foreach ($collections as $i => $collection)
                    <li><a>{{ $collection['name'] }}</a></li>
                @endforeach
            </ul>
        </div>

        <div>
            @foreach ($books as $i => $book)
                <div class="book">
                    <div>
                        <a href="{{ route('books.show',$book["id"]) }}">
                            <img src="{{ asset('img/books/thumbnails/' . $book["image"]) }}" alt="{{ ($book["title"]) }}" style="height: 19.7em">
                        </a>
                    </div>
                    <div class="title">{{ $book['title'] }}</div>
                    @foreach ($book['collaborators'] as $collaborator)
                        <div class="author">{{ $collaborator }}</div>
                    @endforeach
                    {{-- @foreach ($book['collaborators']['translators'])
                        <div class="translator">{{ $book['collaborators']['translators']}}</div>
                    @endforeach --}}
                </div>
            @endforeach
        </div>

    </div>

</x-layouts.app>
