<?php
if (isset($_POST['idHdn']) && !empty($_POST['idHdn'])) {
    include '../conexion.php';
    $id = $_POST['idHdn'];
    $nombre = $_POST['nomTxt'];
    $user = $_POST['usrTxt'];
    if (empty($_POST['pas2Pass']) ){
        $pass = $_POST['pasHdn'];
    }else{
        if ($_POST['pasPass'] == $_POST['pas2Pass']) {
            $pass = md5($_POST['pasPass']);

        }else{
            $error = "Las contraseñas no coinciden";
            header("Location: ../../vistas/confinicial/editar_usuario.php?id=$id&err=$error");
        }
    }
    $editar = "UPDATE `admin` 
			   SET `nombre`='$nombre',`user_name`='$user',`pass`='$pass' 
			   WHERE `idadmin` = '$id'";
    $ejecutar = $conexion->query($editar);

    if ($ejecutar) {
        $bien = "Se modificó correctamente";
        header("Location: ../../vistas/confinicial/editar_usuario.php?id=$id&bien=$bien");
    }else{
        $error = "No se pudo realizar la operación";
        header("Location: ../../vistas/confinicial/editar_usuario.php?id=$id&err=$error");
    }

}else{
    header("Location: ../../vistas/confinicial/listar_usuarios.php");
}
?>