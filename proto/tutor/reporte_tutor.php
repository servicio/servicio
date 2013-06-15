<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<div align="center">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Reporte del Tutor</title>
            <link rel="stylesheet" type="text/css" href="../css/css.css"/>
            <link rel="stylesheet" type="text/css" href="../bootsTrap/css/bootstrap.css"/>
            <link rel="stylesheet" type="text/css" href="../css/esqueleto.css"/>
            <script src="../bootsTrap/js/jquery.min.js"></script>
        </head>
        <body>
            <div align="center" style="width: 869px; background-color: #eeeeed">
                <img src="images/BannerTutor.png"/>
                <?php
                session_start();
                ?>
                <?php
                include '../conexion_1.php';
                Conectarse();
                ?>

                <form method="post">
                    <div style="float: right; margin-right: 30px">
                        <a href="cerrarSession.php"><img src="../images/cerrar sesion.png"/></a>
                    </div>
                    <br/>
                    <br/>
                    <div style="float: left">
                        <select name='alu' id='tut'>
                            <option>Seleccione al alumno a su cargo</option>
                            <?php
                            $tut = $_SESSION['idTutor'];
                            $consulta = mysql_query("SELECT * FROM reg_tutor, usuario, persona WHERE reg_tutor.id_tutor = '$tut' AND reg_tutor.matricula = usuario.usuario AND usuario.idPersona = persona.id");
                            while ($fila = mysql_fetch_array($consulta)) {
                                echo "<option value='" . $fila[0] . "'>" . "&nbsp;" . utf8_encode($fila[11]) . "</option>";
                            }
                            ?>
                        </select>
                    </div><br /><br />
                    <input type="radio" name="asistencia" value="Asistio"/>
                    Asistio a Tutoria&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="asistencia" value="No Asistio"/>
                    No asistio a Tutoria<br /><br />
                    <textarea name="comen" cols="60" rows="10"></textarea><br /><br />
                    <input class="btn btn-success" name="guardar" type="submit" style="width:100px;" value="Guardar" />
                    <input class="btn btn-danger" name="guardar" type="reset" style="width:100px;" value="Borrar" />
                </form>
                <?php
                if ($_REQUEST['guardar'] != null) {
                    $fechaActual = date("Y-m-d");
                    $id_alumno = $_REQUEST['alu'];
                    $asis = $_REQUEST['asistencia'];
                    $com = $_REQUEST['comen'];
                    mysql_query("INSERT INTO prototipos.reporte_tutor (id_tutor, id_alumno,asistencia, comentarios, fecha) VALUES ('$tut', '$id_alumno', '$asis','$com', '$fechaActual')");
                }
                ?>
                <br/>
                <br/>
                <img src="../images/footer.png"/>
            </div>
        </body>
    </html>
</div>