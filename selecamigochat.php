<?php
session_start();
require "conexion.php";
$usu=$_POST['id'];
printf($usu)
/*$consulq="UPDATE chat SET envioa ='$usu' WHERE idpara ='$usu' ";
$resuq=mysqli_query($con,$consulq);
$consulr="SELECT idpara FROM chat WHERE idpara ='$usu' ORDER BY fecha DESC";
$resur=mysqli_query($con,$consulr);
$rowr=$resur->fetch_assoc();
$dato=$rowr['idpara'];
printf($dato);*/

?>