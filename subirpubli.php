<!-- subir fotos de publicaciones a base de datos -->
      <?php
      session_start();

      require "conexion.php";


$_POST['descripcion'];
$nombreimagen= $_FILES['imagen']['name'];
$archivo=$_FILES['imagen']['tmp_name'];
$url='imagenes/';
$ruta=$url . $nombreimagen;
move_uploaded_file($archivo,$ruta);

    $nombre=$_SESSION['usuario'];
    $email=$_SESSION['correo'];
    $pais=$_SESSION['pais'];
    $ciudad=$_SESSION['ciudad'];
    $id=$_SESSION['id'];
    $texto=$_POST['descripcion'];
   if (!empty($ruta)) {
       $consulta2="INSERT INTO publicaciones (nombre,publicacionfoto,comentariopubli,email,usu_id)VALUES ('$nombre','$ruta','$texto','$email','$id') ";
       $resultado2=mysqli_query($con, $consulta2);

       header("location:principal.php");
   }else{
  $consultab="INSERT INTO publicaciones (nombre,comentariopubli,email,usu_id)VALUES ('$nombre','$texto','$email','$id') ";
    $resultadob=mysqli_query($con, $consultab);
    echo"texto guardado";
    header("location:principal.php");
    }
$con->close();
?>
