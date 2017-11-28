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
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Mis grupos </h4>

                            <?php include '../../control/mensajes.php'?>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>Num.</th>
                                <th>Grado</th>
                                <th>Grupo</th>
                                <th>Actividades</th>
                                </thead>
                                <tbody>
                                <?php $i = 0;
                                $consulta = "SELECT  `passwordrecovery` FROM `usuario` WHERE `id` = '$idu'";
                                $ejecutar = $conexion->query($consulta);
                                $datos = $ejecutar->fetch_assoc();
                                $idp = $datos['passwordrecovery'];

                                $consulta2 = "SELECT * FROM `curso_docente` WHERE `docente_id` = '$idp'";
                                $ejecutar2 = $conexion->query($consulta2);


                                while ($datos2 = $ejecutar2->fetch_assoc()) {
                                    $id = $datos2['id'];
                                    echo "<tr>";
                                    echo "<td>". $i += 1 ."</td>";
                                    echo "<td> <a href=''>". $datos2['grado']."</a></td>";
                                    echo "<td>". $datos2['grupo']."</td>";
                                    echo "<td><a href='' <i class='pe-7s-edit ' ></i></a></td>";
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
