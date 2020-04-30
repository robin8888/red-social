<!-- cierre de sesion -->
<?php
session_start();
if ($_SESSION['usuario']==null||$_SESSION['usuario'] ="") {
   echo "<h1> Sin autorizacion </h1>";
   die();
}
 session_unset();
 session_destroy();
   header("location:index.php");
?>