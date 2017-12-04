<?php
ini_set ('error_reporting', E_ALL & ~E_NOTICE);

require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();

include '../../control/conexion.php';
$idu = $obj_ses->get_value('userid');


require_once '../plantillas/encabezado.php';
?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Nuevo Tema</h4>
                        </div>
                        <div class="content">
                            <form method="post" action="../../control/foro/save-com.php">
                                <?php include '../../control/mensajes.php'?>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Categoría</label>
                                            <select name="catSel" id="" class="form-control">
                                                <option value="-1">Seleccione</option>
                                                <?php
                                                $consulta = "SELECT * FROM `foro_categoria`";
                                                $ejecutar = $conexion->query($consulta);
                                                while ($datos = $ejecutar->fetch_assoc()){
                                                    echo "<option value='".$datos['id_forocategoria']."'>". $datos['categoria'] ."</option>";
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Título</label>
                                            <input type="text" class="form-control" name="titTxt">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Descripción</label>
                                            <textarea name="msjTxa" id="" cols="70" rows="5"></textarea>
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
<?php require_once '../plantillas/footer.php';