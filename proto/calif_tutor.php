<center>
    <div style="background-color: #b9b8b8; height: 690px; width: 900px">
        <?php
        include './banner.php';
        $fechaActual = date("Y-m-d");
        $sql = "SELECT * FROM fechaevaluacion ORDER BY id DESC LIMIT 0,1";
        $dato = mysql_query($sql, Conectarse());
        while ($rs = mysql_fetch_array($dato)) {
            $fechaEvaluacion = $rs["fecha"];
        }
        if ($fechaActual < $fechaEvaluacion) {
            echo '<script> alert("Todavia no son fechas")</script>';
            echo '<script> window.location = "introduccion.php"; </script>';
        } else {
            session_start();
            $idUsua = $_SESSION["idUsuario"];
            $usuario = $_SESSION["usuario"];

            $sql = "Select * from evaluacion where idUsuario = '$usuario'";
            $dato = mysql_query($sql, Conectarse());
            $validar = null;
            $dato1 = mysql_affected_rows();
            if ($dato1 == 0) {
                ?>
                <html>
                    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>
                    <body>
                        <form method="post">
                            <div align="center">

                                <br/>
                            </div>
                            <?php
                            include './menu.php';
                            ?>
                            <div style="margin-left: 150px">
                                <fieldset style="width: 500px"><b>Al comienzo de la tutoria explico los objetivos</b> <br>
                                    <input type="radio" name="opc1" value="bueno" >Si
                                    <input type="radio" name="opc1" value="regular" >Mas o menos
                                    <input type="radio" name="opc1" value="malo" >No
                                    <br><br>

                                    <b>El criterio de ense&ntilde;anaza del tutor te parecio</b> <br>
                                    <input type="radio" name="opc2" value="bueno" >Si
                                    <input type="radio" name="opc2" value="regular" >Mas o menos
                                    <input type="radio" name="opc2" value="malo" >No
                                    <br><br>

                                    <b>Asistio el maestro a todas las tutorias</b> <br>
                                    <input type="radio" name="opc3" value="bueno" >Si
                                    <input type="radio" name="opc3" value="regular" >Mas o menos
                                    <input type="radio" name="opc3" value="malo" >No
                                    <br><br>


                                    <b>Fue claro con sus metodos de ense&ntilde;anza</b> <br>
                                    <input type="radio" name="opc4" value="bueno" >Si
                                    <input type="radio" name="opc4" value="regular" >Mas o menos
                                    <input type="radio" name="opc4" value="malo" >No
                                    <br><br>


                                    <b>Mejoraste en tus calificaiones con las tutorias</b> <br>
                                    <input type="radio" name="opc5" value="bueno" >Bueno
                                    <input type="radio" name="opc5" value="regular" >Regular
                                    <input type="radio" name="opc5" value="malo" >No
                                    <br><br>
                                    <?php
                                    $mySqL = "select * from materias_cargadas_usuario, materias where idusuario = '$idUsua' and materias_cargadas_usuario.idMaterias = materias.id  and cursando= 1";
                                    $guardar = mysql_query($mySqL, Conectarse());
                                    $contador = 0;
                                    while ($rs = mysql_fetch_array($guardar)) {
                                        $idMa[$contador] = $rs[1];
                                        $materias = $rs["materias"];
                                        echo utf8_encode("<b>$materias</b>");
                                        ?>
                                        <br/>
                                        <input type="radio" name="dato<?php echo $contador ?>" value="siPase"/>Pase
                                        <input type="radio" name="dato<?php echo $contador; ?>" value="noPase"/>No Pase
                                        <br/>
                                        Calificacion<input  style="width: 50px" type="text" name="calificacion<?php echo $contador; ?>"/>
                                        <br/>
                                        <?php
                                        $contador++;
                                    }
                                    ?>
                                    <input type="submit" value="Enviar" name="dato"/> 
                                </fieldset>
                            </div>
                        </form>
                    </body>
                </html>
                <?php
//}
                if ($_REQUEST["dato"] != null) {
                    $usuario = $_SESSION['usuario'];
// SIRVE PARA OBTENER LA INFORMACION DE UN JRADIO DINAMICO
                    $longitud = mysql_affected_rows();
//    $datos;
//    $calificaciones;
//    $sentencias;
                    for ($i = 0; $i < $longitud; $i++) {
                        $valor = "dato$i";
                        $calificacion = "calificacion$i";
                        $datos[$i] = $_POST[$valor]; //;ARREGLO DE ACREDITACION
                        $calificaciones[$i] = $_POST["$calificacion"]; //ARREGLO DE CALIFICACION
                        $sentencias[$i] = "INSERT INTO historial_academico(Matricula, id_materia, calificacion, acredito) VALUES('$usuario','$idMa[$i]','$calificaciones[$i]','$datos[$i]')";
                    }
                    for ($i = 0; $i < $longitud; $i++) {
                        $dato = mysql_query($sentencias[$i], Conectarse());
                    }

                    $opc1 = $_REQUEST['opc1'];
                    $opc2 = $_REQUEST['opc2'];
                    $opc3 = $_REQUEST['opc3'];
                    $opc4 = $_REQUEST['opc4'];
                    $opc5 = $_REQUEST['opc5'];
                    mysql_query("INSERT INTO guar_evaluacion (pregunta1, pregunta2, pregunta3, pregunta4, pregunta5, matricula)VALUES ('$opc1', '$opc2', '$opc3', '$opc4', '$opc5', '$usuario')", Conectarse());
                    mysql_query("INSERT INTO evaluacion (idUsuario, evaluo) VALUES('$usuario', '1')", Conectarse());
                    header('Location: calif_tutor.php');
                }
            } else {
                $sqlEvaluacion = "SELECT * FROM materias_cargadas_usuario mc, materias m, historial_academico hc, usuario u where mc.idmaterias=m.id  and hc.id_materia=mc.idmaterias and hc.Matricula=u.usuario and u.id = mc.idusuario and matricula='$usuario'";
                $dat = mysql_query($sqlEvaluacion);
                ?>
                <br/>
                <br/>
                <div style=" float: right; margin-right: 400px">
                    <a target="_blanck" href="reporte.php" > <img src="coordinador/images/PdfWeb.png"/></a>
                </div>
                <center>
                    <br/>
                    <br/>
                    <table>
                        <thead>
                        <td><center><strong>Materia del Semestre</strong></center></td>
                        <td><center><strong>Materia</strong></center></td>
                        <td><center><strong>Calificacion</strong></center></td>
                        </thead>
                        <?php
                        $contador = 0;
                        while ($rs = mysql_fetch_array($dat)) {
                            ?>
                            <tr  bgcolor="<?php
                            if ($contador % 2 == 0) {
                                echo '#fefcdd';
                            } else {
                                echo '#b9b8b8';
                            }
                            ?>">
                                <td ><center><?php echo$rs[8]; ?></center></td>
                            <td><?php echo $rs["materias"]; ?></td>
                            <td><center><?php echo $rs["calificacion"]; ?></center></td>
                            <tr/> 
                            <?php
                            $contador++;
                        }
                        ?>
                    </table>
                </center>



                <?php
            }
        }
        ?>
                <br/><br/><br/><br/><br/>
        <img src="images/footer.png"/>
    </div>
</center>