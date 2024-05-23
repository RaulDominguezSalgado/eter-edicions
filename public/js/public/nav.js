// document.addEventListener("DOMContentLoaded", function () {
//     document.querySelectorAll(".has-child > .icon").forEach(function (e) {
//         e.addEventListener("click", function () {
//             let submenu = this.parentNode.getElementsByTagName('ul')[0];
//             if (submenu.style.height != "200px") {
//                 submenu.style.height = "200px";
//                 e.innerHTML = "&#8963;";
//             }
//             else {
//                 submenu.style.height = 0;
//                 e.innerHTML = "&#8964;";
//             }
//         });
//     });
// });


function showSidebar(){
    const sidebar = document.querySelector('#sidebar');
    sidebar.style.maxWidth = "80vw";
    // sidebar.classList.add("border-dark");
    // sidebar.classList.remove("border-transparent");

    const hamburger = document.querySelector('#show-sidebar');
    hamburger.parentElement.style.display = "none";

    const close = document.querySelector('#hide-sidebar');
    close.parentElement.style.display = "flex";
}

function hideSidebar(){
    const sidebar = document.querySelector('#sidebar');
    sidebar.style.maxWidth = "0px";
    // sidebar.classList.add("border-transparent");
    // sidebar.classList.remove("border-dark");

    const hamburger = document.querySelector('#show-sidebar');
    hamburger.parentElement.style.display = "flex";

    const close = document.querySelector('#hide-sidebar');
    close.parentElement.style.display = "none";
}