<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="image" class="form-label">{{ __('Imatge') }}</label>
            <img style="width: 100px; height: auto;"
                src="{{ asset('img/collab/covers/' . ($collaborator['image'] ?? 'default.webp')) }}"
                alt="{{ ($collaborator['image'] ?? 'default.webp') . ' - ' }}">
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                value="{{ old('image', $collaborator['image']) }}" id="image" placeholder="Imatge" accept="image/*">
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
                    <div class="red_social flex space-x-4">
                        <input type="text" name="red_social[]" value="{{ $social }}"
                            placeholder="Nombre de la red social">
                        <input type="text" name="usuario_red_social[]" value="{{ $url }}"
                            placeholder="URL del usuario">
                    </div>
                @endforeach
            @endif
        </div>
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
            {!! $errors->first('lang', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        @foreach ($languages as $language)
            <div class="border rounded-md p-4 mb-4 idioma-container" id="{{ $language['iso_language'] }}">
                <h2 class="text-lg font-semibold text-sm mb-2">{{ $language['translation'] }}</h2>
                <div class="form-group mb-2 mb20">
                    <label for="first_name" class="form-label">{{ __('Nom') }}</label>
                    <input required type="text" name="translations[{{ $language['iso_language'] }}][first_name]"
                        class="form-control @error('first_name') is-invalid @enderror"
                        value="{{ old('first_name', $collaborator['translations'][$language['iso_language']]['first_name']) }}" id="first_name" placeholder="Nom">
                    {!! $errors->first('first_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>

                <div class="form-group mb-2 mb20">
                    <label for="last_name" class="form-label">{{ __('Cognom') }}</label>
                    <input required type="text" name="translations[{{ $language['iso_language'] }}][last_name]" class="form-control @error('last_name') is-invalid @enderror"
                        value="{{ old('last_name', $collaborator['translations'][$language['iso_language']]['last_name']) }}" id="last_name" placeholder="Cognom">
                    {!! $errors->first('last_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>

                <div class="form-group mb-2 mb20">
                    <label for="biography" class="form-label">{{ __('Biografia') }}</label>
                    <textarea required name="translations[{{ $language['iso_language'] }}][biography]"
                        class="form-textarea h-40 w-full px-3 py-2 border @error('biography') border-red-500 @enderror" id="biography"
                        placeholder="Biografía">{{ old('biography', $collaborator['translations'][$language['iso_language']]['biography']) }}</textarea>
                    {!! $errors->first('biography', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>

            </div>
        @endforeach

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
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
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
</div>
<script src="{{ asset('js/form/social_networks.js') }}"></script>
