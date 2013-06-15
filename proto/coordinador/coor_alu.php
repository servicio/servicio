<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Alumnos</title>
    </head>

    <body>
        <?php
        include '../conexion_1.php';
        $idTutor = $_GET['id'];
        $fallo = 'Sin alumnos';
        session_start();
        if ($_GET['id'] == 0) {
            echo "<select name='alumno' id='alumno'>";
            echo "<option value='0'> Seleccione al alumno</option>";
            echo "</select>";
        } else {
            $consulta = mysql_query("SELECT * FROM reg_tutor, usuario, persona, tutor WHERE reg_tutor.id_tutor = '$idTutor' AND reg_tutor.matricula = usuario.usuario AND usuario.idPersona = persona.id and reg_tutor.id_tutor = tutor.id;", Conectarse());
            echo "<select name='alumnos' id='alumnos'>";
            echo "<option value='0'> Seleccione al alumno</option>";
            $dato=0;
            while ($fila = mysql_fetch_array($consulta)) {
                if($dato==0){
                     $_SESSION["nombreTutor"] = $fila["nomTutor"];
                     $dato++;
                }
                if ($fila[4] == 0) {
                    echo "<option value='0'>" . $fallo . "</option>";
                } else {

                    echo "<option value='" . $fila[0] . "'>" . utf8_encode($fila[11]) . "</option>";
                }
                echo "</select>";
            }
        }
        ?>
    </body>
</html>