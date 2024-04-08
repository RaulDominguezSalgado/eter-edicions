<hr>
<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="image" class="form-label">{{ __('Imatge') }}</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image', $collaborator['image']) }}" id="image" placeholder="Imatge">
            {!! $errors->first('image', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="social_networks" class="form-label">{{ __('Xarxa social') }}</label>
            <input type="text" name="social_networks" class="form-control @error('social_networks') is-invalid @enderror" value="{{ old('social_networks', $collaborator['social_networks']) }}" id="social_networks" placeholder="Xarxa social">
            {!! $errors->first('social_networks', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="lang" class="form-label">{{ __('Llenguatge') }}</label>
            <select name="lang" class="form-control @error('lang') is-invalid @enderror" id="lang">
                <option value="ca" {{ old('lang', $collaborator['language']) == 'ca' ? 'selected' : '' }}>Català</option>
                <option value="es" {{ old('lang', $collaborator['language']) == 'es' ? 'selected' : '' }}>Castellà</option>
                <option value="ar-sy" {{ old('lang', $collaborator['language']) == 'ar-sy' ? 'selected' : '' }}>Àrab</option>
            </select>
            {!! $errors->first('lang', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Nom') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $collaborator['name']) }}" id="name" placeholder="Nom">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="last_name" class="form-label">{{ __('Cognom') }}</label>
            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', $collaborator['last_name']) }}" id="last_name" placeholder="Cognom">
            {!! $errors->first('last_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="biography" class="form-label">{{ __('Biografia') }}</label>
            <input type="text" name="biography" class="form-control @error('biography') is-invalid @enderror" value="{{ old('biography', $collaborator['biography']) }}" id="biography" placeholder="Biografia">
            {!! $errors->first('biography', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="slug" class="form-label">{{ __('Slug') }}</label>
            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $collaborator['slug']) }}" id="slug" placeholder="Slug">
            {!! $errors->first('slug', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
<hr>
