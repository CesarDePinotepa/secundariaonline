<?php
ini_set ('error_reporting', E_ALL & ~E_NOTICE);
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid'))
include '../../control/conexion.php';


require_once '../plantillas/encabezado.php';
?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Asignar Grupos a docente</h4>
                        </div>
                        <div class="content">
                            <form method="post" action="../../control/materiasDocente/asignar.php">
                                <?php include '../../control/mensajes.php'?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Personal</label>

                                            <select name="perSel" class="form-control">
                                                <?php

                                                $consulta = "SELECT `id`, `nombre`, `apaterno`, `amaterno` FROM `docentes`";
                                                $ejecutar = $conexion->query($consulta);

                                                while ($datos = $ejecutar->fetch_assoc()){
                                                    echo "<option value='".$datos['id']."'>".$datos['apaterno']." ".$datos['amaterno']." ".$datos['nombre']." </option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Grado</label>
                                            <select name="graSel" id="" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Grupo</label>
                                            <select name="gpSel" id="" class="form-control">
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                                <option value="F">F</option>
                                                <option value="G">G</option>
                                                <option value="H">H</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tabla -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Grupos asignados</h4>

                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>Num.</th>
                                <th>Docente</th>
                                <th>Grado</th>
                                <th>Grupo</th>
                                <th>Eliminar</th>
                                </thead>
                                <tbody>
                                <?php

                                $traer_doc = "SELECT * FROM `curso_docente`";
                                $ejecutar = $conexion->query($traer_doc);
                                $numDatos = $ejecutar->num_rows;

                                if ($numDatos == 0) {
                                    echo "<h3 style='color: red'>No hay grupos asignados</h3>";
                                }

                                $i = 0;
                                while ($datos2 = $ejecutar->fetch_assoc()) {
                                    $id = $datos2['id'];
                                    $idd = $datos2['docente_id'];
                                    echo "<tr>";
                                    echo "<td>". $i += 1 ."</td>";
                                    $traerdoc = "SELECT CONCAT(`nombre`,' ',`apaterno`,' ',`amaterno`) AS `nomAse` FROM `docentes` WHERE `id` = '$idd'";
                                    $ejecutar4 = $conexion->query($traerdoc);
                                    $datos4 = $ejecutar4->fetch_assoc();

                                    echo "<td>". $datos4['nomAse']."</td>";
                                    echo "<td>". $datos2['grado']."</td>";
                                    echo "<td>". $datos2['grupo'] ."</td>";

                                    echo "<td><a href='../../control/materiasDocente/eliminar-ma-a.php?id=$id'  onclick='return confirm(\"¿Eliminar?\");' 
                                                   <i class='pe-7s-trash ' ></i></a></td>";
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