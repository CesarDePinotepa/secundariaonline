<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    if (ctype_digit($id)) {
        include '../conexion.php';
        $eliminar = "DELETE FROM `usuario` WHERE `id` = '$id'";
        $ejecutar = $conexion->query($eliminar);

        if ($ejecutar) {
            $bien = "El usuario se elimino correctamente";
            header("Location: ../../vistas/usuario/ver-u.php?bien=$bien");
        }else{
            $error = "No se pudo eliminar el usuario. Error: ". mysqli_error($conexion);
            header("Location: ../../vistas/usuario/ver-u.php?err=$error");
        }
        $conexion->close();
    }else{
        header("Location: ../../vistas/usuario/ver-u.php");
    }
}else{
    header("Location: ../../vistas/usuario/ver-u.php");
}
?>