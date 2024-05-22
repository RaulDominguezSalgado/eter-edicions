<x-layouts.auth.app>

    <x-slot name="title">
        Login || Èter Edicions
    </x-slot>

    <form action="{{ route('login')}}" method="POST" class="space-y-4 validate">
        @csrf
        <div id="emailInputDiv" class="flex flex-col space-y-0.5">
            <label for="email">Email</label>
            <input type="email" class="form-control field email required" @error('email') is-invalid @enderror name="email" value="{{old('email')}}">
            <div class="invalid-feedback text-systemerror">@error('email'){{ $message }}@enderror</div>
        </div>

        <div id="passwordInputDiv" class="flex flex-col space-y-0.5">
            <label for="password">Contrasenya</label>
            <input type="password" class="form-control field required" @error('password') is-invalid @enderror name="password" value="{{old('password')}}">
            <div class="invalid-feedback text-systemerror">@error('password'){{ $message }}@enderror</div>
        </div>

        <div id="extraOptionsDiv">
            <div class="form-group form-check mb-3">
                <input type="checkbox" class="form-check-input" name="remember" value="true" id="remember">
                <label class="form-check-label" for="remember">Recorda'm</label>
            </div>
            <div>
                <a href="{{ route('password.request') }}" class="underline">He oblidat la meva contrasenya</a>
            </div>
        </div>

        <div>
            <div class="flex justify-center">
                <button type="submit" class="border border-dark p-2">Accedir</button>
            </div>
            {{-- <small class="py-2 text-muted">
                ¿No tienes cuenta?
                <a href="{{ route('register') }}" class="text-muted font-weight-bold">Regístrate</a>
            </small> --}}
        </div>
    </form>
    <script src="js/front/validations.js"></script>
</x-layouts.auth.app>
