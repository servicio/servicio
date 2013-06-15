<html>
    <body>
        <form method="post">

            <center>
                <div style="background-color: ghostwhite; width: 960px; height: 570px">
                    
                    <br/>
                    <br/>
                    <br/><h1>Control del Portal</h1>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <fieldset style="border-radius: 10px; width: 300px">
                        <br/>
                        <input type="submit" value="Alumno" name="alumno"/>

                        <input type="submit" value="Tutor" name="tutor"/>

                        <input type="submit" value="Coordinador" name="coordinador"/>
                    </fieldset>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                </div>
            </center>

        </form>
    </body>
</html>
<?php
if ($_REQUEST["alumno"] != null) {
    header('Location: ../login.php');
}
if ($_REQUEST["tutor"] != null) {
    header('Location: ../tutor/login_t.php');
}
if ($_REQUEST["coordinador"] != null) {
    header('Location: ../coordinador/login_c.php');
}
?>