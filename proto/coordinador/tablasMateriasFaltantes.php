<div style="float: left">
    <fieldset style="width: 900px; border: 0px">
        <?php
        session_start();
        $idUsuario = $_SESSION["idUsuario"];
        $sql = "SELECT * FROM materias WHERE materias.id NOT IN (SELECT idmaterias FROM materias_cargadas_usuario where idusuario=$idUsuario); ";
        $rs2 = mysql_query($sql, Conectarse());
        ?>
        <table>
            <thead>
                <tr>Semestre</tr>
                <tr>Materias</tr>
            </thead>
            <?php
            $contador = 0;
            while ($r = mysql_fetch_array($rs2)) {
                ?>
                <tr  bgcolor="<?php
                if ($contador % 2 == 0) {
                    echo '#fefcdd';
                } else {
                    echo '#ffffff';
                }
                ?>">
                    <td style="width: 50px"> <?php echo $r["semestre"]; ?></td>
                    <td><?php echo $r["materias"]; ?></td>
                </tr>  
                <?php
                $contador++;
            }
            ?>
        </table>
    </fieldset>
</div>