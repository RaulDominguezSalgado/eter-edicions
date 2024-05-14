document.addEventListener('DOMContentLoaded', function () {


});

function togglePasswordVisibility(imgButton){
    parentDiv = imgButton.parentElement;
    input = parentDiv.querySelector('input');

    if(input.type == 'password'){
        input.type = 'text';
        imgButton.src = "/img/icons/dark/eye-closed.webp";
    }
    else{
        input.type = 'password';
        imgButton.src = "/img/icons/dark/eye-open.webp";
    }
}
