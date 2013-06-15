<div>
    <?php
    session_start();
    include '../conexion_1.php';
    $sql1 = " SELECT * FROM materias_cargadas_usuario mc, materias m, historial_academico hc, usuario u where mc.idmaterias=m.id and m.semestre=1 and hc.id_materia=mc.idmaterias and hc.Matricula=u.usuario and u.id = mc.idusuario and matricula='e09080264'";
    $datos1 = mysql_query($sql1, Conectarse());
    $y = mysql_affected_rows();
    $x = 0;
    ?>
    <?php
    require '../dompdf_0-6-0_beta3/dompdf/dompdf_config.inc.php';
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
            <div> <fieldset';
    while($rs=  mysql_query($datos1)){
         $cali = $rs["calificacion"];
         $materiacargada = $rs["cursando"];
        if ($rs["cursando"] == 1 && $cali >= 70) {
        $interfaz.= 'style="background-image: url("images/aprobado.png") ; width: 100px">';
        }
        else if ($materiacargada == 1 && $cali < 70) {
            $interfaz.= 'style="background-image: url("images/noAprobado.png") ; width: 100px">';
        }
        else if ($cali < 70){
            $interfaz.= 'style="background-color: #e3a1a1; width: 100px"';
        }
        else if($cali >= 70){
            $interfaz.= 'style="background-color: #b6d7a7; width: 100px"';
        }
        $interfaz.= ' 
             '. $rs["materias"].'
             </fieldset>';
     }
   
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
