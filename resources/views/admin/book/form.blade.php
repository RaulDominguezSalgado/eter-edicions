<?php
// dump($book);
// dump($collaborators);
// dump($languages);
// dump($collections);

function getCollaboratorsOptions($collaborators, $selected = -1)
{
    $options = '';
    // $options = '<option disabled>Selecciona una opció</option>';
    foreach ($collaborators as $collaborator) {
        $selectedAttr = $collaborator['id'] == $selected ? 'selected' : '';
        $options .= "<option value='{$collaborator['id']}' $selectedAttr>{$collaborator['first_name']} {$collaborator['last_name']}</option>";
    }
    return $options;
}

function getCollectionsOptions($collections, $selected = -1)
{
    $options = '';
    // $options = '<option disabled>Selecciona una opció</option>';
    foreach ($collections as $collection) {
        $selectedAttr = $collection['id'] == $selected ? 'selected' : '';
        $options .= "<option value='{$collection['id']}' $selectedAttr>{$collection['name']}</option>";
    }
    return $options;
}

function getLanguagesOptions($languages, $selected = null)
{
    $options = '';
    foreach ($languages as $language) {
        $selectedAttr = $language['iso'] == $selected ? 'selected' : '';
        $options .= "<option value='" . $language['iso'] . "' " . $selectedAttr . '>' . $language['name'] . '</option>';
        // $options .= "$language";
    }
    return [$options, $selected];
}

echo '<select id="getCollaboratorsOptions" style="display: none;">';
getCollaboratorsOptions($collaborators);
echo '</select>';
echo '<select id="getCollectionsOptions" style="display: none;">';
getCollectionsOptions($collections);
echo '</select>';

?>

<link rel="stylesheet" href="{{ asset('css/admin/book.css') }}">

@if ($errors->any())
    <div class="alert alert-danger m-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="book space-y-12">
    <div class="book-detail flex mb-4">
        <div class="mr-6 cover relative">
            <img class="" src="{{ asset('img/books/covers/' . $book['image']) }}" alt="{{ $book['title'] }}">
            <div id="edit_cover_image" class="edit-button">
                <img src="{{asset('img/icons/light/edit.webp')}}" alt="">
            </div>
        </div>

        <div class="details w-full flex flex-col space-y-3 justify-between h-auto">

            <div class="flex justify-between items-center border-guide-1">
                <div class="flex items-center space-x-2  border-guide-2">
                    <label class="mx-2.5" for="title">Títol:</label>
                    <input type="text" name="title" id="title" value="{{ $book['title'] ?? '' }}" class="border-0">
                </div>
                <div class="flex border-guide-2">
                    <button>
                        <img src="{{asset('img/icons/dark/edit.webp')}}" alt="Editar camp" style="width: 20px">
                    </button>
                </div>
            </div>
            {{-- <fieldset> --}}
            @if (isset($book))
                <!-- Edit -->
                <div class="flex justify-between items-center border-guide-1">
                    <div class="flex space-x-2 border-guide-2">
                        <label class="mx-2.5" for="authors">Autoria:</label>
                        @for ($i = 0; $i < count($book['authors']); $i++)
                            <select name="authors[]" id="authors_{{ $i }}" class="border-0">
                                {!! getCollaboratorsOptions($collaborators, $book['authors'][$i]['id']) !!}
                            </select>
                            {{-- <a class="remove-content-button">
                                <img src="{{asset('img/icons/dark/trash.webp')}}" alt="Eliminar autor">
                            </a> --}}
                        @endfor
                        <div class="flex space-x-0.5">
                            <a class="remove-content-button">
                                <img src="{{asset('img/icons/dark/less.webp')}}" alt="Eliminar autor">
                            </a>
                            <a id="add_author" class="add-content-button">
                                <img src="{{asset('img/icons/dark/add.webp')}}" alt="Afegir autor">
                            </a>
                        </div>
                    </div>
                    <div class="flex border-guide-2">
                        <button>
                            <img src="{{asset('img/icons/dark/edit.webp')}}" alt="Editar camp" style="width: 20px">
                        </button>
                    </div>
                    <div class="flex border-guide-2">
                        <button>
                            <img src="{{asset('img/icons/dark/edit.webp')}}" alt="Editar camp" style="width: 20px">
                        </button>
                    </div>
                </div>
                <div class="flex justify-between items-center border-guide-1">
                    <div class="flex space-x-2 border-guide-2">
                        <label class="mx-2.5" for="translators">Traducció:</label>
                        @for ($i = 0; $i < count($book['translators']); $i++)
                            <select name="translators[]" id="translators_{{ $i }}" class="border-0">
                                {!! getCollaboratorsOptions($collaborators, $book['translators'][$i]['id']) !!}
                            </select>
                        @endfor
                        <div class="flex space-x-0.5">
                            <a class="remove-content-button">
                                <img src="{{asset('img/icons/dark/less.webp')}}" alt="Eliminar autor">
                            </a>
                            <a id="add_author" class="add-content-button">
                                <img src="{{asset('img/icons/dark/add.webp')}}" alt="Afegir autor">
                            </a>
                        </div>
                    </div>
                    <div class="flex border-guide-2">
                        <button>
                            <img src="{{asset('img/icons/dark/edit.webp')}}" alt="Editar camp" style="width: 20px">
                        </button>
                    </div>
                </div>
            @else
                <div class="">
                    <!-- Create -->
                    <div>
                        <label class="mx-2.5" for="authors_0">Autoria:</label>
                        <select name="authors[]" id="authors_{{ $i }}" class="border-0">
                            {!! getCollaboratorsOptions($collaborators) !!}
                        </select>
                        <a class="remove-content-button">Eliminar</a>
                        <a id="add_author" class="add-content-button">Afegir autor</a>
                    </div>
                    <div>
                        <label class="mx-2.5" for="translators_0">Traducció:</label>
                        <select name="translators[]" id="translators_{{ $i }}" class="border-0">
                            {!! getCollaboratorsOptions($collaborators) !!}
                        </select>
                        <a class="remove-content-button">Eliminar</a>
                        <a id="add_author" class="add-content-button">Afegir traductor</a>
                    </div>
                </div>
            @endif
            <div class="border-guide-1">
                <div class="flex justify-between items-center border-guide-2">
                    <label class="mx-2.5" for="headline">Capçalera:</label>
                    <div class="flex border-guide-2">
                        <button>
                            <img src="{{asset('img/icons/dark/edit.webp')}}" alt="Editar camp" style="width: 20px">
                        </button>
                    </div>
                </div>
                <div class="grow-wrap border-guide-2">
                    <textarea name="headline" id="headline" class="border-0"
                        onInput="this.parentNode.dataset.replicatedValue = this.value">{{ $book['headline'] ?? '' }}</textarea>
                </div>
            </div>
            <div class="border-guide-1">
                <div class="flex justify-between items-center border-guide-2">
                    <label class="mx-2.5" for="description">Descripció:</label>
                    <div class="flex border-guide-2">
                        <button>
                            <img src="{{asset('img/icons/dark/edit.webp')}}" alt="Editar camp" style="width: 20px">
                        </button>
                    </div>
                </div>
                <div class="grow-wrap">
                    <textarea id="description" class="border-0" name="description"
                        onInput="this.parentNode.dataset.replicatedValue = this.value">{{ $book['description'] ?? '' }}</textarea>
                </div>
            </div>

            {{-- <div>
                    <label class="mx-2.5" for="image_file">Portada:</label>
                    <div><img style="width: 100px" src="/img/books/covers/{{ $book['image'] ?? '' }}" alt="thumbnail">
                    </div>
                    <input type="file" name="image_file" id="image_file" accept="image">
                    <input type="hidden" name="image" id="image" value="{{ $book['image'] ?? 'default.webp' }}"
                        class="border-0">
                </div> --}}

            <div class="flex justify-between border-guide-1">
                <div class="flex items-center space-x-2 border-guide-2">
                    {{-- <label class="mx-2.5" for="sample"></label> --}}
                    <img src="{{asset('img/icons/grey/pdf.webp')}}" alt="Document PDF del sample del llibre {{ $book['title']}}" style="width: 28px">
                    <div class="mx-2.5 min-w-fit"><a href="/pdf/book/{{ $book['sample'] ?? '' }}"
                            target="_blank">{{ $book['sample_url'] ?? 'No hi ha cap mostra encara' }}</a></div>
                    <input class="border-0" type="file" name="sample" id="sample" accept=".pdf"
                        value="{{ $book['image'] ?? '' }}">
                </div>
                <div class="flex border-guide-2">
                    <button>
                        <img src="{{asset('img/icons/dark/edit.webp')}}" alt="Editar camp" style="width: 20px">
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap justify-between mb-8">
        <fieldset class="min-w-80 space-y-2.5 mb-6">
            <legend class="mx-2">Dades de l'edició</legend>
            <div class="">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-2 min-h-5">
                        <label class="mx-2.5 min-w-fit" for="isbn">ISBN:</label>
                        <input id="isbn" class="border-0" type="text" name="isbn"
                            value="{{ $book['isbn'] ?? '' }}">
                    </div>
                    <div class="flex border-guide-2">
                        <button>
                            <img src="{{asset('img/icons/dark/edit.webp')}}" alt="Editar camp" style="width: 20px">
                        </button>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-2 min-h-5">
                        <label class="mx-2.5 min-w-fit" for="languages">Idioma:</label>
                        @for ($i = 0; $i < count($book['lang']); $i++)
                            <select name="lang[]" id="language_{{ $i }}" class="border-0">
                                {!! getLanguagesOptions($languages, $book['lang'][$i]['iso'])[0] !!}
                            </select>
                        @endfor
                        <div class="flex space-x-0.5">
                            <a class="remove-content-button">
                                <img src="{{asset('img/icons/dark/less.webp')}}" alt="Eliminar autor">
                            </a>
                            <a id="add_author" class="add-content-button">
                                <img src="{{asset('img/icons/dark/add.webp')}}" alt="Afegir autor">
                            </a>
                        </div>
                    </div>
                    <div class="flex border-guide-2">
                        <button>
                            <img src="{{asset('img/icons/dark/edit.webp')}}" alt="Editar camp" style="width: 20px">
                        </button>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-2 min-h-5">
                        <label class="mx-2.5 min-w-fit" for="publisher">Edita:</label>
                        <input type="text" name="publisher" id="publisher" value="{{ $book['publisher'] ?? '' }}"
                            class="border-0">
                    </div>
                    <div class="flex border-guide-2">
                        <button>
                            <img src="{{asset('img/icons/dark/edit.webp')}}" alt="Editar camp" style="width: 20px">
                        </button>
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-2 min-h-5">
                        <label class="mx-2.5 min-w-fit" for="size">Dimensions:</label>
                        <input type="text" name="size" id="size" value="{{ $book['size'] ?? '' }}"
                            class="border-0">
                    </div>
                    <div class="flex border-guide-2">
                        <button>
                            <img src="{{asset('img/icons/dark/edit.webp')}}" alt="Editar camp" style="width: 20px">
                        </button>
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-2 min-h-5">
                        <label class="mx-2.5 min-w-fit" for="number_of_pages">Pàgines:</label>
                        <input id="number_of_pages" class="border-0 number" type="number" name="number_of_pages"
                            value="{{ $book['number_of_pages'] ?? '' }}">
                    </div>
                    <div class="flex border-guide-2">
                        <button>
                            <img src="{{asset('img/icons/dark/edit.webp')}}" alt="Editar camp" style="width: 20px">
                        </button>
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-2 min-h-5">
                        <label class="mx-2.5 min-w-fit" for="publication_date">Publicació:</label>
                        <input id="publication_date" class="border-0" type="date" name="publication_date"
                            value="{{ $book['publication_date'] ?? '' }}">
                    </div>
                    <div class="flex border-guide-2">
                        <button>
                            <img src="{{asset('img/icons/dark/edit.webp')}}" alt="Editar camp" style="width: 20px">
                        </button>
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-2">
                        <label class="mx-2.5 min-w-fit" for="enviromental_footprint">Petjada ambiental:</label>
                        <input id="enviromental_footprint" class="border-0" type="text" name="enviromental_footprint"
                            value="{{ $book['enviromental_footprint'] ?? '-' }}">
                    </div>
                    <div class="flex border-guide-2">
                        <button>
                            <img src="{{asset('img/icons/dark/edit.webp')}}" alt="Editar camp" style="width: 20px">
                        </button>
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <label class="mx-2.5 min-w-fit" for="legal_diposit">Dipòsit Legal:</label>
                        <input id="legal_diposit" class="border-0" type="text" name="legal_diposit"
                            value="{{ $book['legal_diposit'] ?? '' }}">
                    </div>
                    <div class="flex border-guide-2">
                        <button>
                            <img src="{{asset('img/icons/dark/edit.webp')}}" alt="Editar camp" style="width: 20px">
                        </button>
                    </div>
                </div>

            </div>
        </fieldset>
        <fieldset class="min-w-80 mb-6">
            <legend class="mx-2">Dades extres del llibre</legend>
            <div class="">
                <?php $i = 0; ?>
                @foreach ($book['extras'] as $extra)
                    <div class="flex items-center space-x-2">
                        <label class="mx-2.5 min-w-fit"
                            for="extras_{{ $i }}">{{ $extra['key'] }}:</label>
                        <input class="border-0" id="extras_{{ $i }}" type="text"
                            name="extras_{{ $i }}" value="{{ $extra['value'] }}">
                    </div>
                    <?php $i++; ?>
                @endforeach
            </div>
        </fieldset>
        <fieldset class="min-w-80 space-y-2.5 mb-6">
            <legend class="mx-2">Dades de l'edició original</legend>
            <div class="">
                <div class="flex space-x-2">
                    <label class="mx-2.5 min-w-fit" for="original_title">Títol original:</label>
                    <input id="original_title" class="border-0" type="text" name="original_title"
                        value="{{ $book['original_title'] ?? '' }}">
                </div>
                <div class="flex space-x-2">
                    <label class="mx-2.5 min-w-fit" for="original_publisher">Editorial original:</label>
                    <input id="original_publisher" class="border-0" type="text" name="original_publisher"
                        value="{{ $book['original_publisher'] ?? '' }}">
                </div>
                <div class="flex space-x-2">
                    <label class="mx-2.5 min-w-fit" for="original_publication_date">Data de publicació
                        original:</label>
                    <input id="original_publication_date" class="border-0" type="input"
                        name="original_publication_date" value="{{ $book['original_publication_date'] ?? '' }}">
                </div>
            </div>
        </fieldset>
    </div>
    <div>
        <fieldset class="space-y-2.5">
            <legend class="mx-2">Preu</legend>
            <div class="flex justify-between">
                <div class="flex space-x-2">
                    <label class="mx-2.5 min-w-fit" for="pvp">Preu</label>
                    <input class="border-0" type="number" name="pvp" id="pvp"
                        value="{{ $book['pvp'] ?? '' }}">
                </div>
                <div class="flex space-x-2">
                    <label class="mx-2.5 min-w-fit" for="iva">IVA (%)</label>
                    <input class="border-0" type="number" name="iva" id="iva"
                        value="{{ $book['iva'] ?? '' }}">
                </div>
                <div class="flex space-x-2">
                    <label class="mx-2.5 min-w-fit" for="discounted_price">Preu amb descompte (preu
                        final)</label>
                    <input class="border-0" type="number" name="discounted_price" id="discounted_price"
                        value="{{ $book['discounted_price'] ?? '' }}">
                </div>
            </div>
        </fieldset>
    </div>
    <div class="flex justify-between">
        <fieldset class="w-full space-y-2.5">
            <legend class="mx-2">Col·leccions</legend>
            <div class="flex space-x-2">
                @if (isset($book))
                    @for ($i = 0; $i < count($book['collections']); $i++)
                        <label class="mx-2.5" for="collections_{{ $i }}">Col·leccions</label>
                        <select class="border-0" name="collections[]" id="collections_{{ $i }}">
                            {!! getCollectionsOptions($collections, $book['collections'][$i]['id'] ?? '') !!}
                        </select>
                    @endfor
                @else
                    <div>
                        <label class="mx-2.5" for="collections_0">Col·leccions:</label>
                        <select class="border-0" name="collections[]" id="collections_0">
                            <?php getCollectionsOptions($collections);
                            ?>
                        </select>
                    </div>
                @endif
                <div class="flex space-x-0.5">
                    <a class="remove-content-button">
                        <img src="{{asset('img/icons/dark/less.webp')}}" alt="Eliminar autor">
                    </a>
                    <a id="add_author" class="add-content-button">
                        <img src="{{asset('img/icons/dark/add.webp')}}" alt="Afegir autor">
                    </a>
                </div>
            </div>
        </fieldset>
        <fieldset class="w-full max-w-md">
            <legend class="mx-2">Stock</legend>
            <div class="flex justify-between items-center">
                <div class="flex space-x-2">
                    <label class="mx-2.5" for="stock">Stock:</label>
                    <input class="border-0 number" type="number" name="stock" id="stock"
                        value="{{ $book['stock'] ?? '' }}">
                </div>
                <div>
                    <a class="mx-2.5 underline" href="{{ route('stock.edit', $book['id']) }}" class="underline">Gestionar
                        stock</a>
                </div>
            </div>
        </fieldset>
    </div>
    <div>
        <fieldset>
            <legend class="mx-2.5" for="visible">Visible a la web?</legend>
            <div class="mx-2.5 flex space-x-4">
                <div class="flex items-center space-x-2">
                    <input type="radio" id="visible_true" name="visible"
                        @if (isset($book) && $book['visible']) checked @endif; value="true"><label class="font-normal"
                        for="visible_true">Sí</label>
                </div>
                <div class="flex items-center space-x-2">
                    <input type="radio" id="visible_false" name="visible"
                        @if (isset($book) && !$book['visible']) checked @endif; value="false"><label class="font-normal"
                        for="visible_true">No</label>
                </div>
            </div>
        </fieldset>
    </div>

    <div>
        <fieldset class="space-y-2.5">
            <legend class="mx-2">Opcions avançades: metadades</legend>
            <div class="flex space-x-2">
                <label class="mx-2.5 min-w-fit" for="slug">Enllaç:</label>
                <div class="flex items-center">
                    <p class="min-w-fit">eteredicions.com /</p>
                    <input class="min-w-80 border-0 m-0 px-0" type="text" name="slug" id="slug"
                        value="{{ $book['slug'] ?? '' }}">
                </div>
            </div>
            <div class="flex items-start space-x-2">
                <div class="min-w-fit">
                    <label class="mx-2.5 min-w-fit" for="meta_title">Títol del llibre:</label>
                        <small class="font-bold mx-2.5">(aparença en buscadors i navegador)</small>
                </div>
                <input class="border-0" type="text" name="meta_title" id="meta_title"
                    value="{{ $book['meta_title'] ?? '' }}">
            </div>
            <div class="flex items-start space-x-2">
                <div class="min-w-fit">
                    <label class="mx-2.5 min-w-fit" for="meta_description">Descripció del llibre:</label>
                    <small class="font-bold mx-2.5">(aparença en buscadors i navegador)</small>
                </div>
                <div class="w-full grow-wrap">
                    <textarea class="border-0" name="meta_description" id="meta_description"
                        onInput="this.parentNode.dataset.replicatedValue = this.value">{{ $book['meta_description'] ?? '' }}</textarea>
                </div>
            </div>

            {{-- <div class="flex items-center space-x-2">
            <label class="min-w-fit" for="slug_options"></label>
            <input class="" type="checkbox" id="slug_options" name="slug_options">Regenerar URL (pot afectar SEO) --}}
    </div>
    </fieldset>
</div>
</div>

<div id="save">
    {{-- <button type="submit" value="redirect" name="action">Desar canvis</button> --}}
    <button id="submit-button" class="send-button" type="submit" value="stay" name="action">Desar canvis</button>
</div>
@if ($errors->any())
    <div class="alert alert-danger m-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<script src="/js/form/dynamic_textarea.js"></script>
