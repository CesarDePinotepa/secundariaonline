
<?php include '../conexion.php';
if (isset($_POST['usrTxt']) && !empty($_POST['usrTxt'])) {
    # code...
    $id = $_POST['idHdn'];
    $nombre = $_POST['perSel'];
    $pass = md5($_POST['pass']);
    $tipo = $_POST['tiRa'];
    $user = $_POST['usrTxt'];


    if ($pass == md5($_POST['cpass'])) {
        $agregar = "INSERT INTO `usuario`(`id`, `nombre`, `password`, `email`, `tipo`, `passwordrecovery`) 
                    VALUES (NULL,'$nombre','$pass','$user','$tipo',NULL)";
        $ejecutar2 = $conexion->query($agregar);

        if ($ejecutar2) {
            $bien = "El usuario se registró correctamente.";
            header("Location: ../../vistas/usuario/alta-u.php?bien=$bien");
        }else{
            $error = "No se pudo registrar la materia.";
            header("Location: ../../vistas/usuario/alta-u.php?err=$error");
        }
    }else{
        $error = "Las contraseñas no coinciden.";
        header("Location: ../../vistas/usuario/alta-u.php?err=$error");
    }
}else{
    header("Location: ../vistas/usuario/alta-u.php");
}

?>
