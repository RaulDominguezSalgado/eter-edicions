<form action="{{ route('user-password.update') }}" method="POST" class="w-full border border-lightgrey bg-light">
    @csrf
    @method('PUT')
    <div class="py-2 px-4">
        <h3>Canviar contrasenya</h3>
    </div>
    @if (session('status') === 'profile-updated')
        {{-- <div class="alert alert-danger">{{ session('error') }}</div> --}}
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">La contrasenya s'ha canviat correctament.</strong>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20" onclick="removeParentDiv(this.parentNode)">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
    @endif
    <div class="p-4 space-y-4">
        <div id="currentPasswordInputDiv">
            <label for="current_password-password">Contrasenya actual</label>
            <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                name="current_password">
            @error('current_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div id="passwordInputDiv">
            <label for="password">Nova contrasenya</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div id="passwordConfirmation">
            <label for="password_confirmation">Repetir contrasenya</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                name="password_confirmation">
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="px-4 mb-4">
        <button class="border border-dark p-2" type="submit">Actualitzar perfil</button>
    </div>
</form>
