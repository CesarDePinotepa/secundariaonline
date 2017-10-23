
<?php include '../conexion.php';
if (isset($_POST['nomTxt']) && !empty($_POST['nomTxt'])) {
    # code...
    $nombre = $_POST['nomTxt'];
    $apaterno = $_POST['apaTxt'];
    $amaterno = $_POST['amaTxt'];
    $fecha_nac = $_POST['fdate'];
    $email = $_POST['eemail'];
    $escuela = $_POST['escTxt'];
    $grado = $_POST['graSel'];
    $curp = $_POST['curpTxt'];

    $traer  = "SELECT MAX(`id`) AS id FROM estudiante";
    $ejecutar3 = $conexion->query($traer);
    $datos = $ejecutar3->fetch_assoc();

    $contador  = 7000 + $datos['id'];

    $agno = date("Y");

    $no_control = $agno.$contador;


    $agregar = "INSERT INTO `estudiante`(`id`, `nombre`, `apaterno`, `amaterno`, `no_control`,`curp` ,`fecha_nac`, `email`, `escuela_pro`, `grado`,`estado`) 
                VALUES (NULL,'$nombre','$apaterno','$amaterno','$no_control','$curp','$fecha_nac','$email','$escuela','$grado','1')";
    $ejecutar2 = $conexion->query($agregar);

    if ($ejecutar2) {
        $bien = "El estudiante con número de control: <b>$no_control</b>, se registró correctamente.";
        header("Location: ../../vistas/estudiantes/alta-e.php?bien=$bien");
    }else{
        $error = "No se pudo registrar el estudiante.";
        header("Location: ../../vistas/estudiantes/alta-e.php?err=$error");
    }
}else{
    header("Location: ../vistas/estudiantes/alta-e.php");
}

?>
