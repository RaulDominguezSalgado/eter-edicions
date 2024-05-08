{{-- <x-layouts.app> --}}

    {{-- <x-slot name="title">
        {{ $pageTitle }} | {{ $pageDescription }} | {{ $webName }}
    </x-slot> --}}

    <form action="{{ route('register')}}" method="POST">
        @csrf
        <div id="firstNameInputDiv">
            <label for="first_name">Nom</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{old('first_name')}}">
            @error('first_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div id="flastNameInputDiv">
            <label for="last_name">Cognoms</label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{old('last_name')}}">
            @error('last_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div id="emailInputDiv">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div id="passwordInputDiv">
            <label for="password">Contrasenya</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div id="passwordConfirmation">
            <label for="password_confirmation">Repetir contrasenya</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="phone">Telèfon</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="role_id">Rol</label>
            <select class="form-control @error('role') is-invalid @enderror" name="role_id">
                    <option value="1" selected>Admin</option>
                    <option value="2">Content manager</option>
            </select>
            @error('role_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit">Registrar-se</button>
    </form>

{{-- </x-layouts.app> --}}
