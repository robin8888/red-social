$(document).ready(function() {
    function insertachat() {
        var t = 1000;
        $.ajax({
            url: 'publicachat.php',
            success: function(data) {
                $('#publicar').html(data);
            }

        });
    }

    insertachat();

    setInterval(function() {
            insertachat();
        },
        1000);

})