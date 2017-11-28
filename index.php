<?php ?>
    <!doctype html>
    <html lang="es">
    <head>
        <meta charset="utf-8" />
        <!--<link rel="icon" type="image/png" href="assets/img/favicon.ico">-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Sistema en línea para la asistencia de la esceula secundaria</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications-->
        <link href="assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <!-- <link href="assets/css/demo.css" rel="stylesheet" />-->


        <!--     Fonts and icons
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>-->
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />-

    </head>
    <body>

    <div class="wrapper">
        <div class="sidebar" data-color="purple">

            <!--

                Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
                Tip 2: you can also add an image using data-image tag

            -->

            <div class="sidebar-wrapper" style="background-color: #04B4AE">
                <div class="logo">
                    <a href="#" class="simple-text">
                        <img src="img/logo.jpg" alt="">
                    </a>
                </div>

                <ul class="nav">
                    <li class="active">
                        <a href="index.php">
                            <i class="pe-7s-door-lock"></i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li>
                        <a href="vistas/principal/quienes.php">
                            <i class="pe-7s-browser"></i>
                            <p>¿Quiénes somos?</p>
                        </a>
                    </li>
                    <li>
                        <a href="vistas/principal/bienvenida.php">
                            <i class="pe-7s-bookmarks"></i>
                            <p>Bienvenida</p>
                        </a>
                    </li>
                    <li>
                        <a href="vistas/principal/historia.php">
                            <i class="pe-7s-news-paper"></i>
                            <p>Historia</p>
                        </a>
                    </li>
                    <li>
                        <a href="vistas/principal/mision.php">
                            <i class="pe-7s-airplay"></i>
                            <p>Misión</p>
                        </a>
                    </li>
                    <li>
                        <a href="vistas/principal/vision.php">
                            <i class="pe-7s-angle-left"></i>
                            <p>Visión</p>
                        </a>
                    </li>
                    <li>
                        <a href="vistas/principal/valores.php">
                            <i class="pe-7s-angle-down-circle"></i>
                            <p>Valores</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <h3>PLAZA COMUNITARIA 2024, SANTIAGO JAMILTEPEC OAXACA.</h3>

                    </div>
                    <ul class="nav navbar-nav navbar-right">

                        <li>
                            <a href="vistas/usuario/login.php">
                                <p>Ingresar</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>

                </div>
            </nav>


            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h3 class="title">Lista de Cursos</h3><br>
                                </div>
                                <div class="row">
                                <div class="col-md-4">
                                    <?php
                                    include "control/conexion.php";
                                    $consulta0 = "SELECT * FROM `curso_docente` WHERE `grado` = '1'";
                                    $ejecutar0 = $conexion->query($consulta0);

                                    echo "<ul> Primer Grado";
                                    while ($datos = $ejecutar0->fetch_assoc()){
                                        $idd = $datos['docente_id'];

                                        $consulta01 = "SELECT * FROM `materia` WHERE `grado` = '1'";
                                        $ejecutar01 = $conexion->query($consulta01);
                                        $datos01 = $ejecutar01->fetch_assoc();
                                        $idm = $datos01['id'];

                                        $consulta02 = "SELECT `nombre`, `apaterno`, `amaterno` FROM `docentes` WHERE `id` = '$idd'";
                                        $ejecutar02 = $conexion->query($consulta02);
                                        $datos02 = $ejecutar02->fetch_assoc();

                                        echo "<li class='list-group-item'><a href='vistas/materias/misCursos.php?id=$idm'>".$datos01['nombre']."</a>
                                              <br> Profesor. ".$datos02['nombre']." ".$datos02['apaterno']." ".$datos02['amaterno']."
                                              </li>";
                                    }
                                    echo "</ul>
                                    </div>
                                    <div class='col-md-4'>
                                    ";

                                    $consulta1 = "SELECT * FROM `curso_docente` WHERE `grado` = '2'";
                                    $ejecutar1 = $conexion->query($consulta1);

                                    echo "<ul> Segundo Grado";
                                    while ($datos = $ejecutar1->fetch_assoc()){

                                        $idd = $datos['docente_id'];

                                        $consulta11 = "SELECT * FROM `materia` WHERE `grado` = '2'";
                                        $ejecutar11 = $conexion->query($consulta11);
                                        $datos11 = $ejecutar11->fetch_assoc();
                                        $idm2 = $datos11['id'];

                                        $consulta12 = "SELECT `nombre`, `apaterno`, `amaterno` FROM `docentes` WHERE `id` = '$idd'";
                                        $ejecutar12 = $conexion->query($consulta12);
                                        $datos12 = $ejecutar12->fetch_assoc();

                                        echo "<li class='list-group-item'><a href='vistas/materias/misCursos.php?id=$idm2'>".$datos11['nombre']."</a>
                                              <br> Profesor. ".$datos12['nombre']." ".$datos12['apaterno']." ".$datos12['amaterno']."
                                              </li>";
                                    }
                                    echo "</ul>
                                          </div>
                                          <div class='col-sm-4'>
                                            ";

                                    $consulta2 = "SELECT * FROM `curso_docente` WHERE `grado` = '3'";
                                    $ejecutar2 = $conexion->query($consulta2);

                                    echo "<ul> Tercer Grado";
                                    while ($datos = $ejecutar2->fetch_assoc()){

                                        $idd = $datos['docente_id'];

                                        $consulta21 = "SELECT * FROM `materia` WHERE `grado` = '3'";
                                        $ejecutar21 = $conexion->query($consulta21);
                                        $datos21 = $ejecutar21->fetch_assoc();
                                        $idm3 = $datos21['id'];

                                        $consulta22 = "SELECT `nombre`, `apaterno`, `amaterno` FROM `docentes` WHERE `id` = '$idd'";
                                        $ejecutar22 = $conexion->query($consulta22);
                                        $datos22 = $ejecutar22->fetch_assoc();

                                        echo "<li class='list-group-item'><a href='vistas/materias/misCursos.php?id=$id3'>".$datos21['nombre']."</a>
                                              <br> Profesor. ".$datos22['nombre']." ".$datos22['apaterno']." ".$datos22['amaterno']."
                                              </li>";
                                    }
                                    echo "</ul><br>";

                                    ?>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <p class="copyright pull-right">
                            &copy; <script>document.write(new Date().getFullYear())</script>
                            <a href="#">CALLE HIDALGO S/N COLONIA CENTRO, SANTIAGO JAMILTEPEC OAXACA.</a> |
                            TEL:  58 2 90 92
                        </p>
                    </div>
                </footer>
            </div>
        </div>


    </body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>


    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>


    </html>

