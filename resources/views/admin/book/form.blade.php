<?php

    function getCollaborators($selected=-1) {
        $collaborators = \App\Models\Collaborator::with('translations')->get();
        $col_options = "<option selected disabled>Selecciona una opció</option>";
        foreach ($collaborators as $content) {
            foreach ($content->translations->where('lang', 'ca') as $collaborator) {
                if ($content->id == $selected) {
                    $col_options .= "<option selected value='$content->id'>".$collaborator->first_name." ".$collaborator->last_name."</option>";
                }
                else {
                    $col_options .= "<option value='$content->id'>".$collaborator->first_name." ".$collaborator->last_name."</option>";
                }
            }
        }
        echo $col_options;
    }

    $selected = 4;
    $collections = \App\Models\Collection::with('translations')->get();
        $col_options = "<option selected disabled>Selecciona una opció</option>";
        foreach ($collections as $content) {
            foreach ($content->translations->where('lang', 'ca') as $collection) {
                if ($content->id == $selected) {
                    $col_options .= "<option selected value='$content->id'>Selected: ".$collection->name."</option>";
                }
                else {
                    $col_options .= "<option value='$content->id'>".$collection->name."</option>";
                }
            }
        }
        echo $col_options;

    function getCollections($selected=-1) {
        $collections = \App\Models\Collection::with('translations')->get();
        $col_options = "<option selected disabled>Selecciona una opció</option>";
        foreach ($collections as $content) {
            foreach ($content->translations->where('lang', 'ca') as $collection) {
                if ($content->id == $selected) {
                    $col_options .= "<option selected value='$content->id'>".$collection->name."</option>";
                }
                else {
                    $col_options .= "<option value='$content->id'>".$collection->name."</option>";
                }
            }
        }
        echo $col_options;
    }

    function getLanguages($selected=.1) {
        $languages = \App\Models\Language::get();
        $lang_options = "";
        foreach ($languages as $language) {
            if ($language->iso == $selected) {
                $lang_options .= "<option selected value='$language->iso'>".$language->iso."</option>";
            }
            else {
                $lang_options .= "<option value='$language->iso'>".$language->iso."</option>";
            }
        }
        echo $lang_options;
    }

    
?>
@if ($errors->any())
    <div class="alert alert-danger m-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<fieldset>
    <legend>Contingut</legend>
    <label for="title">Títol llibre
        <input type="text" name="title" id="title" value="{{ $book['title'] ?? '' }}">
    </label>
    <label for="headline">Titular (contingut)
        <input type="text" name="headline" id="headline" value="{{ $book['headline'] ?? '' }}">
    </label>
    <label for="image_file">Portada
        <div><img style="width: 100px" src="/img/books/covers/{{ $book['image'] ?? '' }}" alt="thumbnail"></div>
        <input type="file" name="image_file" id="image_file" accept="image">
        <input type="hidden" name="image" id="image" value="{{ $book['image'] ?? 'default.webp' }}">
    </label>
    <label for="description">Descripció
        <textarea name="description" id="description">{{ $book['description'] ?? '' }}</textarea>
    </label>
    <label for="sample">Mostra
        <div><a href="/pdf/book/{{ $book['sample'] ?? '' }}" target="_blank">{{ $book['sample_url'] ?? 'No hi ha cap mostra encara' }}</a></div>
        <input type="file" name="sample" id="sample" accept=".pdf" value="{{ $book['image'] ?? '' }}">
    </label>
</fieldset>
<fieldset>
    <legend>Informació general del llibre</legend>
    <label for="languages">Idioma
        <select name="languages" id="languages">
            <?php getLanguages($book['lang']);?>
        </select>
    </label>
    <label for="isbn">ISBN
        <input type="text" name="isbn" id="isbn" value="{{ $book['isbn'] ?? '' }}">
    </label>
    <label for="legal_diposit">Deposit Legal
        <input type="text" name="legal_diposit" id="legal_diposit" value="{{ $book['legal_diposit'] ?? '' }}">
    </label>
    <label for="publisher">Edita
        <input type="text" name="publisher" id="publisher" value="{{ $book['publisher'] ?? '' }}">
    </label>
    <label for="original_publisher">Editorial original
        <input type="text" name="original_publisher" id="original_publisher" value="{{ $book['original_publisher'] ?? '' }}">
    </label>
    <label for="number_of_pages">Número de pagines
        <input type="number" name="number_of_pages" id="number_of_pages" value="{{ $book['number_of_pages'] ?? '' }}">
    </label>
    <label for="size">Dimensions
        <input type="text" name="size" id="size" value="{{ $book['size'] ?? '' }}">
    </label>
    <label for="enviromental_footprint">Petjada ambiental
        <input type="text" name="enviromental_footprint" id="enviromental_footprint" value="{{ $book['enviromental_footprint'] ?? '' }}">
    </label>
    @if (isset($book))
        @for($i = 0; $i < count($book['collections']); $i++)
            <label for="collections_{{$i}}">Col·lecció {{ $i + 1 }}
                <select name="collections[]" id="collections_{{$i}}">
                    <?php getCollections($book['collections'][$i]['id'] ?? '');?>
                </select>
                <a class="remove-content-button">Quitar</a>
            </label>
        @endfor
    @else
        <label for="collections_0">Col·lecció 1
        <select name="collections[]" id="collections_0">
                <?php getCollections($book['collections'][0]['id'] ?? '');?>
            </select>
            <a class="remove-content-button">Quitar</a>
        </label>
    @endif
    <a id="add_collection" class="add-content-button">Afegir una col·lecció més</a>
</fieldset>
<fieldset>
    <legend>Col·laboradors</legend>
    @if (isset($book))
        <!-- Edit -->
        @for($i = 0; $i < count($book['collaborators']['authors']); $i++)
            <label for="authors_{{$i}}">Autor {{ $i + 1 }}
                <select name="authors[]" id="authors_{{$i}}">
                    <?php getCollaborators($book['collaborators']['authors'][$i]['collaborator_id'] ?? '');?>
                </select>
        <a class="remove-content-button">Quitar</a>
            </label>
        @endfor
        <a id="add_author" class="add-content-button">Afegir un autor més</a>
        @for($i = 0; $i < count($book['collaborators']['translators']); $i++)
            <label for="translators_{{$i}}">Traducció {{ $i + 1 }}
                <select name="translators[]" id="translators_{{$i}}">
                    <?php getCollaborators($book['collaborators']['translators'][$i]['collaborator_id'] ?? '');?>
                </select>
                <a class="remove-content-button">Quitar</a>
            </label>
        @endfor
        <a id="add_translator" class="add-content-button">Afegir un traductor més</a>
    @else 
        <!-- Create -->
        <label for="authors_0">Autor 1
            <select name="authors[]" id="authors_0">
                <?php getCollaborators();?>
            </select>
            <a class="remove-content-button">Quitar</a>
        </label>
        <a id="add_author" class="add-content-button">Afegir un autor més</a>
        <label for="translators_0">Traducció 1
            <select name="translators[]" id="translators_0">
                <?php getCollaborators();?>
            </select>
            <a class="remove-content-button">Quitar</a>
        </label>
        <a id="add_translator" class="add-content-button">Afegir un traductor més</a>
    @endif
</fieldset>
<fieldset>
    <legend>Dades del producte</legend>
    <label for="pvp">Preu de venta
        <input type="number" name="pvp" id="pvp" value="{{ $book['pvp'] ?? '' }}">
    </label>
    <label for="iva">Iva (%)
        <input type="number" name="iva" id="iva" value="{{ $book['iva'] ?? '' }}">
    </label>
    <label for="discounted_price">Preu d'oferta
        <input type="number" name="discounted_price" id="discounted_price" value="{{ $book['discounted_price'] ?? '' }}">
    </label>
    <label for="stock">Stock total
        <input type="number" name="stock" id="stock" value="{{ $book['stock'] ?? '' }}">
    </label>
</fieldset>
<fieldset>
    <legend>Meta dades</legend>
    <label for="slug">Slug
        <input type="text" name="slug" id="slug" value="{{ $book['slug'] ?? '' }}" disabled>
    </label>
    <label for="meta_title">Titol meta (apariencia en buscadors)
        <input type="text" name="meta_title" id="meta_title" value="{{ $book['meta_title'] ?? '' }}">
    </label>
    <label for="meta_description">Descripció meta (apariencia en buscadors)
        <textarea name="meta_description" id="meta_description">{{ $book['meta_description'] ?? '' }}</textarea>
    </label>
    <label for="publication_date">Data de publicació
        <input type="date" name="publication_date" id="publication_date" value="{{ $book['publication_date'] ?? '' }}">
    </label>
    <label for="original_publication_date">Data de publicació original
        <input type="date" name="original_publication_date" id="original_publication_date" value="{{ $book['original_publication_date'] ?? '' }}">
    </label>
</fieldset>
<fieldset>
    <legend>Opcions avançades</legend>
    <label for="slug_options">
        <input type="checkbox" id="slug_options" name="slug_options"> Regenerar URL (pot afectar SEO)
    </label>
    <label for="visible">
        <input type="checkbox" id="visible" name="visible" @if (isset($book) && $book['visible']) checked @endif;> Visible
    </label>
</fieldset>
<div id="editor-fast-actions">
    <button type="submit" value="redirect" name="action">Guardar canvis</button>
    <button type="submit" value="stay" name="action">Guardar canvis y romandre a la página</button>
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