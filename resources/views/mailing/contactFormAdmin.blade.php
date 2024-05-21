<h2>Un usuari ha contactat a través del formulari de contacte</h2>
<p>A continuació es concreta el contingut de la solicitud.</p>
<ul>
    <li>Nom complet: {{ $request->input("name") }}</li>
    <li>Correu electrónic: {{ $request->input("email") }}</li>
    <li>Asumpte: {{ $request->input("subject") }}</li>
</ul>
<br>
<h2>Contingut del missatge</h2>
{{ $request->input("message") }}