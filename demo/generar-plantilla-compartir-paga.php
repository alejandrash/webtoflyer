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
//$titulo=$_POST['titulo'];
//$titulo=str_replace('&quot;','"',$titulo);
//$titulo=str_replace('quot;','',$titulo);
//$titulo=str_replace('"','',$titulo);
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
//$url2 = " http://do.convertapi.com/Web2Image?OutputFileName=FB_seguidores&curl=".$url."?&PageWidth=502&PageHeight=502&JpgQuality=100&StoreFile=true&ApiKey=855890385";
$plantillafinal = "<!DOCTYPE HTML><html><head><title>WEB TO FLYER</title><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><meta http-equiv='Expires' content='0'><meta http-equiv='Last-Modified' content='0'><meta http-equiv='Cache-Control' content='no-cache, mustrevalidate'><meta http-equiv='Pragma' content='no-cache'><link href='../../css/bootstrap.min.css' rel='stylesheet' type='text/css' /><link href='../../css/style.css' rel='stylesheet' type='text/css' /><link href='../../css/wtf.css?' rel='stylesheet' type='text/css' /><link href='../../css/redes-sociales.css?' rel='stylesheet' type='text/css' /><link href='../../css/font-awesome.css' rel='stylesheet'> <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/> <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' rel='stylesheet'> <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet'> <link rel='stylesheet' href='../../css/icon-font.min.css' type='text/css' /><style type='text/css'> #plantilla-paga {width:1200px!important; height: 630px!important;} #plantilla-paga .contiene .bottom {font-size: 25px;} #plantilla-paga .contiene .bottom .big {font-size:48px; display:none!important;} #plantilla-paga .contiene .bottom .preciotach {font-size: 20px; padding-top: 5px;} #plantilla-paga .contiene .bottom .preciotach input {font-size:20px!important;} #plantilla-paga .contiene .bottom .preciotach .linea {top:10px; left:115px; background-size: contain; height: 15px; width: 100px;} #plantilla-paga .contiene .bottom .preciotach span {padding-top: 5px;} #plantilla-paga .contiene .selec-financiacion-big {width:554px; height: 143px; background-size: contain;} #plantilla-paga .contiene .selec-financiacion-big .mitad {height: 50%; width: 25%;} #plantilla-paga .contiene .selec-financiacion-big .zona-cuota {height: 50%; width: 25%; padding-top: 15px; font-size: 20px;} #plantilla-paga .contiene .selec-financiacion-big .zona-cuota a {font-size: 20px;} #plantilla-paga .contiene .selec-financiacion-big .mitad a {height: 50%; line-height: 25px; width:100%;} #plantilla-paga .contiene .selec-financiacion-big a.sele img {max-height: 20px; top:2px;} #plantilla-paga .contiene .selec-financiacion-big input {height: 50%; width:100%; max-width:275px; font-size: 48px;} #plantilla-paga .financiado .bottom .big {height: 22px; font-size: 11px; right:0; top:160px;} #plantilla-paga .selec-financiacion-big a.selecuotas span {font-size:23px!important;} #plantilla-paga .selec-financiacion-big a.sele img {max-width:90px!important; max-height:50px!important;} </style><meta property='og:type' content='website'><meta property='og:url' content='".$url."' /><meta property='og:title' content='".$desc."' /><meta property='og:description' content='".$desc."' /><meta property='og:image' content=''/></head><body style='background:#FFF;'><div style='width:1200px; height:630px; overflow:hidden;'>".$plantilla."</body></html>";
    
$file=fopen($namehtml, "w"); 
    fwrite($file, $plantillafinal); 
    fclose($file); 

//$imagen = file_get_contents('http://www.dominio.com/foto.jpg');
//file_put_contents('rutadetuservidor/foto.jpg', $imagen); 

print_r($url);
?>