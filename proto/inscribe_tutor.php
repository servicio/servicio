<?php
session_start();
//include 'banner.php';
?>
<?php
include 'menu.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro de Tutor</title>
</head>
<body>
<?php
include './conexion_1.php';
Conectarse();
?>
<fieldset style="width:500px">
<form method="post">
<table>
<tr>
<td>
Tutor:
</td>
<td>
<select id="tutor" name="tutor" style="width:155px"/>
<option value="0">Tutores disponibles</option>
<?php
$consulta = mysql_query("select * from tutor");
while($fila = mysql_fetch_array($consulta))
{
	echo "<option value='" . $fila[0] . "'>" . $fila[1] . "</option>";
}
?>
</td>
</tr>
<tr>
<td>
Dia de Tutoria:
</td>
<td>
<select name="diat">
<option value="0">Seleccione dia de la Tutoria</option>
<option value="Lunes" >Lunes</option>
<option value="Martes">Martes</option>
<option value="Miercoles">Miercoles</option>
<option value="Jueves">Jueves</option>
<option value="Viernes">Viernes</option>
</select>
</td>
</tr>
<tr>
<td>
Horario de Tutoria:
</td>
<td>
<input type="text" name="horatutor" style="width:150px"/>
</td>
</tr>
</table>
<tr><td>
<input type="submit" name="enviar" value="enviar"/></td></tr>
<?php
if($_REQUEST['enviar']!=null){
	$horatutor = $_REQUEST['horatutor'];
	$diatutor = $_REQUEST['diat'];
	$matricula = $_SESSION['usuario'];
	$tutor = $_REQUEST['tutor'];
	mysql_query ("INSERT INTO prototipos.reg_tutor (dia_tutoria, horario_tutoria,matricula, id_tutor) VALUES ('$diatutor', '$horatutor', '$matricula', $tutor)");
	header("location:introduccion.php");
}
?>
</form>
</fieldset>
</div>
</body>
</html>