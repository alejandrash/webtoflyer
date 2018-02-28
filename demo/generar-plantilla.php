<?php
    header("Content-Type:text/html; charset=utf-8");
   session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$usuario=$_SESSION['ESTADO'];

$plantilla=$_POST['plantilla'];
$name=$_POST['name'];
$fecha=$_POST['fecha'];
$desc=$_POST['desc'];
$desc=str_replace('&quot;','"',$desc);
$desc=str_replace('quot;','',$desc);
$desc=str_replace('"','',$desc);
$titulo=$_POST['titulo'];
$titulo=str_replace('&quot;','"',$titulo);
$titulo=str_replace('quot;','',$titulo);
$titulo=str_replace('"','',$titulo);
$namehtml = $name.".html";

//$niveluser = '';

//$result_query=mysql_query("select * from usuarios where email='$usuario'") or die(mysql_error());
//if ($row_query=mysql_fetch_array($result_query)) {
//	$niveluser = $row_query['categoria'];
//}
//if ($niveluser == 'operador') {
//	$result=mysql_query("INSERT INTO cartel_precios (usuario) VALUES ('$usuario')") or die(mysql_error());
//}
$url="http://webtoflyer.com/demo/".$namehtml;

$plantillafinal = "<!DOCTYPE HTML><html><head><title>WEB TO FLYER</title><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><link href='../../css/bootstrap.min.css' rel='stylesheet' type='text/css' /><link href='../../css/style.css' rel='stylesheet' type='text/css' /><link href='../../css/wtf.css?' rel='stylesheet' type='text/css' /><link href='../../css/redes-sociales.css?' rel='stylesheet' type='text/css' /><link href='../../css/font-awesome.css' rel='stylesheet'> <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/> <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' rel='stylesheet'> <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet'> <link rel='stylesheet' href='../../css/icon-font.min.css' type='text/css' /><style type='text/css'> #plantilla-grat {margin:0!important; border:0!important; width:500px!important; height:500px!important;} </style><meta property='og:type' content='website'><meta property='og:url' content='".$url."' /><meta property='og:title' content='".$titulo."' /><meta property='og:description' content='".$desc."' /><meta property='og:image' content=''/></head><body style='background:#FFF; margin:0; padding:0; width:500px; height:500px; overflow:hidden; float:left;'><div style='width:500px; height:500px; overflow:hidden; float:left;'>".$plantilla."</body></html>";
    
    $file=fopen($namehtml, "w"); 
    fwrite($file, $plantillafinal); 
    fclose($file);


//$md5hash = md5($url."berazain");
$url = " http://do.convertapi.com/Web2Image?OutputFileName=WTF_publicacion&curl=".$url."?&PageWidth=500&PageHeight=500&JpgQuality=100&ApiKey=855890385";
//$url = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url."&secret_key=".$md5hash."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=plantilla_seguidores_".$fecha.".jpg";

print_r($url);
?>