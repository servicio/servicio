<?php /**/ ?><?php

function Conectarse() {
//    if (!($link = mysql_connect("prototipos.pcoriente.com.mx", "pablo_torres", "Pato82"))) {
    if (!($link = mysql_connect("localhost","root",""))) {
        echo "Error conectando a la base de datos.";
        exit();
    }
    if (!mysql_select_db("prototipos", $link)) {
        echo "Error seleccionando la base de datos.";
        exit();
    }
    return $link;
}
?>
