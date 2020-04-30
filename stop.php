<?php
session_start();
require "conexion.php";

$publicacion =$_POST['id'];
$usuario=$_SESSION['id'];


$comprobar42="SELECT * FROM parar WHERE usuario = '".$usuario."' AND publicacion ='".$publicacion."'";
$res42=mysqli_query($con,$comprobar42);
$count42=mysqli_num_rows($res42);



if ($count42==0) {

    $insertar43 = mysqli_query($con,"INSERT INTO parar(usuario,publicacion)VALUES('$usuario','$publicacion')");
    $actualiza43=("UPDATE publicaciones SET para = para + 1 WHERE id = '$publicacion' ");
    $res43=mysqli_query($con, $actualiza43);

}else{
    $borrar44 = mysqli_query( $con,"DELETE FROM parar  WHERE publicacion='$publicacion' AND usuario='$usuario'");
    $actualiza44=mysqli_query($con,"UPDATE publicaciones SET para = para - 1 WHERE id = '$publicacion' ");

}
$contar45=("SELECT para FROM publicaciones WHERE id='$publicacion'");
$resus45=mysqli_query($con,$contar45);
$fila45=$resus45->fetch_array();
$stop=$fila45['para'];

if ($count42 >= 1) {

    $stop=$stop ++;

}else{

   $stop=$stop --;
}
 
$parar= '<img class="imgpublic"src="imagenes_pro/parar.png" alt="">';
if ($stop==2) {
    $parar;
}
 $datos=$stop;
 printf( $datos,$parar);




?>