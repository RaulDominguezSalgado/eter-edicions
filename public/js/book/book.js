document.addEventListener('DOMContentLoaded', function() {
    let collection_options = document.getElementById("getCollections");
    console.log(collection_options);
    let collaborators_options = document.getElementById("getCollaborators");
    console.log(collaborators_options);

    document.getElementById('add_collection').addEventListener('click', function() {
        var contador = document.querySelectorAll('[name="collections[]"]').length+1;
        let new_collection = document.createElement('div');
        new_collection.innerHTML = `
        <label for="collections_${contador}">Col·lecció ${contador}
            <select name="collections[]" id="collections_${contador}">
                ${collection_options.innerHTML}
            </select>
            <a class="remove-content-button">Quitar</a>
        </label>
        `;
        this.parentNode.insertBefore(new_collection, this);
        document.querySelectorAll('a.remove-content-button').forEach(function (e) {
            e.addEventListener("click", function () {
                this.parentNode.remove();
            });
        });
    });

    document.getElementById('add_author').addEventListener('click', function() {
        var contador = document.querySelectorAll('[name="authors[]"]').length+1;
        let new_author = document.createElement('div');
        new_author.innerHTML = `
        <label for="authors_${contador}">Autor ${contador}
            <select name="authors[]" id="authors__${contador}">
                ${collaborators_options.innerHTML}
            </select>
            <a class="remove-content-button">Quitar</a>
        </label>
        `;
        this.parentNode.insertBefore(new_author, this);
        document.querySelectorAll('a.remove-content-button').forEach(function (e) {
            e.addEventListener("click", function () {
                this.parentNode.remove();
            });
        });
    });

    document.getElementById('add_translator').addEventListener('click', function() {
        var contador = document.querySelectorAll('[name="translators[]"]').length+1;
        let new_translator = document.createElement('div');
        new_translator.innerHTML = `
        <label for="authors_${contador}">Traductor ${contador}
            <select name="translators[]" id="translators_${contador}">
                ${collaborators_options.innerHTML}
            </select>
            <a class="remove-content-button">Quitar</a>
        </label>
        `;
        this.parentNode.insertBefore(new_translator, this);
        document.querySelectorAll('a.remove-content-button').forEach(function (e) {
            e.addEventListener("click", function () {
                this.parentNode.remove();
            });
        });
    });



    document.querySelectorAll('a.remove-content-button').forEach(function (e) {
        e.addEventListener("click", function () {
            this.parentNode.remove();
        });
    });
});