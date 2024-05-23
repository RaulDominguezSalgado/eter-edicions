document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('lang').addEventListener('change', function () {
        var selectedLanguage = this.value;
        var idiomaContainers = document.getElementsByClassName('idioma-container');

        for (var i = 0; i < idiomaContainers.length; i++) {
            var container = idiomaContainers[i];
            if (container.id === selectedLanguage) {
                container.style.display =
                    'block'; // Mostrar el contenedor correspondiente al idioma seleccionado
            } else {
                container.style.display = 'none'; // Ocultar los otros contenedores
            }
        }
    });
}
);
