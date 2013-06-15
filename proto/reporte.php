<div >
    <?php
    session_start();
    $nombre = $_SESSION["nombre"];
    $apellido = $_SESSION["apellido"];
    include './conexion_1.php';
    ?>
    <?php
    require './dompdf_0-6-0_beta3/dompdf/dompdf_config.inc.php';
    $interfaz.='
       <div>
       <img style="float: left" src = "images/logo.png"/>
       <center>
       <div style="float:rigth"><h1 float="rigth">Instituto Tecnologico de Mérida</h1></div>
       </center>       
       </div>
        <center>
         <h1>Informe de Resultados</h1>
         <br/>
         <h3>Evaluacion del desempeño del tutor</h3>          
         <p>Se confirma que el alumno : '. $nombre.' &nbsp; '. $apellido.' ha calificado a su Tutor adecuadamente</p>
</center>
';
    $codigo = utf8_decode($interfaz);
    $dompdf = new DOMPDF();
    $dompdf->load_html($codigo);
    ini_set("memory_limit", "90M");
    $dompdf->set_paper('letter', 'landscape');
    $dompdf->render();
    $dompdf->stream("Tabladinamica.pdf", array('Attachment' => 0));
    ?>
</div>
