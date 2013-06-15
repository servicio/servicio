<?php

include '../conexion_1.php';
session_start();
$control = $_GET['control'];
 if ($control == 3) {
    $Semestre = $_SESSION["semestre"];
    $control = 0;
    echo "<strong style='float: left'>" . $Semestre . "<strong/>";
}
?>