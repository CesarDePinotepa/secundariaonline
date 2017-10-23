
<?php include '../conexion.php';
if (isset($_POST['nomTxt']) && !empty($_POST['nomTxt'])) {
    # code...
    $id = $_POST['idHdn'];
    $nombre = $_POST['nomTxt'];
    $apaterno = $_POST['apaTxt'];
    $amaterno = $_POST['amaTxt'];
    $fecha_nac = $_POST['fdate'];
    $email = $_POST['eemail'];
    $escuela = $_POST['escTxt'];
    $grado = $_POST['graSel'];
   // $curp = $_POST['curpTxt'];
   // $no_control = $_POST['nocTxt'];


    $agregar = "UPDATE `estudiante` SET `nombre`='$nombre',`apaterno`='$apaterno',`amaterno`='$amaterno',
                `fecha_nac`='$fecha_nac',`email`='$email',`escuela_pro`='$escuela',
                `grado`='$grado' WHERE `id` = '$id'";
    $ejecutar2 = $conexion->query($agregar);

    if ($ejecutar2) {
        $bien = "Los datos del estudiante se actualizaron correctamente.";
        header("Location: ../../vistas/estudiantes/editar-e.php?id=$id&bien=$bien");
    }else{
        $error = "No se pudo actualizar los datos del etudiante.";
        header("Location: ../../vistas/estudiantes/editar-e.php?id=$id&err=$error");
    }
}else{
    header("Location: ../vistas/estudiantes/editar-e.php?id=$id&");
}

?>
