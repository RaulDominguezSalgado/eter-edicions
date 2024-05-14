class cartAjaxHelper {
    static AJAXRoute = "/cart";
    static csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    static addItem(id) {
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
                console.log('Producto agregado al carrito');
            } else {
                console.error('Error al agregar producto al carrito');
            }
        })
        .catch(error => {
            console.error('Error al realizar la solicitud:', error);
        });
    }
    static moreItem(id) {
        fetch(this.AJAXRoute + '/add/' + id, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN' : this.csrfToken,
            },
        })
        .then(response => {
            if (response.ok) {
                console.log('Producto agregado al carrito');
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
    static lessItem(id) {
        fetch(this.AJAXRoute + '/less/' + id, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN' : this.csrfToken,
            },
        })
        .then(response => {
            if (response.ok) {
                // La solicitud se completó con éxito
                console.log('Producto quitado al carrito');
                // Aquí podrías realizar alguna acción adicional, como actualizar la UI
            } else {
                // La solicitud falló
                console.error('Error al quitar producto al carrito');
            }
        })
        .catch(error => {
            console.error('Error al realizar la solicitud:', error);
        });
    }
    static removeItem(id) {
        fetch(this.AJAXRoute + '/delete/' + id, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN' : this.csrfToken,
            },
        })
        .then(response => {
            if (response.ok) {
                // La solicitud se completó con éxito
                console.log('Producto quitado al carrito');
                // Aquí podrías realizar alguna acción adicional, como actualizar la UI
            } else {
                // La solicitud falló
                console.error('Error al quitar producto al carrito');
            }
        })
        .catch(error => {
            console.error('Error al realizar la solicitud:', error);
        });
    }

    static updateCart(operation, itemId) {
        let fila = document.querySelector('tr[item-id="'+ itemId +'"]');
        let contador =  fila.querySelector('input[name="quantity"]');
        let total = fila.querySelector('.item-total');
        let price = parseFloat(fila.querySelector('.item-price').innerHTML.replace("€", "").replace(",", "."));
        switch (operation) {
            case "addItem":
                // Evento de mostrado de carrito lateral
            break;
            case "more":
                contador.value = parseFloat(contador.value) + 1;
                total.innerHTML = (parseFloat(total.innerHTML.replace("€", "").replace(",", ".")) + price).toFixed(2) + "€";
            break;
            case "less":
                if (parseFloat(total.innerHTML.replace("€", "").replace(",", ".")) == price) {
                    this.updateCart("delete", itemId);
                }
                else {
                    contador.value = parseFloat(contador.value) - 1;
                    total.innerHTML = (parseFloat(total.innerHTML.replace("€", "").replace(",", ".")) - price).toFixed(2) + "€";   
                }
            break;
            case "delete":
                fila.remove();
            break;
        }
        let tabla = document.querySelectorAll(".cart-content").length;
        if (tabla == 0) {
            tabla.remove();
        }
    }
}

document.addEventListener("DOMContentLoaded", function ()  {
    document.querySelectorAll(".ajax-add-to-cart").forEach(function (e) {
        e.addEventListener("click", function () {
            let book_id = e.getAttribute("book-id");
            cartAjaxHelper.addItem(book_id);
        });
    });

    document.querySelectorAll(".ajax-more-item").forEach(function (e) {
        e.addEventListener("click", function () {
            let book_id = e.getAttribute("book-id");
            cartAjaxHelper.moreItem(book_id);
            cartAjaxHelper.updateCart("more", book_id);
        });
    });

    document.querySelectorAll(".ajax-less-item").forEach(function (e) {
        e.addEventListener("click", function () {
            let book_id = e.getAttribute("book-id");
            cartAjaxHelper.lessItem(book_id);
            cartAjaxHelper.updateCart("less", book_id);
        });
    });

    document.querySelectorAll(".ajax-remove-from-cart").forEach(function (e) {
        e.addEventListener("click", function () {
            let book_id = e.getAttribute("book-id");
            cartAjaxHelper.removeItem(book_id);
            cartAjaxHelper.updateCart("delete", book_id);
        });
    });
});