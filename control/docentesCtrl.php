
<?php include 'conexion.php';
if (isset($_POST['nomTxt']) && !empty($_POST['nomTxt'])) {
    # code...
    $nombre = $_POST['nomTxt'];
    $apaterno = $_POST['apaTxt'];
    $amaterno = $_POST['amaTxt'];
    $rfc = $_POST['rfcTxt'];
    $curp = $_POST['curpTxt'];
    $dir = $_POST['dirTxt'];
    $tel = $_POST['telTxt'];
    $td = $_POST['tdTxt'];
    $espe = $_POST['espTxt'];
    $edo_civil = $_POST['edoSel'];
    $email = $_POST['emaEma'];

    $consultar_usuario = "SELECT `rfc` FROM `docentes` WHERE `rfc` = '$rfc'";
    $ejecutar = $conexion->query($consultar_usuario);
    $numDatos = $ejecutar->num_rows;

    if ($numDatos == 0) {
       echo $agregar = "INSERT INTO `docentes`(`id`, `nombre`, `apaterno`, `amaterno`, `direccion`, `telefono`, `edoCivil`, `tipo`, `rfc`, `especialidad`, `curp`, `email`) 
                    VALUES (NULL,'$nombre','$apaterno','$amaterno','$dir','$tel','$edo_civil','$td','$rfc','$espe','$curp','$email')";
        $ejecutar2 = $conexion->query($agregar);

        if ($ejecutar2) {
            $bien = "El dceonte <b>$rfc</b>, se registró correctamente.";
            header("Location: ../vistas/docentesFrm.php?bien=$bien");
        }else{
            $error = "No se pudo realizar la operación.";
            header("Location: ../vistas/docentesFrm.php?err=$error");
        }
    }else{
        $error = "El docente <b>$nombre</b>, ya está registrado.";
        header("Location: ../vistas/docentesFrm.php?err=$error");
    }
}else{
    header("Location: ../vistas/docentesFrm.php");
}

?>
