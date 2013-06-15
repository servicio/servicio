<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<form method="post">
<select name="diat">
<option value="0">Seleccione dia de la Tutoria</option>
<option value="Lunes" >Lunes</option>
<option value="Martes">Martes</option>
<option value="Miercoles">Miercoles</option>
<option value="Jueves">Jueves</option>
<option value="Viernes">Viernes</option>
</select>
<input type="submit" name="enviar" value="enviar"/>
<?php
if($_REQUEST['enviar']!=null){
	$horatutor = $_REQUEST['diat'];
	echo $horatutor;
}
?>
</form>
</body>
</html>