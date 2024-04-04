<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="isbn" class="form-label">{{ __('Isbn') }}</label>
            <input type="text" name="isbn" class="form-control @error('isbn') is-invalid @enderror" value="{{ old('isbn', $book?->isbn) }}" id="isbn" placeholder="Isbn">
            {!! $errors->first('isbn', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="publisher" class="form-label">{{ __('Publisher') }}</label>
            <input type="text" name="publisher" class="form-control @error('publisher') is-invalid @enderror" value="{{ old('publisher', $book?->publisher) }}" id="publisher" placeholder="Publisher">
            {!! $errors->first('publisher', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="image" class="form-label">{{ __('Image') }}</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" accept="image/*" placeholder="Image">
            {!! $errors->first('image', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="pvp" class="form-label">{{ __('Pvp') }}</label>
            <input type="text" name="pvp" class="form-control @error('pvp') is-invalid @enderror" value="{{ old('pvp', $book?->pvp) }}" id="pvp" placeholder="Pvp">
            {!! $errors->first('pvp', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="iva" class="form-label">{{ __('Iva') }}</label>
            <input type="text" name="iva" class="form-control @error('iva') is-invalid @enderror" value="{{ old('iva', $book?->iva) }}" id="iva" placeholder="Iva">
            {!! $errors->first('iva', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="discounted_price" class="form-label">{{ __('Discounted Price') }}</label>
            <input type="text" name="discounted_price" class="form-control @error('discounted_price') is-invalid @enderror" value="{{ old('discounted_price', $book?->discounted_price) }}" id="discounted_price" placeholder="Discounted Price">
            {!! $errors->first('discounted_price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="stock" class="form-label">{{ __('Stock') }}</label>
            <input type="text" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $book?->stock) }}" id="stock" placeholder="Stock">
            {!! $errors->first('stock', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="visible" class="form-label">{{ __('Visible') }}</label>
            <select name="visible" class="form-control @error('visible') is-invalid @enderror" id="visible">
                <option value="1" @if(old('visible', $book?->visible) == 1 || !isset($book)) selected @endif>Visible</option>
                <!-- !isset($book), si no hay un valor definido para $book, la opción "Visible" sea seleccionada por defecto -->
                <option value="0" @if(old('visible', $book?->visible) == 0 && isset($book)) selected @endif>No visible</option>
                <!-- isset($book), si hay un valor definido para $book, la opción "No visible" se seleccione si corresponde -->
            </select>
            {!! $errors->first('visible', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="author" class="form-label">{{ __('Author') }}</label>
            <input type="select" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author', $book?->author) }}" id="author" placeholder="Author">
            <a href="{{ route('books.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                {{ __('+') }}
            </a>
            {!! $errors->first('author', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="illustrator" class="form-label">{{ __('Illustrator') }}</label>
            <input type="select" name="illustrator" class="form-control @error('illustrator') is-invalid @enderror" value="{{ old('illustrator', $book?->illustrator) }}" id="illustrator" placeholder="Illustrator">
            <a href="{{ route('books.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                {{ __('+') }}
            </a>
            {!! $errors->first('illustrator', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="translator" class="form-label">{{ __('Translator') }}</label>
            <input type="select" name="translator" class="form-control @error('translator') is-invalid @enderror" value="{{ old('translator', $book?->translator) }}" id="translator" placeholder="Translator">
            <a href="{{ route('books.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                {{ __('+') }}
            </a>
            {!! $errors->first('translator', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
