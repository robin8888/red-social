<!-- recibe datos de archivo likes2.js para hacer las
distintas operaciones con la base de datos likes y controlar 
los like en las distintas publicaciones  -->
<?php
session_start();
require "conexion.php";

$publicacion =$_POST['id'];
$usuario=$_SESSION['id'];


$comprobar="SELECT * FROM likes WHERE usuario = '".$usuario."' AND publicacion ='".$publicacion."'";
$res2=mysqli_query($con,$comprobar);
$count=mysqli_num_rows($res2);



if ($count==0) {

    $insertar20 = mysqli_query($con,"INSERT INTO likes(usuario,publicacion)VALUES('$usuario','$publicacion')");
    $actualiza=("UPDATE publicaciones SET likes = likes + 1 WHERE id = '$publicacion' ");
    $res4=mysqli_query($con, $actualiza);

}else{
    $borrar = mysqli_query( $con,"DELETE FROM likes  WHERE publicacion='$publicacion' AND usuario='$usuario'");
    $actualiza=mysqli_query($con,"UPDATE publicaciones SET likes = likes - 1 WHERE id = '$publicacion' ");

}
$contar=("SELECT likes FROM publicaciones WHERE id='$publicacion'");
$resus=mysqli_query($con,$contar);
$fila44=$resus->fetch_array();
$likes=$fila44['likes'];

if ($count >= 1) {

    $likes=$likes ++;

}else{

   $likes=$likes --;
}
 $megusta= '<img class="iconospublicacion"src="imagenes_pro/megusta2.png" alt="">';

 $datos=$likes;
 printf( $datos.$megusta);




?>