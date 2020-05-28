<!-- pagina de perfil de cada usuario de la red -->
<?php
session_start();

require "conexion.php";
//numero de solicitudes de amistad
$consul11="SELECT * FROM amigos WHERE idpara = '".$_SESSION['id']. "' AND estado=0";
$resu11=mysqli_query($con, $consul11);
$numero=mysqli_num_rows($resu11);
//cierre de consulta solicitudes
// conteo de envio de chats
$consul37="SELECT * FROM chat WHERE estado = 0 AND idpara= '".$_SESSION['id']."'";
$resu37=mysqli_query($con, $consul37);
$resuchat=mysqli_num_rows($resu37);
//cierre de conteo de envio de chats
$consultat="SELECT publicacioncomentario FROM registros WHERE id_usu='".$_SESSION['id']."'";

  $resultadot=mysqli_query($con, $consultat);
      foreach ($resultadot as $resut) {
          $resut['publicacioncomentario'];
      }

$nombre=$_SESSION['usuario'];
$email=$_SESSION['correo'];

$consulta="SELECT avatar FROM `registros` WHERE email='$email'";
$resultado=mysqli_query($con, $consulta);
foreach ($resultado as $resu4) {
    $resu4['avatar'];

              }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tu Perfil</title>
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
             <a href="perfil.php"><img class= "imagenperfilcabecero" src="<?php echo ($resu4['avatar'])?>"></a>

            </nav>
            </div>
         </div>
       </header>
       <!-- contenedor principal de contenido -->
    <main class="container">
        <div class="row">
        <!-- contenedor izquierdo -->
           <div class="col-sm-2 md-3  d-lg-block contenedorizq" id="contizqui">
                 <nav>
                    <a href="misimagenes.php"> <img class="imageneslatiz"src="imagenes_pro/fotos2.png" alt=""> <span>imagenes</span>  </a>
                    <a href="videos.php"> <img class="imageneslatiz"src="imagenes_pro/video2.png" alt=""> <span>videos</span></a>
                    <a href="chat.php"> <img class="imageneslatiz"src="imagenes_pro/chat2.png" alt=""><span>Chat</span>  <span class="totalchat">   <?php echo $resuchat?></span></a>
                    <a href="cerrarsesion.php"> <img class="imageneslatiz"src="imagenes_pro/cerrar2.png" alt=""> <span>cerrar sesion</span> </a>
                </nav>
           <div><br>
                </div>
            </div>
            <!-- contenedor espacio izquierdo -->
            <!-- <div class="col-sm-2 md-3 d-none d-lg-block"></div>  -->
            
         <!-- fondo a derecha de menu exo -->
            <a href="#" class="fondo-enlace d-md-none" id="fondo-enlace"></a>
             <!-- fondo a derecha de menuvideo -->
             <a href="#" class="fondo-enlace d-md-none" id="fondo-enlacevideo"></a>
  <div class=" container medio col-12 col-sm-12 col-md-5">
                <h3> Tu Perfil </h3>
                <hr>
                 <!-- menu expandible -->
                 <div class="row">
                        <div class="col">
                            <a href="#" class="btn-menu d-md-none d-flex justify-content-between" id="btn-menu">
                                <span>Menu</span>
                                <img  class="imageneslatiz"src="imagenes_pro/menu.png" alt=""></a>
                        </div>
                    </div>
                    <!-- arriba cierre de menu expandible -->

            <div class="row">
                
                        <!-- contenedor foto perfil -->
                    <div class=" contenedorfotoperfil">
                                <img class="fotodeperfil"  src="<?php echo $resu4['avatar']?>" alt=""><br>
                                <!-- menu expandible videos-->                                                        
                                <div class="col-4">
                                   <a href="#" class="btn-menuvideo d-md-none d-flex justify-content-between" id="btn-menuvideo">
                                   <span>Mis videos</span>
                                   </a>
                                </div>                                                        
                                <!-- arriba cierre de menu expandible videos-->
                                 
                                <div  class="datos">
                                    <h5><?php  echo $_SESSION['usuario']?></h5>
                                    <h5><?php  echo $_SESSION['ciudad']?> - <?php  echo $_SESSION['pais']?></h5>
                                    <h5><?php  echo $_SESSION['correo']?></h5>
                                    <div class="row  subirfotoperfil">
                                        <form action="subirperfil.php" method="POST" enctype="multipart/form-data">
                                                <div class="container col-8  contbtnperfil d-flex justify-content-between">
                                                        <div class="col-4"id="divalida">
                                                            <p class=""ide="elige">+ Imagen</p>
                                                            <input  name="imagen"type="file" class="" id="valida"  placeholder="">
                                                        </div>

                                                        <div class="btnsub col-4 col-md-6">
                                                            <button class="btn " type="submit"><span style="color:white">Publicar</span> </button>
                                                        </div>
                                                        
                                                </div>
                                        </form>
                                            
                                    </div>

                                </div>
                                  <div class="row">
                                    
                                  </div>

                    </div>
                    
                    <hr>
                                <!-- contenedor subir foto perfil -->


                 <div class="publicaciones">

                     
                        <!-- cierre de comentarios -->
                 </div><br><br>
                 <div class="publicaciones">
<?php
function cambiarfecha($fecha)
{
    return date("j F, Y ,  g:i a", strtotime($fecha));
}

 $idperfil=$_SESSION['id'];
 $consulta2="SELECT * FROM `publicaciones` WHERE usu_id=  '$idperfil' ORDER BY  `id` DESC";
 $resultado2=mysqli_query($con, $consulta2);


     while ($fila=$resultado2->fetch_assoc()) {
         ?>

                        <div class="row">
                            <div class="col-auto foto">
                                <a href=""> <img class="" src="<?php echo $resu4['avatar']?>" alt=""> </a>
                            </div>
                            <div class="col post">
                                <a class="nombre"href=""><?php echo $fila['nombre']?></a>
                                <p><?php echo cambiarfecha($fila['fechapublicacion'])?></p>
                                <div class="imagen">
                                    <div class="texto1">
                                    <p ><?php echo $fila['comentariopubli']?></p>
                                </div>
                                    <img src="<?php echo $fila['publicacionfoto']?>" alt="">
                                </div>
                                <div class="caja-botones d-flex justify-content-between aling-items-center">
                                    <button type="" class="btnm" id="<?php echo $fila['id']?>"> <img class="iconospublicacion" src="imagenes_pro/megusta1.png" alt=""> </button>
                                    <p id="like_<?php echo $fila['id']?>"> <?php echo $fila['likes']?><img class="iconospublicacion"src="imagenes_pro/megusta2.png" alt=""> </p>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-10 offset-2">
                                <div class="comentariospublicaciones">
                                    <div class="row no-gutters comentario">
                                        <div class="col-auto foto">
                                            <a href=""><img src="imagenes_pro/avatar1.png" alt=""></a>

                                        </div>
                                        <div class="col">
                                            <form>
                                                <textarea rows="" cols="" name="comentarios2"placeholder="comentarios de publicaciones"></textarea>
                                            </form>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- cierre de comentarios -->
<?php
     }
?>

                </div>
            </div>
            <!-- contenedor derecho -->
            <!-- contenedor espacio derecho -->
       <!-- <div class="col-sm-3 md-3 d-none d-lg-block"> -->
        <!-- </div> -->
            <?php
            require "tusvideos.php";
            ?>

        </div>
    </main>
        <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
        <script src="js/menu.js"></script>
        <script src="js/menuvideo.js"></script>
        <script src="js/likes2.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
</body>
</html>
