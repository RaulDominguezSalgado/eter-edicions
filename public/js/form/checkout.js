// Define province options for each country
var provinceOptions = {
    'ES': {
        'VI': 'Álava',
        'AB': 'Albacete',
        'A': 'Alicante',
        'AL': 'Almería',
        'AV': 'Ávila',
        'BA': 'Badajoz',
        'PM': 'Baleares',
        'B': 'Barcelona',
        'BU': 'Burgos',
        'CC': 'Cáceres',
        'CA': 'Cádiz',
        'CS': 'Castellón',
        'CR': 'Ciudad Real',
        'CO': 'Córdoba',
        'C': 'La Coruña',
        'CU': 'Cuenca',
        'GI': 'Girona',
        'GR': 'Granada',
        'GU': 'Guadalajara',
        'SS': 'Guipúzcoa',
        'H': 'Huelva',
        'HU': 'Huesca',
        'J': 'Jaén',
        'LE': 'León',
        'L': 'Lleida',
        'LO': 'La Rioja',
        'LU': 'Lugo',
        'M': 'Madrid',
        'MA': 'Málaga',
        'MU': 'Murcia',
        'NA': 'Navarra',
        'OR': 'Orense',
        'O': 'Asturias',
        'P': 'Palencia',
        'GC': 'Las Palmas',
        'PO': 'Pontevedra',
        'SA': 'Salamanca',
        'TF': 'Santa Cruz de Tenerife',
        'S': 'Cantabria',
        'SG': 'Segovia',
        'SE': 'Sevilla',
        'SO': 'Soria',
        'T': 'Tarragona',
        'TE': 'Teruel',
        'TO': 'Toledo',
        'V': 'Valencia',
        'VA': 'Valladolid',
        'BI': 'Vizcaya',
        'ZA': 'Zamora',
        'Z': 'Zaragoza',
        'CE': 'Ceuta',
        'ML': 'Melilla'
    },
};

document.addEventListener('DOMContentLoaded', function () {
    var searchInput = document.getElementById('search_input');
    var autocomplete = new google.maps.places.Autocomplete(searchInput, {
        types: ['geocode'],
        // componentRestrictions: { country: 'es' }
    });
    // console.log(autocomplete);
    autocomplete.addListener('place_changed', function () {
        var near_place = autocomplete.getPlace();
        console.log(near_place.address_components);

        extractedData = getAddressComponents(near_place.address_components);
        console.log(extractedData);

        autocompleteInput('address', extractedData.address + ", " + extractedData.street_number);
        autocompleteInput('locality', extractedData.locality);

        autocompleteSelect('country', extractedData.country);
        updateProvinceOptions();
        autocompleteSelect('province', extractedData.province);

        autocompleteInput('zip_code', extractedData.zip_code);
    });
});

/**
 * Sets the value of an input to the var 'value'
 *
 * @param {*} key the id of the input element
 * @param {*} value the value the input element will be set to
 */
function autocompleteInput(key, value) {
    var input = document.getElementById(key);
    // console.log(input);

    input.value = value;
}

/**
 * Selects the option with 'value' equal to var 'value' in select with id 'key'
 *
 * @param {*} key the id of the select element
 * @param {*} value the value of the option that has to be selected
 */
function autocompleteSelect(key, value) {
    var select = document.getElementById(key);
    // console.log(select);

    // Loop through options to find a match
    for (var i = 0; i < select.options.length; i++) {
        var option = select.options[i];
        if (option.value === value) {
            // Set the selected attribute to true for the matching option
            option.selected = true;
            break; // Exit loop once a match is found
        }
    }
}

/**
 * Extract the data from an address_components Google Places API array
 * and return an array with the values for the following components:
 * - address
 * - locality
 * - province
 * - country
 * - zip_code
 *
 * @param {*} addressComponents
 * @returns an array with the address components' values
 */
function getAddressComponents(addressComponents) {
    // Create an object to store the extracted values
    let extractedData = {};

    // Iterate through the address components array
    addressComponents.forEach(component => {
        // Iterate through the types of each component
        component.types.forEach(type => {
            // Check if the type matches the field you're interested in
            switch (type) {
                case 'street_number':
                    // Set the value of the 'address' field
                    extractedData.street_number = component.long_name;
                    break;
                case 'route':
                    // Set the value of the 'address' field
                    extractedData.address = component.long_name;
                    break;
                case 'locality':
                    // Set the value of the 'locality' field
                    extractedData.locality = component.long_name;
                    break;
                case 'administrative_area_level_2':
                    // Set the value of the 'province' field
                    extractedData.province = component.short_name;
                    break;
                case 'country':
                    // Set the value of the 'country' field
                    extractedData.country = component.short_name;
                    break;
                case 'postal_code':
                    // Set the value of the 'zip_code' field
                    extractedData.zip_code = component.long_name;
                    break;
                // Add more cases for other fields as needed
            }
        });
    });

    return extractedData;
}

/**
 * Updates the province select options based on the selected country
 */
function updateProvinceOptions() {
    console.log("updateProvinceOptions");
    var selectedCountry = document.getElementById('country').value;
    var provinceSelect = document.getElementById('province');

    // Add province options based on the selected country
    if (selectedCountry in provinceOptions) {
        provinceSelect.disabled = false;
        provinceSelect.parentElement.classList.remove("hidden");

        var provincePlaceholder = provinceSelect.querySelector('#placeholder');
        provincePlaceholder.selected=false;

        // var provinces = provinceOptions[selectedCountry];
        // Object.keys(provinces).forEach(function(code) {
        //     var option = document.createElement('option');
        //     option.value = code;
        //     option.textContent = provinces[code];
        //     provinceSelect.appendChild(option);
        // });
    }
    else{
        provinceSelect.disabled = true;
        provinceSelect.parentElement.classList.add("hidden")

        var provincePlaceholder = provinceSelect.querySelector('#placeholder');
        provincePlaceholder.selected=true;
    }
}
