<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            <label for="lang" class="form-label">{{ __('Idioma') }}</label>
            <select name="lang" class="form-control @error('lang') is-invalid @enderror" id="lang">
                <option selected disabled>Selecciona un idioma</option>
                @foreach ($languages as $language)
                    <option value="{{ $language['iso_language'] }}">
                        {{ $language['translation'] }}
                    </option>
                @endforeach
            </select>
            {{-- <input type="text" name="lang" class="form-control @error('lang') is-invalid @enderror" value="{{ old('lang', $collaborator['name']) }}" id="lang" placeholder="Llenguatge"> --}}
            {!! $errors->first('lang', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        @foreach ($languages as $language)
        <div class="border rounded-md p-4 mb-4 idioma-container" id="{{ $language['iso_language'] }}">
            <h2 class="text-lg font-semibold text-sm mb-2">{{ $language['translation'] }}</h2>

        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Nom') }}</label>
            <input required type="text" name="translations[{{ $language['iso_language'] }}][name]" class="form-control @error('translations.'.$language['iso_language'].'.name') is-invalid @enderror"
                value="{{ old('translations.'.$language['iso_language'].'.first_name', $collection['translations'][$language['iso_language']]['name']) }}" id="name" placeholder="Nom">
            {!! $errors->first('translations.'.$language['iso_language'].'.first_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="description" class="form-label">{{ __('Descripció') }}</label>
            <textarea required name="translations[{{ $language['iso_language'] }}][description]" class="form-control @error('translations.'.$language['iso_language'].'.description') is-invalid @enderror" id="description" rows="3" placeholder="Descripció">{{  old('translations.'.$language['iso_language'].'.description', $collection['translations'][$language['iso_language']]['description']) }}</textarea>
            {!! $errors->first('translations.'.$language['iso_language'].'.description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        </div>
        @endforeach

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
<script>
    document.getElementById('lang').addEventListener('change', function() {
        var selectedLanguage = this.value;
        var idiomaContainers = document.getElementsByClassName('idioma-container');

        for (var i = 0; i < idiomaContainers.length; i++) {
            var container = idiomaContainers[i];
            if (container.id === selectedLanguage) {
                container.style.display = 'block'; // Mostrar el contenedor correspondiente al idioma seleccionado
            } else {
                container.style.display = 'none'; // Ocultar los otros contenedores
            }
        }
    });
</script>
