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
<body class="body">
        <!-- cabecera -->
       <header class="fixed-top sticky-top3 hola">
         <div class="container">
            <div class="row">
            <div class="col-auto d-none d-md-block logo">
            <a href=""><img class="imagenlogo" src="imagenes_pro/red.png" alt=""></a>
            </div>
          <div class="col-5 col-sm-5 col-lg-5 order-1 buscador mb-2">
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
            <nav class=" col-5 col-sm-3 col-lg-3 order-2 d-flex justify-content-between ml-auto mr-5 mb-2 menu">
             <a href="solicitudes.php"><span class="totalsolicitud"><?php echo $numero?></span>  <img class= "imagencabecero" src="imagenes_pro/mensaje3.png"></a>
             <a href="principal.php"><img class= "imagencabecero" src="imagenes_pro/home4.png"></a>
             <a href="amigos.php"><img class= "imagencabecero" src="imagenes_pro/amigos2.png"></a>
             <a href="perfil.php"><img class= "imagenperfilcabecero" src="<?php echo($resu4['avatar'])?>"></a>

            </nav>
            </div>

         </div>
      <!-- fin de cabecera -->
       </header>
    <main class="container">
        <div class="row">
        <!-- contenedor izquierdo -->
            <div class="col-sm-2 md-2  d-lg-block contenedorizq"id="contizqui">
            <form>
                 <nav>
                    
                    <a href="misimagenes.php"> <img class="imageneslatiz"src="imagenes_pro/fotos2.png" alt=""> <span>imagenes</span>  </a>
                    <a href="videos.php"> <img class="imageneslatiz"src="imagenes_pro/video2.png" alt=""> <span>videos</span></a>
                    <a href="chat.php"> <img class="imageneslatiz"src="imagenes_pro/chat2.png" alt=""><span>Chat</span></a>
                    <a href=""><button class="btnborrachat" id ="<?php echo ($_SESSION['id'])?>"type=submit><img class="imageneslatiz" name="borrachat" src="imagenes_pro/papelera2.png" alt=""></button> <span class="spanborrachat">  Borrar Chat</span></a>
                    <a href="cerrarsesion.php"> <img class="imageneslatiz"src="imagenes_pro/cerrar2.png" alt=""> <span>cerrar sesion</span> </a>
                </nav>
            </form>
            </div>
            <!-- fondo a derecha de menu exo -->
            <a href="#" class="fondo-enlace d-md-none" id="fondo-enlace"></a>
            <!-- contenedor espacio izquierdo -->
            <div class="col-sm-2 md-2 d-none d-lg-block"></div>
            <!-- contenedor medio -->

            <div class=" container medio col col-sm-5 col-md-5 col-lg-5">
               <h3> Chat </h3><hr><br><br>
                <!-- menu expandible -->
                    <div class="row">
                        <div class="col-4">
                            <a href="#" class="btn-menu d-md-none d-flex justify-content-between" id="btn-menu">
                                <span>Menu</span>
                                <img  class="imageneslatiz"src="imagenes_pro/menu.png" alt=""></a>
                        </div>
                    </div>
                    <!-- arriba cierre de menu expandible -->
                <!-- contenedor donde se publican los chat -->
                <div class="row " id="publicar">


                 </div>
                 <!-- cierre de ciontenedor donde se publican los chat -->



            </div>
            <div class="col-sm-3 md-3 d-none d-lg-block">
            </div>
            <!-- contenedor derecho -->
           <?php
               require "amigoschat.php";
         ?>
<!-- fin contenedor derecho -->

<?php
// consulta a base de datos para  chat
require "conexion.php";

$consulr="SELECT idpara FROM chat WHERE ide ='".$_SESSION['id']."' ORDER BY idpara DESC";
$resur=mysqli_query($con,$consulr);
$rowr=$resur->fetch_assoc();
//$dato=$rowr['idpara'];

?>
  <footer id="footerchat" class=" container fixed-bottom sticky ">

    <div class="container footer col-12 sm-4">
      <div class="row ">
        <div class="col- d-none d-md-block ">
              <!-- <a href=""><img id="imagencajachat" src="data:image/jpg; base64 ,<?php echo base64_encode($resu4['avatar'])?>"  alt=""></a>-->
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
                      <button id="enviarchat" type="submit"><img src="imagenes_pro/aceptar2.png" width="30px"alt=""> </button>
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
         <script src="js/menu.js"></script
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>