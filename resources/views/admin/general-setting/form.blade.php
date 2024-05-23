<div class="p-1">
    <div>
        <div class="form-group mb-4">
            <label for="category" class="form-label">{{ __('Categoria') }}</label>
            <input type="text" name="category" class="@error('category') is-invalid @enderror" value="{{ old('category', $setting['category']) }}" id="category" placeholder="Categoria">
            {!! $errors->first('category', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-4">
            <label for="key" class="form-label">{{ __('Nom') }}</label>
            <input type="text" name="key" class="@error('key') is-invalid @enderror" value="{{ old('key', $setting['key']) }}" id="key" placeholder="Nom">
            {!! $errors->first('key', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-4 space-y-4">
            <label for="value" class="form-label">{{ __('Contingut') }}</label>
            @if($setting['key'])
                <img src="{{asset("img/logo/md/".$setting['value'])}}" alt="">
            @endif
            <input @if(isset($setting['key']) && $setting['key'] == 'logo') type="file" @else type="text" @endif name="value" class="@error('value') is-invalid @enderror" value="{{ old('value', $setting['value']) }}" id="value" placeholder="Contingut">
            {!! $errors->first('value', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>
    <div class="mt-4">
        <button type="submit" class="send-button">{{ __('Desar canvis') }}</button>
    </div>
</div>
