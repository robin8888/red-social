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

$imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name'])) ;
if (!empty($imagen)) {
$nombre=$_SESSION['usuario'];
$email=$_SESSION['correo'];

$consulta2="UPDATE  registros SET avatar ='$imagen' WHERE email = '$email' ";
$resultado2=mysqli_query($con, $consulta2);

header("location:perfil.php");
} else {
echo "no se ha podido subir imagen";
}


?>

