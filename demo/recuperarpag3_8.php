<?php
session_set_cookie_params(21600,"/");
session_start();
header("Content-Type:text/html; charset=utf-8");
$content=$_SESSION{"pag3_8_".$_SESSION['ESTADO']};
$contenido = $content;
echo($contenido);
?>