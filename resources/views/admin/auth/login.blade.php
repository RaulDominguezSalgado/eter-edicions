<x-layouts.auth.app>

    <x-slot name="title">
        Login || Èter Edicions
    </x-slot>

    <div class="w-full flex flex-col items-center space-y-6 overflow-visible">
        <img src="{{asset('img/logo/md/logo_eter_black.webp')}}" alt="" class="w-[150px]">

        <form action="{{ route('login')}}" method="POST" class="w-full py-4 px-8 rounded bg-light shadow-login overflow-visible ">
            @csrf
            <div id="emailInputDiv" class="flex flex-col space-y-0.5 mb-4">
                <label for="email">Email</label>
                <input type="email" class="rounded" @error('email') is-invalid @enderror name="email" value="{{old('email')}}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div id="passwordInputDiv" class="flex flex-col space-y-0.5 mb-4">
                <label for="password">Contrasenya</label>
                <input type="password" class="rounded" @error('password') is-invalid @enderror name="password" value="{{old('password')}}">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div id="extraOptionsDiv">
                <div class="form-group form-check mb-3">
                    <input type="checkbox" class="form-check-input" name="remember" value="true" id="remember">
                    <label class="form-check-label" for="remember">Recorda'm</label>
                </div>
            </div>

            <div class="flex items-center justify-end space-x-4">
                <div>
                    <a href="{{ route('password.request') }}" class="text-darkgrey underline">He oblidat la meva contrasenya</a>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="send-button-sm">Accedir</button>
                </div>
                {{-- <small class="py-2 text-muted">
                    ¿No tienes cuenta?
                    <a href="{{ route('register') }}" class="text-muted font-weight-bold">Regístrate</a>
                </small> --}}
            </div>
        </form>
    </div>

</x-layouts.auth.app>
