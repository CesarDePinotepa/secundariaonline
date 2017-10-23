
<?php include 'conexion.php';
if (isset($_POST['nomTxt']) && !empty($_POST['nomTxt'])) {
    # code...
    $id = $_POST['idHdn'];
    $nombre = $_POST['nomTxt'];
    $apaterno = $_POST['apaTxt'];
    $amaterno = $_POST['amaTxt'];
    $rfc = $_POST['rfcTxt'];
    //$curp = $_POST['curpTxt'];
    $dir = $_POST['dirTxt'];
    $tel = $_POST['telTxt'];
    $td = $_POST['tdTxt'];
    $espe = $_POST['espTxt'];
    $edo_civil = $_POST['edoSel'];
    $email = $_POST['emaEma'];

    $agregar = "UPDATE `docentes` SET `nombre`='$nombre',`apaterno`='$apaterno',`amaterno`='$amaterno',
                `direccion`='$dir',`telefono`='$tel',`edoCivil`='$edo_civil',`tipo`='$td',`rfc`='$rfc',
                `especialidad`='$espe',`email`='$email' WHERE `id` ='$id'";
    $ejecutar2 = $conexion->query($agregar);

    if ($ejecutar2) {
        $bien = "Los datos del docente se actualizaron  correctamente.";
        header("Location: ../vistas/docenteEditar.php?id=$id&bien=$bien");
    }else{
        $error = "No se pudo realizar la operación.";
        header("Location: ../vistas/docenteEditar.php?id=$ide&rr=$error");
    }
}else{
    header("Location: ../vistas/docenteEditar.php");
}

?>
