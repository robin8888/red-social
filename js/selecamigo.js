//archivo para seleccionar amigo en contenedor derecho de pagina 
// de chat donde estan los amigos del usuario
$(document).ready(function() {
    $('.imgamigochat').on('click', function() {
        var id = this.id
        if ($('.m' + id).attr('style', 'color:red')) {
            $('.m' + id).css({
                'color': 'green',
                'font-size': '1.3em'

            });
        } else {
            $('.m' + id).attr('style', 'color:red')
        }




        $.ajax({
            url: 'selecamigochat.php',
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'text',
            beforeSend: function() {


            },


            success: function(data) {


                $("#idpara").val(data)





            }
        });

    });
});