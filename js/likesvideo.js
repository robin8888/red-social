//envia y recibe datos de megusta.php para manejo de likes en 
//videos 

$(document).ready(function() {
    $(".btnmv").click(function() {
        var id = this.id;
        $.ajax({
            url: 'megustavideo.php',
            type: 'POST',
            data: { id: id },
            dataType: 'text',
            beforeSend: function() {

            },
            success: function(data) {
                //  var likes = data.likes;
                $(`#like_v${id}`).html(data);


            }


        });
    });
});