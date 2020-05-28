 <?php

session_start();
require "conexion.php";

/*$dir_subida = 'C:/xampp/htdocs/PHP/proyecto2/imagenes/';
$imagen = $dir_subida . basename($_FILES['imagen']['tmp_name']);
if (isset($imagen)) {
    echo"";
}else {
    echo"todo mal";
}*/
$nombreimagen= $_FILES['imagen']['name'];
$archivo=$_FILES['imagen']['tmp_name'];
$url='imagenes/';
$ruta=$url . $nombreimagen;
move_uploaded_file($archivo,$ruta);
if (!empty($ruta)) {
$nombre=$_SESSION['usuario'];
$email=$_SESSION['correo'];

$consulta2="UPDATE  registros SET avatar ='$ruta' WHERE email = '$email' ";
$resultado2=mysqli_query($con, $consulta2);

header("location:perfil.php");
} else {
echo "no se ha podido subir imagen";
}


?>

