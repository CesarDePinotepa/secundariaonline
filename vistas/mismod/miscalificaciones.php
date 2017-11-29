<?php
ini_set ('error_reporting', E_ALL & ~E_NOTICE);
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')){
    include '../../control/conexion.php';
    require_once '../plantillas/encabezado-e.php';
    $idu = $obj_ses->get_value('userid');
    $traerid = "SELECT  `passwordrecovery` FROM `usuario` WHERE `id` = '$idu'";
    $ejecutar = $conexion->query($traerid);
    $reg = $ejecutar->fetch_assoc();
    $ide = $reg['passwordrecovery'];

    ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Calificaciones</h4>
                        <?php include '../../control/mensajes.php' ?>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <?php
                        $consulta = "SELECT * FROM `calificacion` WHERE `estu_id` = '$ide'";
                        $ejecutar = $conexion->query($consulta);
                        $i =0;
                        while ($datos = $ejecutar->fetch_assoc()){
                            $idm = $datos['materia_id'];

                            $traerm = "SELECT * FROM `materia` WHERE `id` = '$idm'";
                            $ejecutar3 = $conexion->query($traerm);
                            $datos3 = $ejecutar3->fetch_assoc();
                        ?>
                        <table class="table table-hover table-striped">
                            <thead>
                            <th style="color: black"><?php echo $datos3['nombre'] ?></th>
                            <?php echo "<th>Calificación ". $i+=1 ."</th>";?>
                            <th></th>
                            <th>Total</th>
                            </thead>
                            <tbody>
                            <?php

                            $ida = $datos['actividad_id'];
                            $consulta2 = "SELECT * FROM `actividades` WHERE `id` = '$ida' ";
                            $ejecutar2 = $conexion->query($consulta2);
                            while ($datos2 = $ejecutar2->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php echo $datos2['nombre'] ?></td>
                                <td><?php echo $datos['calificacion'] ?></td>
                                <!--<td>Fila2</td>
                                <td>Fila3</td>-->
                                <td></td>
                                <?php
                                $consulta3 = "SELECT SUM(`calificacion`) cal FROM calificacion WHERE `materia_id` ='$idm'";
                                $ejecutar3 = $conexion->query($consulta3);
                                $regc = $ejecutar3->fetch_assoc();
                                $tot = $regc['cal']/3;
                                echo "<td>". floatval($tot)."</td>";
                                ?>

                            </tr>
                            <?php }?>
                            <!--<tr>
                                <td>Actividad 2</td>
                                <td>Fila1</td>
                                <td>Fila2</td>
                                <td>Fila3</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Actividad 3</td>
                                <td>Fila1</td>
                                <td>Fila2</td>
                                <td>Fila3</td>
                                <td></td>
                                <td></td>
                            </tr>-->
                            </tbody>
                        </table>
                        <?php }?>

                    </div>
                </div>


            </div>

    <?php
    require_once '../plantillas/footer.php';
}else{
    header("Location: ../../index.php");
} ?>
