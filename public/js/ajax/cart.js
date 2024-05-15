document.addEventListener("DOMContentLoaded", function ()  {
    let contenedor = document.getElementById("cart-content");
    let contadorItems = document.getElementById("cartItemCount");

    class cartAjaxHelper {
        static AJAXRoute = "/cart";
        static csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
        static addItem(id, cont, count) {
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
                    this.getCartItemsCount(count);
                    return true;
                }
            })
            .catch(error => {
                console.error('Error al realizar la solicitud:', error);
                return false;
            });
        }
        static moreItem(id, cont, count) {
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
                    this.getCartItemsCount(count);
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
        static lessItem(id, cont, count) {
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
                    this.getCartItemsCount(count);
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
        static removeItem(id, cont, count) {
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
                    this.getCartItemsCount(count);
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
    
        static getCartItemsCount(count) {
            fetch(this.AJAXRoute + '/items-count/', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN' : this.csrfToken,
                },
            })
            .then(response => {
                if (response.ok) {
                    return response.text();
                } else {
                    return false;
                }
            })
            .then(data => {
                if (data) {
                    console.log('Contador del carrito actualizado');
                    count.innerHTML = data;
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
                if (cont.innerHTML !== undefined) {
                    cont.innerHTML = content;
                }
                console.log('Carrito actualizado');
                let contenedor = document.getElementById("cart-content");
                document.querySelectorAll(".ajax-add-to-cart").forEach(function (e) {
                    e.addEventListener("click", function () {
                        let book_id = e.getAttribute("book-id");
                        cartAjaxHelper.addItem(book_id, contenedor, contadorItems);
                    });
                });
    
                document.querySelectorAll(".ajax-more-item").forEach(function (e) {
                    e.addEventListener("click", function () {
                        let book_id = e.getAttribute("book-id");
                        cartAjaxHelper.moreItem(book_id, contenedor, contadorItems);
                    });
                });
    
                document.querySelectorAll(".ajax-less-item").forEach(function (e) {
                    e.addEventListener("click", function () {
                        let book_id = e.getAttribute("book-id");
                        cartAjaxHelper.lessItem(book_id, contenedor, contadorItems);
                    });
                });
    
                document.querySelectorAll(".ajax-remove-from-cart").forEach(function (e) {
                    e.addEventListener("click", function () {
                        let book_id = e.getAttribute("book-id");
                        cartAjaxHelper.removeItem(book_id, contenedor, contadorItems);
                    });
                });
            })
            .catch(error => {
                console.error('Error al realizar la solicitud:', error);
            });
        }
    }


    document.querySelectorAll(".ajax-add-to-cart").forEach(function (e) {
        e.addEventListener("click", function () {
            let book_id = e.getAttribute("book-id");
            cartAjaxHelper.addItem(book_id, contenedor, contadorItems);
        });
    });

    document.querySelectorAll(".ajax-more-item").forEach(function (e) {
        e.addEventListener("click", function () {
            let book_id = e.getAttribute("book-id");
            cartAjaxHelper.moreItem(book_id, contenedor, contadorItems);
        });
    });

    document.querySelectorAll(".ajax-less-item").forEach(function (e) {
        e.addEventListener("click", function () {
            let book_id = e.getAttribute("book-id");
            cartAjaxHelper.lessItem(book_id, contenedor, contadorItems);
        });
    });

    document.querySelectorAll(".ajax-remove-from-cart").forEach(function (e) {
        e.addEventListener("click", function () {
            let book_id = e.getAttribute("book-id");
            cartAjaxHelper.removeItem(book_id, contenedor, contadorItems);
        });
    });
});