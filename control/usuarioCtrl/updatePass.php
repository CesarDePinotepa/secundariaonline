
<?php include '../conexion.php';
if (isset($_POST['idHdn']) && !empty($_POST['idHdn'])) {
    # code...
    $id = $_POST['idHdn'];
    $passActual = md5($_POST['pass']);
    $nuevaPass = $_POST['pass2'];
    $confPass = $_POST['pass3'];

    $consultar = "SELECT * FROM `usuario` WHERE `id` = '$id' AND`password` = '$passActual'";
    $ejecutar = $conexion->query($consultar);
    $num = $ejecutar->num_rows;

    if ($num > 0 ){
        if ($nuevaPass == $confPass){
            $nuevaPass = md5($nuevaPass);
            $editar = "UPDATE `usuario` SET `password`='$nuevaPass' WHERE `id` ='$id'";
            $ejecutar2 = $conexion->query($editar);

            if ($ejecutar){
                $bien = "La contaseña se actualizó correctamente";
                header("Location: ../../vistas/usuario/cambiarPass.php?bien=$bien");
            }else{
                $err = "No se pudo realizar la operación. Error:" .mysqli_error($conexion);
                header("Location: ../../vistas/usuario/cambiarPass.php?err=$err");
            }
        }else{
            $err = "Las contraseñas no coinciden";
            header("Location: ../../vistas/usuario/cambiarPass.php?err=$err");
        }
    }else{
        $err = "Datos incorrectos";
        header("Location: ../../vistas/usuario/cambiarPass.php?err=$err");
    }

}else{
    header("Location: ../../vistas/usuario/cambiarPass.php");
}

?>
