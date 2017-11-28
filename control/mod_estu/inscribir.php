
<?php include '../conexion.php';
if (isset($_GET['id']) && !empty($_GET['id'])) {
    # code...
    $grupo = $_GET['g'];
    $ide = $_GET['idu'];
    $idm = $_GET['id'];


    $agregar = "INSERT INTO `modulos_estu`(`id`, `estu_id`, `mod_id`, `grupo`) 
                VALUES (NULL,'$ide','$idm',$grupo)";
    $ejecutar2 = $conexion->query($agregar);

    if ($ejecutar2) {
        $bien = "La materia se asigno correctamente.";
        header("Location: ../../vistas/mismod/listar.php?bien=$bien");
    }else{
        $error = "No se pudo registrar la materia.";
        header("Location: ../../vistas/mismod/listar.php?err=$error");
    }

}else{
    header("Location: ../vistas/mismod/listar.php");
}

?>
