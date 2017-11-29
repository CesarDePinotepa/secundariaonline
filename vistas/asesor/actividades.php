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
                            <h4 class="title">Alta de actividad</h4>
                        </div>
                        <div class="content">
                            <form method="post" action="../../control/actividad/agregar.php" enctype="multipart/form-data">
                                <?php include '../../control/mensajes.php'?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" name="nomTxt" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Fecha de entrega</label>
                                            <input type="date" class="form-control" name="fecDat" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Actividad</label>
                                            <input type="file"  class="form-control" name="arch">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="gruHdn" value="<?php echo $_GET['gru'] ?>">
                                <input type="hidden" name="graHdn" value="<?php echo $_GET['gra'] ?>">
                                <input type="hidden" name="idHdn" value="<?php echo $idu ?>">
                                <button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
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
