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


$nombre=$_SESSION['usuario'];
$email=$_SESSION['correo'];
//consulta a tabla registros para asignar variables
$consulta="SELECT avatar FROM `registros` WHERE email='$email'";
$resultado=mysqli_query($con, $consulta);
foreach ($resultado as $resu4) {
    $resu4['avatar'];

              }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mis Imagenes</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/estilos.css" rel="stylesheet">
        <link href="css/perfil.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
<body class="body">
        <!-- cabecera -->
       <header class=" fixed-top sticky-top3 mb-10 hola">
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
             <a href="perfil.php"><img class= "imagenperfilcabecero" src="<?php echo $resu4['avatar']?>"></a>

            </nav>
            </div>
        
         </div>
            <!-- fin de cabecer -->
            </header>
       <br><br><br>

       <main class="container">
        <div class="row">
        <!-- contenedor izquierdo -->
            <div class="col-sm-2 md-2  d-lg-block contenedorizq"id="contizqui">
                 <nav>
                    <a href="misimagenes.php"> <img class="imageneslatiz"src="imagenes_pro/fotos2.png" alt=""> <span>imagenes</span>  </a>
                    <a href="videos.php"> <img class="imageneslatiz"src="imagenes_pro/video2.png" alt=""> <span>videos</span></a>
                    <a href="chat.php"> <img class="imageneslatiz"src="imagenes_pro/chat2.png" alt=""> <span>Chat</span></a>
                    <a href="cerrarsesion.php"> <img class="imageneslatiz"src="imagenes_pro/cerrar2.png" alt=""> <span>cerrar sesion</span> </a>
                </nav>
            </div>
              <!-- fondo a derecha de menu exo -->
            <a href="#" class="fondo-enlace d-md-none" id="fondo-enlace"></a>
            <!-- contenedor espacio izquierdo -->
            <!-- <div class="col-sm-3 md-2  d-lg-block"></div> -->
            
            <!-- contenedor medio -->
    <main class="container">
         <!-- menu expandible -->
                    <div class="row">
                        <div class="col">
                            <a href="#" class="btn-menu d-md-none d-flex justify-content-between" id="btn-menu">
                                <span>Menu</span>
                                <img  class="imageneslatiz"src="imagenes_pro/menu.png" alt=""></a>
                        </div>
                    </div>

            <!-- contenedor medio -->

            <div class="col-md-8 misimg">
                <h1 class="h1imagenes"> Mis Imagenes </h1> 
                <hr class="hrmisimagenes">
                <div class="col">

            </div>


<br>
<ul class="galeria">


<?php


$consul9="SELECT publicacionfoto FROM publicaciones WHERE  usu_id = '".$_SESSION['id']."' ";
$resu9=mysqli_query($con, $consul9);
  

      while ($row9=$resu9->fetch_assoc()) {
          ?>


             <li>

                     <a href=""> <img class="imagenimagenes sombra"src="<?php echo $row9['publicacionfoto']?>" alt=""></a>

             </li>


            <?php
      }
   
?>
            </div>
</div>

    </main>


  
          <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
         <script src="js/menu.js"></script>
       
        <!-- <script src="js/publicacionprincipal.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
