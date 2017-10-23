<?php
ini_set ('error_reporting', E_ALL & ~E_NOTICE);
include '../../control/conexion.php';

$traer_doc = "SELECT * FROM `horario`";
$ejecutar = $conexion->query($traer_doc);
$numDatos = $ejecutar->num_rows;

require_once '../plantillas/encabezado.php';
?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Materias Actuales</h4>
                            <a href="alta-m.php"class="btn btn-info btn-fill pull-right">Nueva Materia</a>
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
                                <?php $i = 0;
                                while ($datos = $ejecutar->fetch_assoc()) {
                                    $id = $datos['id'];
                                    echo "<tr>";
                                    echo "<td>". $i += 1 ."</td>";
                                    echo "<td> <a href='editar-m.php?id=$id'>". $datos['clave']."</a></td>";
                                    echo "<td>". $datos['nombre']."</td>";
                                    echo "<td>". $datos['grado'] ."</td>";

                                    echo "<td><a href='../../control/materiaCtrl/eliminar-m.php?id=$id'  onclick='return confirm(\"¿Eliminar?\");' 
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