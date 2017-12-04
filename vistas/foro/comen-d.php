<?php
ini_set ('error_reporting', E_ALL & ~E_NOTICE);

require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();

include '../../control/conexion.php';
$idu = $obj_ses->get_value('userid');
$id = $_GET['id'];
require_once '../plantillas/encabezado-a.php';
?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Temas del Foro</h4>
                            <a href="respuesta.php?id=<?php echo $id ?>"class="btn btn-info btn-fill pull-right">Responder</a>
                            <?php include '../../control/mensajes.php'?>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <?php

                                $consulta = "SELECT * FROM `foro_temas` WHERE `id_foro` = '$id'";
                                $ejecutar = $conexion->query($consulta);

                                while ($datos = $ejecutar->fetch_assoc()) {
                                    $idu = $datos['id_usuario'];

                                    $consulta5 = "SELECT `passwordrecovery` FROM `usuario` WHERE `id` = '$idu'";
                                    $ejecutar5 = $conexion->query($consulta5);
                                    $datos5 = $ejecutar5->fetch_assoc();
                                    $idp2  = $datos5['passwordrecovery'];


                                    $consulta2 = "SELECT `nombre` FROM `docentes` WHERE `id` = '$idp2'";
                                    $ejecutar2 = $conexion->query($consulta2);
                                    $datos2 = $ejecutar2->fetch_assoc();


                                    $consulta2 = "SELECT `nombre` FROM `estudiante` WHERE `id` = '$idp2'";
                                    $ejecutar2 = $conexion->query($consulta2);
                                    $datos2 = $ejecutar2->fetch_assoc();

                                    echo "<thead>
                            <tr>
                                <th>".$datos2['nombre']." | ".$datos['fecha'] . "</th>
           
                            </tr>
                            </thead>";
                                    echo "<tr>";
                                    echo "<td><b>". $datos['titulo'] ."</b><br>". $datos['contenido']." </td>";
                                    echo "</tr>";
                                    echo "<hr>";

                                }

                                ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <?php
                                $consulta3 = "SELECT * FROM `comentario_foro` WHERE `id_tema` = '$id'";
                                $ejecutar3 = $conexion->query($consulta3);

                                while ($regs2 = $ejecutar3->fetch_assoc()) {
                                    $idt = $regs2['id_tema'];
                                    $iduser = $regs2['id_usuario'];

                                    $consulta4 = "SELECT `passwordrecovery` FROM `usuario` WHERE `id` = '$iduser'";
                                    $ejecutar4 = $conexion->query($consulta4);
                                    $datos4 = $ejecutar4->fetch_assoc();
                                    $idp  = $datos4['passwordrecovery'];

                                    $consulta5 = "SELECT `nombre` FROM `docentes` WHERE `id` = '$idp'";
                                    $ejecutar5 = $conexion->query($consulta5);
                                    $datos5 = $ejecutar5->fetch_assoc();

                                    $consulta5 = "SELECT `nombre` FROM `estudiante` WHERE `id` = '$idp'";
                                    $ejecutar5 = $conexion->query($consulta5);
                                    $datos5 = $ejecutar5->fetch_assoc();

                                    echo "<thead>
                                        <tr>
                                            <th>".$datos5['nombre']." | ".$regs2['fecha'] . "</th>
           
                                        </tr>
                                     </thead>";
                                    echo "<tr>";
                                    echo "<td>".  $regs2['comentario']." </td>";
                                    echo "</tr>";
                                    echo "<hr>";
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

<?php require_once '../plantillas/footer.php';