<!-- mostrar en pagina chat todos los chats
 que son para usuario depende de sesion  -->
<?php
session_start();
require "conexion.php";
function cambiarfecha($fecha)
{
    return date(" j F, Y , g:i a", strtotime($fecha));
}
 $consul14="SELECT * FROM chat WHERE  idpara = '".$_SESSION['id']."' OR ide='".$_SESSION['id']."' ORDER BY id DESC ";
 $resu14=mysqli_query($con, $consul14);

    while ($row14=$resu14->fetch_assoc()) {
        $query18=mysqli_query($con, "SELECT * FROM registros WHERE id_usu = '".$row14['ide']."'");
        $row18=$query18->fetch_array();
        ?>
               <div class="publicaciones" id="">
                    <div class="row" >
                            <div class="col-auto foto " >
                            <a class="" href=""> <img class=""src="<?php echo($row18['avatar'])?>" alt=""> </a>
                            </div>
                                <div class="col post">
                                    <a class="nombre"href=""><?php  echo $row18['Nombre']?></a>
                                    <p class="amig"><?php  echo cambiarfecha($row14['fecha'])?></p>
                                
                                <div class="mensachat">
                                     <p  class="textochat"><?php  echo $row14['mensaje']?></p>
                                </div>
    </div>
                    </div>

                </div>
                
    <?php
    


    }
?>
