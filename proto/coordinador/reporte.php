<div>
    <?php
    @session_start();
    include '../conexion_1.php';
    $idTutor=$_SESSION["idTuto"];
    $matricula=$_SESSION["matricula"];
    $nombreTutor=$_SESSION["nombreTutor"];
    $idUsuario = $_SESSION["idUsuario"];
    $alumno = $_SESSION["nombreUsuario"];
    $apellido = $_SESSION["apellidoUsuario"];
    $Semestre=$_SESSION["semestre"];
    $sql = "SELECT * FROM reporte_tutor where id_tutor = $idTutor and id_alumno = $idUsuario";
//    $sql = "select * from materias where idMaterias= $materia";
    $materiaNombre = mysql_query($sql, Conectarse());
    mysql_close();
    while ($resultado = mysql_fetch_array($materiaNombre)) {
    }
    ?>
    <?php
    require '../dompdf_0-6-0_beta3/dompdf/dompdf_config.inc.php';
//    $idMateria = $_SESSION['materia'];
    $tabla = "SELECT * FROM reporte_tutor where id_tutor = $idTutor and id_alumno = $idUsuario";
//    $tabla = "Select * from planeacion where idMateria = $idMateria";
    $rs_equipos = mysql_query($tabla, Conectarse());
//    $rs_equipos = resultSet($slq);
    $interfaz.='
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <style type="text/css">

            @page {
                margin: 2cm;
            }

            body {
                font-family: sans-serif;
                margin: 0.5cm 0;
                text-align: justify;
            }

            #header,
            #footer {
                position: fixed;
                left: 0;
                right: 0;
                color: #aaa;
                font-size: 0.9em;
            }

            #header {
                top: 0;
                border-bottom: 0.1pt solid #aaa;
            }

            #footer {
                bottom: 0;
                border-top: 0.1pt solid #aaa;
            }

            #header table,
            #footer table {
                width: 100%;
                border-collapse: collapse;
                border: none;
            }

            #header td,
            #footer td {
                padding: 0;
                width: 50%;
            }

            .page-number {
                text-align: center;
            }
            
            .corte :before{
                 page-break-after: auto;
                 counter-increment: corte;
            }
            
            .page-number:before {
                counter-increment: pages;
                content: string(chapter-title);
                content: counter(page);
                content: "Page " counter(page);
            }

            hr {
                page-break-after: always;
                border: 0;
            }
        </style>
       <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
            <div id="footer">
                <div class="page-number"></div>
            </div>
            <div>
            <head>
            </head>
            <div align="center">
            <img src="images/desempeno.png"/>
            </div>
            <br/>
            <br/>
             <div >
             <fieldset style="width: 300px">
             <legend>Datos Personales</legend>
                    &nbsp;&nbsp;&nbsp;<strong>Alumno: '. $alumno .'&nbsp;'. $apellido.'</strong>
                        <br/>
                    &nbsp;&nbsp;&nbsp;<strong>Matricula: '.$matricula.'</strong>
                        <br/>
                    &nbsp;&nbsp;&nbsp;<strong>Semestrre: '. $Semestre .'</strong>
             </fieldset>
             
             </div>
             <br/>
             <fieldset style="width: 300px">
             <legend>Tutor</legend>
                    &nbsp;&nbsp;&nbsp;<strong>Tutor: '. $nombreTutor .'</strong>
             </fieldset>
             <br/>
          <table  style=" width:800px; margin-left: 25px">
            <thead style="position: fixed">
                <tr>
                <br>
                    <td><center><strong>Asistencia</strong></center></td>
                    <td><center><strong>Observaciones</strong></center></td>
                    <td><center><strong>Fecha</strong></center></td>
                </tr>
            </thead>';
    while ($dato = mysql_fetch_array($rs_equipos)) {
        $interfaz.=
                '<tr>
                <td style="width: 20%"> <center><font size="1">' . $dato["asistencia"] . '</font></center></td>    
                <td style="width: 60%"> <center><font size="1">' . $dato["comentarios"] . '</font></center></td>
                <td style="width: 20%"> <center><font size="1">' . $dato["fecha"] . '</font></center></td>
                </tr>
                <tr>
                        <td colspan="9">
                            <hr/> 
                        </td>
               </tr>';
    }
    $interfaz.=
            '</center>
        </div>
        </table>
        </div>';
    $codigo = utf8_encode($interfaz);
    $dompdf = new DOMPDF();
//    $dompdf->load_html(utf8_encode($codigo)); 
    $dompdf->load_html($codigo);
    ini_set("memory_limit", "90M");
//    $dompdf->set_paper('letter');S
    $dompdf->set_paper('letter', 'landscape');
    $dompdf->render();
    $dompdf->stream("Tabladinamica.pdf", array('Attachment' => 0));
    ?>
</div>
