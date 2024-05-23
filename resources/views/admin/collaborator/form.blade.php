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
                        class="form-control @error('translations.' . $language['iso_language'] . '.first_name') is-invalid @enderror"
                        value="{{ old('translations.' . $language['iso_language'] . '.first_name', $collaborator['translations'][$language['iso_language']]['first_name']) }}"
                        id="first_name" placeholder="Nom">
                    {!! $errors->first(
                        'translations.' . $language['iso_language'] . '.first_name',
                        '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                    ) !!}
                </div>

                <div class="form-group mb-2 mb20">
                    <label for="last_name" class="form-label">{{ __('Cognom') }}</label>
                    <input required type="text" name="translations[{{ $language['iso_language'] }}][last_name]"
                        class="form-control @error('translations.' . $language['iso_language'] . '.last_name') is-invalid @enderror"
                        value="{{ old('translations.' . $language['iso_language'] . '.last_name', $collaborator['translations'][$language['iso_language']]['last_name']) }}"
                        id="last_name" placeholder="Cognom">
                    {!! $errors->first(
                        'translations.' . $language['iso_language'] . '.last_name',
                        '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                    ) !!}
                </div>

                <div class="form-group mb-2 mb20">
                    <label for="biography" class="form-label">{{ __('Biografia') }}</label>
                    <textarea required name="translations[{{ $language['iso_language'] }}][biography]"
                        class="form-textarea h-40 w-full px-3 py-2 border @error('translations.' . $language['iso_language'] . '.biography') border-red-500 @enderror"
                        id="biography" placeholder="Biografía">{{ old('translations.' . $language['iso_language'] . '.biography', $collaborator['translations'][$language['iso_language']]['biography']) }}</textarea>
                    {!! $errors->first(
                        'translations.' . $language['iso_language'] . '.biography',
                        '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                    ) !!}
                </div>

                {{-- Advanced Options --}}
                <button class="boton-opcions" data-target="opcionsAvancades-{{ $language['iso_language'] }}"
                    type="button">Opcions Avançades</button>
                <div name="opcionsAvancades" style="display:none"
                    id="opcionsAvancades-{{ $language['iso_language'] }}">
                    {{-- Slug --}}
                    <div class="w-full flex items-center space-x-1">
                        <label for="slug" class="form-label">{{ __('Enllaç') }}</label>
                        <p class="min-w-fit">eteredicions.com /</p>
                        <input type="text" name="translations[{{ $language['iso_language'] }}][slug]"
                            class="md:min-w-80 m-0 ps-1 pe-0 is-disabled @error('slug') is-invalid @else border-0 @enderror"
                            value="{{ old('translations.' . $language['iso_language'] . '.slug', $collaborator['translations'][$language['iso_language']]['slug']) }}"
                            id="slug" placeholder="enllaç-personalitzat">
                        {!! $errors->first(
                            'translations.' . $language['iso_language'] . '.slug',
                            '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                        ) !!}
                    </div>

                    {{-- Meta title --}}
                    <div class="form-group mb-2 mb20">
                        <label for="meta_title"
                            class="form-label">{{ __('Títol de la pàgina (aparença en buscadors i navegador)') }}</label>
                        <input type="text" name="translations[{{ $language['iso_language'] }}][meta_title]"
                            class="is-disabled @error('meta_title') is-invalid @else border-0 @enderror"
                            value="{{ old('translations.' . $language['iso_language'] . '.metaTitle', $collaborator['translations'][$language['iso_language']]['meta_title']) }}"
                            id="meta_title" placeholder="Títol de la pàgina">
                        {!! $errors->first(
                            'translations.' . $language['iso_language'] . '.metaTitle',
                            '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                        ) !!}
                    </div>
                    {{-- Meta description --}}
                    <div class="form-group mb-2 mb20">
                        <label for="meta_description"
                            class="form-label">{{ __('Descripció de la pàgina (aparença en buscadors i navegador)') }}</label>
                        <textarea name="translations[{{ $language['iso_language'] }}][meta_description]"
                            class="is-disabled @error('meta_description') is-invalid @else border-0 @enderror" id="meta_description">
                       {{ old('translations.' . $language['iso_language'] . '.meta_description', $collaborator['translations'][$language['iso_language']]['meta_description']) }}
                   </textarea>
                        {!! $errors->first(
                            'translations.' . $language['iso_language'] . '.meta_description',
                            '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                        ) !!}
                    </div>
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
                    container.style.display =
                    'block'; // Mostrar el contenedor correspondiente al idioma seleccionado
                } else {
                    container.style.display = 'none'; // Ocultar los otros contenedores
                }
            }
        });
    </script>
</div>
<script src="{{ asset('js/form/social_networks.js') }}"></script>
<script src="{{ asset('js/form/advanced_options.js') }}"></script>
