document.addEventListener('DOMContentLoaded', function () {
    shipment_taxesInput = document.getElementById('shipment_taxes');
    shipment_taxesDiv = document.getElementById('shipment_taxesDiv');

    var shipment_radios = document.querySelectorAll('#shipment input[type="radio"]');
    console.log(shipment_radios);
    shipment_radios.forEach(function (e) {
        e.addEventListener("change", function () {
            shipment_taxesInput.value = e.value;
            shipment_taxesDiv.innerHTML = e.value + "€";
        })
    });
});

function changePrince(input) {
    console.log("onChangePrice");
    shipment_taxesInput = document.getElementById('shipment_taxes');
    shipment_taxesDiv = document.getElementById('shipment_taxesDiv');

    shipment_taxesInput.value = input.value;
    shipment_taxesDiv.innerHtml = input.value;
}
