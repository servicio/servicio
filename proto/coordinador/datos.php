<?php

include '../conexion_1.php';
session_start();

$control = $_GET['control'];
if ($control == 1) {
    $idTutor = $_GET['id'];
    $consulta = mysql_query("SELECT * FROM usuario, persona  where usuario.id = $idTutor and idPersona = persona.id", Conectarse());
    while ($fila = mysql_fetch_array($consulta)) {
        echo "<strong style='float: left'>" . $fila["usuario"] . "<strong/>";
//      $_SESSION["nombreTutor"] = $fila["nomTutor"];
        $_SESSION["idAlumno"] = $fila["0"];
        $_SESSION["matricula"] = $fila["usuario"];
        $_SESSION['nombreUsuario'] = $fila["nombre"];
        $_SESSION['apellidoUsuario'] = $fila["apellido"];
        $_SESSION['semestre'] = $fila["semestre"];
        
    }
} 
?>