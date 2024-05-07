<x-layouts.auth.app>

    <x-slot name="title">
        Restablir contrasenya || Èter Edicions
    </x-slot>

    <main class="">
        <div class="py-3">
            <h2>Restablir contrasenya</h2>
            <p>Introdueix el teu correu electrònic. T'hi enviarem un enllaç perquè puguis restablir la teva contrasenya.</p>
        </div>

        @if ($message = session('status'))
            <div class="py-3">
                <div class="alert alert-success">T'hem enviat un correu per restablir la teva contrasenya.</div>
            </div>
        @endif

        <form class="py-3" action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="flex flex-col mb-8">
                <label for="email">Correu electrònic</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-center space-x-6">
                <div>
                    <button type="submit" class="border border-dark p-2">Restablir contrasenya</button>
                </div>
                <div class="flex">
                    <a href="{{ route('login') }}" class="border border-dark p-2">Accedir</a>
                </div>
            </div>
        </form>
    </main>

</x-layouts.auth.app>
