<x-layouts.admin.app>

    <x-slot name="title">
        Configuració de perfil || Èter Edicions
    </x-slot>

    <main class="p-3 flex space-x-8">

        <x-layouts.admin.profile-edit/>

        @include('admin.settings.profile-information.form')

    </main>

</x-layouts.admin.app>
