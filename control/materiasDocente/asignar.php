
<?php include '../conexion.php';
if (isset($_POST['perSel']) && !empty($_POST['perSel'])) {
    # code...
    $ida = $_POST['perSel'];
    $idg = $_POST['gpSel'];
    $grupo = $_POST['graSel'];


    $consulta = "SELECT * FROM `curso_docente` WHERE `docente_id` = '$ida'  
                      AND `grado` = '$idg' AND `grupo` = '$grupo' ";
    $ejecutar = $conexion->query($consulta);
    $numDatos = $ejecutar->num_rows;

    if ($numDatos == 0) {
       $agregar = "INSERT INTO `curso_docente`(`id`, `docente_id`, `grado`, `grupo`) 
                    VALUES (NULL,'$ida','$grupo','$idg')";
        $ejecutar2 = $conexion->query($agregar);

        if ($ejecutar2) {
            $bien = "La materia  se asignó correctamente.";
            header("Location: ../../vistas/horarios/ver-h.php?bien=$bien");
        }else{
            $error = "No se pudo asignar la materia. Error:" .mysqli_error($conexion);
            header("Location: ../../vistas/horarios/ver-h.php?err=$error");
        }
    }else{
        $error = "La materia seleccionado ya esta asignada al docente.";
        header("Location: ../../vistas/horarios/ver-h.php?err=$error");
    }
}else{
    header("Location: ../vistas/horarios/ver-h.php");
}

?>
