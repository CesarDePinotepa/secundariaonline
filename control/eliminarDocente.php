<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    if (ctype_digit($id)) {
        include 'conexion.php';

        $eliminar = "DELETE FROM `docentes` WHERE `id` = '$id'";
        $ejecutar = $conexion->query($eliminar);

        if ($ejecutar) {
            $bien = "El docente se eliminó correctamente.";
            header("Location: ../vistas/docentesLista.php?bien=$bien");
        }else{
            $error = "No se pudo eliminar el docente. Error: ". mysqli_error($conexion);
            header("Location: ../vistas/docentesLista.php?err=$error");
        }
        $conexion->close();
    }else{
        header("Location: ../vistas/docentesLista.php");
    }
}else{
    header("Location: ../vistas/docentesLista.php");
}
?>