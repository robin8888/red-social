 
 <!-- consultas a la base de datos y asignacion de variables session  -->
 <?php
require "conexion.php";
session_start();
$_SESSION['usuario'];
$usuario=$_SESSION['usuario'];
$consulta="SELECT * FROM registros WHERE Nombre= '$usuario'";
     $resultado=mysqli_query($con, $consulta);
    foreach ($resultado as $resu) {
        $_SESSION['pais']= $resu['Pais'];
        $_SESSION['ciudad']=$resu['Ciudad'];
        $_SESSION['correo']=$resu['email'];
    }
    $email=$_SESSION['correo'];


?>