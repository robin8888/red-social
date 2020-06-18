$(document).ready(function() {
    $(".com").click(function() {
        var id = this.id;
        var id= id.replace('com_','');
       
        $.ajax({
            url: 'listarcomentarios.php',
            type: 'POST',
            data: { id: id },
            dataType: 'text',
            beforeSend: function() {

            },
            success: function(data) {
               
                $("#publicacom").html(data);
                
                


            }


        });
    });
});