<?php

session_start();
include '../conexion_1.php';
$idTutor = $_GET['idTutor2'];
$control = $_GET["idcontrol2"];
$_SESSION["idTutor2"] = $idTutor;
$idU = $_SESSION["idUsuario2"];
$idTu = $_SESSION["idTuto2"];
$_SESSION["idTuto2"] = $idTutor;
//$idUsuario = $_SESSION["idAlumno2"];
//$_SESSION["idUsuario2"]=$idUsuario;

$sqlC = "SELECT * FROM reporte_tutor, tutor where id_tutor = $idTu and id_alumno = $idU and id_tutor= tutor.id";
$_SESSION["idTuto2"] = $idTu;
$datos = mysql_query($sqlC, Conectarse());
echo"<br/>
    <br/>
    <br/>
    <br/>
    <table class='table table-hover' style='width: 500px' id='sesiones'>
        <th><center style='font-size: 20px; color: black'>Asistencia</center></th>
        <th><center style='font-size: 20px; color: black'>Observaciones</center></th>
        <th><center style='font-size: 20px; color: black'>Fecha</center></th>";
while ($rs = mysql_fetch_array($datos)) {
//    $_SESSION["nombreTutor"]=$rs["nomTutor"];
    echo"
         <tr>
             <td style='width: 100px'>" . $rs['asistencia'] . "</td>
             <td style='width: 300px%'>" . $rs['comentarios'] . "</td>
             <td style='width: 100px% '>" . $rs['fecha'] . "</td>
          </tr>
         </table>";
}
?>
