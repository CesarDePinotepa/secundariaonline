<?php require_once '../plantillas/encabezado.php';

$id = $_GET['id'];
include '../../control/conexion.php';
$traer_doc = "SELECT * FROM `estudiante` WHERE `id` ='$id' ";
$ejecutar = $conexion->query($traer_doc);
$datos = $ejecutar->fetch_assoc();

?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Editar estudiante: <b><?php echo $datos['apaterno'] ." ". $datos['amaterno']." ".$datos['nombre'] ?></b></h4>
                    </div>
                    <div class="content">
                        <form method="post" action="../../control/estudianteCtrl/actualizar-e.php">
                            <?php include '../../control/mensajes.php'?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" name="nomTxt"  value="<?php echo $datos['nombre'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Apellido Paterno</label>
                                        <input type="text" class="form-control" name="apaTxt" value="<?php echo $datos['apaterno'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Apellido Materno</label>
                                        <input type="text" class="form-control" name="amaTxt" value="<?php echo $datos['amaterno'] ?>">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Número de control</label>
                                        <input type="text" disabled class="form-control" name="nocTxt" value="<?php echo $datos['no_control'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CURP</label>
                                        <input type="text" class="form-control" name="curpTxt" value="<?php echo $datos['curp'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="eemail" value="<?php echo $datos['email'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Fecha de Nacimiento</label>
                                        <input type="date" class="form-control" name="fdate" value="<?php echo $datos['fecha_nac'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Escuela de procedencia</label>
                                        <input type="text" class="form-control" name="escTxt" value="<?php echo $datos['escuela_pro'] ?>">
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
