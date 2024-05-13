<x-layouts.auth.app>

    <x-slot name="title">
        Restablir contrasenya || Èter Edicions
    </x-slot>

    <div class="w-full flex flex-col items-center overflow-visible space-y-6">
        <div class="">
            <img src="{{ asset('img/logo/md/logo_eter_black.webp') }}" alt="" class="w-[150px]">
        </div>
        <div class="w-full py-4 px-8 rounded bg-light shadow-login overflow-visible space-y-3">
            <div class="py-3 mb-2">
                <h2>Restablir contrasenya</h2>
                <p>Introdueix el teu correu electrònic. T'hi enviarem un enllaç perquè puguis restablir la teva contrasenya.
                </p>
            </div>

            {{-- @if ($message = session('status')) --}}
                {{-- <div class="py-3 mb-2">
                    <div class="alert alert-success"></div>
                </div> --}}
                <div class="border border-green-700 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="text-darkgrey">T'hem enviat un correu per restablir la teva contrasenya.</strong>
                    {{-- <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            onclick="removeParentDiv(this.parentNode)">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span> --}}
                    <div class="w-10 h-10 bg-light border flex items-center justify-center absolute bottom-8 start-[calc(50%-1.25em)]">
                        <img src="{{asset('img/icons/check.svg')}}" alt="" style="width: 12px">
                    </div>
                </div>
            {{-- @endif --}}

            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="flex flex-col space-y-2 mb-4">
                    <label for="email">Correu electrònic</label>
                    <input type="email" class="rounded @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}">
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
