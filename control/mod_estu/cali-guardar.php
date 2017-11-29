
<?php include '../conexion.php';
if (isset($_POST['calNum']) && !empty($_POST['calNum'])) {
    # code...
    $califi = $_POST['calNum'];
    $ida = $_POST['idaHdn'];
    $ide = $_POST['ideHdn'];

    $agregar = "UPDATE `calificacion` SET `calificacion`='$califi' 
                WHERE `estu_id` = '$ide' AND `actividad_id` = '$ida'";
    $ejecutar2 = $conexion->query($agregar);

    if ($ejecutar2) {
        $bien = "La materia con clave: <b>$clave</b>, se registró correctamente.";
        header("Location: ../../vistas/asesor/calificar.php?ide=$ide&ida=$ida&bien=$bien");
    }else{
        $error = "No se pudo registrar la materia.";
        header("Location: ../../vistas/asesor/calificar.php?ide=$ide&ida=$ida&err=$error");
    }

}else{
    header("Location: ../vistas/asesor/calificar.php?ide=$ide&ida=$ida");
}

?>
