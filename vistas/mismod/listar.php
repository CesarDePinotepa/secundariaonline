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
                            <h4 class="title">Mis modulos</h4>
                            <?php include '../../control/mensajes.php'?>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>Num.</th>
                                <th>Nombre</th>
                                <th>Inscribirse a grupo</th>
                                </thead>
                                <tbody>
                                <?php
                                $consulta = "SELECT  `nombre` FROM `usuario` WHERE `passwordrecovery` = '$idu'";
                                $ejecutar = $conexion->query($consulta);
                                $datos = $ejecutar->fetch_assoc();
                                $numcon = $datos['nombre'];


                                $consulta2 = "SELECT  `grado`,`id`  FROM `estudiante` WHERE `no_control` = '$numcon'";
                                $ejecutar2 = $conexion->query($consulta2);
                                $datos2 = $ejecutar2->fetch_assoc();
                                $grado = $datos2['grado'];
                                $ide = $datos2['id'];

                                $consulta3 = "SELECT * FROM `materia` WHERE `grado` = '$grado'";
                                $ejecutar3 = $conexion->query($consulta3);

                                $i = 0;
                                while ($datos3 = $ejecutar3->fetch_assoc()) {
                                    $id = $datos3['id'];
                                    echo "<tr>";
                                    echo "<td>". $i += 1 ."</td>";
                                    echo "<td>". $datos3['nombre']."</td>";

                                    $consulta4 = "SELECT * FROM `modulos_estu` WHERE `estu_id`='$ide' AND `mod_id` ='$id'";
                                    $ejecutar4 = $conexion->query($consulta4);
                                    $numr = $ejecutar4->num_rows;

                                    if ($numr == 0){
                                        echo "<td>
                                                <a href='../../control/mod_estu/inscribir.php?g=A&idu=$ide&id=$id'  onclick='return confirm(\"¿INSCRIBIRSE?\");'>A</a> | 
                                                <a href='../../control/mod_estu/inscribir.php?g=B&idu=$ide&id=$id'  onclick='return confirm(\"¿INSCRIBIRSE?\");'>B</a> | 
                                                <a href='../../control/mod_estu/inscribir.php?g=C&idu=$ide&id=$id'  onclick='return confirm(\"¿INSCRIBIRSE?\");'>C</a> | 
                                                <a href='../../control/mod_estu/inscribir.php?g=D&idu=$ide&id=$id'  onclick='return confirm(\"¿INSCRIBIRSE?\");'>D</a> | 
                                                <a href='../../control/mod_estu/inscribir.php?g=E&idu=$ide&id=$id'  onclick='return confirm(\"¿INSCRIBIRSE?\");'>E</a> | 
                                                <a href='../../control/mod_estu/inscribir.php?g=F&idu=$ide&id=$id'  onclick='return confirm(\"¿INSCRIBIRSE?\");'>F</a> | 
                                                
                                                </td>";
                                    }else{
                                        echo "<td>Ya estas inscrito</td>";
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
