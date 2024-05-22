class Form {
    form;
    fields;
    submit;

    constructor(node) {
        this.form = node;
        this.fields = node.querySelectorAll(".field");
        this.submit = node.querySelector("[type='submit']");

        // Validación
        this.fields.forEach((e) => {
            e.addEventListener("blur", () => {
                this.checkInput(e);
                if (this.checkForm()) {
                    console.log(this.submit);
                    this.submit.disabled = false;
                }
            });
        });

        // Protección reCAPTCHA
        this.submit.classList.add("g-recaptcha");
        this.submit.setAttribute("data-sitekey", document.getElementById("recaptcha_site_key").value);
        this.submit.setAttribute("data-callback", "onSubmit");
        this.submit.setAttribute("data-action", "submit");

        window.onSubmit = this.onSubmit.bind(this);
        this.submit.disabled = true;
    }
    checkInput(field, print=true) {
        if (field.classList.contains("required") && field.value == "") {
            if (print) {
                field.nextElementSibling.innerHTML = "El camp " + field.name + " és obligatori.";
            }
            else {
                return false;
            }
        }
        else if (field.classList.contains("email") && !/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(field.value)) {
            if (print) {
                field.nextElementSibling.innerHTML = "El camp " + field.name + " no té un format de correu electrónic.";
            }
            else {
                return false;
            }
        }
        else {
            if (print) {
                field.nextElementSibling.innerHTML = "";
            }
            else {
                return true;
            }
        }
    }

    checkForm() {
        for (let i = 0; i < this.fields.length; i++) {
            let e = this.fields[i];
            if (!this.checkInput(e, false)) {
                return false;
            }
        }
        return true;
    }

    onSubmit() {
        if (this.checkForm()) {
            this.form.submit();
        } else {
            console.error('El formulario no es válido.');
        }
    }
}
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("form.validate").forEach((e) => {
        new Form(e);
    });
});