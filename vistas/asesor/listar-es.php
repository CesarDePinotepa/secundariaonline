<?php
ini_set ('error_reporting', E_ALL & ~E_NOTICE);
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')){
    include '../../control/conexion.php';
    require_once '../plantillas/encabezado-a.php';
    $idu = $obj_ses->get_value('userid');
    $grado = $_GET['gra'];
    $grupo = $_GET['gru'];
    ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Grupo <b><?php echo $grado." ".$grupo ?></b> </h4>

                            <?php include '../../control/mensajes.php'?>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>Num.</th>
                                <th>Nombre</th>
                                <th>Actividad 1</th>
                                <th>Actividad 2</th>
                                <th>Actividad 3</th>
                                </thead>
                                <tbody>
                                <?php $i = 0;
                                $consulta = "SELECT DISTINCT CONCAT (estudiante.nombre,' ',estudiante.apaterno,' ',estudiante.amaterno) AS nome, estudiante.id AS idu
                                              FROM estudiante,modulos_estu WHERE estudiante.grado = '$grado'
                                              AND modulos_estu.grupo = '$grupo'  ";
                                $ejecutar = $conexion->query($consulta);
                                $ide =

                                $consulta2 = "SELECT COUNT(*) AS numr,`id` FROM `actividades` WHERE `grado` = '$grado' AND `grupo` = '$grupo' ";
                                $ejecutar2 = $conexion->query($consulta2);
                                $datos2 = $ejecutar2->fetch_assoc();
                                $numr = $datos2['numr'];

                                while ($datos = $ejecutar->fetch_assoc()) {
                                    $ide = $datos['idu'];
                                    echo "<tr>";
                                    echo "<td>". $i += 1 ."</td>";
                                    echo "<td>". $datos['nome']."</td>";
                                    if ($numr == 0){
                                        echo "<td></td>";
                                        echo "<td></td>";
                                        echo "<td></td>";
                                    }elseif ($numr == 1){
                                        $act1 = "SELECT MIN(`id`)AS idmin FROM actividades WHERE `grupo` = '$grupo' AND `grado` = '$grado' ";
                                        $ejecutar3 = $conexion->query($act1);
                                        $datos3 = $ejecutar3->fetch_assoc();
                                        $ida = $datos3['idmin'];

                                        echo "<td> <a href='calificar.php?idu=$idu&ida=$ida'><i class='pe-7s-pen ' ></i></a></td>";
                                        echo "<td></td>";
                                        echo "<td></td>";
                                    }elseif ($numr == 2){
                                        $act1 = "SELECT MIN(`id`)AS idmin, MIN(`id`)+1 AS id  FROM actividades WHERE `grupo` = '$grupo' AND `grado` = '$grado' ";
                                        $ejecutar3 = $conexion->query($act1);
                                        $datos3 = $ejecutar3->fetch_assoc();
                                        $idam = $datos3['idmin'];
                                        $ida = $datos3['id'];

                                        echo "<td> <a href='calificar.php?ide=$ide&ida=$idam'><i class='pe-7s-pen ' ></i></a></td>";
                                        echo "<td> <a href='calificar.php?ide=$ide&ida=$ida'><i class='pe-7s-pen ' ></i></a></td>";
                                        echo "<td></td>";
                                    }else{
                                        $act1 = "SELECT MIN(`id`)AS idmin, MIN(`id`)+1 AS id,MAX(`id`) AS idmax  FROM actividades WHERE `grupo` = '$grupo' AND `grado` = '$grado' ";
                                        $ejecutar3 = $conexion->query($act1);
                                        $datos3 = $ejecutar3->fetch_assoc();
                                        $idam = $datos3['idmin'];
                                        $ida = $datos3['id'];
                                        $idax = $datos3['idmax'];

                                        echo "<td> <a href='calificar.php?idu=$idu&ida=$idam'><i class='pe-7s-pen ' ></i></a></td>";
                                        echo "<td> <a href='calificar.php?idu=$idu&ida=$ida'><i class='pe-7s-pen ' ></i></a></td>";
                                        echo "<td> <a href='calificar.php?idu=$idu&ida=$idax'><i class='pe-7s-pen ' ></i></a></td>";
                                    }
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
