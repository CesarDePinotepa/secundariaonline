
<?php include '../conexion.php';
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $consulta = "SELECT * FROM `usuario`";
    $ejecutar = $conexion->query($consulta);
    $datos = $ejecutar->fetch_assoc();

    if ($datos['passwordrecovery'] == NULL){
        $nombre = $_GET['nc'];
        $pass = md5($nombre);
        $tipo = "0";

        $agregar = "INSERT INTO `usuario`(`id`, `nombre`, `password`, `email`, `tipo`, `passwordrecovery`)
                    VALUES (NULL,'$nombre','$pass',NULL,'$tipo','$id')";
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
