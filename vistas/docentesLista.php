<?php
ini_set ('error_reporting', E_ALL & ~E_NOTICE);
include '../control/conexion.php';

require_once '../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();

$traer_doc = "SELECT * FROM `docentes`";
$ejecutar = $conexion->query($traer_doc);
$numDatos = $ejecutar->num_rows;
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <!--<link rel="icon" type="image/png" href="assets/img/favicon.ico">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Nombre del sistema</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>-->
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple">

        <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


        <div class="sidebar-wrapper" style="background-color: #04B4AE">
            <div class="logo">
                <a href="#" class="simple-text">
                    <img src="../img/logo.jpg" alt="">
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="menuAdmin.php">
                        <i class="pe-7s-door-lock"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                <li>
                    <a href="docentesLista.php">
                        <i class="pe-7s-user"></i>
                        <p>Asesores</p>
                    </a>
                </li>
                <li>
                    <a href="materias/ver-m.php">
                        <i class="pe-7s-note2"></i>
                        <p>Materias</p>
                    </a>
                </li>
                <li>
                    <a href="ciclo_escolar/ver-v.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Ciclo Escolar</p>
                    </a>
                </li>
                <li>
                    <a href="estudiantes/ver-e.php">
                        <i class="pe-7s-users"></i>
                        <p>Estudiantes</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="pe-7s-file"></i>
                        <p>Asignar grupos</p>
                    </a>
                </li>
                <li>
                    <a href="foro/listar.php">
                        <i class="pe-7s-world"></i>
                        <p>Foro</p>
                    </a>
                </li>
                <li>
                    <a href="usuario/ver-u.php">
                        <i class="pe-7s-user-female"></i>
                        <p>Usuario</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <h3>PLAZA COMUNITARIA 2024, SANTIAGO JAMILTEPEC OAXACA.</h3>

                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="../control/cerrarSesion.php">
                                <p> <?php echo $obj_ses->get_value('nombre') ?> | Cerrar Sesión</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Lista de Asesores</h4>
                                <a href="docentesFrm.php"class="btn btn-info btn-fill pull-right">Nuevo Asesor</a>
                                <?php include '../control/mensajes.php'?>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>Num.</th>
                                    <th>Nombre</th>
                                    <th>RFC</th>
                                    <th>Teléfono</th>
                                    <th>Tipo Docente</th>
                                    <th>Eliminar</th>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0;
                                    while ($datos = $ejecutar->fetch_assoc()) {
                                        $id = $datos['id'];
                                        echo "<tr>";
                                        echo "<td>". $i += 1 ."</td>";
                                        echo "<td> <a href='docenteEditar.php?id=$id'>". $datos['nombre']." " .$datos['apaterno']." ".$datos['amaterno'] ."</a></td>";
                                        echo "<td>". $datos['rfc']."</td>";
                                        echo "<td>". $datos['telefono'] ."</td>";
                                        if ($datos['tipo']==0) {
                                            echo "<td>Base</td>";
                                        }elseif ($datos['tipo']==2){
                                            echo "<td>Interino</td>";
                                        }else{
                                            echo "<td>Honorarios</td>";
                                        }

                                        echo "<td><a href='../control/eliminarDocente.php?id=$id'  onclick='return confirm(\"¿Eliminar?\");' 
                                                   <i class='pe-7s-delete-user ' ></i></a></td>";
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


        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">Nombre del sistema
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

<!--   Core JS Files   -->
<script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="../assets/js/bootstrap-checkbox-radio-switch.js"></script>

<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="../assets/js/light-bootstrap-dashboard.js"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

</html>
