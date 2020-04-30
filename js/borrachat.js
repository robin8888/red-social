$(document).ready(function() {
    $('.btnborrachat').click(function() {

        var id = this.id
        $.ajax({
            url: 'borrachat.php',
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'text',
            beforeSend: function() {


                alert("Esta seguro de borrar todo el contenido del Chat")


            },


            success: function(data) {




            }
        });

    });
});