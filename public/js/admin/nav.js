document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".has-child > .icon").forEach(function (e) {
        e.addEventListener("click", function () {
            let submenu = this.parentNode.getElementsByTagName('ul')[0];
            if (submenu.style.height != "200px") {
                submenu.style.height = "200px";
                e.innerHTML = "&#8963;";
            }
            else {
                submenu.style.height = 0;
                e.innerHTML = "&#8964;";   
            }
        });
    });
});