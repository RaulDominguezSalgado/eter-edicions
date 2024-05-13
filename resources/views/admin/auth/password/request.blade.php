<x-layouts.auth.app>

    <x-slot name="title">
        Restablir contrasenya || Èter Edicions
    </x-slot>

    @if ($message = session('status'))
    <div class="w-full h-full absolute backdrop-blur-xs " id="main">
        <div class="w-full h-full flex flex-col items-center justify-center ">
            <div class="w-1/2 max-w-[30em] flex flex-col items-center border rounded py-4 px-16 bg-light space-y-4"
                role="alert">
                <div class="bg-light flex items-center justify-center">
                    <img src="{{ asset('img/icons/check-round.svg') }}" alt="" style="width: 4em">
                </div>
                <h4 class="text-dark text-center font-semibold">T'hem enviat un correu per restablir la teva
                    contrasenya!
                </h4>
                <button type="button" class="info-button"
                    onclick="removeParentDiv(this.parentNode.parentNode)">D'acord</button>
            </div>
        </div>
    </div>
    @endif
    <div class="w-full h-screen flex flex-col items-center justify-center overflow-visible space-y-6">
        <div class="">
            <img src="{{ asset('img/logo/md/logo_eter_black.webp') }}" alt="" class="w-[150px]">
        </div>
        <div class="w-full py-4 px-8 rounded bg-light shadow-login overflow-visible space-y-3">
            <div class="py-3 mb-2">
                <h2>Restablir contrasenya</h2>
                <p>Introdueix el teu correu electrònic. T'hi enviarem un enllaç perquè puguis restablir la teva
                    contrasenya.
                </p>
            </div>

            {{-- @if ($message = session('status')) --}}
            {{-- <div class="py-3 mb-2">
                    <div class="alert alert-success"></div>
                </div> --}}
            {{-- <div class="border border-green-700 text-green-700 px-4 py-3 rounded relative"
                    role="alert"> --}}
            {{-- <strong class="text-darkgrey">T'hem enviat un correu per restablir la teva contrasenya.</strong>
                    <div class="w-10 h-10 bg-light flex items-center justify-center absolute bottom-7 start-[calc(50%-1.25em)]">
                        <img src="{{asset('img/icons/check.svg')}}" alt="" style="width: 20px">
                    </div> --}}
            {{-- <div class="w-10 h-10 bg-light flex items-center justify-center absolute bottom-[calc(50%-1.25em)] end-5">
                        <img src="{{asset('img/icons/check.svg')}}" alt="" style="width: 20px">
                    </div> --}}
            {{-- </div> --}}
            {{-- @endif --}}

            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="flex flex-col space-y-2 mb-4">
                    <label for="email">Correu electrònic</label>
                    <input type="email" class="rounded @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
<script src="{{ asset('js/form/alert.js') }}"></script>
