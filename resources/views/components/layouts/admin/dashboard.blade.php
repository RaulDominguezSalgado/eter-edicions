<x-layouts.admin.app>
    {{-- <h1>Dashboard</h1> --}}
    <div class="space-y-2">
        <h2>Hola, {{ Auth::user()->first_name }}!</h2>
        <p>Benvingut al Back Office de la web d’Èter Edicions. Des d’aquí pots gestionar el contingut de la web.</p>
    </div>
    {{-- @dump(Auth::user()) --}}
</x-layouts.admin.app>
