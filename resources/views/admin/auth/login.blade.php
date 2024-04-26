{{-- <x-layouts.app> --}}

    {{-- <x-slot name="title">
        {{ $pageTitle }} | {{ $pageDescription }} | {{ $webName }}
    </x-slot> --}}

    <form action="{{ route('login')}}" method="POST">
        @csrf
        <div id="emailInputDiv">
            <label for="email">Email</label>
            <input type="email" class="form-control" @error('email') is-invalid @enderror name="email" value="{{old('email')}}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div id="passwordInputDiv">
            <label for="password">Contrasenya</label>
            <input type="password" class="form-control" @error('password') is-invalid @enderror name="password" value="{{old('password')}}">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div id="extraOptionsDiv">
            <div class="form-group form-check mb-3">
                <input type="checkbox" class="form-check-input" name="remember" value="true" id="remember">
                <label class="form-check-label" for="remember">Recorda'm</label>
            </div>
            <div>
                <a href="{{ route('password.request') }}" class="text-muted font-weight-bold">He oblidat la meva contrasenya</a>
            </div>
        </div>

        <div>
            <div>
                <button type="submit" class="btn btn-block btn-primary">Accedir</button>
            </div>
            {{-- <small class="py-2 text-muted">
                ¿No tienes cuenta?
                <a href="{{ route('register') }}" class="text-muted font-weight-bold">Regístrate</a>
            </small> --}}
        </div>


        <button type="submit">Entrar</button>
    </form>

{{-- </x-layouts.app> --}}
