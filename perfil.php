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
       </header>
       <!-- contenedor principal de contenido -->
    <main class="container">
        <div class="row">
        <!-- contenedor izquierdo -->
            <div class="col-md-3 contenedorizq">
                 <nav>
                    <a href=""> <img class="imageneslatiz"src="imagenes_pro/fotos.png" alt=""> <span>imagenes</span>  </a>
                    <a href=""> <img class="imageneslatiz"src="imagenes_pro/video.png" alt=""> <span>videos</span></a>
                    <a href="chat.php"> <img class="imageneslatiz"src="imagenes_pro/chat1.png" alt=""><span>Chat</span>  <span style="color:white" class="totalchat">   <?php echo $resuchat?></span></a>
                    <a href="cerrarsesion.php"> <img class="imageneslatiz"src="imagenes_pro/cerrar.png" alt=""> <span>cerrar sesion</span> </a>
                </nav>
            </div>
            <!-- contenedor medio -->

  <div class=" container col">
                <h3> Tu Perfil </h3>
            <div class="row">

                        <!-- contenedor foto perfil -->
                    <div class=" contenedorfotoperfil">
                                <img class="fotodeperfil"  src="data:image/jpg; base64 ,<?php echo base64_encode($resu4['avatar'])?>" alt=""><br> 
                                <div  class="datos">
                                    <h5><?php  echo $_SESSION['usuario']?></h5>
                                    <h5><?php  echo $_SESSION['ciudad']?> - <?php  echo $_SESSION['pais']?></h5>
                                    <h5><?php  echo $_SESSION['correo']?></h5>
                                    <div class="row  subirfotoperfil">
                                        <form action="subirperfil.php" method="POST" enctype="multipart/form-data">
                                                <div class="container contbtnperfil d-flex justify-content-between">
                                                        <div  class=" col md-4 " id="divalida">
                                                            <p class=""ide="elige">+ Imagen</p>
                                                            <input  name="imagen"type="file" class="" id="valida"  placeholder="">
                                                        </div>

                                                        <div class=" col md-4 btnsub">
                                                            <button class="btn btn-outline-danger" type="submit">Publicar</button>
                                                        </div>
                                                </div>
                                        </form>

                                    </div>

                                </div>

                    </div>
                    <hr>
                                <!-- contenedor subir foto perfil -->


                 <div class="publicaciones">

                       <div class="row">
                            <div class="col-auto foto">
                                <a href=""> <img class="" src="data:image/jpg; base64 ,<?php echo base64_encode($resu4['avatar'])?>" alt=""> </a>
                            </div>
                            <div class="col post">
                                <a class="nombre"href=""><?php  echo $_SESSION['usuario']?></a>
                                <p class=" texto " id="textopensamiento"><?php  echo $resut['publicacioncomentario']?></p>

                            </div>
                        </div>
                        <!-- cierre de comentarios -->
                 </div><br><br>
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

<div class="publicaciones">

                        <div class="row">
                            <div class="col-auto foto">
                                <a href=""> <img class="" src="data:image/jpg; base64 ,<?php echo base64_encode($resu4['avatar'])?>" alt=""> </a>
                            </div>
                            <div class="col post">
                                <a class="nombre"href=""><?php echo $fila['nombre']?></a>
                                <p><?php echo cambiarfecha($fila['fechapublicacion'])?></p>
                                 <p class= texto1 ><?php echo $fila['comentariopubli']?></p>
                                <div class="imagen">

                                    <img src="data:image/jpg; base64 ,<?php echo base64_encode($fila['publicacionfoto'])?>" alt="">
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
                    </div><hr>
<?php
     }
?>

                </div>


            </div>



            <!-- contenedor derecho -->
            <?php
            require "publicidad.php";
            ?>

        </div>
    </main>
        <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
        <script src="js/likes2.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
</body>
</html>
