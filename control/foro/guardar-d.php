
<?php include '../conexion.php';
if (isset($_POST['titTxt']) && !empty($_POST['titTxt'])) {
    # code...
    $idu = $_POST['idHdn'];
    $titulo = $_POST['titTxt'];
    $categoria = $_POST['perSel'];
    $decrip = $_POST['msjTxa'];
    $fecha = date("Y-m-d");

    $agregar = "INSERT INTO `foro_foro`(`id_foro`, `id_forocategoria`, `foro`, `descripcion`) 
                VALUES (NULL,'$categoria','$titulo','$decrip')";
    $ejecutar = $conexion->query($agregar);

    if ($ejecutar) {
        $consuslta = "SELECT MAX(`id_foro`) AS `idforo` FROM `foro_foro`";
        $ejecutar2 = $conexion->query($consuslta);
        $datos = $ejecutar2->fetch_assoc();
        $idf = $datos['idforo'];

        $insertar = "INSERT INTO `foro_temas`(`id_tema`, `id_foro`, `titulo`, `contenido`, `fecha`, `id_usuario`, `activo`, `hits`) 
                     VALUES (NULL ,'$idf','$titulo','$decrip','$fecha','$idu','1','0')";
        $ejecutar3 = $conexion->query($insertar);

        $bien = "El foro se agregó correctamente.";
        header("Location: ../../vistas/foro/alta.php?bien=$bien");
    }else{
        $error = "No se pudo registrar el curso. Error:". mysqli_error($conexion);
        header("Location: ../../vistas/foro/alta.php?err=$error");
    }
}else{
    header("Location: ../../vistas/foro/alta.php");
}

?>
