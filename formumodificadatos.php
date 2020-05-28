<!-- formulario para modificar datos de registro -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Modificar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link href="estilos.css" rel="stylesheet">-->
        <link href="css/formularios.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
    <body class="body">

    <div class ="container-fluid " >


<div class="row  justify-content-center">
<div class="col-  margen">
    <div class ="container formu sombra">
    <div class= "logos">
    <img src="imagenes_pro/red.png" alt="imagen">
    <h3> Actualice datos </h3>
    </div>

    <form method ="post" action="formumodificadatos.php">

 <div class ="form-group">
    <input   type="email" name="correo" class="form-control" placeholder="email">
 </div>
<div class ="form-group">
    <input  type="text" name="nombre" class="form-control"placeholder="nombre" >
</div>
<div class ="form-group">
    <input  type="password" name="contrasena" class="form-control"placeholder="contraseña" >
</div>
<div class ="form-group">
    <input type="text" name="pais" class="form-control"placeholder="pais" >
</div>
<div class ="form-group">
    <input type="text" name="ciudad" class="form-control"placeholder="ciudad" >
</div>

<div class ="form-group ">
    <input id="btn3"  class="btn btn-outline-danger mx-5 "type="submit" name="enviar" value="Actualizar Datos"><a href="index.php">Acceder</a>
    </div>
     <div>
  <?php
  session_start();

require  "conexion.php";
 if (!empty($_POST['correo']) && !empty($_POST['nombre']) && !empty($_POST['pais']) && !empty($_POST['ciudad'])&& !empty($_POST['contrasena'])) {
     $nombre= $_POST['nombre'];
     $correo=$_POST['correo'];
     $pais=$_POST['pais'];
     $ciudad=$_POST['ciudad'];
     $clave=md5($_POST['contrasena']);
     $consulta="UPDATE registros SET email='$correo',Nombre='$nombre',Pais='$pais',Ciudad='$ciudad' WHERE Clave='$clave'";
     $resultado=mysqli_query($con, $consulta);
     if (mysqli_num_rows($resultado) > 0) {
         echo"<div class= 'infook'>
  se ha actualizado correctamente el usuario <a href='acceder.php' class='alert-link'>acceder</a>
</div>";
     }
 } else {
     echo" <div class='infomal' >
  No se ha actualizado el registro. rellene todos los campos 
</div>";
 }
 $con->close();
?>
   </div>
     </div>
    </form>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>