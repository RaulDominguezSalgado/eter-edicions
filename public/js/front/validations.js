document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("form.validate .field").forEach(function (e) {
        if (e.classList.contains("required")) {
            e.addEventListener("blur", function () {
                e.nextElementSibling.innerHTML = "asd";
            });
        }
    });
});