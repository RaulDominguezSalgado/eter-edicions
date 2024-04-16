document.addEventListener('DOMContentLoaded', function() {
    var contador = 1;
    document.getElementById('add_product').addEventListener('click', function() {
        var nuevas_redes_sociales = document.createElement('div');
        nuevas_redes_sociales.classList.add('product' + contador);

        nuevas_redes_sociales.innerHTML = '        <select name="book_id" class="form-control @error(\'book_id\') is-invalid @enderror" id="book_id">@foreach ($books as $book)<option value="{{ $book->id }}">{{ $book->title}}</option>@endforeach</select><input type="text" name="product_price[]" placeholder="Preu"><input type="text" name="product_quantity[]" placeholder="Quantitat">';
        document.getElementById('products').appendChild(nuevas_redes_sociales);
        contador++;
    });
});
