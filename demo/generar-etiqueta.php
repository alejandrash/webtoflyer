<?php
    header("Content-Type:text/html; charset=utf-8");
   session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$usuario=$_SESSION['ESTADO'];

$etiqueta=$_POST['etiqueta'];
$name=$_POST['name'];
$fecha=$_POST['fecha'];
$namehtml = $name.".html";

$niveluser = '';

$result_query=mysql_query("select * from usuarios where email='$usuario'") or die(mysql_error());
if ($row_query=mysql_fetch_array($result_query)) {
	$niveluser = $row_query['categoria'];
}
if ($niveluser == 'operador') {
	$result=mysql_query("INSERT INTO cartel_precios (usuario) VALUES ('$usuario')") or die(mysql_error());
}

$etiquetafinal = "<!DOCTYPE HTML><html><head><title>WEB TO FLYER</title><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><link href='../../css/bootstrap.min.css' rel='stylesheet' type='text/css' /><link href='../../css/style.css' rel='stylesheet' type='text/css' /><link href='../../css/wtf.css?' rel='stylesheet' type='text/css' /><link href='../../css/font-awesome.css' rel='stylesheet'> <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/> <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' rel='stylesheet'> <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet'> <link href='https://fonts.googleapis.com/css?family=Tulpen+One' rel='stylesheet'><link rel='stylesheet' href='../../css/icon-font.min.css' type='text/css' /></head><body style='background:#FFF;'><div style='width:792px;'>".$etiqueta."</body></html>";
    
    $file=fopen($namehtml, "w"); 
    fwrite($file, $etiquetafinal); 
    fclose($file);

$url="http://webtoflyer.com/demo/".$namehtml;
$md5hash = md5($url."berazain");
$url = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url."&secret_key=".$md5hash."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=cartel_GM_".$fecha.".pdf";

print_r($url);
?>