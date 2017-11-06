<?php
ini_set ('error_reporting', E_ALL & ~E_NOTICE);
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


        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Logo
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="../index.php">
                        <i class="pe-7s-door-lock"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                <li>
                    <a href="docentesLista.php">
                        <i class="pe-7s-user"></i>
                        <p>Docentes</p>
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
                    <a href="#">
                        <i class="pe-7s-file"></i>
                        <p>Horarios</p>
                    </a>
                </li>
                <li>
                    <a href="#">
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
                <div class="collapse navbar-collapse">
                    <h2>Nombre del sistema aquí</h2>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">
                                <p>Cerrar Sesión</p>
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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Alta de docentes</h4>
                            </div>
                            <div class="content">
                                <form method="post" action="../control/docentesCtrl.php">
                                    <?php include '../control/mensajes.php'?>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" class="form-control" name="nomTxt" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Apellido paterno</label>
                                                <input type="text" class="form-control" name="apaTxt" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Apellido materno</label>
                                                <input type="text" class="form-control" name="amaTxt">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>RFC</label>
                                                <input type="text" class="form-control" name="rfcTxt" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>CURP</label>
                                                <input type="text" class="form-control" name="curpTxt" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Dirección</label>
                                                <input type="text" class="form-control" name="dirTxt" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Teléfono</label>
                                                <input type="text" class="form-control" name="telTxt" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="emaEma" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Estado Civil</label>
                                                <select name="edoSel" class="form-control" required>
                                                    <option value="Soltero">Solter@</option>
                                                    <option value="Casado">Casad@</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Especialidad</label>
                                                <input type="text" class="form-control" name="espTxt" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tipo Docente</label>
                                                <select name="tdSel" class="form-control" required>
                                                    <option value="0">Base</option>
                                                    <option value="1">Honorarios</option>
                                                    <option value="2">Interino</option>
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
