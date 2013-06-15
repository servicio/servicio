<?php
session_start();
?>
<html>
    <head>
        <title>login coordinacion</title>
        <link rel="stylesheet" type="text/css" href="css/css.css">
        <link rel="stylesheet" type="text/css" href="../css/css.css">
        <link rel="stylesheet" type="text/css" href="../bootsTrap/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="../css/esqueleto.css"/>
        <script src="../bootsTrap/js/jquery.min.js"></script>
    </head>
    <body>
    <center>
        <div align="center" style="background-color: #eeeeed; width: 869px;">
            <img src="images/accesoCoordinador.png"/>
            <br/>
            <br/>
            <br />
            <div align="center">
                <form method="post">
                    <Fieldset  style = "width:400px">
                        <legend> <b>Login Coordinador(a)</b></legend>

                        <div align="center"><b>&nbsp;Usuario:</b><input type="text" name="coor" /></div>
                        <br />
                        <div align="center"><b>Password:</b><input type="password" name="contrasena" /></div>
                        <br />
                        <div align="center"><input  name="entrar" type="submit" style="width:100px;"   value="Entrar" /></div>
    <!--                     <input type="submit" name="login" style="width:100px;" tabindex="6" value="Entrar" />-->
                    </Fieldset>

                </form>
            </div>
            <br/>
            <br/>
            <img src="../images/footer.png"/>
        </div>
    </center>
</body>
</html>
<?php
include '../conexion_1.php';


if ($_REQUEST['entrar'] != null) {
    $usuario = $_POST["coor"];

    $contrasena = $_POST["contrasena"];
    $sql = "select * from coordina where usuario = '$usuario' and contrasena = '$contrasena'";
    $resultado = mysql_query($sql, Conectarse());
    while ($rs = mysql_fetch_array($resultado)) {
        $idUsuario = $rs["id"];
        $nombre = $rs["nombre_coor"];
    }
    if ($idUsuario == null) {
        header("location:login_c.php");
    } else {
        session_start();
        $_SESSION['idTutor'] = $idUsuario;
        $_SESSION['nombreCoor'] = $nombre;
        header("location: portal_coor.php");
    }
}
?>
</html>