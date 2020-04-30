//bloquea publicacion, agrega imagen y texto de bloqueado
$(document).ready(function() {

    $(".btns").click(function() {
        var id = this.id

        $.ajax({
            url: 'stop.php',
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'text',
            beforeSend: function() {


            },
            success: function(data) {

                var stops = data

                $("#stop_" + id).html(stops);
                if (stops == 2) {
                    $('#' + id).attr('src', 'imagenes_pro/bloqueado.png')
                    $('#tex_' + id).html("PUBLICACION  BLOQUEADA")
                }



            }


        });
    });
});