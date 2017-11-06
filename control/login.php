<?php include 'conexion.php';
require_once '../librerias/Simple_sessions.php';
if (isset($_POST['usrTxt']) && !empty($_POST['usrTxt'])) {
    # code...
    $user = $_POST['usrTxt'];
    $pass = md5($_POST['pass']);

    $comprobar = "SELECT  *  FROM `usuario` WHERE `email` = '$user' AND `password` = '$pass'";
    $ejecutar2 = $conexion->query($comprobar);
    $result = $ejecutar2->fetch_assoc();
    $num = $ejecutar2->num_rows;
    //echo count($result)
   if ($num > 0) {
       $obj_ses = new Simple_sessions();
       $data = array('userid' => $result['id'],
           'nombre' => $result['nombre']);

        $obj_ses->add_sess($data);

        if ($result['tipo'] == 1){
            header("Location: ../vistas/menuAdmin.php");
        }
        elseif ($result['tipo'] == 2){
            header('');
        }else{
            header('');
        }

   }else {
       $error = "Los datos de ingreso son incorrectos";
       header("Location: ../vistas/usuario/login.php?err=$error");
   }

}else{
    header("Location: ../vistas/usuario/login.php");
}
?>

