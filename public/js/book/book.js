document.addEventListener('DOMContentLoaded', function() {
    let contador = document.querySelectorAll('[name="collections[]"]').length;
    document.getElementById('add_collection').addEventListener('click', function() {
        contador++;
        let nueva_collection = document.createElement('div');
        nueva_collection.innerHTML = `
        <label for="collections_${contador}">Col·lecció ${contador}
            <select name="collections[]" id="collections_${contador}">
                <?php getCollections();?>
            </select>
        </label>
        `;
        this.insertBefore(nueva_collection);
    });
});