<x-layouts.app>

    <x-slot name="title">
        Restablecer contraseña | LUDO
    </x-slot>

    <main>
        <div class="px-3">
            <h2>Restablecer contraseña</h2>
            <p>Introduce el correo electrónico que utilizaste para registrar tu cuenta. Te enviaremos un enlace para que puedas restablecerla a este correo.</p>
        </div>

        @if ($message = session('status'))
            <div class="px-3">
                <div class="alert alert-success">Te hemos enviado un correo con un enlace para restablecer tu contraseña.</div>
            </div>
        @endif

        <form class="p-3" action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="form-group mb-2">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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
