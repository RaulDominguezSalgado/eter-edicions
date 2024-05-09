document.addEventListener("DOMContentLoaded", function () {
    function ajustarTamañoInput(input) {
        // Obtener la longitud del texto en el campo de entrada
        var longitudTexto = input.value.length;

        // Ajustar el ancho del campo de entrada según la longitud del texto
        // Puedes ajustar estos valores según tus necesidades
        input.style.width = (longitudTexto * 2) + "px";
    }
}
);
