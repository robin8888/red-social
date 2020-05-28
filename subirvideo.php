<!-- subir fotos de publicaciones a base de datos -->
<?php
      session_start();

      require "conexion.php";

$_POST['descripcion'];
$nombrevideo=$_FILES['video']['name'];
$archivo=$_FILES['video']['tmp_name'];
$url='videos/';
$ruta=$url . $nombrevideo;
move_uploaded_file($archivo,$ruta);

    $nombre=$_SESSION['usuario'];
    $email=$_SESSION['correo'];
    $pais=$_SESSION['pais'];
    $ciudad=$_SESSION['ciudad'];
    $id=$_SESSION['id'];
    $texto=$_POST['descripcion'];
   if (!empty($ruta)) {
       
       $consulta2="INSERT INTO videos (nombre,video,comentariovideo,usu_id,likes)VALUES('$nombre','$ruta','$texto','$id','0')";
       $resultado2=mysqli_query($con, $consulta2);
       if ($resultado2) {
           header("location:videos.php");

       }else echo" no se ha subido video";
   }else{
  $consultab="INSERT INTO publicaciones (nombre,comentariopubli,email,usu_id)VALUES ('$nombre','$texto','$email','$id') ";
    $resultadob=mysqli_query($con, $consultab);
    
    header("location:principal.php");
    }
$con->close();
?>