$(function() {

    var boton2 = $('#btn-menuvideo');
    var fondo_enlace = $('#salirvideo');
    var contenedor = $('#contvideo');
    boton2.on('click', function() {
        fondo_enlace.toggleClass('active');
        contenedor.toggleClass('active');

    });
    fondo_enlace.on('click', function() {
        fondo_enlace.toggleClass('active');
        contenedor.toggleClass('active');

    });
}())