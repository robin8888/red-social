<?php
session_start();
require "conexion.php";

    $id=$_POST['id'];

   $consul34= "DELETE  FROM chat WHERE   ide ='$id' ";
   $resu34=mysqli_query($con, $consul34);
   
   $dato=printf($id);


?>

