<?php
session_set_cookie_params(21600,"/");
session_start();
header("Content-Type:text/html; charset=utf-8");
$content=$_SESSION{"predis_pag7_8_".$_SESSION['ESTADO']};
$contenido = $content;
echo($contenido);
?>