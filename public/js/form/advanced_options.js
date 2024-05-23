document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.boton-opcions').forEach(function(boton) {
        boton.addEventListener('click', function() {
            var target = document.querySelector('#' + this.dataset.target);
            target.style.display = target.style.display === 'none' ? 'block' : 'none';
            this.textContent = target.style.display === 'block' ? 'Amagar opcions avançades' : 'Mostrar opcions avançades';
        });
    });
});
