<?php
ini_set ('error_reporting', E_ALL & ~E_NOTICE);
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')){
    include '../../control/conexion.php';
    require_once '../plantillas/encabezado-a.php';
    $idu = $obj_ses->get_value('userid'); ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Cambiar contraseña</h4>
                        </div>
                        <div class="content">
                            <form method="post" action="../../control/usuarioCtrl/updatePass.php" enctype="multipart/form-data">
                                <?php include '../../control/mensajes.php'?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Contraseña actual</label>
                                            <input type="password" class="form-control" name="pass" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nueva Contraseña</label>
                                            <input type="password" class="form-control" name="pass2" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Confirmar Contraseña</label>
                                            <input type="password"  class="form-control" name="pass3">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="idHdn" value="<?php echo $idu ?>">
                                <button type="submit" class="btn btn-info btn-fill pull-right">Cambiar</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once '../plantillas/footer.php';
}else{
    header("Locarion: ../../index.php");
} ?>
