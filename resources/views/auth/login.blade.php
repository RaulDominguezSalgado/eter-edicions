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


        <button type="submit">Entrar</button>
    </form>

{{-- </x-layouts.app> --}}
