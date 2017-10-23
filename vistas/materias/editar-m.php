<?php require_once '../plantillas/encabezado.php';

$id = $_GET['id'];
include '../../control/conexion.php';
$traer_doc = "SELECT * FROM `materia` WHERE `id` ='$id' ";
$ejecutar = $conexion->query($traer_doc);
$datos = $ejecutar->fetch_assoc();

?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Editar la materia <b><?php  echo $datos['nombre']?> </b></h4>
                    </div>
                    <div class="content">
                        <form method="post" action="../../control/materiaCtrl/actualizar-m.php">
                            <?php include '../../control/mensajes.php'?>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" name="nomTxt"  value="<?php echo $datos['nombre'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Clave</label>
                                        <input type="text" disabled class="form-control" name="claTxt" value="<?php echo $datos['clave'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Grado</label>
                                        <select name="graSel" class="form-control">
                                            <?php
                                            if ($datos['grado'] == 1){
                                              echo "<option value=\"1\" selected>1</option>
                                            <option value=\"2\">2</option>
                                            <option value=\"3\">3</option>";
                                            }elseif ($datos['grado'] == 2){
                                                echo "<option value=\"1\">1</option>
                                            <option value=\"2\" selected>2</option>
                                            <option value=\"3\">3</option>";
                                            }else{
                                                echo "<option value=\"1\">1</option>
                                            <option value=\"2\">2</option>
                                            <option value=\"3\" selected>3</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="idHdn" value="<?php echo $id ?>">
                            <button type="submit" class="btn btn-info btn-fill pull-right">Actualizar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once '../plantillas/footer.php'?>
