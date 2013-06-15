<?php
session_start();
//$_SESSION = array();
//session_destroy();

$matricula = $_GET["matricula"];
$control = $_GET["control"];
if ($control == 1) {
    include '../conexion_1.php';
    $sql = "select * from usuario, reg_tutor, tutor, persona where usuario.usuario = reg_tutor.matricula and reg_tutor.id_tutor=tutor.id and usuario.idPersona= persona.id and  usuario.usuario='$matricula'";
    $ra = mysql_query($sql, Conectarse());
    while ($datos = mysql_fetch_array($ra)) {
//        echo "<strong >" . $datos["nombre"] . "&nbsp" . $datos["apellido"] . "<strong/>";
        $_SESSION["idTuto2"] = $datos[9];
        $_SESSION["idUsuario2"] = $datos[0];
        $_SESSION["matricula2"] = $matricula;
        $_SESSION["semestre2"] = $datos["semestre"];
        $_SESSION["nombreTutor2"]=$datos["nomTutor"];
        $_SESSION["nombreUsuario2"]=$datos["nombre"];
        $_SESSION["apellidoUsuario2"]=$datos["apellido"];
    }
} else if ($control == 2) {
    echo "<strong style='float: left' >" . $_SESSION["matricula2"] . "<strong/>";
} else if ($control == 3) {
    echo "<strong style='float: left' >" . $_SESSION["semestre2"] . "<strong/>";
}
?>
