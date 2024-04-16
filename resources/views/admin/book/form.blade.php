<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" id="isbn"
                class="form-control{{ $errors->has('isbn') ? ' is-invalid' : '' }}" value="{{ old('isbn', '123456789') }}">
            {!! $errors->first('isbn', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group">
            <label for="title">Títol</label>
            <input type="text" name="title" id="title"
                class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title', 'default_title') }}">
            {!! $errors->first('title', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group">
            <label for="original_title">Títol original</label>
            <input type="text" name="original_title" id="original_title"
                class="form-control{{ $errors->has('original_title') ? ' is-invalid' : '' }}" value="{{ old('original_title', 'default_original_title') }}">
            {!! $errors->first(
                'original_title',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

        <div class="form-group">
            <label for="headline">Títol destacat</label>
            <input type="text" name="headline" id="headline"
                class="form-control{{ $errors->has('headline') ? ' is-invalid' : '' }}" value="{{ old('headline', 'default_headline') }}">
            {!! $errors->first('headline', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group">
            <label for="description">Descripció</label>
            <textarea name="description" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                rows="3">{{ old('description', 'default_description') }}</textarea>
            {!! $errors->first('description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group">
            <label for="publisher">Editorial</label>
            <input type="text" name="publisher" id="publisher"
                class="form-control{{ $errors->has('publisher') ? ' is-invalid' : '' }}" value="{{ old('publisher', 'default_publisher') }}">
            {!! $errors->first('publisher', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group">
            <label for="original_publisher">Editorial original</label>
            <input type="text" name="original_publisher" id="original_publisher"
                class="form-control{{ $errors->has('original_publisher') ? ' is-invalid' : '' }}" value="{{ old('original_publisher', 'default_original_publisher') }}">
            {!! $errors->first(
                'original_publisher',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

        <div class="form-group">
            <label for="image">Imatge</label>
            <input type="text" name="image" id="image"
                class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ old('image', 'default_image_url') }}">
            {!! $errors->first('image', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group">
            <label for="number_of_pages">Número de pàgines</label>
            <input type="number" name="number_of_pages" id="number_of_pages"
                class="form-control{{ $errors->has('number_of_pages') ? ' is-invalid' : '' }}" value="{{ old('number_of_pages', 100) }}">
            {!! $errors->first(
                'number_of_pages',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

        <div class="form-group">
            <label for="size">Mida</label>
            <input type="text" name="size" id="size"
                class="form-control{{ $errors->has('size') ? ' is-invalid' : '' }}" value="{{ old('size', 'default_size') }}">
            {!! $errors->first('size', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group">
            <label for="publication_date">Data de publicació</label>
            <input type="date" name="publication_date" id="publication_date"
                class="form-control{{ $errors->has('publication_date') ? ' is-invalid' : '' }}" value="{{ old('publication_date', date('Y-m-d')) }}">
            {!! $errors->first(
                'publication_date',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

        <div class="form-group">
            <label for="original_publication_date">Data de publicació original</label>
            <input type="date" name="original_publication_date" id="original_publication_date"
                class="form-control{{ $errors->has('original_publication_date') ? ' is-invalid' : '' }}" value="{{ old('original_publication_date', date('Y-m-d')) }}">
            {!! $errors->first(
                'original_publication_date',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

        <div class="form-group">
            <label for="pvp">PVP</label>
            <input type="number" name="pvp" id="pvp"
                class="form-control{{ $errors->has('pvp') ? ' is-invalid' : '' }}" value="{{ old('pvp', 10) }}">
            {!! $errors->first('pvp', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group">
            <label for="discounted_price">Preu descomptat</label>
            <input type="number" name="discounted_price" id="discounted_price"
                class="form-control{{ $errors->has('discounted_price') ? ' is-invalid' : '' }}" value="{{ old('discounted_price', 8) }}">
            {!! $errors->first(
                'discounted_price',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

        <div class="form-group">
            <label for="legal_diposit">Dipòsit legal</label>
            <input type="text" name="legal_diposit" id="legal_diposit"
                class="form-control{{ $errors->has('legal_diposit') ? ' is-invalid' : '' }}" value="{{ old('legal_diposit', 'default_legal_diposit') }}">
            {!! $errors->first(
                'legal_diposit',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

        <div class="form-group">
            <label for="enviromental_footprint">Pegada ambiental</label>
            <input type="text" name="enviromental_footprint" id="enviromental_footprint"
                class="form-control{{ $errors->has('enviromental_footprint') ? ' is-invalid' : '' }}" value="{{ old('enviromental_footprint', 'default_enviromental_footprint') }}">
            {!! $errors->first(
                'enviromental_footprint',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

        <div class="form-group">
            <label for="stock">Estoc</label>
            <input type="number" name="stock" id="stock"
                class="form-control{{ $errors->has('stock') ? ' is-invalid' : '' }}" value="{{ old('stock', 100) }}">
            {!! $errors->first('stock', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug"
                class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" value="{{ old('slug', 'default_slug') }}">
            {!! $errors->first('slug', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group">
            <label for="sample">URL de mostra</label>
            <input type="text" name="sample" id="sample"
                class="form-control{{ $errors->has('sample') ? ' is-invalid' : '' }}" value="{{ old('sample', 'default_sample_url') }}">
            {!! $errors->first('sample', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group">
            <label for="visible">Visible</label>
            <select name="visible" id="visible"
                class="form-control{{ $errors->has('visible') ? ' is-invalid' : '' }}">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
            {!! $errors->first('visible', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group">
            <label for="meta_title">Meta Títol</label>
            <input type="text" name="meta_title" id="meta_title"
                class="form-control{{ $errors->has('meta_title') ? ' is-invalid' : '' }}" value="{{ old('meta_title', 'default_meta_title') }}">
            {!! $errors->first('meta_title', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group">
            <label for="meta_description">Meta Descripció</label>
            <input type="text" name="meta_description" id="meta_description"
                class="form-control{{ $errors->has('meta_description') ? ' is-invalid' : '' }}" value="{{ old('meta_description', 'default_meta_description') }}">
            {!! $errors->first(
                'meta_description',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

        <!-- Camps select per a les relacions -->

        <div class="form-group">
            <label for="authors">Autors</label>
            <select name="authors[]" id="authors"
                class="form-control{{ $errors->has('authors') ? ' is-invalid' : '' }}" multiple>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->first_name . ' ' . $author->last_name }}</option>
                @endforeach
            </select>
            {!! $errors->first('authors', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group">
            <label for="translators">Traductors</label>
            <select name="translators[]" id="translators"
                class="form-control{{ $errors->has('translators') ? ' is-invalid' : '' }}" multiple>
                @foreach ($translators as $translator)
                    <option value="{{ $translator->id }}">
                        {{ $translator->first_name . ' ' . $translator->last_name }}</option>
                @endforeach
            </select>
            {!! $errors->first('translators', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group">
            <label for="languages">Idiomes</label>
            <select name="languages[]" id="languages"
                class="form-control{{ $errors->has('languages') ? ' is-invalid' : '' }}" multiple>
                @foreach ($languages as $language)
                    <option value="{{ $language->iso_language }}">{{ $language->translation }}</option>
                @endforeach
            </select>
            {!! $errors->first('languages', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group">
            <label for="collections">Col·leccions</label>
            <select name="collections[]" id="collections"
                class="form-control{{ $errors->has('collections') ? ' is-invalid' : '' }}" multiple>
                @foreach ($collections as $collection)
                    <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('collections', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>

    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
