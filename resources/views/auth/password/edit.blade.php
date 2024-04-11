<x-layouts.app>

    <x-slot name="title">
        Restablecer contraseña | LUDO
    </x-slot>

    <main>
        <div class="px-3">
            <h2>Restablecer contraseña</h2>
            <p>Introduce tu nueva contraseña.</p>
        </div>

        <form class="p-3" action="{{ route('password.update') }}" method="POST">
            @csrf
            <div class="form-group mb-2">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ request()->email }}" readonly>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="password">Nueva contraseña</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="password_confirmation">Confirmar contraseña</label>
                <input type="password" class="form-control" name="password_confirmation">
                <input type="hidden" name="token" value="{{ request()->route('token') }}">
            </div>
            <div>
                <div>
                    <button type="submit" class="btn btn-block btn-primary">Restablecer contraseña</button>
                </div>
            </div>
        </form>
        <div class="d-flex p-3">
            <a href="{{ route('login') }}" class="text-muted font-weight-bold me-3">Accede</a>
            <a href="{{ route('register') }}" class="text-muted font-weight-bold">Regístrate</a>
        </div>
    </main>

</x-layouts.app>
