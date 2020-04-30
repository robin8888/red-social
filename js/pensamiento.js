$(document).ready(function() {
    envio();


})

function envio() {
    $('#formu').on('submit', function(e) {
        e.preventDefault();
        var formu = $(this).serialize();

        $.ajax({
            'method': 'POST',
            'url': 'pensamiento.php',
            'data': formu,

            success: function(data) {

                $('#textopensamiento').html(data);
                $('#pienso').val('')


            }


        })






    });

}