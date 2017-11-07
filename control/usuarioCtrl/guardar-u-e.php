
<?php include '../conexion.php';
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $consulta = "SELECT * FROM `usuario` WHERE `passwordrecovery` = '$id'";
    $ejecutar = $conexion->query($consulta);
    $datos = $ejecutar->fetch_assoc();
    $num = $ejecutar->num_rows;

    if ($num == 0){
        $nombre = $_GET['nc'];
        $pass = md5($nombre);
        $tipo = "0";

        $agregar = "INSERT INTO `usuario`(`id`, `nombre`, `password`, `email`, `tipo`, `passwordrecovery`)
                    VALUES (NULL,'$nombre','$pass','$nombre','$tipo','$id')";
        $ejecutar2 = $conexion->query($agregar);
        if ($ejecutar2) {
            header("Location: ../../vistas/usuario/editar-u.php?id=$id");
        }else{
            header("Location: ../../vistas/estudiantes/ver-e.php");
        }
    }else{
        header("Location: ../../vistas/usuario/editar-u.php?id=$id");
    }

}else{
    header("Location: ../../vistas/estudiantes/ver-e.php");
}

?>
