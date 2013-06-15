<?php

include '../conexion_1.php';
session_start();
$control = $_GET['control'];
if ($control == 2) {
    $alumno = $_SESSION["nombreUsuario"];
    $apellido = $_SESSION["apellidoUsuario"];
    echo "<strong >" . $alumno . "&nbsp" . $apellido . "<strong/>";
} 
?>