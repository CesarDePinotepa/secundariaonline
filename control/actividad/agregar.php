<?php
include "../conexion.php";
$titulo = $_POST['nomTxt'];
$fecha = $_POST['fecDat'];
$grupo = $_POST['gruHdn'];
$grado = $_POST['graHdn'];
$id = $_POST['idHdn'];


$nombre = $_FILES['arch']['name'];
$tipo_archivo = $_FILES['arch']['type'];
$tamano_archivo = $_FILES['arch']['size'];
$ruta = "../../archivos/";
$ruta_del_archivo = $ruta.$_FILES['arch']['name'];
$nombre_archivo=$_FILES['arch']['name'];

if ($nombre!=''){
    if (!((strpos($tipo_archivo, "pdf"))&& ($tamano_archivo < 1000000))){


        $err = "La extensión del archivo no está soportada.";
        header("Location: ../../vistas/asesor/actividades.php?&err=$err");

    }else{
        if(move_uploaded_file($_FILES['arch']['tmp_name'],$ruta_del_archivo)){
            $insertar = "INSERT INTO `actividades`(`id`, `nombre`, `descripcion`, `ruta2`, `fechaFin`, `ruta`, 
                          `docente_id`, `grupo`, `grado`, `calificacion_id`, `estado`)
                           VALUES (NULL,'$titulo',NULL,NULL,'$fecha','$ruta_del_archivo','$id',
                           '$grupo','$grado',NULL,'0')";
            $ejecutar = $conexion->query($insertar);

            if ($ejecutar){

                $bien = "La actividad se subió correctamente";
                header("Location: ../../vistas/asesor/actividades.php?bien=$bien");
            }else{
                $err = "No se pudo realziar la operación". mysqli_error($conexion);
                header("Location: ../../vistas/asesor/actividades.php?err=$err");
            }

        }else{
            $err = "No se pudo realziar la operación";
            header("Location: ../../vistas/asesor/actividades.php?err=$err");
        }
    }
}
?>