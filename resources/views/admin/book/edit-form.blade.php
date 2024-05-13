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
        $options .= "<option class='border-0 enabled' value='{$collaborator['id']}' $selectedAttr>{$collaborator['first_name']} {$collaborator['last_name']}</option>";
    }
    return $options;
}

function getCollectionsOptions($collections, $selected = -1)
{
    $options = '';
    // $options = '<option disabled>Selecciona una opció</option>';
    foreach ($collections as $collection) {
        $selectedAttr = $collection['id'] == $selected ? 'selected' : '';
        $options .= "<option class='border-0 enabled' value='{$collection['id']}' $selectedAttr>{$collection['name']}</option>";
    }
    return $options;
}

function getLanguagesOptions($languages, $selected = null)
{
    $options = '';
    foreach ($languages as $language) {
        $selectedAttr = $language['iso'] == $selected ? 'selected' : '';
        $options .= "<option class='border-0 enabled' value='" . $language['iso'] . "' " . $selectedAttr . '>' . $language['name'] . '</option>';
    }
    return $options;
    // " . $language['iso'] . "' " . $selectedAttr . ">" . $language['name'] .
}
?>

<link rel="stylesheet" href="{{ asset('css/admin/book.css') }}">
@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">No s'han pogut actualitzar les dades del llibre.</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-systemerror" role="button" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20" onclick="removeParentDiv(this.parentNode)">
                <title>Close</title>
                <path
                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
            </svg>
        </span>
    </div>
@endif
<div>
    <select id="getCollaboratorsOptions" class="hidden space-x-2">
        {!! getCollaboratorsOptions($collaborators) !!}
    </select>
    <select id="getCollectionsOptions" class="hidden space-x-2">
        {!! getCollectionsOptions($collections) !!}
    </select>
    <select id="getLanguagesOptions" class="hidden space-x-2">
        {!! getLanguagesOptions($languages) !!}
    </select>
</div>
<div class="book space-y-12">
    <div
        class="book-detail flex flex-col lg:flex-row items-center lg:items-start justify-start space-y-6 lg:space-y-0 lg:space-x-6 mb-4">
        <div class="cover relative">
            <img class="w-[60vw] md:w-[40vw] xl:w-[15vw]" src="{{ asset('img/books/covers/' . $book['image']) }}"
                alt="{{ $book['title'] }}">
            <div id="edit_cover_image" class="edit-button edit-image image-upload">
                <label for="book-cover-input">
                    <img src="{{ asset('img/icons/light/edit.webp') }}" alt="Editar camp" style="width: 20px" />
                </label>

                <input id="book-cover-input" type="file" name="image_file" id="image_file" accept="image/*">
                <input type="hidden" name="image" id="image" value="{{ $book['image'] ?? 'default.webp' }}"
                    class="border-0">
            </div>
            @error('image_file')
                <small class="text-systemerror">{{ $message }}</small>
            @enderror
        </div>

        <div class="details w-full flex flex-col space-y-3 justify-between h-auto">

            <div class="flex justify-between items-center ">
                <div class="flex items-center space-x-2">
                    <label class="flex items-center mx-2.5" for="title">Títol:</label>
                    <div>
                        <input
                            class=" min-w-96 disabled @error('title') border border-systemerror @else border-0 @enderror"
                            type="text" name="title" id="title" value="{{ $book['title'] ?? '' }}" readonly>

                    </div>
                    @error('title')
                        <small class="text-systemerror">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex ">
                    <button class="edit-button" type="button" onclick="enableInput(this)">
                        <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp" style="width: 20px">
                    </button>
                </div>
            </div>

            <div>
                <div class="flex justify-between items-center">
                    <div class="flex flex-wrap items-center space-x-2">
                        <label class="mx-2.5" for="authors">Autoria:</label>
                        @for ($i = 0; $i < count($book['authors']); $i++)
                            <div class="flex">
                                <select name="authors[]" id="authors_{{ $i }}"
                                    class="@error('authors') is-invalid @else border-0 @enderror">
                                    {!! getCollaboratorsOptions($collaborators, $book['authors'][$i]['id']) !!}
                                </select>
                                <button class="remove-content-button" type="button" onclick="removeParentDiv(this)"
                                    disabled>
                                    <img src="{{ asset('img/icons/dark/less.webp') }}" alt="Eliminar autor">
                                </button>
                            </div>
                        @endfor
                        @error('authors')
                            <small class="text-systemerror">{{ $message }}</small>
                        @enderror
                        <button id="add_author" type="button" class="add-content-button" disabled>
                            <img src="{{ asset('img/icons/dark/add.webp') }}" alt="Afegir autor">
                        </button>
                    </div>
                    <div class="flex space-x-2">
                        <button class="edit-button" type="button" onclick="enableSelect(this)">
                            <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp" style="width: 20px">
                        </button>
                    </div>
                </div>

            </div>
            <div>
                <div class="flex justify-between items-center">
                    <div class="flex flex-wrap space-x-2 @error('translators') is-invalid @enderror">
                        <label class="flex items-center mx-2.5" for="translators">Traducció:</label>
                        @if (array_key_exists('translators', $book))
                            @for ($i = 0; $i < count($book['translators']); $i++)
                                <div class="flex">
                                    <select name="translators[]" id="translators_{{ $i }}"
                                        class="@error('translators') is-invalid @else border-0 @enderror" disabled>
                                        {!! getCollaboratorsOptions($collaborators, $book['translators'][$i]['id']) !!}
                                    </select>
                                    <button class="remove-content-button" type="button" onclick="removeParentDiv(this)"
                                        disabled>
                                        <img src="{{ asset('img/icons/dark/less.webp') }}" alt="Eliminar autor">
                                    </button>
                                </div>
                            @endfor
                            @error('translators')
                                <small class="text-systemerror">{{ $message }}</small>
                            @enderror
                        @endif
                        <div class="flex space-x-0.5">
                            <button id="add_translator" type="button" class="add-content-button" disabled>
                                <img src="{{ asset('img/icons/dark/add.webp') }}" alt="Afegir autor">
                            </button>
                        </div>
                    </div>
                    <div class="flex ">
                        <button class="edit-button" type="button" onclick="enableSelect(this)">
                            <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp"
                                style="width: 20px">
                        </button>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="flex justify-between items-center">
                    <label class="flex items-center mx-2.5" for="headline">Capçalera:</label>
                    <div class="flex ">
                        <button class="edit-button" type="button" onclick="enableTextarea(this)">
                            <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp"
                                style="width: 20px">
                        </button>
                    </div>
                </div>
                <div class="grow-wrap ">
                    <textarea name="headline" id="headline" class="@error('headline') is-invalid @else border-0 @enderror"
                        onInput="this.parentNode.dataset.replicatedValue = this.value" readonly>{{ $book['headline'] ?? '' }}</textarea>
                </div>
                @error('headline')
                    <small class="text-systemerror">{{ $message }}</small>
                @enderror
            </div>
            <div class="">
                <div class="flex justify-between items-center">
                    <label class="flex items-center mx-2.5" for="description">Descripció:</label>
                    <div class="flex ">
                        <button class="edit-button" type="button" onclick="enableTextarea(this)">
                            <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp"
                                style="width: 20px">
                        </button>
                    </div>
                </div>
                <div class="grow-wrap">
                    <textarea id="description" class="@error('description') is-invalid @else border-0 @enderror" name="description"
                        onInput="this.parentNode.dataset.replicatedValue = this.value" readonly>{{ $book['description'] ?? '' }}</textarea>
                </div>
                @error('description')
                    <small class="text-systemerror">{{ $message }}</small>
                @enderror
            </div>

            <div class="flex justify-between ">
                <div class="flex items-center space-x-2 @error('sample') is-invalid @enderror">
                    <a
                        @if ($book['sample'] != '') href="{{ route('book.sample', $book['sample']) }}" target="_blank" @endif>
                        <img src="{{ asset('img/icons/grey/pdf.webp') }}"
                            alt="Document PDF del sample del llibre {{ $book['title'] }}" style="width: 28px">
                        <div id="oldSample" class="mx-2.5 min-w-fit">
                            {{ $book['sample'] != '' ? $book['sample'] : 'No hi ha cap mostra disponible' }}
                    </a>
                </div>
                </a>
                <input class="border-0 hidden" type="file" name="sample" id="sample" accept=".pdf"
                    value="{{ $book['sample'] ?? '' }}" readonly>
            </div>
            <div class="flex ">
                <button class="edit-button" type="button" onclick="enableInputFile(this)">
                    <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp" style="width: 20px">
                </button>
            </div>
        </div>
    </div>
</div>
<div class="flex flex-wrap justify-between mb-8">
    <fieldset class="min-w-80 space-y-2.5 mb-6">
        <legend class="mx-2">Dades de l'edició</legend>
        <div class="space-y-1">
            <div class="flex justify-between items-center ">
                <div class="flex items-center space-x-2 min-h-5">
                    <label class="flex items-center mx-2.5 min-w-fit" for="isbn">ISBN:</label>
                    <input id="isbn" class="@error('isbn') is-invalid @else border-0 @enderror" type="text"
                        name="isbn" value="{{ $book['isbn'] ?? '' }}" readonly>
                </div>
                @error('isbn')
                    <small class="text-systemerror">{{ $message }}</small>
                @enderror
                <div class="flex ">
                    <button class="edit-button" type="button" onclick="enableInput(this)">
                        <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp" style="width: 20px">
                    </button>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2 min-h-5">
                    <label class="flex items-center mx-2.5 min-w-fit" for="languages">Idioma:</label>
                    @if (array_key_exists('lang', $book))
                        @for ($i = 0; $i < count($book['lang']); $i++)
                            <div class="flex items-center space-x-2">
                                <select name="lang[]" id="language_{{ $i }}"
                                    class="@error('lang') is-invalid @else border-0 @enderror">
                                    {!! getLanguagesOptions($languages, $book['lang'][$i]['iso']) !!}
                                </select>
                                @error('lang')
                                    <small class="text-systemerror">{{ $message }}</small>
                                @enderror
                                <button class="remove-content-button" type="button" onclick="removeParentDiv(this)"
                                    disabled>
                                    <img src="{{ asset('img/icons/dark/less.webp') }}" alt="Eliminar idioma">
                                </button>
                            </div>
                        @endfor
                    @endif
                    <div class="flex space-x-0.5">
                        <button id="add_language" type="button" class="add-content-button" disabled>
                            <img src="{{ asset('img/icons/dark/add.webp') }}" alt="Afegir idioma">
                        </button>
                    </div>
                </div>
                <div class="flex ">
                    <button class="edit-button" type="button" onclick="enableSelect(this)">
                        <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp" style="width: 20px">
                    </button>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2 min-h-5">
                    <label class="flex items-center mx-2.5 min-w-fit" for="publisher">Edita:</label>
                    <input type="text" name="publisher" id="publisher" value="{{ $book['publisher'] ?? '' }}"
                        class="@error('publisher') is-invalid @else border-0 @enderror" readonly>
                    @error('publisher')
                        <small class="text-systemerror">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex ">
                    <button class="edit-button" type="button" onclick="enableInput(this)">
                        <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp" style="width: 20px">
                    </button>
                </div>
            </div>

            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2 min-h-5">
                    <label
                        class="flex items-center mx-2.5 min-w-fit @error('number_of_pages') is-invalid @else border0 @enderror"
                        for="number_of_pages">Pàgines:</label>
                    <input id="number_of_pages" class="border-0 number" type="number" name="number_of_pages"
                        value="{{ $book['number_of_pages'] ?? '' }}" readonly min="0">
                    @error('number_of_pages')
                        <small class="text-systemerror">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex ">
                    <button class="edit-button" type="button" onclick="enableInput(this)">
                        <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp" style="width: 20px">
                    </button>
                </div>
            </div>

            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2 min-h-5">
                    <label class="flex items-center mx-2.5 min-w-fit" for="size">Dimensions:</label>
                    <input type="text" name="size" id="size" value="{{ $book['size'] ?? '' }}"
                        class="@error('size') is-invalid @else border-0 @enderror" readonly>
                    @error('size')
                        <small class="text-systemerror">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex ">
                    <button class="edit-button" type="button" onclick="enableInput(this)">
                        <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp" style="width: 20px">
                    </button>
                </div>
            </div>

            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2 min-h-5">
                    <label class="flex items-center mx-2.5 min-w-fit" for="publication_date">Publicació:</label>
                    <input id="publication_date"
                        class="@error('publication_date') is-invalid @else border-0 @enderror" type="date"
                        {{-- work when is type text  --}}
                        name="publication_date" value="{{ $book['publication_date'] ?? '' }}" readonly>
                    @error('publication_date')
                        <small class="text-systemerror">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex ">
                    <button class="edit-button" type="button" onclick="enableInputDate(this)">
                        <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp" style="width: 20px">
                    </button>
                </div>
            </div>

            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <label class="flex items-center mx-2.5 min-w-fit" for="enviromental_footprint">Petjada
                        ambiental:</label>
                    <input id="enviromental_footprint"
                        class="@error('enviromental_footprint') is-invalid @else border-0 @enderror" type="text"
                        name="enviromental_footprint" value="{{ $book['enviromental_footprint'] ?? '-' }}" readonly>
                    @error('enviromental_footprint')
                        <small class="text-systemerror">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex ">
                    <button class="edit-button" type="button" onclick="enableInput(this)">
                        <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp" style="width: 20px">
                    </button>
                </div>
            </div>

            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <label class="flex items-center mx-2.5 min-w-fit" for="legal_diposit">Dipòsit Legal:</label>
                    <input id="legal_diposit" class="@error('legal_diposit') is-invalid @else border-0 @enderror"
                        type="text" name="legal_diposit" value="{{ $book['legal_diposit'] ?? '' }}" readonly>
                    @error('legal_diposit')
                        <small class="text-systemerror">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex ">
                    <button class="edit-button" type="button" onclick="enableInput(this)">
                        <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp" style="width: 20px">
                    </button>
                </div>
            </div>

        </div>
    </fieldset>
    <fieldset class="min-w-80 mb-6 space-y-2.5">
        <legend class="mx-2">Dades extra del llibre</legend>
        @error('extras')
            <small class="text-systemerror">{{ $message }}</small>
        @enderror
        <div class="space-y-1">
            <?php $i = 0; ?>
            @if (array_key_exists('extras', $book))
                @foreach ($book['extras'] as $extra)
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <div class="flex space-x-2">
                                <label class="flex items-center mx-2.5 min-w-fit"
                                    for="extras_{{ $i }}">{{ $extra['key'] }}:</label>
                                <input type="hidden" name="extras[{{ $i }}][key]"
                                    value="{{ $extra['key'] }}">
                                <input class="border-0" id="extras_{{ $i }}" type="text"
                                    name="extras[{{ $i }}][value]" value="{{ $extra['value'] }}"
                                    readonly>
                            </div>
                            <button class="remove-content-button" type="button" onclick="removeParentDiv(this)"
                                disabled>
                                <img src="{{ asset('img/icons/dark/less.webp') }}" alt="Eliminar extra">
                            </button>
                        </div>
                        <div class="flex ">
                            <button class="edit-button" type="button" onclick="enableInputExtra(this)">
                                <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp"
                                    style="width: 20px">
                            </button>
                        </div>
                    </div>
                    <?php $i++; ?>
                @endforeach
                @error('extras.*')
                    <small class="ms-2.5 text-systemerror">{{ $message }}</small>
                @enderror
            @endif
            <div class="flex justify-center">
                <button id="add_extra" type="button" class="add-content-button">
                    <img src="{{ asset('img/icons/dark/add.webp') }}" alt="Afegir extra">
                </button>
            </div>
        </div>
    </fieldset>
    <fieldset class="min-w-80 space-y-2.5 mb-6">
        <legend class="mx-2">Dades de l'edició original</legend>
        <div class="space-y-1">
            <div class="flex justify-between items-center">
                <div class="flex space-x-2">
                    <label class="flex items-center mx-2.5 min-w-fit" for="original_title">Títol
                        original:</label>
                    <input id="original_title"
                        class="@error('original_title') is-invalid @else border-0 @enderror min-w-fit" type="text"
                        name="original_title" value="{{ $book['original_title'] ?? '' }}" readonly>
                    @error('original_title')
                        <small class="text-systemerror">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex ">
                    <button class="edit-button" type="button" onclick="enableInput(this)">
                        <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp" style="width: 20px">
                    </button>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <div class="flex space-x-2">
                    <label class="flex items-center mx-2.5 min-w-fit" for="original_publisher">Editorial
                        original:</label>
                    <input id="original_publisher"
                        class="@error('original_publisher') is-invalid @else border-0 @enderror min-w-fit"
                        type="text" name="original_publisher" value="{{ $book['original_publisher'] ?? '' }}"
                        readonly>
                    @error('original_publisher')
                        <small class="text-systemerror">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex ">
                    <button class="edit-button" type="button" onclick="enableInput(this)">
                        <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp" style="width: 20px">
                    </button>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <div class="flex space-x-2">
                    <label class="flex items-center mx-2.5 min-w-fit" for="original_publication_date">Data de
                        publicació
                        original:</label>
                    <input id="original_publication_date"
                        class="@error('original_publication_date') is-invalid @else border-0 @enderror"
                        type="date" name="original_publication_date"
                        {{-- work when is type text  --}}
                        value="{{ $book['original_publication_date'] ?? '' }}" readonly>
                    @error('original_publication_date')
                        <small class="text-systemerror">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex ">
                    <button class="edit-button" type="button" onclick="enableInput(this)">
                        <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp" style="width: 20px">
                    </button>
                </div>
            </div>
        </div>
    </fieldset>
</div>
<div>
    <fieldset class="space-y-2.5">
        <legend class="mx-2">Preu</legend>
        <div class="md:flex md:flex-row md:justify-between md:items-start space-y-2 md:space-y-0">
            <div>
                <div class="flex justify-between items-center">
                    <div class="flex space-x-2">
                        <label class="flex items-center mx-2.5 min-w-fit" for="pvp">Preu</label>
                        <input class="@error('pvp') is-invalid @else border-0 @enderror number" type="number"
                            name="pvp" id="pvp" step="0.01" value="{{ $book['pvp'] ?? '' }}" readonly min="0.01">
                    </div>
                    <div class="flex ">
                        <button class="edit-button" type="button" onclick="enableInput(this)">
                            <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp"
                                style="width: 20px">
                        </button>
                    </div>
                </div>
                @error('pvp')
                    <small class="text-systemerror">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <div class="flex justify-between items-center">
                    <div class="flex space-x-2">
                        <label class="flex items-center mx-2.5 min-w-fit" for="iva">IVA (%)</label>
                        <input class="@error('iva') is-invalid @else border-0 @enderror number" type="number"
                            name="iva" id="iva" value="{{ $book['iva'] ?? '' }}" readonly min="0">
                    </div>
                    <div class="flex ">
                        <button class="edit-button" type="button" onclick="enableInput(this)">
                            <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp"
                                style="width: 20px">
                        </button>
                    </div>
                </div>
                @error('iva')
                    <small class="ms-2.5 text-systemerror">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <div class="flex justify-between items-center">
                    <div class="flex space-x-2">
                        <label class="flex items-center mx-2.5 min-w-fit" for="discounted_price">Preu amb descompte
                            (preu
                            final)</label>
                        <input class="@error('discounted_price') is-invalid @else border-0 @enderror number"
                            type="number" name="discounted_price" id="discounted_price"
                            value="{{ $book['discounted_price'] ?? '' }}" readonly min="0">
                    </div>
                    <div class="flex ">
                        <button class="edit-button" type="button" onclick="enableInput(this)">
                            <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp"
                                style="width: 20px">
                        </button>
                    </div>
                </div>
                @error('discounted_price')
                    <small class="ms-2.5 text-systemerror">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </fieldset>
</div>
<div class="lg:flex lg:justify-between space-y-5 lg:space-y-0">
    <fieldset class="w-full md:w-auto space-y-2.5">
        <div class="flex justify-between items-center">
            <legend class="mx-2">Col·leccions</legend>
            <div class="flex md:hidden min-w-[1em]">
                <button class="edit-button" type="button" onclick="enableSelect(this.parentNode)">
                    <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp" style="width: 20px">
                </button>
            </div>
        </div>
        <div class="flex justify-between space-x-4 items-start md:items-center ">
            <div>
                <div class="w-full md:w-auto md:flex space-x-2">
                    <label class="flex items-center mx-2.5"
                        for="collections_{{ $i }}">Col·leccions</label>
                    @if (array_key_exists('collections', $book))
                        @for ($i = 0; $i < count($book['collections']); $i++)
                            <div class="w-full md:w-auto flex ">
                                <select
                                    class="-ms-2.5 md:ms-0 w-full md:w-auto @error('collections') @else border-0 is-invalid @enderror"
                                    name="collections[]" id="collections_{{ $i }}">
                                    {!! getCollectionsOptions($collections, $book['collections'][$i]['id'] ?? '') !!}
                                </select>
                                <button class="remove-content-button" type="button" onclick="removeParentDiv(this)"
                                    disabled>
                                    <img src="{{ asset('img/icons/dark/less.webp') }}" alt="Eliminar col·lecció">
                                </button>
                            </div>
                        @endfor
                    @endif

                    <div class="flex space-x-0.5">
                        <button id="add_collection" type="button" class="add-content-button" disabled>
                            <img src="{{ asset('img/icons/dark/add.webp') }}" alt="Afegir autor">
                        </button>
                    </div>
                </div>
                @error('collections')
                    <small class="ms-2.5 text-systemerror">{{ $message }}</small>
                @enderror
            </div>
            <div class="hidden md:flex min-w-[1em]">
                <button class="edit-button" type="button" onclick="enableSelect(this)">
                    <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp" style="width: 20px">
                </button>
            </div>
        </div>
    </fieldset>
    <fieldset class="w-full lg:w-1/3 space-y-2.5">
        <legend class="mx-2">Stock</legend>
        <div class="flex justify-between items-center ">
            <div class="flex justify-between items-center">
                <div class="flex space-x-2">
                    <label class="flex items-center mx-2.5" for="stock">Stock:</label>
                    <input class="@error('stock') is-invalid @else border-0 @enderror number" type="number"
                        name="stock" id="stock" value="{{ $book['stock'] ?? '' }}" readonly min="0">
                </div>
                <div class="flex ">
                    <button class="edit-button" type="button" onclick="enableInput(this)">
                        <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp" style="width: 20px">
                    </button>
                </div>
            </div>
            <div>
                <a class="mx-2.5 underline" href="{{ route('stock.edit', $book['id']) }}"
                    class="underline">Gestionar
                    stock</a>
            </div>
        </div>
        @error('stock')
            <small class="ms-2.5 text-systemerror">{{ $message }}</small>
        @enderror
    </fieldset>
</div>
<div>
    <fieldset>
        <legend class="mx-2.5" for="visible">Visible a la web?</legend>
        <div class="mx-2.5 flex space-x-4">
            <div class="flex items-center space-x-2">
                <input type="radio" id="visible_true" name="visible"
                    @if (isset($book) && $book['visible']) checked @endif; value="1"><label class="font-normal"
                    for="visible_true">Sí</label>
            </div>
            <div class="flex items-center space-x-2">
                <input type="radio" id="visible_false" name="visible"
                    @if (isset($book) && !$book['visible']) checked @endif; value="0"><label class="font-normal"
                    for="visible_true">No</label>
            </div>
        </div>
        @error('visible')
            <small class="ms-2.5 text-systemerror">{{ $message }}</small>
        @enderror
    </fieldset>
</div>

<div>
    <fieldset class="w-full pe-2 space-y-2.5">
        <legend class="mx-2">Opcions avançades: metadades</legend>
        <div>
            <div class="flex justify-between items-center ">
                <div class="flex items-center">
                    <div class="flex min-w-fit">
                        <label class="flex items-center mx-2.5 min-w-fit" for="slug">Enllaç:</label>
                        <p class="min-w-fit">eteredicions.com /</p>
                    </div>
                    <input class="md:min-w-80 m-0 px-0 @error('slug') is-invalid @else border-0 @enderror"
                        type="text" name="slug" id="slug" value="{{ $book['slug'] ?? '' }}" readonly
                        disabled>
                </div>
                <div class="flex ">
                    <button class="edit-button" type="button" onclick="enableInput(this)">
                        <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp" style="width: 20px">
                    </button>
                </div>
            </div>
            @error('slug')
                <small class="ms-2.5 text-systemerror">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <div class="w-auto xl:flex">
                <div class="flex min-w-fit">
                    <div class="flex items-center space-x-2 min-w-fit ms-2.5">
                        <label class="flex items-center min-w-fit" for="meta_title">Títol del llibre:</label>
                        <small class="font-bold">(aparença en buscadors i navegador)</small>
                    </div>
                </div>
                <div class="w-full flex justify-between">
                    <input class="md:min-w-80 @error('meta_title') is-invalid @else border-0 @enderror"
                        type="text" name="meta_title" id="meta_title" value="{{ $book['meta_title'] ?? '' }}"
                        readonly disabled>
                    <button class="edit-button" type="button" onclick="enableInput(this)">
                        <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp" style="width: 20px">
                    </button>
                </div>
            </div>
            @error('meta_title')
                <small class="ms-2.5 text-systemerror">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <div class="w-auto">
                <div class="w-auto space-x-2 items-start">
                    <div class="flex items-center space-x-2 min-w-fit ms-2.5 pt-2">
                        <label class="flex items-center min-w-fit" for="meta_description">Descripció del
                            llibre:</label>
                        <small class="font-bold">(aparença en buscadors i navegador)</small>
                    </div>
                    <div class="flex items-start">
                        <div class="w-full grow-wrap">
                            <textarea class="@error('meta_description') is-invalid @else border-0 @enderror" name="meta_description"
                                id="meta_description" onInput="this.parentNode.dataset.replicatedValue = this.value" readonly disabled>{{ $book['meta_description'] ?? '' }}</textarea>
                        </div>
                        <div class="min-w-[1.25em] flex">
                            <button class="edit-button" type="button" onclick="enableTextarea(this)">
                                <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp"
                                    style="width: 20px">
                            </button>
                        </div>
                    </div>
                </div>
                @error('meta_description')
                    <small class="ms-2.5 text-systemerror">{{ $message }}</small>
                @enderror
            </div>

        </div>
</div>
</fieldset>
</div>
</div>

<div id="save" class="flex justify-center">
    <button id="submit-button" class="send-button" type="submit" value="stay" name="action">Desar
        canvis</button>
</div>

<script src="/js/form/dynamic_textarea.js"></script>
