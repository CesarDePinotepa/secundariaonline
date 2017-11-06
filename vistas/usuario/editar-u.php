<?php include "../../control/conexion.php";
$id = $_GET['id'];
$consulta = "SELECT * FROM `usuario` WHERE `passwordrecovery`  ='$id' ";
$ejecutar = $conexion->query($consulta);
$datos = $ejecutar->fetch_assoc();
require_once '../plantillas/encabezado.php'
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Usuario</h4>
                    </div>
                    <div class="content">
                        <form method="post" action="">
                            <?php include '../../control/mensajes.php'?>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Usuario</label>
                                        <input type="text" disabled class="form-control" name="usrTxt" value="<?php echo $datos['nombre'] ?>" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="password" class="form-control" name="pass" value="<?php echo $datos['password'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Confirme Contraseña</label>
                                        <input type="password" class="form-control" name="cpass" >
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="idHdn" value="<?php $datos['id'] ?>">
                            <input type="hidden" name="tipoHdn" value="0">
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
