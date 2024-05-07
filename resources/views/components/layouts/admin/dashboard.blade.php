<x-layouts.admin.app>
    {{-- <h1>Dashboard</h1> --}}
    <h3>Hola, {{Auth::user()->first_name}}!</h3>
    @dump(Auth::user())
</x-layouts.admin.app>
