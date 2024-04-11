<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="title" class="form-label">{{ __('Títol') }}</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post['title']) }}" id="title" placeholder="Títol">
            {!! $errors->first('title', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="author_id" class="form-label">{{ __('Autor') }}</label>
            <select name="author_id" class="form-control @error('author_id') is-invalid @enderror" id="author_id">
                <option value="" selected disabled>Selecciona un Autor</option>
                @foreach ($collaboratorTranslations as $collaborator)
                    <option value="{{ $collaborator->id }}" {{ old('author_id', $collaborator['author_id']) == $collaborator['id'] ? 'selected' : '' }}>{{ $collaborator['first_name'] . " " . $collaborator['last_name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="translator_id" class="form-label">{{ __('Traductor') }}</label>
            <select name="translator_id" class="form-control @error('translator_id') is-invalid @enderror" id="translator_id">
                <option value="" selected disabled>Selecciona un Traductor</option>
                @foreach ($collaboratorTranslations as $collaborator)
                    <option value="{{ $collaborator->id }}" {{ old('translator_id', $collaborator['translator_id']) == $collaborator['id'] ? 'selected' : '' }}>{{ $collaborator['first_name'] . " " . $collaborator['last_name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="description" class="form-label">{{ __('Descripció') }}</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $post['description']) }}" id="description" placeholder="Descripció">
            {!! $errors->first('description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="date" class="form-label">{{ __('Data') }}</label>
            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date', $post['date']) }}" id="date" placeholder="Data">
            {!! $errors->first('date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="location" class="form-label">{{ __('Ubicació') }}</label>
            <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location', $post['location']) }}" id="location" placeholder="Ubicació">
            {!! $errors->first('location', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="image" class="form-label">{{ __('Imatge') }}</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image', $post['image']) }}" id="image" placeholder="Imatge">
            {!! $errors->first('image', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="content" class="form-label">{{ __('Contingut') }}</label>
            <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="3" placeholder="Contingut">{{ old('content', $post['content'] ?? '') }}</textarea>
            {!! $errors->first('content', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="publication_date" class="form-label">{{ __('Data de publicació') }}</label>
            <input type="date" name="publication_date" class="form-control @error('publication_date') is-invalid @enderror" value="{{ old('publication_date', $post['publication_date'] ?? date('Y-m-d')) }}" id="publication_date" placeholder="Data de publicació">
            {!! $errors->first('publication_date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="published_by" class="form-label">{{ __('Publicat per') }}</label>
            <select name="published_by" class="form-control @error('published_by') is-invalid @enderror" id="published_by">
                <option value="" selected disabled>Selecciona un Publicador</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('published_by', $user['user_id']) == $user['id'] ? 'selected' : '' }}>{{ $user['first_name'] . " " . $user['last_name']}}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
