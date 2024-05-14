<div class="">
    <div class="space-y-4">
        {{-- @dump($post) --}}
        <div class="form-group mb-2 mb20">
            <label for="title" class="form-label">{{ __('Títol') }}</label>
            <input type="text" name="title" class="w-min ps-4 pe-10 @error('title') is-invalid @enderror"
                value="{{ old('title', $post['title']) }}" id="title" placeholder="Títol">
            {!! $errors->first('title', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="description" class="form-label">{{ __('Descripció') }}</label>
            <input type="text" name="description" class="w-min ps-4 pe-10 @error('description') is-invalid @enderror"
                value="{{ old('description', $post['description']) }}" id="description" placeholder="Descripció">
            {!! $errors->first('description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="grid grid-cols-2 gap-x-10">
            <div class="form-group mb-2 mb20">
                <label for="author_id" class="form-label">{{ __('Autor') }}</label>
                <select name="author_id" class="min-w-min w-full ps-4 pe-10 @error('author_id') is-invalid @enderror"
                    id="author_id">
                    <option value="" selected disabled>Selecciona un Autor</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}"
                            {{ old('author_id', $author['author_id']) == $author['id'] ? 'selected' : '' }}
                            @if ($author->id == $post['author_id']) selected @endif>
                            {{ $author->collaborator->translations->first()->first_name . ' ' . $author->collaborator->translations->first()->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-2 mb20">
                <label for="translator_id" class="form-label">{{ __('Traductor') }}</label>
                <select name="translator_id" class="min-w-min w-full ps-4 pe-10 @error('translator_id') is-invalid @enderror"
                    id="translator_id">
                    <option value="" selected disabled>Selecciona un Traductor</option>
                    @foreach ($translators as $translator)
                        <option value="{{ $translator->id }}"
                            {{ old('translator_id', $translator['translator_id']) == $translator['id'] ? 'selected' : '' }}
                            @if ($translator->id == $post['translator_id']) selected @endif>
                            {{ $translator->collaborator->translations->first()->first_name . ' ' . $translator->collaborator->translations->first()->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="grid grid-cols-2 mb20">
            <div class="mb-2">
                <label for="date" class="form-label">{{ __('Data') }}</label>
                <div class="w-full grid grid-cols-2 gap-x-10 pe-10">
                    <div class="">
                        <input type="date" step="1" name="date"
                        class="w-min ps-4 pe-10 @error('date') is-invalid @enderror"
                        value="{{ old('date', $post['date']) }}" id="date" placeholder="Data">
                    {!! $errors->first('date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                    </div>
                    <div class="">
                        <input type="time" name="time" value="{{ old('time', $post['time']) }}">
                        {!! $errors->first('time', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <label for="location" class="form-label">{{ __('Ubicació') }}</label>
                <input type="text" name="location" class="w-min ps-4 pe-10 @error('location') is-invalid @enderror"
                    value="{{ old('location', $post['location']) }}" id="location" placeholder="Ubicació">
                {!! $errors->first('location', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="image" class="form-label">{{ __('Imatge') }}</label>
            {{-- <input type="file" name="image" class="w-min ps-4 pe-10 @error('image') is-invalid @enderror" value="{{ old('image', $post->image) }}" id="image" placeholder="Imatge"> --}}
            <input type="file" name="image" class="pe-10 @error('image') is-invalid @enderror"
                value="{{ old('image', $post['image']) }}" id="image" placeholder="Imatge">
            {!! $errors->first('image', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="content" class="form-label">{{ __('Contingut') }}</label>
            <textarea name="content" class="w-full ps-4 pe-10 @error('content') is-invalid @enderror tinyMce" id="content"
                rows="3" placeholder="Contingut">{{ old('content', $post['content'] ?? '') }}</textarea>
            {!! $errors->first('content', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="publication_date" class="form-label">{{ __('Data de publicació') }}</label>
            <input type="date" name="publication_date"
                class="w-min ps-4 pe-10 @error('publication_date') is-invalid @enderror"
                value="{{ old('publication_date', $post['publication_date']) }}" id="publication_date"
                placeholder="Data de publicació">
            {!! $errors->first(
                'publication_date',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        {{-- SLUG --}}
        <label for="slug" class="form-label">{{ __('Enllaç') }}</label>
        <div class="w-full flex items-center space-x-1">
            <p class="min-w-fit">eteredicions.com /</p>
            <input type="text" name="slug"
                class="md:min-w-80 m-0 ps-1 pe-0 is-disabled @error('slug') is-invalid @else border-0 @enderror"
                value="{{ old('slug', $post['slug']) }}" id="slug" placeholder="titol-del-llibre">
        </div>
        {{-- META TITLE --}}
        <div class="form-group mb-2 mb20">
            <label for="meta_title"
                class="form-label">{{ __('Títol de la pàgina (aparença en buscadors i navegador)') }}</label>
            <input type="text" name="meta_title"
                class="is-disabled @error('meta_title') is-invalid @else border-0 @enderror"
                value="{{ old('meta_title', $post['meta_title']) }}" id="meta_title"
                placeholder="Títol de la pàgina">
        </div>
        {{-- META DESCRIPTION --}}
        <div class="form-group mb-2 mb20">
            <label for="meta_description"
                class="form-label">{{ __('Descripció de la pàgina (aparença en buscadors i navegador)') }}</label>
            <textarea name="meta_description" class="is-disabled @error('meta_description') is-invalid @else border-0 @enderror"
                id="meta_description">{{ old('meta_description', $post['meta_description']) }}</textarea>
        </div>

        <div class="form-group mb-2 mb20">
            <label for="published_by" class="form-label">{{ __('Publicat per') }}</label>
            <select name="published_by" class="w-min ps-4 pe-10 @error('published_by') is-invalid @enderror"
                id="published_by">
                <option value="" selected disabled>Selecciona un Publicador</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}"
                        {{ old('published_by', $user['user_id']) == $user['id'] ? 'selected' : '' }}
                        @if ($user->id == $post['published_by']) selected @elseif (Auth::id() == $user->id) selected @endif>
                        {{ $user['first_name'] . ' ' . $user['last_name'] }}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
