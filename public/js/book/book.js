document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('add_author').addEventListener('click', function () {
        let collaborators_options = document.getElementById("getCollaboratorsOptions");

        var contador = document.querySelectorAll('[name="authors[]"]').length + 1;
        let new_author = document.createElement('div');
        new_author.classList.add("flex");
        new_author.innerHTML = `
            <select class="border-0" name="authors[]" id="authors__${contador}">
                ${collaborators_options.innerHTML}
            </select>
            <a class="remove-content-button">
                <img src="/img/icons/dark/less.webp" alt="Eliminar autor">
            </a>
        `;
        let targetElement = this.parentElement.parentElement.parentElement.firstElementChild;
        targetElement.appendChild(new_author);

        // document.querySelectorAll('a.remove-content-button').forEach(function (e) {
        //     e.addEventListener("click", function () {
        //         this.parentNode.remove();
        //     });
        // });
    });

    document.getElementById('add_translator').addEventListener('click', function () {
        let collaborators_options = document.getElementById("getCollaboratorsOptions");

        var contador = document.querySelectorAll('[name="translators[]"]').length + 1;
        let new_translator = document.createElement('div');
        new_translator.classList.add("flex");
        new_translator.innerHTML = `
            <select class="border-0" name="translators[]" id="translators_${contador}">
                ${collaborators_options.innerHTML}
            </select>
            <a class="remove-content-button">
                <img src="/img/icons/dark/less.webp" alt="Eliminar traductor">
            </a>
        `;
        let targetElement = this.parentElement.parentElement.parentElement.firstElementChild;
        targetElement.appendChild(new_translator);

        // document.querySelectorAll('a.remove-content-button').forEach(function (e) {
        //     e.addEventListener("click", function () {
        //         this.parentNode.remove();
        //     });
        // });
    });

    document.getElementById('add_collection').addEventListener('click', function () {
        let collection_options = document.getElementById("getCollectionsOptions");

        var contador = document.querySelectorAll('[name="collections[]"]').length + 1;
        let new_collection = document.createElement('div');
        new_collection.classList.add("flex");
        new_collection.innerHTML = `
            <select class="border-0" name="collections[]" id="collections${contador}">
                ${collection_options.innerHTML}
            </select>
            <a class="remove-content-button">
                <img src="/img/icons/dark/less.webp" alt="Eliminar col·lecció">
            </a>
        `;
        let targetElement = this.parentElement.parentElement.parentElement.firstElementChild;
        targetElement.appendChild(new_collection);

        // document.querySelectorAll('a.remove-content-button').forEach(function (e) {
        //     e.addEventListener("click", function () {
        //         this.parentNode.remove();
        //     });
        // });
    });

    document.getElementById('add_language').addEventListener('click', function () {
        let language_options = document.getElementById("getLanguagesOptions");

        var contador = document.querySelectorAll('[name="lang[]"]').length + 1;
        let new_language = document.createElement('div');
        new_language.classList.add("flex");
        new_language.innerHTML = `
            <select class="border-0" name="lang[]" id="languages_${contador}">
                ${language_options.innerHTML}
            </select>
            <a class="remove-content-button">
                <img src="/img/icons/dark/less.webp" alt="Eliminar idioma">
            </a>
        `;
        let targetElement = this.parentElement.parentElement.parentElement.firstElementChild;
        targetElement.appendChild(new_language);

        // document.querySelectorAll('a.remove-content-button').forEach(function (e) {
        //     e.addEventListener("click", function () {
        //         this.parentNode.remove();
        //     });
        // });
    });

    document.querySelectorAll('a.remove-content-button').forEach(function (e) {
        e.addEventListener("click", function () {
            this.parentNode.remove();
        });
    });
});

// EDIT BUTTON FUNCTIONS
function enableInput(button) {
    var parentDiv = button.parentElement.parentElement;
    var input = parentDiv.querySelector('input');
    input.disabled = false;
    input.classList.remove('disabled');
    input.classList.add('enabled');
}

function enableSelect(button) {
    var parentDiv = button.parentElement.parentElement;
    var selectElements = parentDiv.querySelectorAll('select');
    selectElements.forEach(select => {
        select.disabled = false;
        select.classList.remove('disabled');
        select.classList.add('enabled');
    });
}

function enableTextarea(button) {
    var parentDiv = button.parentElement.parentElement.parentElement;
    var textarea = parentDiv.querySelector('textarea');
    textarea.disabled = false;
    textarea.classList.remove('disabled');
    textarea.classList.add('enabled');
}
