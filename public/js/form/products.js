document.addEventListener('DOMContentLoaded', function() {
    var contador = 1;
    document.getElementById('add_product').addEventListener('click', function() {
        var nuevas_redes_sociales = document.createElement('div');
        nuevas_redes_sociales.classList.add('product' + contador);
        nuevas_redes_sociales.innerHTML = '<input type="text" name="product_name[]" placeholder="Nom"> <input type="text" name="product_price[]" placeholder="Preu"><input type="text" name="product_quantity[]" placeholder="Quantitat">';
        document.getElementById('products').appendChild(nuevas_redes_sociales);
        contador++;
    });
});
