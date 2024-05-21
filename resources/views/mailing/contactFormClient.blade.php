<h2>Hem rebut correctament la teva solicitud d'informació</h2>
<p>A continuació es concreta el contingut de la vostra solicitud.</p>
<ul>
    <li>Nom complet: {{ $request->input("name") }}</li>
    <li>Correu electrónic: {{ $request->input("email") }}</li>
    <li>Asumpte: {{ $request->input("subject") }}</li>
</ul>
<br>
<h2>Contingut del missatge</h2>
{{ $request->input("message") }}