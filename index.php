<!-- formulario de acceso a red  -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Acceder</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link href="estilos.css" rel="stylesheet">-->
        <link href="css/formularios.css" rel="stylesheet">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="body" >
<div class="row justify-content-center ">

<div class="col- sm-2 lg-4  margen ">
    <div class="container">
    <div class= "logos">
    <img src="imagenes_pro/red.png" alt="imagen">
    </div>
    <form action="index.php" method="post">
    <div class="form-group">
    <label for="usuario">Usuario</label>
    <input id= "" type="text" name="usuario" value=""class="form-control" >
    </div>
    <div class="form-group">
     <label for="">Contraseña</label>
    <input id="c" type="password" name="clave" value=""class="form-control" ><br>
     </div>
    <div class="form-group">
     <label for="">email</label>
    <input id="c" type="email" name="correo" value=""class="form-control" ><br>


    </div>
    <div class="form-group py-10">
    <button  id="btn1"type="submit" class="btn btn-outline-danger px-5 mx-5">Acceder</button> <a href="formuregistro.php">Registrate</a>
 <?php
session_start();

require "conexion.php";

if (!empty($_POST['usuario']) && !empty($_POST['clave'])&& !empty($_POST['correo'])) {
     $usuario=$_POST['usuario'];
     $correo=$_POST['correo'];
     $clave = md5($_POST['clave']);
     $_SESSION['usuario']=$usuario;
     $_SESSION['correo']=$correo;

     $consulta="SELECT  id_usu,Pais,Ciudad FROM registros WHERE Nombre= '$usuario'";
     $resultado=mysqli_query($con,$consulta);
    foreach ($resultado as $resu) {
        $_SESSION['pais']= $resu['Pais'];
        $_SESSION['ciudad']=$resu['Ciudad'];
        $_SESSION['id']=$resu['id_usu'];
    }

    $consulta1="SELECT 'Nombre' , 'Clave', 'email','Pais','Ciudad' FROM registros WHERE Nombre='$usuario' AND Clave='$clave' AND email='$correo' ";
    $resultado1=mysqli_query($con, $consulta1);

    if (mysqli_num_rows($resultado1) > 0) {

        header("location:principal.php");
    } else {
     echo"<div class='infomal'>
   ! Si no estas registrado  por favor Registrate
</div>";
echo"";

 }
} else {
    echo "<div class='infomal'>
  comprueba que todos los campos estan rellenos
</div>";
}


  $con->close();
?>

    </div>
    </form>
    </div>
    </div>
    </div>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>