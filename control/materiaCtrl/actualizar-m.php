
<?php include '../conexion.php';
if (isset($_POST['nomTxt']) && !empty($_POST['nomTxt'])) {
    # code...
    $id = $_POST['idHdn'];
    $nombre = $_POST['nomTxt'];
    $grado = $_POST['graSel'];

    $agregar = "UPDATE `materia` SET `nombre`='$nombre',`grado`='$grado' WHERE `id` = '$id'";
    $ejecutar2 = $conexion->query($agregar);

    if ($ejecutar2) {
        $bien = "La materi seactualizó correctamente.";
        header("Location: ../../vistas/materias/editar-m.php?id=$id&bien=$bien");
    }else{
        $error = "No se pudo registrar la materia. Error: ".mysqli_error($conexion);
        header("Location: ../../vistas/materias/editar-m.php?id=$id&err=$error");
    }

}else{
    header("Location: ../../vistas/materias/editar-m.php");
}

?>
