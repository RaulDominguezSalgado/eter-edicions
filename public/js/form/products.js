document.addEventListener('DOMContentLoaded', function () {
    // var contador = 1;
    // document.getElementById('add_product').addEventListener('click', function() {
    //     var nuevas_redes_sociales = document.createElement('div');
    //     nuevas_redes_sociales.classList.add('product' + contador);

    //     nuevas_redes_sociales.innerHTML = '        <select name="book_id" class="form-control @error(\'book_id\') is-invalid @enderror" id="book_id">@foreach ($books as $book)<option value="{{ $book->id }}">{{ $book->title}}</option>@endforeach</select><input type="text" name="product_price[]" placeholder="Preu"><input type="text" name="product_quantity[]" placeholder="Quantitat">';
    //     document.getElementById('products').appendChild(nuevas_redes_sociales);
    //     contador++;
    // });

    let collaborators_options = document.getElementById("getBooks");
    let books_options;
    // var contador = 0;
    contador = document.querySelectorAll('#products label').length;
    console.log(collaborators_options);
    document.getElementById('add_product').addEventListener('click', function () {
        // books_options = document.getElementById("getBookOptions");
        // books_id = document.querySelectorAll('#products input');
        // books_stock = document.querySelectorAll('#products input');
        contador++;
        let new_author = document.createElement('div');
        new_author.classList.add('flex', 'items-start', 'space-x-2');
        new_author.innerHTML = `
            <div class="flex flex-col ">
                <label for="products[${contador}][id]">Producte</label>
                <select class="max-w-min" name="products[${contador}][id]" id="books__${contador}">
                    ${collaborators_options.innerHTML}
                </select>
            </div>
            <div class="">
                <label for="products[${contador}][quantity]">Quantitat</label>
                <input class="max-w-min" type="number" name="products[${contador}][quantity]"
                    value=0 placeholder="Quantitat"
                    min="0">
            </div>
             <div class="flex flex-col flex-grow ">
                <label for="products[${contador}][pvp]">Preu personalitzat</label>
                <input class="w-full" type="number" step="0.01" name="products[${contador}][pvp]"
                    value=0 placeholder="Preu personalitzat"
                    min="0">
                    <small class="text-xs">Deixar el preu en 0 per agafar el preu actual del llibre a la base de dades.</small>
             </div>


            <div class="flex"><button type="button" class="remove-content-button" onclick="removeParentNode(this.parentNode)">Eliminar</button></div>
        `;
        console.log(contador);

        this.parentNode.insertBefore(new_author, this);
    });
});

function removeParentNode(element){
    element.parentNode.remove();
}
