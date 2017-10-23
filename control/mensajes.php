<?php
if (isset($_GET["bien"])) {
    $mensaje = $_GET["bien"];
    echo "<br/><span style='color: green; font-size: x-large'> $mensaje <i class='pe-7s-check'></i> </span>";
    # code...
}
if (isset($_GET["err"])) {
    $mensaje = $_GET["err"];
    echo "<br/><span style='color: red; font-size: x-large'> $mensaje <i class='pe-7s-x'></i> </span>";
    # code...
}
?>