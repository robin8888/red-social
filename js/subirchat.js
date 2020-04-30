// recibe los datos del formulario del archivo chat.php
//y los envia a subirchat.php para diferentes operaciones
// en  tabla chat de base de datos
$(document).ready(function() {
    enviodato();


})

function enviodato() {
    $('#frm').on('submit', function(e) {
        e.preventDefault();
        var frm = $(this).serialize();

        $.ajax({
            'method': 'POST',
            'url': 'subirchat.php',
            'data': frm


        }).done(function(info) {



        })
        $('#mensaje').val('');



    });


}