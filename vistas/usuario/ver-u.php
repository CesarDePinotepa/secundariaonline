<?php
ini_set ('error_reporting', E_ALL & ~E_NOTICE);
include '../../control/conexion.php';

$traer_doc = "SELECT * FROM `usuario`";
$ejecutar = $conexion->query($traer_doc);


require_once '../plantillas/encabezado.php';
?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Usuarios </h4>
                            <a href="alta-u.php"class="btn btn-info btn-fill pull-right">Nuevo Usuario</a>
                            <?php include '../../control/mensajes.php'?>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>Num.</th>
                                <th>Usuario</th>
                                <th>Contraseña</th>
                                <th>Tipo</th>
                                <th>Eliminar</th>
                                </thead>
                                <tbody>
                                <?php $i = 0;
                                while ($datos = $ejecutar->fetch_assoc()) {
                                    $id = $datos['id'];
                                    echo "<tr>";
                                    echo "<td>". $i += 1 ."</td>";
                                    echo "<td> <a href=''>". $datos['nombre']."</a></td>";
                                    echo "<td>". $datos['password']."</td>";
                                    if ($datos['tipo'] == 1){
                                        echo "<td>Administrador</td>";
                                    }else{
                                        echo "<td>Docente</td>";
                                    }


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

<?php require_once '../plantillas/footer.php'; ?>