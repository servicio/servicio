<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
include './baner.php';
session_start();
include '../conexion_1.php';
Conectarse();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="stylesheet" type="text/css" href="css/css.css"/>
        <link rel="stylesheet" type="text/css" href="../css/css.css"/>
        <link rel="stylesheet" type="text/css" href="../bootsTrap/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="../css/esqueleto.css"/>
        <script src="../bootsTrap/js/jquery.min.js"></script>
        <script type="text/javascript" src="../jquery-1.9.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                if (window.closed) {
                    alert("esta cerrando la ventana");
                }
                $('#reporte').hide();
                $('#reporte2').hide();
                $('#organigrama').hide();
                $('#organigrama2').hide();
                $('#datosPersonales').hide();
                $('.busqueda').click(function() {
                    var matricula = $('#matri').val();
                    //                    alert(matricula);
                    if (matricula != '') {
                        $('#nombre').load('busquedaMatricula.php?matricula=' + matricula + '&control=1');
                        $('#Matricula').load('busquedaMatricula1.php?matricula=' + matricula + '&control=2');
                        $('#Semestre').load('busquedaMatricula2.php?matricula=' + matricula + '&control=3');
                        $('#sesiones').load('cargaSesiones2.php?idcontrol=1');
                        $('#datosPersonales').show('slow');
                        $('#datosPersonales').delay('1800');
                        $('#reporte2').show('slow');
                        $('#reporte').hide();
                        $('#organigrama2').show('slow');
                        $('#organigrama').hide();
                    }
                    else {
                        alert("Ingrese una matricula");
                    }
                });
                $('#tutor').change(function() {
                    var id = 0;
                    id = $('#tutor').val();
                    $('#alumnos').load('coor_alu.php?id=' + id);
                });
                $('#alumnos').change(function() {
                    $('#reporte2').hide();
                    var idTutor = 0;
                    idTutor = $('#tutor').val();
                    var id = $('#alumnos').val();
                    $('#matri').val('');
                    $('#Matricula').load('datos.php?id=' + id + '&control=1');
                    $('#nombre').load('datos1.php?id=' + id + '&control=2');
                    $('#Semestre').load('datos2.php?id=' + id + '&control=3');
                    $('#sesiones').load('cargaSesiones.php?idTutor=' + idTutor + '&control=0');

                    $('#datosPersonales').delay('1800');
                    $('#datosPersonales').show('slow');
                    $('#reporte').show('slow');
                    $('#organigrama').show('slow');
                    $('#organigrama2').hide();
                });

            });
        </script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>portal coordinadora</title>
    </head>
    <body>
        <!--<form method="post">-->
        
        <center>
            <div style="width: 890px; background-color: #eeeeed">
                <fieldset style="border-radius: 10px; width: 880px; margin: auto">
                    <?php
                    $nombreCoordinadora = $_SESSION["nombreCoor"];
                    ?>
                    <div style="float: right"><strong>Coordinador: <?php echo $nombreCoordinadora; ?></strong></div>
                    <br/><div style="float: right"><a href="cerrarSession.php"><img src="images/cerrar sesion.png"/></a></div>
                    <br/>
                    <br/>
                    <div style="float: right">
                        <table>
                            <tr>
                                <td>
                                    Matricula Alumno:
                                </td>
                                <td>
                                    <input style="width: 120px" id="matri" name="matricula" type="text"/>
                                </td>
                                <td>
                                    <input  type="submit" class="busqueda btn btn-info" value="Buscar"/>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <br/>

                    <div style="float: left">
                        <table>
                            <tr>
                                <td><select name = "tutor" id="tutor">
                                        <option value="0">Seleccione al tutor</option>
                                        <?php
                                        $consulta = mysql_query("select * from tutor");
                                        while ($fila = mysql_fetch_array($consulta)) {
                                            echo "<option value='" . $fila[0] . "'>" . $fila[1] . "</option>";
                                        }
                                        ?>

                                    </select></td>
                                <td><select name="alumnos" id="alumnos">
                                        <option value="0">Seleccione al alumno</option>
                                    </select></td>
                                <td><a id="reporte" href="reporte.php" target="_blank" ><img src="images/PdfWeb.png"/></a></td>
                                <td><a id="reporte2" href="reporte2.php" target="_blank" ><img src="images/PdfWeb.png"/></a></td>
                                <td><a id="organigrama" href="organigramaPropio.php" target="_blank" ><img src="images/org.png"/></a></td>
                                <td><a id="organigrama2" href="organigramaPropio2.php" target="_blank" ><img src="images/org.png"/></a></td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <hr/>

                    <br/>
                    <br/>
                    <div style="float: left; width: 250px"id="datosPersonales">
                        <strong style="float: left">Nombre:</strong><label id="nombre"></label>
                        <strong style="float: left">Matricula:&nbsp;</strong><label id="Matricula"></label>
                        <br/>
                        <strong style="float: left">Semestre:&nbsp;</strong><label id="Semestre"></label>
                    </div>
                    <br/>
                    <br/> <br/> <br/>
                    <br/> 
                    <table  style=" width: 500px"id="sesiones">
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                    <br/>  <br/>
                </fieldset>
                <img src="../images/footer.png"/>
            </div>
        </center>
        <!--</form>-->
    </body>
</html>
