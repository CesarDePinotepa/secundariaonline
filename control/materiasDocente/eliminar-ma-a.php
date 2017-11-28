<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    if (ctype_digit($id)) {
        include '../conexion.php';
        $eliminar = "DELETE FROM `curso_docente` WHERE `id` = '$id'";
        $ejecutar = $conexion->query($eliminar);

        if ($ejecutar) {
            $bien = "La materia se elimino correctamente";
            header("Location: ../../vistas/horarios/ver-h.php?bien=$bien");
        }else{
            $error = "No se pudo eliminar la materia. Error: ". mysqli_error($conexion);
            header("Location: ../../vistas/horarios/ver-h.php?err=$error");
        }
        $conexion->close();
    }else{
        header("Location: ../../vistas/horarios/ver-h.php");
    }
}else{
    header("Location: ../../vistas/horarios/ver-h.php");
}
?>