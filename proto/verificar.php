<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
include './conexion_1.php';
 Conectarse();
 ?>
<?php
 session_start();
 $dato = $_SESSION['usuario'];
 $consulta = mysql_query("select reg_tutor.id_tutor from reg_tutor where reg_tutor.matricula = '$dato'");
while($fila = mysql_fetch_array($consulta))
{
	$tutor = $fila["id_tutor"];
}
if($tutor !=0){
	header("location:calif_tutor.php");
}
else
{
	header("location:inscribe_tutor.php");
}
?>
</body>
</html>