<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    if (ctype_digit($id)) {
        include '../conexion.php';
        $eliminar = "UPDATE `estudiante` SET `estado`='0' WHERE `id` = '$id'";
        $ejecutar = $conexion->query($eliminar);

        if ($ejecutar) {
            $bien = "El estudiante se dio de baja correctamente";
            header("Location: ../../vistas/estudiantes/ver-e.php?bien=$bien");
        }else{
            $error = "No se pudo dar de baja el estudiante. Error: ". mysqli_error($conexion);
            header("Location: ../../vistas/estudiantes/ver-e.php?err=$error");
        }
        $conexion->close();
    }else{
        header("Location: ../../vistas/estudiantes/ver-e.php");
    }
}else{
    header("Location: ../../vistas/estudiantes/ver-e.php");
}
?>