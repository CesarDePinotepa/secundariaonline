
<?php include '../conexion.php';
if (isset($_POST['nomTxt']) && !empty($_POST['nomTxt'])) {
    # code..
    $nombre = $_POST['nomTxt'];
    $fecha_ini = $_POST['fiDate'];
    $fecha_fin = $_POST['ffDate'];
    $ins_ini = $_POST['insDate'];
    $ins_fin = $_POST['finsDate'];

    $agregar = "INSERT INTO `ciclo`(`id`, `nombre`, `fecha_ini`, `fecha_fin`, `fechaIn_ini`, `fechaIn_fin`) 
                VALUES (NULL,'$nombre','$fecha_ini','$fecha_fin','$ins_ini','$ins_fin')";
    $ejecutar2 = $conexion->query($agregar);

        if ($ejecutar2) {
            $bien = "El ciclo se registró correctamente.";
            header("Location: ../../vistas/ciclo_escolar/nuevo.php?bien=$bien");
        }else{
            $error = "No se pudo registrar el ciclo escolar.";
            header("Location: ../../vistas/ciclo_escolar/nuevo.php?err=$error");
        }
}else{
    header("Location: ../vistas/ciclo_escolar/nuevo.php");
}

?>
