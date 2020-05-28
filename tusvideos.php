<!DOCTYPE html>
<html lang="en">
    <head>
       <title>Tus videos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/estilos.css" rel="stylesheet">
    </head>
    <body class="bodytusvideos" >
       <!-- contenedor espacio derecho -->
       <!-- <div class="col-sm-3 md-3 d-none d-lg-block"> -->
        <!-- </div> -->

      <div id="contvideo" class=" col col-sm-3 md-3  d-lg-block barraderechavideo  d-lg-block"style="overflow-y:scroll; width: 100%; height:85%">

                        <div>
                        <h2>Tus videos <h1 id="salirvideo"><</h1></h2>

                        </div>
                        <hr style="background:white">
                        <ul>

                        
                        <?php


                        $consul9="SELECT * FROM videos WHERE  usu_id = '".$_SESSION['id']."'ORDER BY id DESC ";
                        $resu9=mysqli_query($con, $consul9);
                        

                           while ($row9=$resu9->fetch_assoc()) {
                                ?>
                                <span class="comentariov"><?php echo $row9['comentariovideo']?></span>
                                <li>
                                
                                <video class="videoperfil" src="<?php echo $row9['video']?>"controls></video>
                                </li>
                                <?php
                                    }
                                
                                ?>
                    </ul>
                </div>

</body>
</html>