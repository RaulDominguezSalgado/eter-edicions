<nav id="main-nav">
    <a href="{{ route('home') }}" class="logo">Logo</a>
    <ul>
        <li><a href="{{ route('home') }}"@if(Route::currentRouteName() == 'home') class="active" @endif>Portada</a></li>
        <li><a href="{{ route('catalogo') }}" @if(Route::currentRouteName() == 'catalogo') class="active" @endif>Catàleg</a></li>
        <li><a href="{{ route('collaborators.index') }}"@if(Route::currentRouteName() == 'colaboradors.index') class="active" @endif>Autors</a></li>
        <li><a href="">Agència</a></li>
        <li><a href="">Activitats</a></li>
        <li><a href="">Articles</a></li>
        <li><a href="">Qui som</a></li>
        <li><button>Buscar</button></li>
</nav>
<hr>
