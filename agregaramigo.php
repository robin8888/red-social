<!-- consulta base de datos tabla registros con id de amigo seleccionado -->
<?php
session_start();
    require "conexion.php";

    if (isset($_POST['idusu'])) {
        $id=$_POST['idusu'];
        $consul7="SELECT * FROM registros WHERE id_usu='$id'";
        $resu7=mysqli_query($con, $consul7);
        $row7=$resu7->fetch_assoc();
        $nombre = $row7['Nombre'];
        $comentario = $row7['publicacioncomentario'];
        $ide=$_SESSION['id'];
        $estado=0;

        //sube amigo a tabla amigos en base de datos

        $consul8="INSERT INTO amigos (ide,idpara, nombre, publicacioncomentario,estado)VALUES('$ide','$id','$nombre','$comentario','$estado')";
        $resu8=mysqli_query($con, $consul8);
        header("location:amigos.php");



        echo' <div class="alert alert-success" role="alert">
  solicitud enviada
</div>';

 
    }else {
            echo' <div class="alert alert-danger" role="alert">
  ya se ha enviado solicitud anteriormente o<br>esta persona ya es tu amigo
</div>';
        }

?>