<form action="{{ route('user-profile-information.update') }}" method="POST" class="w-full border border-lightgrey bg-light">
    @csrf
    @method('PUT')
    <div class="py-2 px-4">
        <h3>Editar perfil</h3>
    </div>
    @if (session('status') === 'profile-information-updated')
        {{-- <div class="alert alert-danger">{{ session('error') }}</div> --}}
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">El perfil s'ha actualitzat correctament.</strong>
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
        <div id="firstNameInputDiv">
            <label for="first_name">Nom</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                value="{{ old('first_name', auth()->user()->first_name) }}">
            @error('first_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div id="flastNameInputDiv">
            <label for="last_name">Cognoms</label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                value="{{ old('last_name', auth()->user()->last_name) }}">
            @error('last_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div id="emailInputDiv">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email', auth()->user()->email) }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="phone">Telèfon</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                value="{{ old('phone', auth()->user()->phone) }}">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="px-4 mb-4">
        <button class="border border-dark p-2" type="submit">Actualitzar perfil</button>
    </div>
</form>
