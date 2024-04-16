document.addEventListener('DOMContentLoaded', function() {
    var editButtons = document.querySelectorAll('button[id^="edit_"]');
    editButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var index = this.id.split('_')[1];
            var stockInput = document.getElementById('storeStock_' + index);
            stockInput.disabled = false;
        });
    });
});
