<x-layouts.auth.app>

    <x-slot name="title">
        Restablir contrasenya || Èter Edicions
    </x-slot>

    <main>
        <div class="px-3">
            <h2>Restablir contrasenya</h2>
            <p>Escriu la teva nova contrasenya.</p>
        </div>

        <form class="p-3" action="{{ route('password.update') }}" method="POST">
            @csrf
            <div class="flex flex-col space-y-1 mb-2">
                <label for="email">Correu electrònic</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ request()->email }}" readonly>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col space-y-1 mb-2">
                <label for="password">Nova contrasenya</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col space-y-1 mb-2">
                <label for="password_confirmation">Confirmar contrasenya</label>
                <input type="password" class="form-control" name="password_confirmation">
                <input type="hidden" name="token" value="{{ request()->route('token') }}">
            </div>
            <div>
                <div>
                    <button type="submit" class="btn btn-block btn-primary">Restablir contrasenya</button>
                </div>
            </div>
        </form>
        <div class="flex p-3">
            <a href="{{ route('login') }}" class="text-muted font-weight-bold me-3">Accedir</a>
        </div>
    </main>

</x-layouts.auth.app>
