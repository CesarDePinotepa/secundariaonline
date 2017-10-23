
<?php include '../conexion.php';
if (isset($_POST['nomTxt']) && !empty($_POST['nomTxt'])) {
    # code...
    $nombre = $_POST['nomTxt'];
    $clave = $_POST['claTxt'];
    $grado = $_POST['graSel'];

    $consulta = "SELECT `clave` FROM `materia` WHERE `clave` = '$clave'";
    $ejecutar = $conexion->query($consulta);
    $numDatos = $ejecutar->num_rows;

    if ($numDatos == 0) {
        $agregar = "INSERT INTO `materia`(`id`, `clave`, `nombre`, `grado`) 
                    VALUES (NULL,'$clave','$nombre','$grado')";
        $ejecutar2 = $conexion->query($agregar);

        if ($ejecutar2) {
            $bien = "La materia con clave: <b>$clave</b>, se registró correctamente.";
            header("Location: ../../vistas/materias/alta-m.php?bien=$bien");
        }else{
            $error = "No se pudo registrar la materia.";
            header("Location: ../../vistas/materias/alta-m.php?err=$error");
        }
    }else{
        $error = "La materia <b>$clave</b>, ya está registrada.";
        header("Location: ../../vistas/materias/alta-m.php?err=$error");
    }
}else{
    header("Location: ../vistas/materias/alta-m.php");
}

?>
