document.addEventListener("DOMContentLoaded", function () {
    let tabsLinks = document.getElementById("tabs-links").querySelectorAll("li");
    let tabsContent = document.getElementById("tabs-contents").querySelectorAll("div.tab-content");


    tabsLinks.forEach(function (link) {
        link.addEventListener("click", function () {
            tabsLinks.forEach(function (e) {
                e.classList.remove("active");
            });
            tabsContent.forEach(function (e) {
                e.classList.remove("active");
            });
            this.classList.add("active");
            tabsContent[Array.from(tabsLinks).indexOf(link)].classList.add("active");
        });
    });
});