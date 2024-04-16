<x-layouts.admin.app>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <a href="{{ route('books.index') }}">Torna a l'index</a>
                                {{-- <h1>Editant "{{ $book['title'] }}"</h1> --}}
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    {{-- @include("admin.book.form") --}}
                    <div class="book mb-12">
                        <div class="book-detail flex justify-between mb-4">
                            {{-- Img --}}
                            <div class="mr-6 cover">
                                {{-- <div id="book-image" class="book-image"></div> --}}
                                {{-- <div class="object-fill cover border-guide-2"> --}}
                                <img class="" src="{{ asset('img/books/covers/' . $book['image']) }}"
                                    alt="{{ $book['title'] }}">
                                {{-- </div> --}}
                            </div>

                            <div class="details flex flex-col justify-between h-auto">

                                <div class="flex flex-col space-y-3">
                                    <div class="title-author flex flex-col space-y-">
                                        <h2>{{ $book['title'] }}</h2>
                                        <h5>Stock en magatzem: <span>{{ $book['stock'] }}</span></h5>
                                        <h5>Llibreries:</h5>

                                        @foreach ($book['bookstores'] as $store)
                                                <span>{{ $store["name"] }} (Stock: {{ $store["stock"] }})</span>
                                            @endforeach
                                        <div id="book-description">
                                            <h5>Descripció:</h5>
                                            <span>{{ $book['description'] }}</span>
                                        </div>


                                    </div>
                                </div>

                            </div>



                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layouts.admin.app>
