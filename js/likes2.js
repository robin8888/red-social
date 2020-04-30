//envia y recibe datos de megusta.php para manejo de likes en 
//publicaciones 

$(document).ready(function() {
    $(".btnm").click(function() {
        var id = this.id;
        $.ajax({
            url: 'megusta.php',
            type: 'POST',
            data: { id: id },
            dataType: 'text',
            beforeSend: function() {

            },
            success: function(data) {
                //  var likes = data.likes;
                $("#like_" + id).html(data);


            }


        });
    });
});