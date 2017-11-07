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
                            <h4 class="title">Nuevo Ciclo Escolar</h4>
                        </div>
                        <div class="content">
                            <form method="post" action="../../control/ciclo/guardar-c.php">
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
                                                    echo "<option value=".$datos['apaterno']." ".$datos['amaterno']." ".$datos['nombre'].">".$datos['apaterno']." ".$datos['amaterno']." ".$datos['nombre']." </option>";
                                                }

                                                ?>
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
                            <h4 class="title">Materias Asignadas</h4>
                            <?php include '../../control/mensajes.php'?>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>Num.</th>
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Grado</th>
                                <th>Eliminar</th>
                                </thead>
                                <tbody>
                                <?php

                                $traer_doc = "SELECT * FROM `curso_docente`";
                                $ejecutar = $conexion->query($traer_doc);
                                $numDatos = $ejecutar->num_rows;

                                $i = 0;
                                while ($datos2 = $ejecutar->fetch_assoc()) {
                                    $id = $datos2['id'];
                                    echo "<tr>";
                                    echo "<td>". $i += 1 ."</td>";
                                    echo "<td> <a href=''>". $datos2['curso_id']."</a></td>";
                                    echo "<td>". $datos2['docente_id']."</td>";
                                    echo "<td>". $datos['grado'] ."</td>";

                                    echo "<td><a href=''  onclick='return confirm(\"¿Eliminar?\");' 
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