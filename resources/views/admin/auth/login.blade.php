<x-layouts.auth.app>

    <x-slot name="title">
        Login || Èter Edicions
    </x-slot>

    <div class="w-full flex flex-col items-center space-y-6 overflow-visible">
        <div class="overflow-visible">
            <img src="{{asset('img/logo/md/logo_eter_black.webp')}}" alt="" class="w-[150px] drop-shadow-logo">
        </div>

        <div  class="w-full py-4 px-8 rounded bg-light shadow-login overflow-visible ">
            <form action="{{ route('login')}}" method="POST">
                @csrf
                <div id="emailInputDiv" class="flex flex-col space-y-0.5 mb-4">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="rounded" @error('email') is-invalid @enderror name="email" value="{{old('email')}}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div id="passwordInputDiv" class="flex flex-col space-y-0.5 mb-4">
                    <label for="password">Contrasenya</label>
                    <div class="relative w-full flex items-center border border-dark rounded space-x-4 @error('password') is-invalid @enderror">
                        <input type="password" id="password" class="w-full border-none rounded" @error('password') is-invalid @enderror name="password" value="" required>
                        <img src="{{asset('img/icons/dark/eye-open.webp')}}" alt="" class="w-6 h-6 absolute end-4 z-30 cursor-pointer" onclick="togglePasswordVisibility(this)">
                    </div>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div id="extraOptionsDiv">
                    <div class="form-group form-check mb-3">
                        <input type="checkbox" id="remember" class="form-check-input" name="remember" value="true" id="remember">
                        <label class="form-check-label" for="remember">Recorda'm</label>
                    </div>
                </div>

                <div class="flex items-center justify-end space-x-4">
                    <div>
                        <a href="{{ route('password.request') }}" class="text-darkgrey underline">He oblidat la meva contrasenya</a>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" id="submit" class="send-button-sm">Accedir</button>
                    </div>
                    {{-- <small class="py-2 text-muted">
                        ¿No tienes cuenta?
                        <a href="{{ route('register') }}" class="text-muted font-weight-bold">Regístrate</a>
                    </small> --}}
                </div>
            </form>
        </div>
    </div>

</x-layouts.auth.app>
<script src="{{asset('js/components/password.js')}}"></script>
