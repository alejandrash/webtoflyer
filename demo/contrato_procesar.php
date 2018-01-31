<?php
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
header("Content-Type:text/html; charset=utf-8");

$contrato = $_POST['contrato'];
$contrato=str_replace("\r","<br>",$contrato);
if ($contrato==""){
    header("Location:carga-contrato.php?msg_error=Complete el contrato por favor.");
}
else {
    $archivo = "terminos/contrato.txt"; 
    $fp = fopen($archivo,"w+"); 
    fwrite($fp, $contrato); 
    fclose($fp); 
    header("Location:carga-contrato.php?msg_ok=El contrato se ha guardado correctamente.");
}

?>