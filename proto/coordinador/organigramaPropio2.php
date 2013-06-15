<?php
session_start();

include '../conexion_1.php';
Conectarse();
$matricula = $_SESSION["matricula2"];
?>
<div>
    <img src="images/Aprobadas.png"/>
</div>
<div align="center">
    <fieldset style="width: 100px">
        Organizaci&oacute;n de Semestres
    </fieldset>
</div>
<br/>
<br/>
<div style="width: 100% ; margin-left: 40px">
    <div style="float: left;">
        <fieldset style="width: 100px">
            <strong>  Semestre 1</strong>
        </fieldset>
        <img style="margin-left: 50px" src="images/flechas.png"/>
        <?php
        $sql1 = " SELECT * FROM materias_cargadas_usuario mc, materias m, historial_academico hc, usuario u where mc.idmaterias=m.id and m.semestre=1 and hc.id_materia=mc.idmaterias and hc.Matricula=u.usuario and u.id = mc.idusuario and matricula='$matricula'";
        $datos1 = mysql_query($sql1);
        $y = mysql_affected_rows();
        $x = 0;
        while ($rs = mysql_fetch_array($datos1)) {
            $cali = $rs["calificacion"];
            $materiacargada = $rs["cursando"];
            ?>
            <fieldset <?php if ($materiacargada == 1 && $cali >= 70) { ?> style="  background-image:url('images/aprobadaCurso.png'); width: 100px" <?php }if ($materiacargada == 1 && $cali < 70) { ?> style="background-image:url('images/ReprobadaCurso.png'); width: 100px" <?php } else if ($cali < 70) { ?> style="background-color: #e3a1a1; width: 100px"<?php } else if ($cali >= 70) { ?>style="background-color: #b6d7a7; width: 100px" <?php } ?>>
                <div style=" float: right"><?php echo $rs["oportunidades"]; ?></div>
                <br/>
                <?php echo $rs["materias"]; ?>
                <br/>
                Calificaci&oacute;n:&nbsp; <?php echo $rs["calificacion"]; ?>
            </fieldset>
            <?php if ($x < $y - 1) { ?>
                <img style="margin-left: 50px" src="images/flechas.png"/>
                <?php
            }
            $x++;
        }
        ?>
    </div>
    <div style="float: left;">

        <fieldset style="width: 100px"></strong>
            <strong> Semestre 2</strong>
        </fieldset>
        <img style="margin-left: 50px" src="images/flechas.png"/>
        <?php
        $sql2 = "  SELECT * FROM materias_cargadas_usuario mc, materias m, historial_academico hc, usuario u where mc.idmaterias=m.id and m.semestre=2 and hc.id_materia=mc.idmaterias and hc.Matricula=u.usuario and u.id = mc.idusuario and matricula='$matricula'";
        $datos2 = mysql_query($sql2);
        $y = mysql_affected_rows();
        $x = 0;
        while ($rs = mysql_fetch_array($datos2)) {
            $cali = $rs["calificacion"];
            $materiacargada = $rs["cursando"];
            ?>
            <fieldset <?php if ($materiacargada == 1 && $cali >= 70) { ?> style="  background-image:url('images/aprobadaCurso.png'); width: 100px" <?php }if ($materiacargada == 1 && $cali < 70) { ?> style="background-image:url('images/ReprobadaCurso.png'); width: 100px" <?php } else if ($cali < 70) { ?> style="background-color: #e3a1a1; width: 100px"<?php } else if ($cali >= 70) { ?>style="background-color: #b6d7a7; width: 100px" <?php } ?>>
                <div style=" float: right"><?php echo $rs["oportunidades"]; ?></div>              
                <br/>
                <?php echo $rs["materias"]; ?>
                <br/>
                Calificaci&oacute;n:&nbsp; <?php echo $rs["calificacion"]; ?>
            </fieldset>
            <?php if ($x < $y - 1) { ?>
                <img style="margin-left: 50px" src="images/flechas.png"/>
                <?php
            }
            $x++;
        }
        ?>
    </div>
    <div style="float: left;">
        <fieldset style="width: 100px">
            <strong> Semestre 3</strong>
        </fieldset>
        <img style="margin-left: 50px" src="images/flechas.png"/>
        <?php
        $sql3 = "  SELECT * FROM materias_cargadas_usuario mc, materias m, historial_academico hc, usuario u where mc.idmaterias=m.id and m.semestre=3 and hc.id_materia=mc.idmaterias and hc.Matricula=u.usuario and u.id = mc.idusuario and matricula='$matricula'";
        $datos3 = mysql_query($sql3);
        $y = mysql_affected_rows();
        $x = 0;
        while ($rs = mysql_fetch_array($datos3)) {
            $cali = $rs["calificacion"];
            $materiacargada = $rs["cursando"];
            ?>
            <fieldset <?php if ($materiacargada == 1 && $cali >= 70) { ?> style="  background-image:url('images/aprobadaCurso.png');width: 100px" <?php }if ($materiacargada == 1 && $cali < 70) { ?> style="background-image:url('images/ReprobadaCurso.png'); width: 100px" <?php } else if ($cali < 70) { ?> style="background-color: #e3a1a1; width: 100px"<?php } else if ($cali >= 70) { ?>style="background-color: #b6d7a7; width: 100px" <?php } ?>>
                <div style=" float: right"><?php echo $rs["oportunidades"]; ?></div>
                <br/>               
                <?php echo $rs["materias"]; ?>
                <br/>
                Calificaci&oacute;n:&nbsp;    <?php echo $rs["calificacion"]; ?>
            </fieldset>
            <?php if ($x < $y - 1) { ?>
                <img style="margin-left: 50px" src="images/flechas.png"/>
                <?php
            }
            $x++;
        }
        ?>
    </div>
    <div style="float: left;">
        <fieldset style="width: 100px">
            <strong> Semestre 4</strong>
        </fieldset>
        <img  style="margin-left: 50px" src="images/flechas.png"/>
        <?php
        $sql4 = " SELECT * FROM materias_cargadas_usuario mc, materias m, historial_academico hc, usuario u where mc.idmaterias=m.id and m.semestre=4 and hc.id_materia=mc.idmaterias and hc.Matricula=u.usuario and u.id = mc.idusuario and matricula='$matricula'";
        $datos4 = mysql_query($sql4);
        $y = mysql_affected_rows();
        $x = 0;
        while ($rs = mysql_fetch_array($datos4)) {
            $cali = $rs["calificacion"];
            $materiacargada = $rs["cursando"];
            ?>
            <fieldset <?php if ($materiacargada == 1 && $cali >= 70) { ?> style=" background-image:url('images/aprobadaCurso.png'); width: 100px" <?php }if ($materiacargada == 1 && $cali < 70) { ?> style="background-image:url('images/ReprobadaCurso.png'); width: 100px" <?php } else if ($cali < 70) { ?> style="background-color: #e3a1a1; width: 100px"<?php } else if ($cali >= 70) { ?>style="background-color: #b6d7a7; width: 100px" <?php } ?>>
                <div style=" float: right"><?php echo $rs["oportunidades"]; ?></div>
                <br/>               
                <?php echo $rs["materias"]; ?>
                <br/>
                Calificaci&oacute;n:&nbsp;  <?php echo $rs["calificacion"]; ?>
            </fieldset>
            <?php if ($x < $y - 1) { ?>
                <img style="margin-left: 50px" src="images/flechas.png"/>
                <?php
            }
            $x++;
        }
        ?>
    </div>
    <div style="float: left;">
        <fieldset style="width: 100px">
            <strong>Semestre 5</strong>
        </fieldset>
        <img  style="margin-left: 50px" src="images/flechas.png"/>
        <?php
        $sql5 = " SELECT * FROM materias_cargadas_usuario mc, materias m, historial_academico hc, usuario u where mc.idmaterias=m.id and m.semestre=5 and hc.id_materia=mc.idmaterias and hc.Matricula=u.usuario and u.id = mc.idusuario and matricula='$matricula'";
        $datos5 = mysql_query($sql5);
        $y = mysql_affected_rows();
        $x = 0;
        while ($rs = mysql_fetch_array($datos5)) {
            $cali = $rs["calificacion"];
            $materiacargada = $rs["cursando"];
            ?>
            <fieldset <?php if ($materiacargada == 1 && $cali >= 70) { ?> style="  background-image:url('images/aprobadaCurso.png'); width: 100px" <?php }if ($materiacargada == 1 && $cali < 70) { ?> style="background-image:url('images/ReprobadaCurso.png'); width: 100px" <?php } else if ($cali < 70) { ?> style="background-color: #e3a1a1; width: 100px"<?php } else if ($cali >= 70) { ?>style="background-color: #b6d7a7; width: 100px" <?php } ?>>
                <div style=" float: right"><?php echo $rs["oportunidades"]; ?></div>
                <br/>
                <?php echo $rs["materias"]; ?>
                <br/>
                Calificaci&oacute;n:&nbsp;      <?php echo $rs["calificacion"]; ?>
            </fieldset>
            <?php if ($x < $y - 1) { ?>
                <img style="margin-left: 50px" src="images/flechas.png"/>
                <?php
            }
            $x++;
        }
        ?>
    </div>
    <div style="float: left;">
        <fieldset style="width: 100px">
            <strong>  Semestre 6</strong>
        </fieldset>
        <img  style="margin-left: 50px" src="images/flechas.png"/>
        <?php
        $sql6 = " SELECT * FROM materias_cargadas_usuario mc, materias m, historial_academico hc, usuario u where mc.idmaterias=m.id and m.semestre=6 and hc.id_materia=mc.idmaterias and hc.Matricula=u.usuario and u.id = mc.idusuario and matricula='$matricula'";
        $datos6 = mysql_query($sql6);
        $y = mysql_affected_rows();
        $x = 0;
        while ($rs = mysql_fetch_array($datos6)) {
            $cali = $rs["calificacion"];
            $materiacargada = $rs["cursando"];
            ?>
            <fieldset <?php if ($materiacargada == 1 && $cali >= 70) { ?> style="  background-image:url('images/aprobadaCurso.png'); width: 100px" <?php }if ($materiacargada == 1 && $cali < 70) { ?> style="background-image:url('images/ReprobadaCurso.png'); width: 100px" <?php } else if ($cali < 70) { ?> style="background-color: #e3a1a1; width: 100px"<?php } else if ($cali >= 70) { ?>style="background-color: #b6d7a7; width: 100px" <?php } ?>>
                <div style=" float: right"><?php echo $rs["oportunidades"]; ?></div>
                <br/>               
                <?php echo $rs["materias"]; ?>
                <br/>
                Calificaci&oacute;n:&nbsp;  <?php echo $rs["calificacion"]; ?>
            </fieldset>
            <?php if ($x < $y - 1) { ?>
                <img style="margin-left: 50px" src="images/flechas.png"/>
                <?php
            }
            $x++;
        }
        ?>
    </div>
    <div style="float: left;">
        <fieldset style="width: 100px">
            <strong>Semestre 7</strong> 
        </fieldset>
        <img  style="margin-left: 50px" src="images/flechas.png"/>
        <?php
        $sql7 = " SELECT * FROM materias_cargadas_usuario mc, materias m, historial_academico hc, usuario u where mc.idmaterias=m.id and m.semestre=7 and hc.id_materia=mc.idmaterias and hc.Matricula=u.usuario and u.id = mc.idusuario and matricula='$matricula'";
        $datos7 = mysql_query($sql7);
        $y = mysql_affected_rows();
        $x = 0;
        while ($rs = mysql_fetch_array($datos7)) {
            $cali = $rs["calificacion"];
            $materiacargada = $rs["cursando"];
            ?>
            <fieldset <?php if ($materiacargada == 1 && $cali >= 70) { ?> style="  background-image:url('images/aprobadaCurso.png'); width: 100px" <?php }if ($materiacargada == 1 && $cali < 70) { ?> style="background-image:url('images/ReprobadaCurso.png'); width: 100px" <?php } else if ($cali < 70) { ?> style="background-color: #e3a1a1; width: 100px"<?php } else if ($cali >= 70) { ?>style="background-color: #b6d7a7; width: 100px" <?php } ?>>
                <div style=" float: right"><?php echo $rs["oportunidades"]; ?></div>              
                <br/>
                <?php echo $rs["materias"]; ?>
                <br/>
                Calificaci&oacute;n:&nbsp;    <?php echo $rs["calificacion"]; ?>
            </fieldset>
            <?php if ($x < $y - 1) { ?>
                <img style="margin-left: 50px" src="images/flechas.png"/>
                <?php
            }
            $x++;
        }
        ?>
    </div>
    <div style="float: left;">
        <fieldset style="width: 100px">
            <strong> Semestre 8</strong>
        </fieldset>
        <img style="margin-left: 50px"  src="images/flechas.png"/>
        <?php
        $sql8 = "  SELECT * FROM materias_cargadas_usuario mc, materias m, historial_academico hc, usuario u where mc.idmaterias=m.id and m.semestre=8 and hc.id_materia=mc.idmaterias and hc.Matricula=u.usuario and u.id = mc.idusuario and matricula='$matricula'";
        $datos8 = mysql_query($sql8);
        $y = mysql_affected_rows();
        $x = 0;
        while ($rs = mysql_fetch_array($datos8)) {
            $cali = $rs["calificacion"];
            $materiacargada = $rs["cursando"];
            ?>
            <fieldset <?php if ($materiacargada == 1 && $cali >= 70) { ?> style=" background-image:url('images/aprobadaCurso.png'); width: 100px" <?php }if ($materiacargada == 1 && $cali < 70) { ?> style="background-image:url('images/ReprobadaCurso.png'); width: 100px" <?php } else if ($cali < 70) { ?> style="background-color: #e3a1a1; width: 100px"<?php } else if ($cali >= 70) { ?>style="background-color: #b6d7a7; width: 100px" <?php } ?>>
                <div style=" float: right"><?php echo $rs["oportunidades"]; ?></div>               
                <br/>
                <?php echo $rs["materias"]; ?>
                <br/>
                Calificaci&oacute;n:&nbsp;    <?php echo $rs["calificacion"]; ?>
            </fieldset>
            <?php if ($x < $y - 1) { ?>
                <img style="margin-left: 50px" src="images/flechas.png"/>
                <?php
            }
            $x++;
        }
        ?>
    </div>
    <div style="float: left;">
        <fieldset style="width: 100px">
            <strong>  Semestre 9</strong>
        </fieldset>
        <img  style="margin-left: 50px" src="images/flechas.png"/>
        <?php
        $sql9 = " SELECT * FROM materias_cargadas_usuario mc, materias m, historial_academico hc, usuario u where mc.idmaterias=m.id and m.semestre=9 and hc.id_materia=mc.idmaterias and hc.Matricula=u.usuario and u.id = mc.idusuario and matricula='$matricula'";
        $datos9 = mysql_query($sql9);
        $y = mysql_affected_rows();
        $x = 0;
        while ($rs = mysql_fetch_array($datos9)) {
            $cali = $rs["calificacion"];
            $materiacargada = $rs["cursando"];
            ?>
            <fieldset <?php if ($materiacargada == 1 && $cali >= 70) { ?> style=" background-image:url('images/aprobadaCurso.png'); width: 100px" <?php }if ($materiacargada == 1 && $cali < 70) { ?> style="background-image:url('images/ReprobadaCurso.png'); width: 100px" <?php } else if ($cali < 70) { ?> style="background-color: #e3a1a1; width: 100px"<?php } else if ($cali >= 70) { ?>style="background-color: #b6d7a7; width: 100px" <?php } ?>>
                <div style=" float: right"><?php echo $rs["oportunidades"]; ?></div>
                <br/>
                <?php echo $rs["materias"]; ?>
                <br/>

                Calificaci&oacute;n:&nbsp;<?php echo $rs["calificacion"]; ?>

            </fieldset>
            <?php if ($x < $y - 1) { ?>
                <img style="margin-left: 50px" src="images/flechas.png"/>
                <?php
            }
            $x++;
        }
        ?>
    </div>
</div>
<div>
    <?php include './tablasMateriasFaltantes2.php'; ?>
</div>
