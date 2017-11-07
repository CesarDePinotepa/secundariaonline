<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
require_once '../plantillas/encabezado.php';
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Alta de materias</h4>
                    </div>
                    <div class="content">
                        <form method="post" action="../../control/materiaCtrl/guardar-m.php">
                            <?php include '../../control/mensajes.php'?>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" name="nomTxt" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Clave</label>
                                        <input type="text" class="form-control" name="claTxt">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Grado</label>
                                        <select name="graSel" class="form-control">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
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
</div>


<?php require_once '../plantillas/footer.php'?>
