document.addEventListener("DOMContentLoaded", function () {
    // var editButtons = document.querySelectorAll('button[id^="edit_"]');
    // editButtons.forEach(function (button) {
    //     button.addEventListener("click", function () {
    //         var index = this.id.split("_")[1];
    //         var stockInput = document.getElementById("storeStock_" + index);
    //         stockInput.disabled = false;
    //     });
    // });

    // //mostrar select de librerias e input y boton añasir
    // const addButton = document.getElementById("add-stock-button");
    // addButton.addEventListener("click", function (event) {
    //     event.preventDefault();
    //     const formulario = document.getElementById("option-form");
    //     formulario.style.display = "block";
    // });

    document.getElementById('add-stock-button').addEventListener('click', function () {
        //Get bookstores
        let bookstores_options = document.getElementById("option-form");
        //Set counter for id setting
        var counter = document.querySelectorAll('[name*="bookstores["]').length /2 + 1;

        //Create new div element for new_author
        let new_bookstore = document.createElement('div');
        //Add classes
        new_bookstore.classList.add("flex", "space-x-3");
        //Add the needed HTML code to the new_author div
        new_bookstore.innerHTML = `
            <select class="" name="bookstores[${counter}][bookstore_id]" id="bookstores_${counter}">
                ${bookstores_options.innerHTML}
            </select>
            <input type="number" name="bookstores[${counter}][stock]" class="form-control">
            <button class="w-auto remove-content-button" type="button"  onclick="removeParentDiv(this)">
                <img src="/img/icons/dark/less.webp" alt="Eliminar col·lecció">
            </button>
        `;
        //Get the parent element
        let parentElement = this.parentElement.parentElement.parentElement;
        console.log(parentElement);
        //Insert new_translator div just before the addition button
        parentElement.insertBefore(new_bookstore, parentElement.lastElementChild);

        let noBookstoresSpan = document.querySelector('#noBookstores');
        if(noBookstoresSpan){
            noBookstoresSpan.classList.add('hidden');
        }
    });

});

function removeParentDiv(button) {
    button.parentNode.remove();
}
