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
            <select class="w-full" name="authors[]" id="authors__${counter}">
                ${collaborators_options.innerHTML}
            </select>
        `;
        //Get the parent element
        let parentElement = this.parentElement.parentElement.parentElement.parentElement;
        console.log(parentElement);
        //Insert new_author div just before the addition button
        parentElement.appendChild(new_author);
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
            <select class="w-full" name="translators[]" id="translators_${counter}">
                ${collaborators_options.innerHTML}
            </select>
        `;
        //Get the parent element
        let parentElement = this.parentElement.parentElement.parentElement.parentElement;
        console.log(parentElement);
        //Insert new_author div just before the addition button
        parentElement.appendChild(new_translator);
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
            <select class="w-full" name="collections[]" id="collections${counter}">
                ${collection_options.innerHTML}
            </select>
        `;
        //Get the parent element
        let parentElement = this.parentElement.parentElement.parentElement;
        //Insert new_translator div just before the addition button
        parentElement.appendChild(new_collection);
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
            <select class="w-full" name="lang[]" id="languages_${counter}">
                ${language_options.innerHTML}
            </select>
        `;
        //Get the parent element
        let parentElement = this.parentElement.parentElement.parentElement.parentElement;
        //Insert new_translator div just before the addition button
        parentElement.appendChild(new_language);
    });

    document.getElementById('add_extra').addEventListener('click', function () {
        // let language_options = document.getElementById("getLanguagesOptions");
        //Set counter for id setting
        var counter = document.querySelectorAll('[name*="extras["]').length + 1;

        //Create new div element for new_author
        let new_extra = document.createElement('div');
        //Add classes
        new_extra.classList.add("flex", "justify-between", "items-center", "ml-2.5", "space-x-5", "bookExtra");
        //Add the needed HTML code to the new_author div
        new_extra.innerHTML = `
        <div class="w-1/3">
            <label for="extras_{{$i}}">Camp</label>
            <input class="" type="text" name="extras[${counter}][key]">
        </div>

        <div class="w-full">
            <label for="extras_{{$i}}">Valor</label>
            <input class="" id="extras_{{ $i }}" type="text" name="extras[${counter}][value]">
        </div>
        `;
        //Get the parent element
        let parentElement = this.parentElement.parentElement.parentElement;
        //Insert new_translator div just before the addition button
        parentElement.insertBefore(new_extra, parentElement.lastElementChild);
    });
});


function enableInput(button) {
    var parentDiv = button.parentElement.parentElement;
    var input = parentDiv.querySelector('input');
    input.disabled = false;
    // input.setAttribute('readonly', false);
    input.readOnly = false;
    input.classList.remove('is-disabled', 'border-0', 'hidden');
    // input.classList.add('enabled');
}

function enableTextarea(button) {
    var parentDiv = button.parentElement.parentElement;
    var input = parentDiv.querySelector('textarea');
    input.disabled = false;
    // input.setAttribute('readonly', false);
    input.readOnly = false;
    input.classList.remove('is-disabled', 'border-0', 'hidden');
    // input.classList.add('enabled');
}

function removeParentDiv(button) {
    button.parentNode.remove();
}

function removeLastElement(button) {
    button.parentNode.lastElementChild.remove();
}

function removeCollection(div){
    var fieldset = div.parentNode.parentNode.parentNode;
    // console.log(fieldset);
    var extras = fieldset.querySelectorAll('.bookExtra');
    // console.log(extras);
    var last = extras[extras.length - 1];
    // console.log(last);
    last.remove();
}
