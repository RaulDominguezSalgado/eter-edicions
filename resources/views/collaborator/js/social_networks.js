// document.addEventListener('DOMContentLoaded', function() {
//     document.getElementById('agregar_red_social').addEventListener('click', function() {
//         var nuevas_redes_sociales = document.createElement('div');
//         nuevas_redes_sociales.classList.add('form-group', 'mb-2', 'mb20');
//         nuevas_redes_sociales.innerHTML = `
//             <label for="social_networks" class="form-label">{{ __('Xarxa social') }}</label>
//             <input type="text" name="social_networks[]" class="form-control social-network-input" placeholder="Xarxa social">
//         `;
//         document.getElementById('redes_sociales').appendChild(nuevas_redes_sociales);
//     });
// });
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('agregar_red_social').addEventListener('click', function() {
        var nuevas_redes_sociales = document.createElement('div');
        nuevas_redes_sociales.classList.add('red_social');
        nuevas_redes_sociales.innerHTML = '<input type="text" name="red_social[]" placeholder="Nombre de la red social"> <input type="text" name="usuario_red_social[]" placeholder="Nombre de usuario">';
        document.getElementById('redes_sociales').appendChild(nuevas_redes_sociales);
    });
});
