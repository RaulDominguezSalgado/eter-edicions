document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('add_author').addEventListener('click', function () {
        //Get the html code for the collaborators options
        let collaborators_options = document.getElementById("getCollaboratorsOptions");
        //Set counter for id setting
        var counter = document.querySelectorAll('[name="authors[]"]').length + 1;

        //Create new div element for new_author
        let new_author = document.createElement('div');
        //Add classes
        new_author.classList.add("flex");
        //Add the needed HTML code to the new_author div
        new_author.innerHTML = `
            <select class="border-0 enabled" name="authors[]" id="authors__${counter}">
                ${collaborators_options.innerHTML}
            </select>
            <button class="remove-content-button" type="button"  onclick="removeParentDiv(this)">
                <img src="/img/icons/dark/less.webp" alt="Eliminar autor">
            </button>
        `;
        //Get the parent element
        let parentElement = this.parentElement;
        //Insert new_author div just before the addition button
        parentElement.insertBefore(new_author, parentElement.lastElementChild);
    });

    document.getElementById('add_translator').addEventListener('click', function () {
        //Get the html code for the collaborators options
        let collaborators_options = document.getElementById("getCollaboratorsOptions");
        //Set counter for id setting
        var counter = document.querySelectorAll('[name="translators[]"]').length + 1;

        //Create new div element for new_author
        let new_translator = document.createElement('div');
        //Add classes
        new_translator.classList.add("flex");
        //Add the needed HTML code to the new_author div
        new_translator.innerHTML = `
            <select class="border-0 enabled" name="translators[]" id="translators_${counter}">
                ${collaborators_options.innerHTML}
            </select>
            <button class="remove-content-button" type="button"  onclick="removeParentDiv(this)">
                <img src="/img/icons/dark/less.webp" alt="Eliminar traductor">
            </button>
        `;
        //Get the parent element
        let parentElement = this.parentElement;
        //Insert new_translator div just before the addition button
        parentElement.insertBefore(new_translator, parentElement.lastElementChild);
    });

    document.getElementById('add_collection').addEventListener('click', function () {
        //Get collections
        let collection_options = document.getElementById("getCollectionsOptions");
        //Set counter for id setting
        var counter = document.querySelectorAll('[name="collections[]"]').length + 1;

        //Create new div element for new_author
        let new_collection = document.createElement('div');
        //Add classes
        new_collection.classList.add("flex");
        //Add the needed HTML code to the new_author div
        new_collection.innerHTML = `
            <select class="border-0 enabled" name="collections[]" id="collections${counter}">
                ${collection_options.innerHTML}
            </select>
            <button class="remove-content-button" type="button"  onclick="removeParentDiv(this)">
                <img src="/img/icons/dark/less.webp" alt="Eliminar col·lecció">
            </button>
        `;
        //Get the parent element
        let parentElement = this.parentElement;
        //Insert new_translator div just before the addition button
        parentElement.insertBefore(new_collection, parentElement.lastElementChild);
    });

    document.getElementById('add_language').addEventListener('click', function () {
        let language_options = document.getElementById("getLanguagesOptions");
        //Set counter for id setting
        var counter = document.querySelectorAll('[name="lang[]"]').length + 1;

        //Create new div element for new_author
        let new_language = document.createElement('div');
        //Add classes
        new_language.classList.add("flex");
        //Add the needed HTML code to the new_author div
        new_language.innerHTML = `
            <select class="border-0 enabled" name="lang[]" id="languages_${counter}">
                ${language_options.innerHTML}
            </select>
            <button class="remove-content-button" type="button"  onclick="removeParentDiv(this)">
                <img src="/img/icons/dark/less.webp" alt="Eliminar idioma">
            </button>
        `;
        //Get the parent element
        let parentElement = this.parentElement;
        //Insert new_translator div just before the addition button
        parentElement.insertBefore(new_language, parentElement.lastElementChild);
    });

    document.getElementById('add_extra').addEventListener('click', function () {
        // let language_options = document.getElementById("getLanguagesOptions");
        //Set counter for id setting
        var counter = document.querySelectorAll('[name*="extras["]').length + 1;

        //Create new div element for new_author
        let new_extra = document.createElement('div');
        //Add classes
        new_extra.classList.add("flex", "justify-between", "items-center", "ml-2.5", "space-x-2.5");
        //Add the needed HTML code to the new_author div
        new_extra.innerHTML = `
        <input class="enabled" type="text" name="extras[${counter}][key]">
        <input class="enabled" id="extras_{{ $i }}" type="text"
            name="extras[${counter}][value]" placeholder>
        `;
        //Get the parent element
        let parentElement = this.parentElement.parentElement;
        //Insert new_translator div just before the addition button
        parentElement.insertBefore(new_extra, parentElement.lastElementChild);
    });
});

// EDIT BUTTON FUNCTIONS
function enableInput(button) {
    var parentDiv = button.parentElement.parentElement;
    var input = parentDiv.querySelector('input');
    input.disabled = false;
    // input.setAttribute('readonly', false);
    input.readOnly = false;
    input.classList.remove('disabled', 'hidden');
    input.classList.add('enabled');
}

function enableSelect(button) {
    var parentDiv = button.parentElement.parentElement;
    var selectElements = parentDiv.querySelectorAll('select');
    selectElements.forEach(select => {
        select.disabled = false;
        select.readOnly = false;
        select.classList.remove('disabled');
        select.classList.add('enabled');
    });

    var removeButtons = parentDiv.querySelectorAll('.remove-content-button');
    removeButtons.forEach(button => {
        button.disabled = false;
    })

    var addButtons = parentDiv.querySelectorAll('.add-content-button');
    addButtons.forEach(button => {
        button.disabled = false;
    })
}

function enableTextarea(button) {
    var parentDiv = button.parentElement.parentElement.parentElement;
    var textarea = parentDiv.querySelector('textarea');
    textarea.disabled = false;
    textarea.readOnly = false;
    textarea.classList.remove('disabled');
    textarea.classList.add('enabled');
}

function enableInputExtra(button) {
    var parentDiv = button.parentElement.parentElement;
    var inputs = parentDiv.querySelectorAll('input');
    inputs.forEach(input => {
        input.disabled = false;
        input.readOnly = false;
        input.classList.remove('disabled');
        input.classList.add('enabled');
    })
}

function enableInputDate(button) {
    var parentDiv = button.parentElement.parentElement;
    var input = parentDiv.querySelector('input');
    // input.disabled = false;
    // input.setAttribute('readonly', false);
    input.readOnly = false;
    input.classList.remove('disabled', 'hidden');
    input.classList.add('enabled');

    // var p = parentDiv.querySelector('p');
    // p.classList.add('hidden');
}

function enableInputFile(button) {
    var parentDiv = button.parentElement.parentElement;
    var input = parentDiv.querySelector('input');
    input.disabled = false;
    // input.setAttribute('readonly', false);
    input.readOnly = false;
    input.classList.remove('disabled', 'hidden');
    // input.classList.add('enabled');

    var oldSample = parentDiv.querySelector('#oldSample');
    oldSample.classList.add('hidden');
}

function removeParentDiv(button) {
    button.parentNode.remove();

}
