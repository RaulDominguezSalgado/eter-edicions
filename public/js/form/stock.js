document.addEventListener("DOMContentLoaded", function () {
    var editButtons = document.querySelectorAll('button[id^="edit_"]');
    editButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            var index = this.id.split("_")[1];
            var stockInput = document.getElementById("storeStock_" + index);
            stockInput.disabled = false;
        });
    });

    //mostrar select de librerias e input y boton añasir
    const addButton = document.getElementById("add-stock-button");
    addButton.addEventListener("click", function (event) {
        event.preventDefault();
        const formulario = document.getElementById("option-form");
        formulario.style.display = "block";
    });

});
