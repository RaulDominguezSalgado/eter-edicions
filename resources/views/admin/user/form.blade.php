<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="first_name" class="form-label">{{ __('Nom') }}</label>
            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name', $user['first_name']) }}" id="first_name" placeholder="Nom">
            {!! $errors->first('first_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="last_name" class="form-label">{{ __('Cognom') }}</label>
            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', $user['last_name']) }}" id="last_name" placeholder="Cognom">
            {!! $errors->first('last_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Correu Electrònic') }}</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user['email']) }}" id="email" placeholder="Correu Electrònic">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="password" class="form-label">{{ __('Contrasenya') }}</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password', $user['password']) }}" id="password" placeholder="Contrasenya">
            {!! $errors->first('password', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="phone" class="form-label">{{ __('Telèfon') }}</label>
            <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $user['phone']) }}" id="phone" placeholder="Telèfon">
            {!! $errors->first('phone', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="role_id" class="form-label">{{ __('Rol') }}</label>
            <select name="role_id" class="form-control @error('role_id') is-invalid @enderror" id="role_id">
                <option value="" selected disabled>Selecciona un rol</option>
                @foreach ($roles as $role)
                    <option value="{{ $role['id'] }}" {{ old('role_id', $user['role_id']) == $role['id'] ? 'selected' : '' }}>{{ $role['name'] }}</option>
                @endforeach
            </select>
            {!! $errors->first('role_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
