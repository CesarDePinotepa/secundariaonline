<?php
?>
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
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications-->
    <link href="../../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <!-- <link href="assets/css/demo.css" rel="stylesheet" />-->


    <!--     Fonts and icons
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>-->
    <link href="../../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" >

        <!--

            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag

        -->

        <div class="sidebar-wrapper" style="background-color: #04B4AE">
            <div class="logo">
                <a href="#" class="simple-text">
                    <img src="../../img/logo.jpg" alt="">
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="../menuEstu.php">
                        <i class="pe-7s-door-lock"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                <li>
                    <a href="../mismod/listar.php">
                        <i class="pe-7s-menu"></i>
                        <p>Mis módulos</p>
                    </a>
                </li>
                <li>
                    <a href="../mismod/listar-acti.php">
                        <i class="pe-7s-note2"></i>
                        <p>Mis actividades</p>
                    </a>
                </li>
                <li>
                    <a href="../mismod/miscalificaciones.php">
                        <i class="pe-7s-note"></i>
                        <p>Mis calificaciones</p>
                    </a>
                </li>
                <li>
                    <a href="../miforo/listar-e.php">
                        <i class="pe-7s-keypad"></i>
                        <p>Foro</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="pe-7s-switch"></i>
                        <p>Cambiar contraseña</p>
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
                            <a href="../../control/cerrarSesion.php">
                                <p> <?php echo $obj_ses->get_value('nombre') ?> | Cerrar Sesión</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>

                </div>
        </nav>

