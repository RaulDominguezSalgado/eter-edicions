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
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
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
<div class="book space-y-12 mb-5">
    <fieldset class="space-y-5">
        <legend>Dades del llibre</legend>
        <div>
            <label for="title">Títol llibre</label>
            <input type="text" name="title" id="title">
        </div>
        <div class="md:flex space-y-5 md:space-y-0 space-x-0 md:space-x-5">
            <div class="md:w-1/2 space-y-2">
                <div class="flex justify-between">
                    <label for="authors">Autoria</label>
                    <div class="flex">
                        <button class="remove-content-button" type="button"
                            onclick="removeLastElement(this.parentNode.parentNode)">
                            <img src="{{ asset('img/icons/dark/less.webp') }}" alt="Eliminar autor">
                        </button>
                        <div class="flex space-x-0.5">
                            <button id="add_author" type="button" class="add-content-button">
                                <img src="{{ asset('img/icons/dark/add.webp') }}" alt="Afegir author">
                            </button>
                        </div>
                    </div>
                </div>
                <div>
                    <select class="w-full" name="authors[]" id="authors_0">
                        {!! getCollaboratorsOptions($collaborators) !!}
                    </select>
                </div>
            </div>
            <div class="md:w-1/2 space-y-2">
                <div class="flex justify-between">
                    <label for="translators">Traducció</label>
                    <div class="flex">
                        <button class="remove-content-button" type="button"
                            onclick="removeLastElement(this.parentNode.parentNode)">
                            <img src="{{ asset('img/icons/dark/less.webp') }}" alt="Eliminar idioma">
                        </button>
                        <div class="flex space-x-0.5">
                            <button id="add_translator" type="button" class="add-content-button">
                                <img src="{{ asset('img/icons/dark/add.webp') }}" alt="Afegir traductor">
                            </button>
                        </div>
                    </div>
                </div>
                <div>
                    <select class="w-full" name="translators[]" id="authors_0">
                        {!! getCollaboratorsOptions($collaborators) !!}
                    </select>
                </div>
            </div>
        </div>
        <div>
            <label class="" for="headline">Capçalera:</label>
            <div class="grow-wrap ">
                <textarea name="headline" id="headline" class="" onInput="this.parentNode.dataset.replicatedValue = this.value"></textarea>
            </div>
        </div>
        <div>
            <label for="description">Descripció / sinopsi</label>
            <div class="grow-wrap ">
                <textarea name="description" id="description" rows="8"
                    onInput="this.parentNode.dataset.replicatedValue = this.value"></textarea>
            </div>
        </div>
        <div class="space-y-5 md:space-y-0 md:flex md:justify-between">
            <div>
                <label for="image_file">Portada</label>
                <input type="file" name="image_file" id="image_file" accept="image/*">
            </div>

            <div>
                <label for="sample">Mostra</label>
                <input type="file" name="sample" id="sample" accept=".pdf">
            </div>
        </div>

    </fieldset>
    <fieldset class="space-y-5">
        <legend>Dades de l'edició</legend>
        <div class="md:flex space-y-5 md:space-y-0 md:space-x-5 min-h-max">
            <div class="w-full">
                <label for="isbn">ISBN</label>
                <input type="text" name="isbn" id="isbn" class="max-h-min"></input>
            </div>
            <div class="w-full">
                <label for="publisher">Edita</label>
                <input type="text" name="publisher" id="publisher" class="max-h-min" value="Èter Edicions"></input>
            </div>
        </div>
        <div class="md:flex space-y-5 md:space-y-0 md:space-x-5 min-h-max">
            <div class="w-full">
                <label class="min-w-fit" for="publication_date">Data de publicació:</label>
                <input id="publication_date" class="" type="date" name="publication_date"></input>
            </div>
            <div class="w-full space-y-2">
                <div class="flex justify-between">
                    <label for="languages">Idioma</label>
                    <div class="flex space-x-1">
                        <button class="remove-content-button" type="button"
                            onclick="removeLastElement(this.parentNode.parentNode)">
                            <img src="{{ asset('img/icons/dark/less.webp') }}" alt="Eliminar idioma">
                        </button>
                        <div class="flex space-x-0.5">
                            <button id="add_language" type="button" class="add-content-button">
                                <img src="{{ asset('img/icons/dark/add.webp') }}" alt="Afegir idioma">
                            </button>
                        </div>
                    </div>
                </div>
                <select name="lang[]" id="languages" class="w-full">
                    {!! getLanguagesOptions($languages) !!}
                </select>
            </div>
        </div>
        <div class="md:flex space-y-5 md:space-y-0 md:space-x-5 min-h-max">
            <div class="w-full">
                <label for="number_of_pages">Número de pàgines</label>
                <input class="max-h-fit" type="number" name="number_of_pages" id="number_of_pages" value="1">
            </div>
            <div class="w-full">
                <label for="enviromental_footprint">Petjada ambiental</label>
                <input class="max-h-fit" type="text" name="enviromental_footprint" id="enviromental_footprint">
            </div>
        </div>
        <div class="flex space-x-5">
            <div class="w-full">
                <label for="legal_diposit">Dipòsit Legal</label>
                <input type="text" name="legal_diposit" id="legal_diposit">
            </div>
        </div>
    </fieldset>

    <fieldset class="space-y-5">
        <legend>Dades extra del llibre</legend>
        <div class="md:flex space-y-5 md:space-y-0 md:space-x-5 bookExtra">
            <div class="w-full md:w-1/3">
                <label class="min-w-fit" for="extras_0_key">Camp</label>
                <input class="" id="extras_0_key" type="text" name="extras[0][key]">
            </div>
            <div class="w-full">
                <label class="min-w-fit" for="extras_0_value">Valor</label>
                <input class="" id="extras_0_value" type="text" name="extras[0][value]">
            </div>
        </div>
        <div class="flex space-x-2">
            <div>Afegir camps</div>
            <div class="flex">
                <button class="remove-content-button" type="button" onclick="removeCollection(this)">
                    <img src="{{ asset('img/icons/dark/less.webp') }}" alt="Eliminar extra">
                </button>
                <button id="add_extra" type="button" class="add-content-button">
                    <img src="{{ asset('img/icons/dark/add.webp') }}" alt="Afegir extra">
                </button>
            </div>
        </div>
    </fieldset>

    <fieldset class="space-y-5">
        <legend>Dades de l'edició original</legend>
        <div>
            <label for="original_title">Títol original</label>
            <input type="text" name="original_title" id="original_title">
        </div>
        <div class="md:flex space-y-5 md:space-y-0 md:space-x-3">
            <div class="w-full">
                <label for="original_publisher">Editorial original</label>
                <input type="text" name="original_publisher" id="original_publisher">
            </div>

            <div class="w-full">
                <label for="original_publication_date">Data de publicació original</label>
                <input type="date" name="original_publication_date" id="original_publication_date">
            </div>
        </div>
    </fieldset>

    <fieldset class="space-y-5">
        <legend>Col·leccions</legend>
        <div class="flex justify-between">
            <label class="min-w-fit" for="collections[]">Col·leccions</label>
            <div class="flex">
                <button class="remove-content-button" type="button"
                    onclick="removeLastElement(this.parentNode.parentNode)">
                    <img src="{{ asset('img/icons/dark/less.webp') }}" alt="Eliminar col·lecció">
                </button>
                <button id="add_collection" type="button" class="add-content-button">
                    <img src="{{ asset('img/icons/dark/add.webp') }}" alt="Afegir col·lecció">
                </button>
            </div>
        </div>
        <div>
            <div class="flex justify-between space-x-3">
                <select name="collections[]" id="collections_0" class="w-full">
                    {!! getCollectionsOptions($collections) !!}
                </select>
            </div>
        </div>
    </fieldset>

    <fieldset class="space-y-5">
        <legend>Preus</legend>
        <div class="md:flex space-y-5 md:space-y-0 md:space-x-3">
            <div class="w-full">
                <label for="pvp">PVP</label>
                <input type="number" step="0.01" name="pvp" id="pvp" placeholder="15.00">
                <small class="text-xs">Els números han d'utilitzar un punt (.) com a marcador de decimals.</small>
            </div>
            <div class="w-full">
                <label for="iva">IVA (%)</label>
                <input type="number" name="iva" id="iva" value="4">
            </div>
            <div class="w-full">
                <label for="discounted_price">Preu amb descompte</label>
                <input type="number" step="0.01" name="discounted_price" id="discounted_price" value="0">
                <small class="text-xs">Preu final amb descompte. 0 = no s'aplica descompte</small>
            </div>
        </div>
    </fieldset>
    <fieldset class="space-y-5">
        <legend>Stock</legend>
        <div class="w-full">
            <label for="stock">Stock en magatzem</label>
            <input type="number" name="stock" id="stock">
        </div>
    </fieldset>

    <fieldset>
        <label class="mx-2.5" for="visible">Visible a la web?</label>
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

    <fieldset class="space-y-5">
        <legend>Opcions avançades: metadades</legend>
        <div class="space-y-0">
            <label class="pe-9" for="slug">Enllaç</label>
            <div class="flex justify-between items-center space-x-5">
                <div class="w-full flex items-center space-x-1">
                    <p class="min-w-fit">eteredicions.com /</p>
                    <input class="md:min-w-80 m-0 ps-1 pe-0 is-disabled border-0" type="text" name="slug" id="slug"
                        placeholder="titol-del-llibre" readonly disabled>
                </div>
                <div class="flex ">
                    <button class="edit-button" type="button" onclick="enableInput(this)">
                        <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp" style="width: 20px">
                    </button>
                </div>
            </div>
            <div class="w-full pe-9">
                <small>Aquest paràmetre es genera automàticament a partir del títol del llibre. Es pot personalitzar fent
                click a l'icona d'editar.</small>
            </div>
        </div>
        <div>
            <label for="meta_title" class="flex flex-col md:flex-row md:space-x-1 pe-9">
                <p>Títol de la pàgina</p> <p>(aparença en buscadors i navegador)</p>
            </label>
            <div class="flex justify-between items-center space-x-5">
                <input type="text" name="meta_title" id="meta_title" class="is-disabled border-0" readonly disabled>
                <div class="flex ">
                    <button class="edit-button" type="button" onclick="enableInput(this)">
                        <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp" style="width: 20px">
                    </button>
                </div>
            </div>
            <div class="w-full pe-9">
                <small>Aquest paràmetre es genera automàticament a partir del títol del llibre. Es pot personalitzar
                    fent
                    click a l'icona d'editar.</small>
            </div>
        </div>
        <div class="w-full">
            <label for="meta_description" class="flex flex-col md:flex-row md:space-x-1 pe-9">
                <p>Descripció de la pàgina</p> <p>(aparença en buscadors i navegador)</p>
            </label>
            <div class="flex justify-between items-center space-x-5">
                <textarea name="meta_description" id="meta_description" class="is-disabled border-0" readonly disabled></textarea>
                <div class="flex ">
                    <button class="edit-button" type="button" onclick="enableTextarea(this)">
                        <img src="{{ asset('img/icons/dark/edit.webp') }}" alt="Editar camp" style="width: 20px">
                    </button>
                </div>
            </div>
            <div class="w-full pe-9">
                <small class="">Aquest paràmetre es genera automàticament a partir del primer paràgraf de la
                    descripció del llibre.
                    Es pot personalitzar fent
                    click a l'icona d'editar. És recomanable fer-ho i escriure un petit text de no més de 150 caràcters
                    que
                    descrigui bé el contingut del llibre i/o l'autor per tal d'aparèixer als primers resultats dels
                    cercadors en les cerques relacionades.</small>
            </div>
        </div>
    </fieldset>
</div>

<div id="save" class="flex justify-center">
    {{-- <button type="submit" value="redirect" name="action">Desar canvis</button> --}}
    <button id="submit-button" class="send-button" type="submit" value="stay" name="action">Desar
        nou llibre</button>
</div>

<script src="/js/form/dynamic_textarea.js"></script>
