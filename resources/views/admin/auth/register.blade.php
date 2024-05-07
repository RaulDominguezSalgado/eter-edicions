{{-- <x-layouts.app> --}}

    {{-- <x-slot name="title">
        {{ $pageTitle }} | {{ $pageDescription }} | {{ $webName }}
    </x-slot> --}}

    <form action="{{ route('login')}}" method="POST">
        @csrf

        <div id="firstNameInputDiv">
            <label for="first_name">Nom</label>
            <input type="text" class="form-control" @error('first_name') is-invalid @enderror name="first_name" value="{{old('first_name')}}">
            @error('first_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div id="flastNameInputDiv">
            <label for="last_name">Cognoms</label>
            <input type="text" class="form-control" @error('last_name') is-invalid @enderror name="last_name" value="{{old('last_name')}}">
            @error('last_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div id="emailInputDiv">
            <label for="email">Email</label>
            <input type="email" class="form-control" @error('email') is-invalid @enderror name="email" value="{{old('email')}}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div id="passwordInputDiv">
            <label for="password">Contrasenya</label>
            <input type="password" class="form-control" @error('password') is-invalid @enderror name="password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div id="passwordConfirmation">
            <label for="passwordConfirmation">Repetir contrasenya</label>
            <input type="passwordConfirmation" class="form-control" @error('passwordConfirmation') is-invalid @enderror name="passwordConfirmation">
            @error('passwordConfirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit">Registrar-se</button>
    </form>

{{-- </x-layouts.app> --}}
