class cartAjaxHelper {
    static AJAXRoute = "/cart";
    static csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    static addItem(id, cont) {
        fetch(this.AJAXRoute + '/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN' : this.csrfToken,
            },
            body: JSON.stringify({"book_id" : id}),
        })
        .then(response => {
            if (response.ok) {
                return response;
            } else {
                console.error('Error al agregar producto al carrito');
                return false;
            }
        })
        .then(data => {
            if (data) {
                console.log('Producto agregado al carrito');
                this.updateCart(cont);
                return true;
            }
        })
        .catch(error => {
            console.error('Error al realizar la solicitud:', error);
            return false;
        });
    }
    static moreItem(id, cont) {
        fetch(this.AJAXRoute + '/add/' + id, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN' : this.csrfToken,
            },
        })
        .then(response => {
            if (response.ok) {
                return response
            } else {
                return false;
            }
        })
        .then(data => {
            if (data) {
                console.log('Producto agregado al carrito');
                this.updateCart(cont);
                return true;
            } else {
                console.error('Error al agregar producto al carrito');
                return false;
            }
        })
        .catch(error => {
            console.error('Error al realizar la solicitud:', error);
        });
    }
    static lessItem(id, cont) {
        fetch(this.AJAXRoute + '/less/' + id, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN' : this.csrfToken,
            },
        })
        .then(response => {
            if (response.ok) {
                return response;
            } else {
                return false;
            }
        })
        .then(data => {
            if (data) {
                this.updateCart(cont);
                console.log('Producto quitado al carrito');
                return true;
            } else {
                console.error('Error al quitar producto al carrito');
                return false;
            }
        })
        .catch(error => {
            console.error('Error al realizar la solicitud:', error);
        });
    }
    static removeItem(id, cont) {
        fetch(this.AJAXRoute + '/delete/' + id, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN' : this.csrfToken,
            },
        })
        .then(response => {
            if (response.ok) {
                return response;
            } else {
                return false;
            }
        })
        .then(data => {
            if (data) {
                this.updateCart(cont);
                console.log('Producto quitado al carrito');
                return true;
            } else {
                console.error('Error al quitar producto al carrito');
                return false;
            }
        })
        .catch(error => {
            console.error('Error al realizar la solicitud:', error);
        });
    }

    static updateCart(cont) {
        fetch(this.AJAXRoute + '/update-front', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN' : this.csrfToken,
            },
        })
        .then(function(response) {
            if (response.ok) {
                return response.json();
            } else {
                console.error('Error al actualizar el carrito');
                console.log(response.json());
            }
        })
        .then(function(myJson) {
            let content = myJson.cart;
            cont.innerHTML = content;
            console.log('Carrito actualizado');
            let contenedor = document.getElementById("cart-content");
            document.querySelectorAll(".ajax-add-to-cart").forEach(function (e) {
                e.addEventListener("click", function () {
                    let book_id = e.getAttribute("book-id");
                    cartAjaxHelper.addItem(book_id, contenedor);
                    
                });
            });

            document.querySelectorAll(".ajax-more-item").forEach(function (e) {
                e.addEventListener("click", function () {
                    let book_id = e.getAttribute("book-id");
                    cartAjaxHelper.moreItem(book_id, contenedor);
                });
            });

            document.querySelectorAll(".ajax-less-item").forEach(function (e) {
                e.addEventListener("click", function () {
                    let book_id = e.getAttribute("book-id");
                    cartAjaxHelper.lessItem(book_id, contenedor);
                });
            });

            document.querySelectorAll(".ajax-remove-from-cart").forEach(function (e) {
                e.addEventListener("click", function () {
                    let book_id = e.getAttribute("book-id");
                    cartAjaxHelper.removeItem(book_id, contenedor);
                });
            });
        })
        .catch(error => {
            console.error('Error al realizar la solicitud:', error);
        });
    }
}


document.addEventListener("DOMContentLoaded", function ()  {
    let contenedor = document.getElementById("cart-content");
    document.querySelectorAll(".ajax-add-to-cart").forEach(function (e) {
        e.addEventListener("click", function () {
            let book_id = e.getAttribute("book-id");
            cartAjaxHelper.addItem(book_id, contenedor);
            
        });
    });

    document.querySelectorAll(".ajax-more-item").forEach(function (e) {
        e.addEventListener("click", function () {
            let book_id = e.getAttribute("book-id");
            cartAjaxHelper.moreItem(book_id, contenedor);
        });
    });

    document.querySelectorAll(".ajax-less-item").forEach(function (e) {
        e.addEventListener("click", function () {
            let book_id = e.getAttribute("book-id");
            cartAjaxHelper.lessItem(book_id, contenedor);
        });
    });

    document.querySelectorAll(".ajax-remove-from-cart").forEach(function (e) {
        e.addEventListener("click", function () {
            let book_id = e.getAttribute("book-id");
            cartAjaxHelper.removeItem(book_id, contenedor);
        });
    });
});