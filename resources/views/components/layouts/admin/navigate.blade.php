<nav id="admin-nav">
    <a href="" id="logo">Logo</a>
    <ul>
        <li><a href="">Portada</a></li>
        <li><a href="">Comandes</a></li>
        <li><a href="{{ route('books.index') }}" @if(Route::currentRouteName() == 'books.index') class="active" @endif>Llibres</a></li>
        <li><a href="">Col·leccions</a></li>
        <li>
            <a href="{{ route('collaborators.index') }}" @if(Route::currentRouteName() == 'collaborators.index') class="active" @endif>Colaboradors</a>
            <ul>
                <li><a href="{{ route('authors.index') }}">Autors</a></li>
                <li><a href="{{ route('translators.index') }}">Traductors</a></li>
                <li><a href="{{ route('ilustrators.index') }}">Il·lustradors</a></li>
            </ul>
        </li>
        <li>
            <a href="">Publicacions</a>
            <ul>
                <li><a href="">Activitats</a></li>
                <li><a href="">Articles</a></li>
            </ul>
        </li>
        <li><a href="">Págines</a></li>
        <li><a href="">Usuaris</a></li>
    </ul>
</nav>
<hr>
