<?php

session_start();
include '../conexion_1.php';
$idTutor = $_GET['idTutor'];
$control = $_GET["idcontrol"];
$_SESSION["idTutor2"] = $idTutor;
$idU = $_SESSION["idUsuario"];
$idTu = $_SESSION["idTuto"];
$_SESSION["idTuto"] = $idTutor;
$idUsuario = $_SESSION["idAlumno"];
$_SESSION["idUsuario"] = $idUsuario;

if ($control == 0) {
    $sql = "SELECT * FROM reporte_tutor, tutor where id_tutor = $idTutor and id_alumno = $idUsuario and id_tutor= tutor.id";
    $datos = mysql_query($sql, Conectarse());
    $_SESSION["idTuto"] = $idTutor;
    echo"<br/><table  class='table table-hover' style='width: 500px' id='sesiones'>
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
} else {
    $sqlC = "SELECT * FROM reporte_tutor, tutor where id_tutor = $idTu and id_alumno = $idU and id_tutor= tutor.id";
    $_SESSION["idTuto"] = $idTu;
    $datos = mysql_query($sqlC, Conectarse());
    while ($rs = mysql_fetch_array($datos)) {
//    $_SESSION["nombreTutor"]=$rs["nomTutor"];
        echo"<br/><table class='table table-hover' style='width: 500px' id='sesiones'>
        <th><center style='font-size: 20px; color: black'>Asistencia</center></th>
        <th><center style='font-size: 20px; color: black'>Observaciones</center></th>
        <th><center style='font-size: 20px; color: black'>Fecha</center></th>
         <tr>
             <td style='width: 100px'>" . $rs['asistencia'] . "</td>
             <td style='width: 300px%'>" . $rs['comentarios'] . "</td>
             <td style='width: 100px% '>" . $rs['fecha'] . "</td>
          </tr>
         </table>";
    }
}
?>
