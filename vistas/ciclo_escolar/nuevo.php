<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
    require_once '../plantillas/encabezado.php';
?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Nuevo Ciclo Escolar</h4>
                        </div>
                        <div class="content">
                            <form method="post" action="../../control/ciclo/guardar-c.php">
                                <?php include '../../control/mensajes.php'?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" name="nomTxt" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Fecha de Inicio</label>
                                            <input type="date" required class="form-control" name="fiDate" min="<?php echo date("Y-m-d")?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Fecha Fin</label>
                                            <input type="date" required class="form-control" name="ffDate"  min="<?php echo date("Y-m-d")?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Inicio de Inscripción</label>
                                            <input type="date" required class="form-control" name="insDate"  min="<?php echo date("Y-m-d")?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Fin de inscripción</label>
                                            <input type="date" required class="form-control" name="finsDate"  min="<?php echo date("Y-m-d")?>">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php require_once '../plantillas/footer.php';
}else{
    header("Location: ../../index.php");
} ?>