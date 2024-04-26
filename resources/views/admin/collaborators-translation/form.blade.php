<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="collaborator_id" class="form-label">{{ __('Collaborator Id') }}</label>
            <input type="text" name="collaborator_id" class="form-control @error('collaborator_id') is-invalid @enderror" value="{{ old('collaborator_id', $collaboratorsTranslation?->collaborator_id) }}" id="collaborator_id" placeholder="Collaborator Id">
            {!! $errors->first('collaborator_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="lang" class="form-label">{{ __('Lang') }}</label>
            <input type="text" name="lang" class="form-control @error('lang') is-invalid @enderror" value="{{ old('lang', $collaboratorsTranslation?->lang) }}" id="lang" placeholder="Lang">
            {!! $errors->first('lang', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $collaboratorsTranslation?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="last_name" class="form-label">{{ __('Last Name') }}</label>
            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', $collaboratorsTranslation?->last_name) }}" id="last_name" placeholder="Last Name">
            {!! $errors->first('last_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="biography" class="form-label">{{ __('Biography') }}</label>
            <input type="text" name="biography" class="form-control @error('biography') is-invalid @enderror" value="{{ old('biography', $collaboratorsTranslation?->biography) }}" id="biography" placeholder="Biography">
            {!! $errors->first('biography', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>