<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            <label for="lang" class="form-label">{{ __('Llenguatge') }}</label>
            <select name="lang" class="form-control @error('lang') is-invalid @enderror" id="lang">
                <option value="ca" {{ old('lang', $collection['lang']) == 'ca' ? 'selected' : '' }}>Català
                </option>
                <option value="es" {{ old('lang', $collection['lang']) == 'es' ? 'selected' : '' }}>Castellà
                </option>
                <option value="ar-sy" {{ old('lang', $collection['lang']) == 'ar-sy' ? 'selected' : '' }}>Àrab
                </option>
            </select>
            {{-- <input type="text" name="lang" class="form-control @error('lang') is-invalid @enderror" value="{{ old('lang', $collaborator['name']) }}" id="lang" placeholder="Llenguatge"> --}}
            {!! $errors->first('lang', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Nom') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $collection['name']) }}" id="name" placeholder="Nom">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="description" class="form-label">{{ __('Descripció') }}</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                value="{{ old('description', $collection['description']) }}" id="description" placeholder="Descripció">
            {!! $errors->first('description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
