<?php
ini_set ('error_reporting', E_ALL & ~E_NOTICE);
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')){
    include '../../control/conexion.php';
    require_once '../plantillas/encabezado-a.php';
    $idu = $obj_ses->get_value('userid');
    $ide = $_GET['ide'];
    $ida = $_GET['ida'];

    $consulta = "SELECT * FROM `calificacion` WHERE  `estu_id` = '$ide' AND `actividad_id` = '$ida'";
    $ejecutar = $conexion->query($consulta);
    $datos = $ejecutar->fetch_assoc();


    $consulta2 = "SELECT * FROM `actividades` WHERE `id` = '$ida'";
    $ejecutar2 = $conexion->query($consulta2);
    $datos2 = $ejecutar2->fetch_assoc();
    ?>
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>Nombre</th>

                                </thead>
                                <tbody>
                                    <?php
                                    echo "<tr>";
                                    echo "<td><a href='".$datos['ruta']."' target='_blank'>".$datos2['nombre']."</a></td>";
                                    echo "</tr>";

                                    ?>
                                </tbody>
                            </table>
                        <div class="header">
                            <h4 class="title">Calificar:  </h4>
                        </div>
                        <div class="content">
                            <form method="post" action="../../control/mod_estu/cali-guardar.php" enctype="multipart/form-data">
                                <?php include '../../control/mensajes.php'?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Calificación</label>
                                            <input type="number" class="form-control" name="calNum" min="0" max="10" required>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="idaHdn" value="<?php echo $ida ?>">
                                <input type="hidden" name="ideHdn" value="<?php echo $ide ?>">
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
