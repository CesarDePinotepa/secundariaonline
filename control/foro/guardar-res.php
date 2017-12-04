
<?php include '../conexion.php';
if (isset($_POST['resTxa']) && !empty($_POST['resTxa'])) {
    # code...
    $respuesta = $_POST['resTxa'];
    $id = $_POST['idHdn'];
    $idu = $_POST['iduHdn'];
    $fecha = date("Y-m-d");

    $agregar = "INSERT INTO `comentario_foro`(`id_comentario`, `id_tema`, `id_usuario`, `comentario`, `fecha`, `activo`) 
                VALUES (NULL,'$id','$idu','$respuesta','$fecha','1')";
    $ejecutar = $conexion->query($agregar);

    if ($ejecutar) {
        $traerid = "SELECT MAX(`id_tema`) AS `idm`  FROM `foro_temas`";
        $ejecutar2 = $conexion->query($traerid);
        $reg = $ejecutar2->fetch_assoc();
        $maxid = $reg['idm'];
        $maxid +=1;

        $consulta = "UPDATE `foro_temas` SET `hits` = '$maxid'  WHERE  `id_tema` ='$id'";
        $ejecutar3 = $conexion->query($consulta);


        $bien = "Se respondio correctamente.";
        header("Location: ../../vistas/foro/comen-d.php?id=$id&bien=$bien");
    }else{
        $error = "No se pudo registrar el curso. Error:". mysqli_error($conexion);
        header("Location: ../../vistas/foro/comen-d.php?id=$id&err=$error");
    }
}else{
    header("Location: ../../vistas/foro/comen-d.php?id=$id");
}

?>
