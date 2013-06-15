<?php ?>
<html>
    <head>
        <title>login alumno</title>
        <link rel="stylesheet" type="text/css" href="css/css.css">
        <link rel="stylesheet" type="text/css" href="../css/css.css"/>
        <link rel="stylesheet" type="text/css" href="../bootsTrap/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="../css/esqueleto.css"/>
        <script src="../bootsTrap/js/jquery.min.js"></script>
    </head>
    <body>
    <center>
        <div align="center" style="width: 869px; background-color: #eeeeed">
            <img src="images/loginUsuario.png"/>
            <br/>
            <br/>
            <br/>
            <div align="center">
                <form method="post">
                    <Fieldset  style = "width:400px">
                        <legend> <b>Login Alumno</b></legend>

                        <div align="center"><b>&nbsp;Usuario:</b><input type="text" name="usuario" /></div>
                        <br />
                        <div align="center"><b>Password:</b><input type="password" name="password" /></div>
                        <br />
                        <div align="center"><input class="btn btn-primary" name="entrar" type="submit" style="width:100px;"   value="Entrar" /></div>
    <!--                     <input type="submit" name="login" style="width:100px;" tabindex="6" value="Entrar" />-->
                    </Fieldset>

                </form>
            </div>
            <br/>
            <br/>
            <img src="images/footer.png"/>
        </div>
    </center>
</body>
</html>
<?php
include './conexion_1.php';


if ($_REQUEST['entrar'] != null) {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["password"];
    $sql = "select * from usuario where usuario= '$usuario' and Password = '$contrasena'";
    ;

//$resultado =  mysql_query($sql);
    $resultado = mysql_query($sql, Conectarse());
    while ($rs = mysql_fetch_array($resultado)) {
        $idUsuario = $rs["id"];
    }
    if ($idUsuario == null) {
        header("location:login.php");
    } else {
        session_start();
        $_SESSION['usuario'] = $usuario;
        header("location:introduccion.php");
        //  header("location:menu.php");
    }
}
?>