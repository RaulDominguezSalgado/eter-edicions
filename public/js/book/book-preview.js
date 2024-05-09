function addToCartAnimation(button){
    // Get cart icon
    var cartIcon = button.querySelector('.icon');

    // Toggle the classes on the icon
    cartIcon.classList.toggle('add-to-cart');
    cartIcon.classList.toggle('added-to-cart');

    // Set a timeout to revert the classes after 300ms
    setTimeout(function() {
        // Toggle the classes again to revert back to the previous state
        cartIcon.classList.toggle('add-to-cart');
        cartIcon.classList.toggle('added-to-cart');
    }, 300);
}
