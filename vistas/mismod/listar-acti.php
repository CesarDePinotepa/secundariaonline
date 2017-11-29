<?php
ini_set ('error_reporting', E_ALL & ~E_NOTICE);
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')){
    include '../../control/conexion.php';
    require_once '../plantillas/encabezado-e.php';
    $idu = $obj_ses->check_sess('userid');
    ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Mis actividades</h4>
                            <?php include '../../control/mensajes.php'?>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>Num.</th>
                                <th>Nombre</th>
                                <th>Fecha de entrega</th>
                                <th>Subir/Calificación</th>
                                </thead>
                                <tbody>
                                <?php

                                $consulta = "SELECT modulos_estu.estu_id, modulos_estu.grupo, estudiante.grado,modulos_estu.mod_id 
                                             FROM estudiante,modulos_estu WHERE estudiante.id = '$idu' 
                                             AND modulos_estu.estu_id = '$idu' ";
                                $ejecutar = $conexion->query($consulta);
                                $datos = $ejecutar->fetch_assoc();
                                $grupo = $datos['grupo'];
                                $grad = $datos['grado'];
                                $idc = $datos['mod_id'];
                                $ide = $datos['estu_id'];

                                $consulta2 = "SELECT * FROM `actividades` WHERE `grupo` = '$grupo' AND  `grado` = '$grad'";
                                $ejecutar2 = $conexion->query($consulta2);

                                $i = 0;
                                while ($datos2 = $ejecutar2->fetch_assoc()) {
                                    $ida = $datos2['id'];
                                    echo "<tr>";
                                    echo "<td>". $i += 1 ."</td>";
                                    echo "<td><a href='".$datos2['ruta']."' target='_blank'>". $datos2['nombre']."</a></td>";
                                    echo "<td>". $datos2['fechaFin']."</td>";
                                    $fechaActual = strtotime(date("Y-m-d"));
                                    $fechaEntrada = strtotime($datos2['fechaFin']);
                                    $quitar = ($fechaActual > $fechaEntrada) ? "Ya paso" : "Aun disponible";

                                    if ($datos2['estado'] == 0 ){
                                        if ($fechaActual > $fechaEntrada){
                                            echo "<td>La fecha de entrega ya pasó.</td>";
                                        }else {
                                            echo "<form action='../../control/actividad/deestuagregar.php' method='post' class='form-horizontal' enctype='multipart/form-data'>";
                                            echo "<td><input type='file' name='arch' value='Subir'> </td>";
                                            echo "<td><button class='btn btn-success'>Guardar</button> </td>";
                                            echo "<input type='hidden' name='idaHdn' value='$ida'>";
                                            echo "<input type='hidden' name='idcHdn' value='$idc'>";
                                            echo "<input type='hidden' name='ideHdn' value='$ide'>";
                                            echo "</form>";
                                        }
                                    }else {
                                        $traerc = "SELECT `calificacion` FROM `calificacion` 
                                                       WHERE `actividad_id`= '$ida' AND `estu_id` = '$ide'";
                                        $ejecutar4 = $conexion->query($traerc);
                                        $userr = $ejecutar4->fetch_assoc();

                                        if ($userr['calificacion'] == NULL){
                                            echo "<td>Pendiente</td>";
                                        }elseif ($userr['calificacion'] <=5){
                                            echo "<td style='color: red;'>". $userr['calificacion']."</td>";
                                        } else{
                                            echo "<td>". $userr['calificacion']."</td>";
                                        }
                                        echo "<td></td>";

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
    header("Location: ../../index.php");
} ?>
