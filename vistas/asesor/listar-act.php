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
                            <h4 class="title">Actividades </h4>

                            <?php include '../../control/mensajes.php'?>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>Num.</th>
                                <th>Nombre</th>
                                <th>Fecha de entrega</th>
                                <th>Grupo</th>
                                <th>Grado</th>
                                <th>Calificar</th>
                                </thead>
                                <tbody>
                                <?php $i = 0;
                                $consulta = "SELECT * FROM `actividades` WHERE `docente_id` = '$idu' " ;
                                $ejecutar = $conexion->query($consulta);

                                while ($datos = $ejecutar->fetch_assoc()) {
                                    $grupo = $datos['grupo'];
                                    $grado = $datos['grado'];

                                    $id = $datos['id'];
                                    echo "<tr>";
                                    echo "<td>". $i += 1 ."</td>";
                                    echo "<td> <a href='../../archivos". $datos['ruta'] ."' target='_blank'>". $datos['nombre']."</a></td>";
                                    echo "<td>". $datos['fechaFin']."</td>";

                                    echo "<td>". $datos['grupo']."</td>";
                                    echo "<td>". $datos['grado']."</td>";
                                    echo "<td><a href='listar-es.php?gra=$grado&gru=$grupo' <i class='pe-7s-pen ' ></i></a></td>";
                                    echo "<tr>";
                                }

                                $conexion->close();
                                ?>

                                </tbody>
                            </table>

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
