<nav class="w-auto flex flex-col">
    <div id="header" class="w-full bg-surfacemedium py-1 pb-2 pl-3 pr-8 border-l border-t border-r border-lightgrey font-semibold">Configuració</div>
    <ul class="w-fit bg-light border border-lightgrey">
        <li class="py-1 pb-2 pl-3 pr-12  @if (Route::currentRouteName() == 'user-profile-information.edit') bg-primary @endif">
            <a href="{{route('user-profile-information.edit')}}" class="@if (Route::currentRouteName() == 'user-profile-information.edit') text-light font-semibold @endif">Perfil</a>
        </li>
        <li class="py-1 pb-2 pl-3 pr-12  @if (Route::currentRouteName() == 'user-password.edit') bg-primary @endif">
            <a href="{{route('user-password.edit')}}" class="@if (Route::currentRouteName() == 'user-password.edit') text-light font-semibold @endif">Contrasenya</a>
        </li>
    </ul>
</nav>
