<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="represented_by_agency" class="form-label">{{ __('Represented By Agency') }}</label>
            <input type="text" name="represented_by_agency" class="form-control @error('represented_by_agency') is-invalid @enderror" value="{{ old('represented_by_agency', $author?->represented_by_agency) }}" id="represented_by_agency" placeholder="Represented By Agency">
            {!! $errors->first('represented_by_agency', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>