<!-- inserta datos en tabla chat  -->
<?php
require "conexion.php";
if (isset($_POST['ide'])&& isset($_POST['idpara'])&& isset($_POST['mensaje'])) {
    $ide2=$_POST['ide'];
    $idpara2=$_POST['idpara'];
    $mensaje2=$_POST['mensaje'];
    $estado2=0;
    echo $ide2;
    echo $idpara2;
    echo $mensaje2;
    $query13="INSERT INTO chat (ide,idpara,mensaje,estado)VALUES('$ide2','$idpara2','$mensaje2','$estado2')";
    $resul13=mysqli_query($con, $query13);
}
header("location:chat.php");
?>