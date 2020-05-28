//archivo para seleccionar amigo en contenedor derecho de pagina 
// de chat donde estan los amigos del usuario
$(document).ready(function() {
    $('.imagenamigochat').on('click', function() {
        var id = this.id
        if ($('.m' + id).attr('style', 'color: white')) {
            $('.m' + id).css({
                'color': 'yellow',
                'font-size': '1.3em'


            });
            if ($('.imagenamigochat').attr('style', 'border: solid 1px white')) {
                $('.imagenamigochat').css({
                    'border': 'solid 1px yelow'
                });

            }



        } else {
            $('.m' + id).attr('style', 'color: white')
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