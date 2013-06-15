<?php ?>
<html>
    <head>
        <title>login tutor</title>
        <link rel="stylesheet" type="text/css" href="../css/css.css">
        <link rel="stylesheet" type="text/css" href="../bootsTrap/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="../css/esqueleto.css"/>
        <script src="../bootsTrap/js/jquery.min.js"></script>
        <script src="../bootsTrap/js/bootstrap.min.js"></script>
    </head>
    <body >
        <br/>
        <br/>
        <br/>
    <center>
        <div  align="center" style="width: 869px; background-color: #eeeeed"></div>
        <img src="images/BannerTutor.png"/>
        <div align="center" style="background-color: #eeeeed; width: 869px;">
            <form method="post">
                <Fieldset  style = "width:400px; border-radius: 10px">
                    <legend> <b>Login Tutor(a)</b></legend>

                    <div align="center"><b>&nbsp;Usuario:</b><input type="text" name="tutor" /></div>
                    <br />
                    <div align="center"><b>Password:</b><input type="password" name="contrasena" /></div>
                    <br />
                    <div align="center"><input class="btn btn-primary" name="entrar" type="submit" style="width:100px;"   value="Entrar" /></div>
                    <br/>
                </Fieldset>
            </form>
        </div>
        <img  style="width: 870px"src="../images/footer.png"/>
    </div>
</center>
</body>
</html>
<?php
include '../conexion_1.php';
if ($_REQUEST['entrar'] != null) {
    $usuario = $_POST["tutor"];
    $contrasena = $_POST["contrasena"];
    $sql = "select * from tutor where nomTutor = '$usuario' and contrasena = '$contrasena'";
//$resultado =  mysql_query($sql);
    $resultado = mysql_query($sql, Conectarse());
    while ($rs = mysql_fetch_array($resultado)) {
        $idUsuario = $rs["id"];
    }
    if ($idUsuario == null) {
        header("location:login_t.php");
    } else {
        session_start();
        $_SESSION['idTutor'] = $idUsuario;
//        header("location:introduccion.php");
        header("location:reporte_tutor.php");
    }
}
?>