<?php
ini_set ('error_reporting', E_ALL & ~E_NOTICE);

require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();

include '../../control/conexion.php';
$idu = $obj_ses->get_value('userid');
$id = $_GET['id'];

$consulta = "SELECT * FROM `foro_foro` WHERE `id_foro` = '$id'";
$ejecutar = $conexion->query($consulta);
$datos = $ejecutar->fetch_assoc();


require_once '../plantillas/encabezado-e.php';
?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h2 class="page-header">Responder a <b><?php echo $datos['foro']?></b></h2>
                        </div>
                        <div class="content">
                            <form method="post" action="../../control/miforo/res-guardar.php">
                                <?php include '../../control/mensajes.php'?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Descripción</label>
                                            <textarea name="msjTxa" disabled id="" cols="70" rows="5" ><?php echo $datos['descripcion'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Respuesta</label>
                                            <textarea name="resTxa"  id="" cols="70" rows="5" required ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="idHdn" value="<?php echo $id ?>">
                                <input type="hidden" name="iduHdn" value="<?php echo $idu ?>">
                                <button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once '../plantillas/footer.php';