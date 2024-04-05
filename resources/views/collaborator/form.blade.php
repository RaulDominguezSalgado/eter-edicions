<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="image" class="form-label">{{ __('Image') }}</label>
            <input type="text" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image', $collaborator?->image) }}" id="image" placeholder="Image">
            {!! $errors->first('image', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="social_networks" class="form-label">{{ __('Social Networks') }}</label>
            <textarea name="social_networks" class="form-control @error('social_networks') is-invalid @enderror" id="social_networks" placeholder="Social Networks" rows="5">{{ old('social_networks', $collaborator?->social_networks) }}</textarea>
            {!! $errors->first('social_networks', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        {{-- <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $collaboratorsTranslation?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div> --}}
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
