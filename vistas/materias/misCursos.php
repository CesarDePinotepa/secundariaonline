<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
$obj_ses->get_value('nombre');
if ($obj_ses->check_sess('userid')) {
    require_once '../plantillas/encabezado-e.php';
    ?>
    <div>
        asdasd
    </div>
<?php
    require_once '../plantillas/footer.php';
}else{
header("Location: ../usuario/login.php");
}
?>