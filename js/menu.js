$(function() {

    var boton = $('#btn-menu');
    var fondo_enlace = $('#fondo-enlace');
    var contenedor = $('#contizqui');
    boton.on('click', function() {
        fondo_enlace.toggleClass('active');
        contenedor.toggleClass('active');

    });
    fondo_enlace.on('click', function() {
        fondo_enlace.toggleClass('active');
        contenedor.toggleClass('active');

    });
}())