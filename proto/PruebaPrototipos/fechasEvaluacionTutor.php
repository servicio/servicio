<?php
include '../conexion_1.php';
if ($_REQUEST[guardar] != null) {
    $fecha = $_POST["fecha"];
    $sql = "insert into fechaevaluacion (fecha) VALUES ('$fecha')";
    mysql_query($sql, Conectarse());
}
?>
<html>
    <body>
        <form method="post">
            <input type="date" name="fecha"/>
            <input type="submit"  value="guardar" name="guardar"/>
        </form>
    </body>
</html>