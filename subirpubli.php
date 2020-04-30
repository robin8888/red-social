<!-- subir fotos de publicaciones a base de datos -->
      <?php
      session_start();

      require "conexion.php";

$_POST['descripcion'];

$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

    $nombre=$_SESSION['usuario'];
    $email=$_SESSION['correo'];
    $pais=$_SESSION['pais'];
    $ciudad=$_SESSION['ciudad'];
    $id=$_SESSION['id'];
    $texto=$_POST['descripcion'];
   if (!empty($imagen)) {
      $consulta2="INSERT INTO publicaciones (nombre,publicacionfoto,comentariopubli,email,usu_id)VALUES ($nombre','$imagen','$texto','$email','$id') ";
       $resultado2=mysqli_query($con, $consulta2);
       header("location:principal.php");
   }else{
  $consultab="INSERT INTO publicaciones (nombre,comentariopubli,email,usu_id)VALUES ($nombre','$texto','$email','$id') ";
    $resultadob=mysqli_query($con, $consultab);
    header("location:principal.php");
    }
$con->close();
?>
