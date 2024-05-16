document.addEventListener("DOMContentLoaded", function () {
    let tabsLinks = document.getElementById("tabs-links").querySelectorAll("li");
    let tabsContent = document.getElementById("tabs-contents").querySelectorAll("div.tab-content");

    tabsLinks.forEach(function (link) {
        link.addEventListener("click", function () {
            tabsLinks.forEach(function (e) {
                e.classList.remove("active");
            });
            link.classList.add("active");

            tabsContent.forEach(function (content) {
                if (content.dataset.tab === link.dataset.tab) {
                    content.style.display = "block";
                } else {
                    content.style.display = "none";
                }
            });
        });
    });
});