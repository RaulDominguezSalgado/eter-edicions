<x-layouts.admin.app>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <a href="{{ route('books.index') }}">Torna a l'index</a>
                                @if (isset($book))
                                    <h1>Editant "{{ $book['title'] }}"</h1>
                                @else
                                    <h1>Publica un nou llibre</h1>
                                @endif
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    
                    <div class="card-body bg-white">
                        <form action="">
                            <label for="book_title">Títol
                                <input type="text" name="book_title" id="book_title" value="{{ $book['title'] ?? '' }}">
                            </label>
                            <label for="isbn">ISBN
                                <input type="text" name="isbn" id="isbn" value="{{ $book['isbn'] ?? '' }}">
                            </label>
                            <label for="publisher">Edita
                                <input type="text" name="publisher" id="publisher" value="{{ $book['publisher'] ?? '' }}">
                            </label>
                            <label for="authory">Auditoria
                                <input type="text" name="authory" id="authory" value="{{ $book['authory'] ?? '' }}">
                            </label>
                            <label for="translation">Traducció
                                <input type="text" name="translation" id="translation" value="{{ $book['translation'] ?? '' }}">
                            </label>
                            <label for="ilustration">Il·lustració
                                <input type="text" name="ilustration" id="ilustration" value="{{ $book['ilustration'] ?? '' }}">
                            </label>
                            <label for="lang">Idioma
                                <input type="text" name="lang" id="lang" value="{{ $book['lang'] ?? '' }}">
                            </label>
                            <label for="description">Descripció
                                <textarea name="description" id="description" value="{{ $book['description'] ?? '' }}"></textarea>
                            </label>
                            <label for="image">Portada
                                <div><img style="width: 100px" src="/img/book/{{ $book['image'] ?? '' }}" alt="thumbnail"></div>
                                <input type="file" name="image" id="image" accept="image">
                            </label>
                            <label for="sample">Mostra
                                <div><a href="/pdf/book/{{ $book['sample'] ?? '' }}"></a></div>
                                <input type="file" name="sample" id="sample" accept=".pdf">
                            </label>
                            <label for="page_num">Número de pagines
                                <input type="number" name="page_num" id="page_num" value="{{ $book['page_num'] ?? '' }}">
                            </label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin.app>
