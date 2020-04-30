<?php
session_start();

require "conexion.php";
$consul36="UPDATE chat SET estado = 1 WHERE idpara= '".$_SESSION['id']."'";
$resu36=mysqli_query($con,$consul36);
//numero de solicitudes de amistad
$consul11="SELECT * FROM amigos WHERE idpara = '".$_SESSION['id']. "' AND estado=0";
$resu11=mysqli_query($con, $consul11);
$numero=mysqli_num_rows($resu11);
//cierre de solicitudes de amistad
$nombre=$_SESSION['usuario'];
$email=$_SESSION['correo'];
//consulta a tabla registros para datos de usuarios
$consulta="SELECT avatar FROM `registros` WHERE email='$email'";
$resultado=mysqli_query($con, $consulta);
foreach ($resultado as $resu4) {
    $resu4['avatar'];

               }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Chat</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/estilos.css" rel="stylesheet">
        <link href="css/perfil.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        

    </head>
<body class="body"  >
        <!-- cabecera -->
       <header class="fixed-top sticky-top3 hola">
         <div class="container">
            <div class="row">
            <div class="col-auto d-none d-md-block logo">
            <a href=""><img class="imagenlogo" src="imagenes_pro/red.png" alt=""></a>
            </div>
          <div class="col-6 col-sm-8 col-lg-6 order-1 buscador mb-2">
            <form>
                <div class="row no-gutters">
      <div class="col -10">
            <input class="busca1"type="text" name="buscadorprincipal"  placeholder="buscar"value="">
                 </div>
                <div class="col-2">
                  <button type=""><img src="imagenes_pro/buscador.png" alt=""> </button>
                </div>
                </div>
            </form>
          </div>
            <nav class=" col-4 col-sm-3 col-lg-2 order-2 d-flex justify-content-between ml-auto mr-5 mb-2 menu">
             <a href="solicitudes.php"><span class="totalsolicitud"><?php echo $numero?></span>  <img class= "imagencabecero" src="imagenes_pro/mensajes1.png"></a>
             <a href="principal.php"><img class= "imagencabecero" src="imagenes_pro/home1.png"></a>
             <a href="amigos.php"><img class= "imagencabecero" src="imagenes_pro/amigos1.png"></a>
             <a href="perfil.php"><img class= "imagenperfilcabecero" src="data:image/jpg; base64 ,<?php echo base64_encode($resu4['avatar'])?>"></a>

            </nav>
            </div>

         </div>
      <!-- fin de cabecera -->
       </header>
    <main class="container">
        <div class="row">
        <!-- contenedor izquierdo -->
            <div class="col-md-3 contenedorizq">
                 <nav>
                    <a href=""> <img class="imageneslatiz"src="imagenes_pro/fotos.png" alt=""> <span>imagenes</span>  </a>
                    <a href=""> <img class="imageneslatiz"src="imagenes_pro/video.png" alt=""> <span>videos</span></a>
                    <a href="chat.php"> <img class="imageneslatiz"src="imagenes_pro/chat1.png" alt=""><span>Chat</span></a>
                    <form>
                      <button class="btnborrachat" id ="<?php echo ($_SESSION['id'])?>"ype=submit><img class="imageneslatiz" name="borrachat" src="imagenes_pro/papelera.png" alt=""></button> <span> Borrar Chat</span>
                    </form>
                    
                    <a href="cerrarsesion.php"> <img class="imageneslatiz"src="imagenes_pro/cerrar.png" alt=""> <span>cerrar sesion</span> </a>
                </nav>
            </div>
            <!-- contenedor medio -->

            <div class=" container col">
                <h3> Chat </h3><br><br>
                <!-- contenedor donde se publican los chat -->
                <div class="row " id="publicar" style="width:100%; height:85%; overflow: scroll;">


                 </div>
                 <!-- cierre de ciontenedor donde se publican los chat -->



            </div>
            <!-- contenedor derecho -->
           <?php
               require "amigoschat.php";
         ?>
<!-- fin contenedor derecho -->

<?php
// consulta a base de datos para  chat
require "conexion.php";

$consulr="SELECT idpara FROM chat WHERE ide ='".$_SESSION['id']."' ORDER BY fecha DESC";
$resur=mysqli_query($con,$consulr);
$rowr=$resur->fetch_assoc();
$dato=$rowr['idpara'];

?>
  <footer class="container fixed-bottom sticky ">

    <div class="container footer sm-4">
      <div class="row ">
        <div class="col- d-none d-md-block ">
              <!-- <a href=""><img id="imagencajachat" src="data:image/jpg; base64 ,<?php echo base64_encode($resu4['avatar'])?>"  alt=""></a>  -->
              </div>
            <div class="">
                 <div class="row no-gutters">
                    <div >
                   <form id="frm" >
                        <input id="mensaje"type="text" name="mensaje"  placeholder="Mensaje"value="">
                        <div style="">
                        <input type=""class="h"id="idpara"  name="idpara" value="" >
                        </div>
                        <input id="ide"type="hidden" name="ide"  placeholder=""value="<?php echo $_SESSION['id']?>">
                    </div>
                    <div class="col-">
                      <button id="enviarchat" type="submit"><img src="imagenes_pro/aceptar.png" width="30px"alt=""> </button>
                    </div>
                   </form>
                  </div>


        </div>
      </div>

    </div>
  </footer>

    </main>


  
          <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>

        <script src="js/selecamigo.js"></script>
        <script src="js/subirchat.js"></script>
        <script src="js/publicachat.js"></script>
        <script src="js/borrachat.js"></script>
        
        <!-- <script src="js/publicacionprincipal.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>



</html>