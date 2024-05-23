document.addEventListener('DOMContentLoaded', function() {
    var selectType = document.getElementById('select-type');
    var divs = document.querySelectorAll('[name="article"], [name="activity"]');

    selectType.addEventListener('change', function() {
        var selectedValue = this.value;

        divs.forEach(function(div) {
            if (div.getAttribute('name') === selectedValue) {
                div.style.display = 'block';
            } else {
                div.style.display = 'none';
            }
        });
    });

    // Inicializa el estado de los divs según el valor seleccionado inicialmente
    var initialValue = selectType.value;
    divs.forEach(function(div) {
        if (div.getAttribute('name') === initialValue) {
            div.style.display = 'block';
        } else {
            div.style.display = 'none';
        }
    });
});
