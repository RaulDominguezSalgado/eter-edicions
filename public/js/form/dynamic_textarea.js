document.addEventListener("DOMContentLoaded", function() {
    // Get all textarea elements with the class 'grow-wrap'
    var textareas = document.querySelectorAll('.grow-wrap textarea');

    // Loop through each textarea element
    textareas.forEach(function(textarea) {
        // Set the height of the textarea to fit its content
        textarea.style.height = "auto";
        textarea.style.height = (textarea.scrollHeight) + "px";
    });
});
