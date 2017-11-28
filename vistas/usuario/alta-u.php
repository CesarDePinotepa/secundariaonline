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
                        <h4 class="title">Alta de usuarios</h4>
                    </div>
                    <div class="content">
                        <form method="post" action="../../control/usuarioCtrl/guardar-u.php">
                            <?php include '../../control/mensajes.php'?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Personal</label>

                                        <select name="perSel" class="form-control">
                                            <option value="-1">Seleccione</option>
                                            <?php
                                            include '../../control/conexion.php';
                                            $consulta = "SELECT `id`, `nombre`, `apaterno`, `amaterno` FROM `docentes`";
                                            $ejecutar = $conexion->query($consulta);

                                            while ($datos = $ejecutar->fetch_assoc()){
                                                echo "<option value='".$datos['id']."'>".$datos['apaterno']." ".$datos['amaterno']." ".$datos['nombre']." </option>";
                                            }
                                            $conexion->close();
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Usuario</label>
                                        <input type="email" class="form-control" name="usrTxt" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="password" class="form-control" name="pass">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Confirme Contraseña</label>
                                        <input type="password" class="form-control" name="cpass">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Tipo</label>
                                        <input type="radio" class="radio-inline" name="tiRa" value="1">Administrador
                                        <input type="radio" class="radio-inline" name="tiRa" value="2" checked>Docente
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
