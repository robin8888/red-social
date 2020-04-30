<?php
// se recoge lo que piensa usuario y se sube a basedatos
require "conexion.php";
session_start();
$id=$_SESSION['id'];

    $pensamiento=$_POST['pienso'];
    $consulta="UPDATE registros SET publicacioncomentario = '$pensamiento'  WHERE id_usu ='$id' ";
    $resultado=mysqli_query($con, $consulta);
    //recogemos el pensamiento de la base de tados


 $consulta2="SELECT publicacioncomentario FROM registros WHERE id_usu='$id'";

  $resultado2=mysqli_query($con, $consulta2);
      foreach ($resultado2 as $resu2) {
          $resu2['publicacioncomentario'];
           $dato= $resu2['publicacioncomentario'];
      }
      printf($dato)
?>