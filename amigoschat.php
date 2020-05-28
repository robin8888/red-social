<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Amigos chat</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/estilos.css" rel="stylesheet">
        
    </head>
    <body>
      <div class="contenedoramigoschat col-3"style="overflow-y:scroll; width: 50%; height:40%">
                        <h3 style="color:white">Tus Amigos</h3><hr>
                        <h5 style="color:white">selecciona un amigo para iniciar el chat</h5><br><br>

<?php
        $consul9="SELECT * FROM amigos WHERE estado=1 AND idpara = '".$_SESSION['id']."' OR ide = '".$_SESSION['id']."'";
       $resu9=mysqli_query($con, $consul9);
            while ($row9=$resu9->fetch_assoc()) {
                if ($row9['idpara'] == $_SESSION['id']) {
                    $query=mysqli_query($con, "SELECT * FROM registros WHERE id_usu = '".$row9['ide']."'");
                    $row10=$query->fetch_array(); ?>
    <div class="publicaciones">
                       <div class="row">
                            <div class="col-auto" >

                            <img class="imagenamigochat" id="<?php echo $row10['id_usu']?>"src="<?php echo($row10['avatar'])?>" alt="">
                            </div>
                        <div class="col post">
                                <p class="m<?php echo $row10['id_usu']?>"style="color:white" ><?php  echo $row10['Nombre']?></p>
                                <input type="hidden"id=""value="<?php echo $row10['id_usu']?>"class="ab" name="ver" >
                                <hr style="background:white">
                            </div>
                        </div>
                 </div>

                <?php
                } elseif ($row9['ide'] == $_SESSION['id']&& $row9['estado']==1) {
                $query26=mysqli_query($con, "SELECT * FROM registros WHERE id_usu = '".$row9['idpara']."'");
                 $row26=$query26->fetch_array();?>
                     <div class="publicaciones">
                       <div class="row">
                            <div class="col-auto " >
                            <img class="imagenamigochat" id="<?php echo $row26['id_usu']?>"value=""src="<?php echo ($row26['avatar'])?>" alt="">
                            </div>
                        <div class="col post">
                               <p class="m<?php echo $row26['id_usu']?>"style="color:white" ><?php  echo $row26['Nombre']?></p>
                                <input type="hidden"id="ab" name="ver"class="" value="<?php echo $row26['id_usu']?>"><hr style="background:white">
                            </div>
                        </div>
                 </div>


               <?php } ?>
            <?php
            }

?>
        </div>
    </div>
 </div>
        <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
        
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>