<x-layouts.admin.app>

    <x-slot name="title">
        Verificació de correu || Èter Edicions
    </x-slot>

    <main class="p-3">
        <div class="">
            <div class="">
                <div class="">
                    <div class="">
                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success mb-3">Enllaç de verificació enviat!</div>
                        @endif
                        <div class="mb-3">
                            <p class="mb-0"><strong>Gràcies per formar part d'Èter!</strong></p>
                            <p class="mb-1">T'hem enviat un correu que et permetrà tenir accés al teu compte.</p>
                            <p class="mb-3">Si no l'has rebut, te'l tornarem a enviar encantats!</p>
                            <small>És possible que hagis rebut el nostre correu a la carpeta d'spam o que s'hagi marcat com a potencialment perillós. Si el remitent és "admin@eteredicions.com", no tens res de què preocupar-te, som nosaltres! :)</small>
                        </div>
                        <form action="{{ route('verification.send') }}" method="POST">
                            @csrf
                            <button class="border border-dark p-2">Enviar correu de verificació</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

</x-layouts.admin.app>
