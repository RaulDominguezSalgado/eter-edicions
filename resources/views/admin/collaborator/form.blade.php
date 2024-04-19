<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="image" class="form-label">{{ __('Imatge') }}</label>
            <img style="width: 100px; height: auto;"
            src="{{ asset('img/collab/covers/' . ($collaborator['image'] ?? 'collab-default.webp')) }}"
            alt="{{ ($collaborator['image'] ?? 'collab-default.webp') . ' - ' }}">
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                value="{{ old('image', $collaborator['image']) }}" id="image" placeholder="Imatge">
            {!! $errors->first('image', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        {{-- <div id="redes_sociales">
            <label for="social_networks" class="form-label">{{ __('Xarxes socials') }}</label>
            <button type="button" id="agregar_red_social" class="btn btn-primary">+</button>
            <div class="red_social">
                <input type="text" name="red_social[]" placeholder="Nombre de la red social">
                <input type="text" name="usuario_red_social[]" placeholder="Url del usuario">
            </div>
        </div> --}}
        <div id="redes_sociales">
            <label for="social_networks" class="form-label">{{ __('Xarxes socials') }}</label>
            <button type="button" id="agregar_red_social" class="btn btn-primary">+</button>

            @if (isset($collaborator['social_networks']))
                @foreach ($collaborator['social_networks'] as $social => $url)
                    <div class="red_social">
                        <input type="text" name="red_social[]" value="{{ $social }}"
                            placeholder="Nombre de la red social">
                        <input type="text" name="usuario_red_social[]" value="{{ $url }}"
                            placeholder="Url del usuario">
                    </div>
                @endforeach
            @endif
        </div>
        <div class="form-group mb-2 mb20">
            <label for="lang" class="form-label">{{ __('Llenguatge') }}</label>
            <select name="lang" class="form-control @error('lang') is-invalid @enderror" id="lang">
                <option value="ca" {{ old('lang', $collaborator['lang']) == 'ca' ? 'selected' : '' }}>Català
                </option>
                <option value="es" {{ old('lang', $collaborator['lang']) == 'es' ? 'selected' : '' }}>Castellà
                </option>
                <option value="ar-sy" {{ old('lang', $collaborator['lang']) == 'ar-sy' ? 'selected' : '' }}>Àrab
                </option>
            </select>
            {{-- <input type="text" name="lang" class="form-control @error('lang') is-invalid @enderror" value="{{ old('lang', $collaborator['name']) }}" id="lang" placeholder="Llenguatge"> --}}
            {!! $errors->first('lang', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="first_name" class="form-label">{{ __('Nom') }}</label>
            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                value="{{ old('first_name', $collaborator['first_name']) }}" id="first_name" placeholder="Nom">
            {!! $errors->first('first_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="last_name" class="form-label">{{ __('Cognom') }}</label>
            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                value="{{ old('last_name', $collaborator['last_name']) }}" id="last_name" placeholder="Cognom">
            {!! $errors->first('last_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="biography" class="form-label">{{ __('Biografia') }}</label>
            <input type="text" name="biography" class="form-control @error('biography') is-invalid @enderror"
                value="{{ old('biography', $collaborator['biography']) }}" id="biography" placeholder="Biografia">
            {!! $errors->first('biography', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        {{-- <div class="form-group mb-2 mb20">
            <label for="biography" class="form-label">{{ __('Biografia') }}</label>
            <textarea name="biography" class="form-control @error('biography') is-invalid @enderror" id="biography"
                placeholder="Biografia">{{ old('biography', $collaborator['biography']) }}</textarea>
            {!! $errors->first('biography', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div> --}}
        {{-- <div class="form-group mb-2 mb20">
            <label for="slug" class="form-label">{{ __('Slug') }}</label>
            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                value="{{ old('slug', $collaborator['slug']) }}" id="slug" placeholder="Slug">
            {!! $errors->first('slug', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div> --}}

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
<script src="{{ asset('js/form/social_networks.js') }}"></script>
