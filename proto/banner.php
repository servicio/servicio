
<?php
session_start();
$usuario = $_SESSION['usuario'];
include './conexion_1.php';
$sql = "select * from usuario, persona where usuario.idPersona = persona.id and usuario.usuario ='$usuario'";
$resultado = mysql_query($sql, Conectarse());
while ($datos = mysql_fetch_array($resultado)) {
    $nombre = $datos["nombre"];

    $apellido = $datos["apellido"];
    $_SESSION['nombre'] = $nombre;
    $_SESSION['apellido'] = $apellido;
}
?>

<?php
$sql2 = "select * from usuario where usuario='$usuario' ";
$resultado2 = mysql_query($sql2, Conectarse());
while ($rs = mysql_fetch_array($resultado2)) {
    $idUsuario = $rs["id"];
}
$_SESSION['idUsuario'] = $idUsuario;
?>


<html>
    <head>
        <link rel="stylesheet" type="text/css" href="bootsTrap/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="css/esqueleto.css"/>
        <script src="bootsTrap/js/jquery.min.js"></script>
        <script src="bootsTrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/eventos.js"></script>
        <title></title>
    </head>
    <body>

        <form>
            <div  align="center" style="height: 200px">
                <br/>
                <img src="banner.png"/>
                <br/>
                <div style="float: right; margin-right: 100px"><a href="cerrarSession.php"><img src="images/cerrar sesion.png"/></a></div>
            </div> 
            <div>
                <table style="float: right; margin-right: 10px">
                    <tr>
                        <td><div><h4>Alumno:<?php echo $nombre . "&nbsp" . $apellido; ?></h4> </div></td>
                        <!--<td><div><img src="images/cerrar sesion.png"/></div></td>-->
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html>