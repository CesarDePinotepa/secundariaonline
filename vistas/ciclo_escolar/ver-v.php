<?php ini_set ('error_reporting', E_ALL & ~E_NOTICE);
include "../../control/conexion.php";
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
    require_once '../plantillas/encabezado.php';
    ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Ciclos Escolares</h4>
                            <a href="nuevo.php"class="btn btn-info btn-fill pull-right">Nuevo Ciclo Escolar</a>
                            <?php include '../../control/mensajes.php'?>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>Num.</th>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>Inscripción</th>

                                </thead>
                                <tbody>
                                <?php $i = 0;
                                $consulta = "SELECT * FROM `ciclo` ";
                                $ejecutar = $conexion->query($consulta);

                                while ($datos = $ejecutar->fetch_assoc()) {
                                    $id = $datos['id'];
                                    echo "<tr>";
                                    echo "<td>". $i += 1 ."</td>";
                                    echo "<td> <a href=''>". $datos['nombre']."</a></td>";
                                    echo "<td>". $datos['fecha_ini']."/". $datos['fecha_fin']."</td>";
                                    echo "<td>". $datos['fechaIn_ini'] ."/".$datos['fechaIn_fin']."</td>";

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
    <?php require_once '../plantillas/footer.php';
}else{
    header("Location: ../../index.php");
} ?>