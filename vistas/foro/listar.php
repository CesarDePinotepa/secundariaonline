<?php
ini_set ('error_reporting', E_ALL & ~E_NOTICE);

require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();

include '../../control/conexion.php';
$idu = $obj_ses->get_value('userid');


require_once '../plantillas/encabezado.php';
?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Temas del Foro</h4>
                            <a href="alta-from-d.php"class="btn btn-info btn-fill pull-right">Nuevo Tema</a>
                            <?php include '../../control/mensajes.php'?>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>Num.</th>
                                <th>Tema</th>
                                <th>Último mensaje</th>
                                <th>Respuestas</th>

                                </thead>
                                <tbody>
                                <?php
                                $comprobar = "SELECT * FROM `foro_foro`";
                                $ejecutar = $conexion->query($comprobar);
                                  $i = 0;
                                    while ($datos = $ejecutar->fetch_assoc()) {
                                    $id = $datos['id_foro'];
                                    echo "<tr>";
                                    echo "<td>". number_format( $i += 1) ."</td>";
                                    echo "<td><a href='comentarios.php?id=$id'>". $datos['foro'] ."</a></td>";

                                    $consulta = "SELECT * FROM `foro_temas` WHERE `id_foro` ='$id'";
                                    $ejecutar2 = $conexion->query($consulta);
                                    $datos1 = $ejecutar2->fetch_assoc();

                                    if (empty($datos1['contenido'])){
                                        echo "<td>No hay respuestas</td>";
                                        echo "<td>0</td>";
                                    }else {
                                        echo "<td>" . $datos1['contenido'] . "</td>";
                                        echo "<td>" . $datos1['hits'] . "</td>";
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

<?php require_once '../plantillas/footer.php';