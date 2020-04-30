<?php
session_start();

require "conexion.php";

// conteo de envio de chats
$consul37="SELECT * FROM chat WHERE estado = 0 AND idpara= '".$_SESSION['id']."'";
$resu37=mysqli_query($con, $consul37);
$resuchat=mysqli_num_rows($resu37);
//cierre de conteo de envio de chats


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
        <title>Solicitudes de amistad</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/estilos.css" rel="stylesheet">
        <link href="css/perfil.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
<body class="body">
        <!-- cabecera -->
       <header class="fixed-top sticky-top3 hola" >
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
             <a href=""><img class= "imagencabecero" src="imagenes_pro/mensajes1.png"></a>
             <a href="principal.php"><img class= "imagencabecero" src="imagenes_pro/home1.png"></a>
             <a href="amigos.php"><img class= "imagencabecero" src="imagenes_pro/amigos1.png"></a>
             <a href="perfil.php"><img class= "imagenperfilcabecero" src="data:image/jpg; base64 ,<?php echo base64_encode($resu4['avatar'])?>"></a>

            </nav>
            </div>
         </div>
       </header>
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
                <div class="row">
                    <h3> Solicitudes de amistad </h3><br>


<?php



        $consul11="SELECT * FROM amigos WHERE idpara = '".$_SESSION['id']. "' AND estado=0";
        $resu11=mysqli_query($con, $consul11);

    while ($row11=$resu11->fetch_assoc()) {
        $query11=mysqli_query($con, "SELECT * FROM registros WHERE id_usu = '".$row11['ide']."'");
        $row11=$query11->fetch_array(); ?>

    <div class="publicaciones">
                       <div class="row">
                            <div class="col-auto foto" >

                            <a  href=""> <img class=""src="data:image/jpg; base64 ,<?php echo base64_encode($row11['avatar'])?>" alt=""> </a>

                            </div>
                            <div class="col post">
                                <form action="" method="POST">
                                <a class="nombre"href=""><?php  echo $row11['Nombre']?></a>
                                <p class="texto"><?php  echo $row11['publicacioncomentario']?></p>
                                <input type="hidden" name="ver" value="<?php echo $row11['id_usu']?>">
                                <button class="agregaramigo" name="aceptar" type="submit"><img src="imagenes_pro/aceptar.png"  width="20px" alt=""> </button>
                                </form>
                            </div>
                        </div>
                 </div>

        <?php
    }

?>
<!-- aceptar solicitud de amistad -->
 <?php
    if (isset($_POST['aceptar'])) {
    $idd=$_POST['ver'];
    $query12="UPDATE amigos SET estado = '1' WHERE ide ='$idd' AND idpara='".$_SESSION['id']."'";
    $resul12=mysqli_query($con, $query12);
    if ($resul12) {
    echo' <div class="alert alert-success" role="alert row">
    !solicitud  aceptada
    </div>';
    } else {
    echo' <div class="alert alert-danger" role="alert row">
    !no se ha podido aceptar solicitud
    </div>';
    }
    }

?>



                </div>
            </div>
            <!-- contenedor derecho -->
           <?php
            require "publicidad.php";
           ?>
<!-- fin contenedor derecho -->
        </div>
    </main>


   <script src="js/menu.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
</body>
</html>










 


    <script src="js/menu.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>