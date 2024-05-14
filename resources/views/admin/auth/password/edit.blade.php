<x-layouts.auth.app>

    <x-slot name="title">
        Restablir contrasenya || Èter Edicions
    </x-slot>

    <div class="w-full flex flex-col items-center justify-center pt-8 space-y-6">
        <div class="overflow-visible">
            <img src="{{asset('img/logo/lg/logo_eter_black.webp')}}" alt="" class="w-[10vh] md:w-[10vh] lg:w-[18vh] drop-shadow-logo">
        </div>
        <div class="w-full py-4 px-8 rounded bg-light shadow-login space-y-3">
            <div class="px-3">
                <h2>Restablir contrasenya</h2>
                <p>Escriu la teva nova contrasenya.</p>
            </div>

            <form class="p-3" action="{{ route('password.update') }}" method="POST">
                @csrf
                <div class="flex flex-col space-y-1 mb-4">
                    <label for="email">Correu electrònic</label>
                    <input type="email" class="rounded @error('email') is-invalid @enderror" name="email"
                        value="{{ request()->email }}" readonly required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col space-y-1 mb-4">
                    <label for="password">Nova contrasenya</label>
                    <div class="relative w-full flex items-center border border-dark rounded space-x-4 @error('password') is-invalid @enderror">
                        <input type="password" id="password" class="w-full border-none rounded" @error('password') is-invalid @enderror name="password" value="" required>
                        <img src="{{asset('img/icons/dark/eye-open.webp')}}" alt="" class="w-6 h-6 absolute end-4 z-30 cursor-pointer" onclick="togglePasswordVisibility(this)">
                    </div>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col space-y-1 mb-8">
                    <label for="password_confirmation">Confirmar contrasenya</label>
                    <div class="relative w-full flex items-center border border-dark rounded space-x-4 @error('password_confirmation') is-invalid @enderror">
                        <input type="password" id="password_confirmation" class="w-full border-none rounded" @error('password_confirmation') is-invalid @enderror name="password_confirmation" value="" required>
                        <img src="{{asset('img/icons/dark/eye-open.webp')}}" alt="" class="w-6 h-6 absolute end-4 z-30 cursor-pointer" onclick="togglePasswordVisibility(this)">
                    </div>
                    <input type="hidden" name="token" value="{{ request()->route('token') }}">
                </div>
                <div class="w-full flex justify-end items-center space-x-6">
                    <div>
                        <a href="{{ route('login') }}" class="text-darkgrey underline">Accedir</a>
                    </div>
                    <div>
                        <button type="submit" class="send-button-sm">Restablir contrasenya</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-layouts.auth.app>
<script src="{{asset('js/components/password.js')}}"></script>
