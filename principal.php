<?php

require "conexion.php";
require "consultas.php";

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
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Muro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/estilos.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="body" >

        <!-- cabecera -->
  <header class="fixed-top sticky-top3 hola">
    <div class="container">
    <div class="row">
    <div class="col-auto d-none d-md-block logo">
    <a href=""><img class="imagenlogo" src="imagenes_pro/red.png" alt=""></a>
    </div>
    <div class="col-6 col-sm-8 col-lg-6 order-1 buscador mb-2">
    <form action="resubusqueda.php" method="POST">
        <div class="row no-gutters">
        <div class="col -10">
        <input class="busca1"type="text" name="buscadorprincipal"  placeholder="buscar"value="">
        </div>
        <div class="col-2">
        <button type="submit"><img src="imagenes_pro/buscador.png" alt=""> </button>
        </div>
        </div>
    </form>
    </div>
    <nav class=" col-4 col-sm-3 col-lg-2 order-2 d-flex justify-content-between ml-auto mr-5 mb-2 menu">
    <a href="solicitudes.php"><span class="totalsolicitud"><?php echo $numero?></span>  <img class= "imagencabecero" src="imagenes_pro/mensajes1.png"></a>
    <a href="principal.php"><img class= "imagencabecero" src="imagenes_pro/home1.png"></a>
    <a href="amigos.php"><img class= "imagencabecero" src="imagenes_pro/amigos1.png"></a>
    <a href="perfil.php"><img class= "imgamigochat" src="data:image/jpg; base64 ,<?php echo base64_encode($resu['avatar'])?>"></a>

    </nav>
    </div>

     </div>
  </header>
    <!-- fin de cabecera -->

    <main class="container">
        <div class="row">
            <!-- contenedor izquierdo -->
            <div class="col-md-3 contenedorizq ">
                <nav>
                    <a href=""> <img class="imageneslatiz"src="imagenes_pro/fotos.png" alt=""> <span>imagenes</span>  </a>
                    <a href=""> <img class="imageneslatiz"src="imagenes_pro/video.png" alt=""> <span>videos</span></a>
                    <a href="chat.php"> <img class="imageneslatiz"src="imagenes_pro/chat1.png" alt=""><span>Chat  </span>  <span style="color:white" class="totalchat">   <?php echo $resuchat?></span></a>
                    <a href="cerrarsesion.php"> <img class="imageneslatiz"src="imagenes_pro/cerrar.png" alt=""> <span>cerrar sesion</span> </a>

                </nav>

            </div>
            <!-- contenedor de publicaciones -->
                <div class="col contenedorprincipal">

                 <!-- comienzo de que estoy pensando -->

                <div class="publicacion">
                    <div class="row">
                                <div class="col-auto foto">
                                    <a href=""> <img class="imagenpublicacion"  src="data:image/jpg; base64 ,<?php echo base64_encode($resu['avatar'])?>" alt=""> </a>
                                </div>
                        <div class="col">
                            <form action="subirpubli.php" enctype="multipart/form-data" method ="post">
                                    <textarea id="pienso" name="descripcion" placeholder="¿que estoy pensando hoy?"></textarea>
                                    <div class="contenedorbotones d-flex justify-content-between">
                                            <div class="media">
                                                <div id="divalida">
                                                   <p class=""ide="elige">+ Imagen</p>
                                                    <input  name="imagen"type="file" class="" id="valida"  placeholder="elige foto">
                                                </div>

                                            </div>
                                            <div>
                                            <button class="btn btn-outline-danger mx-10 " type="submit">Publicar</button>
                                            </div>
                                    </div>
                            </form>
                        </div>

                    </div>

                </div>
                    <div class="publicaciones">
                        <!-- publicacion de comentario que pienso -->
                        <div class="row">
                            <div class="col-auto foto">
                                <a href=""> <img class="" src="data:image/jpg; base64 ,<?php echo base64_encode($resu['avatar'])?>" alt=""> </a>
                            </div>
                            <div class="col post">
                                <a class="nombre"href=""><?php  echo $_SESSION['usuario']?></a>
                                <p class=" texto" id="textopensamiento"><?php  echo $resut['publicacioncomentario']?></p>



                            </div>
                        </div>

                        <div class="row">
                            <div class="col-10 offset-2">
                                <div class="comentariospublicaciones">
                                    <div class="row no-gutters comentario">
                                        <div class="col-auto foto">
                                            <!-- <a href=""><img src="data:image/jpg; base64 ,<?php echo base64_encode($resu['avatar'])?>" alt=""></a> -->

                                        </div>
                                        <div class="col">
                                            <form id="formu">
                                                <textarea id="pienso"class="sombra" name ="pienso"rows="" cols="" placeholder="p..ejem.. ! pienso luego existo...¡"></textarea>
                                                <div class="row">
                                                    <div class="contsubepensamiento">
                                                        <button id="subepensamiento" type="submit"><img src="imagenes_pro/aceptar.png" alt=""></button>
                                                    </div>

                                                </div>
                                            </form>


                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- cierre de comentarios -->
                    </div>
                    <!-- publicaciones principales inicio -->
                    <!-- en este div con id pub se alojan todas las publicaciones 
                    de fotos en pagina principal
                     -->
 <div class="publicaciones" id="pub">
    <?php
require "conexion.php";



     $nombre=$_SESSION['usuario'];
     $email=$_SESSION['correo'];

     $consulta1="SELECT * FROM `registros` WHERE email = '$email'";// ORDER BY  `fechapublicacion` DESC";
     $resultado1=mysqli_query($con, $consulta1);
     foreach ($resultado1 as $resu1) {
         $_SESSION['id']= $resu1['id_usu'];
     }

     $consulta2="SELECT * FROM publicaciones ORDER BY id DESC";
     $resultado2=mysqli_query($con, $consulta2);


     while ($fila=$resultado2->fetch_assoc()) {
         $query1=mysqli_query($con, "SELECT * FROM registros WHERE id_usu = '".$fila['usu_id']."'");
         $fila4=$query1->fetch_array();
         ?>
                        <div class="row ">
                            <div class="col-auto foto ">
                                <a href=""> <img class="" src="data:image/jpg; base64 ,<?php echo base64_encode($fila4['avatar'])?>" alt=""> </a>
                            </div>
                            <div class="col post">
                                <a class="nombre"href=""><?php echo $fila4['Nombre']?></a>
                                <p><?php echo $fila4['Ciudad']."-".$fila4['Pais']?></p>
                                <p><?php echo $fila['fechapublicacion']?></p>
                                <p id="tex_<?php echo($fila['id'])?>"class= texto1 ><?php echo $fila['comentariopubli']?></p>
                                <div class="imagen ">
                                    <img  id='<?php echo($fila['id'])?>' class="imgpublic" src="data:image/jpg; base64 ,<?php echo base64_encode( $fila['publicacionfoto'])?>" alt="">
                                </div>
                                <div class=" caja-botones d-flex justify-content-between aling-items-center">
                                    <!-- boton megusta -->
                                    <button  class="btnm" id="<?php echo($fila['id'])?>" type=""> <img class="iconospublicacion " src="imagenes_pro/megusta1.png" alt=""> </button>
                                    <!-- boton compartir -->
                                    <button type=""><img class="iconospublicacion"src="imagenes_pro/compartir2.png" alt=""> </button>
                                    <!-- numero de stops -->
                                    <div class="d-flex justify-content-between aling-items-center ">
                                         <p class="numerost" id="stop_<?php echo($fila['id'])?>"><?php echo($fila['para'])?></p>
                                    <!-- boton stop -->
                                    <button class="btns" id="<?php echo($fila['id'])?>"type=""><img class="iconospublicacion" src="imagenes_pro/parar.png" alt=""></button>
                                    </div>
                                    <!-- numero de likes -->
                                   <p id="like_<?php echo($fila['id'])?>"> <?php echo($fila['likes'])?>  <img class="iconospublicacion"src="imagenes_pro/megusta2.png" alt=""></p>
                                </div>

                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-10 offset-2">
                                <div class="comentariospublicaciones">
                                    <div class="row no-gutters comentario">
                                        <div class="col-auto foto">
                                            <a href=""><img src="data:image/jpg; base64 ,<?php echo base64_encode($resu['avatar'])?>" alt=""></a>

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

                  <!-- publicaciones principales fin-->

                </div>
            <!-- cierre de contenedor de publicaciones -->

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

        <script src="js/stop.js"></script>
        <script src="js/likes2.js"></script>
        <script src="js/pensamiento.js"></script>
        <!-- <script src="js/publicacionprincipal.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>

</html>