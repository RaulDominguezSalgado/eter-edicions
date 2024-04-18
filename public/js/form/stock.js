document.addEventListener('DOMContentLoaded', function() {
    var editButtons = document.querySelectorAll('button[id^="edit_"]');
    editButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var index = this.id.split('_')[1];
            var stockInput = document.getElementById('storeStock_' + index);
            stockInput.disabled = false;
        });
    });

    //mostrar valor del stock en consola 
    const stockInputs = document.querySelectorAll('input[name="stock"]');
    stockInputs.forEach(function(input) {
        input.addEventListener('input', function(event) {
            console.log('Stock value:', event.target.value);
        });
    });
});
