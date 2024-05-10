document.addEventListener('DOMContentLoaded', function () {
    var searchInput = document.getElementById('search_input');
    var autocomplete = new google.maps.places.Autocomplete(searchInput, {
        types: ['geocode'],
        componentRestrictions: { country: 'es' }
    });
    // console.log(autocomplete);
    autocomplete.addListener('place_changed', function () {
        var near_place = autocomplete.getPlace();
        console.log(near_place.address_components);
        console.log("address: " + near_place.address_components[1].long_name+", "+near_place.address_components[0].long_name);
        console.log("locality: " + near_place.address_components[3].long_name);
        console.log("province: " + near_place.address_components[4].long_name);
        console.log("ccaa: " + near_place.address_components[5].short_name);
        console.log("country: " + near_place.address_components[6].short_name);
        console.log("zip-code: " + near_place.address_components[7].long_name);
    });
});
