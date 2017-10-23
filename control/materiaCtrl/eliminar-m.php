<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    if (ctype_digit($id)) {
        include '../conexion.php';

        $eliminar = "DELETE FROM `materia` WHERE `id` = '$id'";
        $ejecutar = $conexion->query($eliminar);

        if ($ejecutar) {
            $bien = "La materia se eliminó correctamente.";
            header("Location: ../../vistas/materias/ver-m.php?bien=$bien");
        }else{
            $error = "No se pudo eliminar el docente. Error: ". mysqli_error($conexion);
            header("Location: ../../vistas/materias/ver-m.php?err=$error");
        }
        $conexion->close();
    }else{
        header("Location: ../../vistas/materias/ver-m.php");
    }
}else{
    header("Location: ../../vistas/materias/ver-m.php");
}
?>