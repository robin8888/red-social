<!-- formulario de registro de usuarios de red -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registro</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link href="estilos.css" rel="stylesheet">-->
        <link href="css/formularios.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
    <body class="body">
<div  class="row  justify-content-center ">

<div class= "margen">
    <div class="container formu sombra">
    <div class= "logos">
    <img src="imagenes_pro/red.png" alt="imagen">
    <h3>Registro</h3>
    </div>

    <form method ="post" action="formuregistro.php">
 <div class ="form-group">
    <input  type="email" name="correo" class="form-control" placeholder="email">
 </div>
<div class ="form-group">
    <input type="password" name="contrasena" class="form-control"placeholder="contraseña" >
</div>
<div class ="form-group">
    <input   type="password" name="repetir" class="form-control"placeholder="repite contraseña" >
</div>
<div class ="form-group">
    <input  type="text" name="nombre" class="form-control"placeholder="nombre" >
</div>
<div class ="form-group">
    <input type="text" name="pais" class="form-control"placeholder="pais" >
</div>
<div class ="form-group">
    <input type="text" name="ciudad" class="form-control"placeholder="ciudad" >
</div>

<div class ="form-group ">
    <input id="btn2" class="btn btn-outline-danger mx-5"type="submit" name="enviar" value="Confirmar Registro"><a href="formumodificadatos.php">Actualizar</a>
</div>


     <?php

require "conexion.php";

if ( !empty($_POST['correo']) && !empty($_POST['contrasena']) && !empty($_POST['repetir']) && !empty($_POST['nombre']) && !empty($_POST['pais']) && !empty($_POST['ciudad'])) {
     $email=$_POST['correo']&& !empty($_POST['publicacioncomentario'])&& !empty($_POST['avatar']);
    $contrasena=md5($_POST['contrasena']);
    $confirma=md5($_POST['repetir']);
    $nombre=$_POST['nombre'];
    $pais=$_POST['pais'];
    $ciudad=$_POST['ciudad'];
    $_SESSION['pais']=$pais;
    $_SESSION['ciudad']=$ciudad;
    $_SESSION['nombre']=$nombre;
    $_SESSION['correo']=$email;
    $imagendefect="imagenes/avatar1.png";
    $publicdefect="!..Que bien ya estoy en redder...¡";
//insertar datos en tabla registros
    $insertar ="INSERT INTO registros (email,Clave,CClave,Nombre,Pais,Ciudad,avatar,publicacioncomentario)VALUES('$email','$contrasena','$confirma','$nombre','$pais','$ciudad','$imagendefect','$publicdefect')";
    $resultado=mysqli_query($con, $insertar);
    if (!$resultado) {
        echo"<div><h6>
  No se ha realizado su registro <a href='registro.php' class='alert-link'>Registrarse</a></h6>
</div>";
    } else {
         echo "<div><h6 class ='infook'>
  se ha realizado su registro exitosamente<a href='index.php' class='alert-link'>Acceso</a></h6>
</div>";
    }


} else {
    echo "<div><h6 class='infomal'>!Confirma que has introducido todos los datos</h6>

</div>";
}

   $con->close();
?>
</div>
</div>
    </div>


    </form>
    </div>
    </div>
   
     </div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>