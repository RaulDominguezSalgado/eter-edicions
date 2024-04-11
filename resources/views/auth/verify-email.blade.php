<x-layouts.app>

    <x-slot name="title">
        Verifica tu correo | LUDO
    </x-slot>

    <main class="p-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success mb-3">¡Enlace de verificación enviado!</div>
                        @endif
                        <div class="mb-3">
                            <p class="mb-0"><strong>¡Gracias por registrarte y jugar a Ludo!</strong></p>
                            <p class="mb-1">Te hemos enviado un correo para confirmar tu cuenta.</p>
                            <p class="mb-3">Si no lo has recibido, ¡te lo volveremos a enviar encantados!</p>
                            <small>Es posible que hayas recibido nuestro correo en spam o que se marca
                                como potencialmente peligroso. Si el remitente es "ludoupc@gmail.com", no hay nada de qué preocuparse,
                                somos nosotros :)</small>
                        </div>
                        <form action="{{ route('verification.send') }}" method="POST">
                            @csrf
                            <button class="btn btn-secondary">Volver a enviar correo de verificación</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

</x-layouts.app>
