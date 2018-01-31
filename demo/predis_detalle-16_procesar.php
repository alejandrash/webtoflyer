<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
if ($_SESSION['ESTADO']=='') {
    header("Location:index.php?msg_error=Su sesion ha expirado. Por favor ingrese nuevamente.");
}

header("Content-Type:text/html; charset=utf-8");

require("class.phpmailer.php");
include("class.smtp.php");

$usuario = $_SESSION['ESTADO'];
$result_usuario=mysql_query("select * from usuarios WHERE email ='$usuario'");
$row_usuario=mysql_fetch_array($result_usuario);
$sucursal = $row_usuario["sucursal"];
$email = $row_usuario["email"];
$catusuario = $row_usuario["categoria"];

$telefono = $_POST["telefono"];
$precio = $_POST["precio"];
$bultos = $_POST["bultos2"];
$kilos = $_POST["kilos2"];
$horario = $_POST["hora"];
$direccion = utf8_decode($_POST["dire"]);
$prov = utf8_decode($_POST["prov"]);
$cantidad = $_POST["canti"];
$cantidad2 = $_POST["canti"];
$estimado=$_POST['estimado'];
$comentarios=utf8_decode($_POST['comentarios']);

if ($comentarios == "") {
    $comentarios = "Sin comentarios.";
}
if ($bultos == "") {
    $bultos = "4";
}

if ($catusuario == 'superusuario') {
    $cantidad2 = 0;
}
if ($usuario == 'alehusson@yahoo.com.ar') {
    $cantidad2 = 0;
}

$nombre = utf8_decode($_POST["nombre"]);
if ($nombre == '') {
    $nombre = $row_usuario["nombre_contacto"];
}

$insert_orden=mysql_query("INSERT INTO ordenes (Id, cant_folletos) values (null, '$cantidad2')");
$result_orden=mysql_query("select * from ordenes ORDER BY Id DESC LIMIT 1");
$row_orden=mysql_fetch_array($result_orden);
$nro_orden = $row_orden["Id"];
$id_sesion = $_SESSION['SESIONFLY'];

$url1='';
$url2='';
$url3='';
$url4='';
$url5='';
$url6='';
$url7='';
$url8='';
$url9 =  '';
$url10 =  '';
$url11 =  '';
$url12 =  '';
$url13 =  '';
$url14 =  '';
$url15 =  '';
$url16 =  '';


$result_flyer=mysql_query("select * from flyers WHERE tipo='16predis' AND usuario ='$usuario' AND cara='tapa' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url1="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer_contratapa=mysql_query("select * from flyers WHERE tipo='16predis' AND usuario ='$usuario' AND cara='contratapa' AND terminado='no' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_contratapa=mysql_fetch_array($result_flyer_contratapa))
{
    $url2="http://webtoflyer.com/demo/".$row_flyer_contratapa["url"];
}
$result_flyer_pag2=mysql_query("select * from flyers WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag2' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_pag2=mysql_fetch_array($result_flyer_pag2))
{
    $url3="http://webtoflyer.com/demo/".$row_flyer_pag2["url"];
}
$result_flyer_pag3=mysql_query("select * from flyers WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag3' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_pag3=mysql_fetch_array($result_flyer_pag3))
{
    $url4="http://webtoflyer.com/demo/".$row_flyer_pag3["url"];
}
$result_flyer_pag4=mysql_query("select * from flyers WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag4' AND terminado='no' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_pag4=mysql_fetch_array($result_flyer_pag4))
{
    $url5="http://webtoflyer.com/demo/".$row_flyer_pag4["url"];
}
$result_flyer_pag5=mysql_query("select * from flyers WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag5' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_pag5=mysql_fetch_array($result_flyer_pag5))
{
    $url6="http://webtoflyer.com/demo/".$row_flyer_pag5["url"];
}
$result_flyer_pag6=mysql_query("select * from flyers WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag6' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_pag6=mysql_fetch_array($result_flyer_pag6))
{
    $url7="http://webtoflyer.com/demo/".$row_flyer_pag6["url"];
}
$result_flyer_pag7=mysql_query("select * from flyers WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag7' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_pag7=mysql_fetch_array($result_flyer_pag7))
{
    $url8="http://webtoflyer.com/demo/".$row_flyer_pag7["url"];
}
$result_flyer_pag8=mysql_query("select * from flyers WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag8' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_pag8=mysql_fetch_array($result_flyer_pag8))
{
    $url9="http://webtoflyer.com/demo/".$row_flyer_pag8["url"];
}
$result_flyer_pag9=mysql_query("select * from flyers WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag9' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_pag9=mysql_fetch_array($result_flyer_pag9))
{
    $url10="http://webtoflyer.com/demo/".$row_flyer_pag9["url"];
}
$result_flyer_pag10=mysql_query("select * from flyers WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag10' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_pag10=mysql_fetch_array($result_flyer_pag10))
{
    $url11="http://webtoflyer.com/demo/".$row_flyer_pag10["url"];
}
$result_flyer_pag11=mysql_query("select * from flyers WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag11' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_pag11=mysql_fetch_array($result_flyer_pag11))
{
    $url12="http://webtoflyer.com/demo/".$row_flyer_pag11["url"];
}
$result_flyer_pag12=mysql_query("select * from flyers WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag12' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_pag12=mysql_fetch_array($result_flyer_pag12))
{
    $url13="http://webtoflyer.com/demo/".$row_flyer_pag12["url"];
}
$result_flyer_pag13=mysql_query("select * from flyers WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag13' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_pag13=mysql_fetch_array($result_flyer_pag13))
{
    $url14="http://webtoflyer.com/demo/".$row_flyer_pag13["url"];
}
$result_flyer_pag14=mysql_query("select * from flyers WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag14' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_pag14=mysql_fetch_array($result_flyer_pag14))
{
    $url15="http://webtoflyer.com/demo/".$row_flyer_pag14["url"];
}
$result_flyer_pag15=mysql_query("select * from flyers WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag15' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_pag15=mysql_fetch_array($result_flyer_pag15))
{
    $url16="http://webtoflyer.com/demo/".$row_flyer_pag15["url"];
}


$file1 = "uri=".$url1."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file2 = "uri=".$url2."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file3 = "uri=".$url3."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file4 = "uri=".$url4."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file5 = "uri=".$url5."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file6 = "uri=".$url6."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file7 = "uri=".$url7."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file8 = "uri=".$url8."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file9 = "uri=".$url9."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file10 = "uri=".$url10."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file11 = "uri=".$url11."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file12 = "uri=".$url12."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file13 = "uri=".$url13."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file14 = "uri=".$url14."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file15 = "uri=".$url15."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file16 = "uri=".$url16."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";

$api_key = "fdJAIgr560-nXJBMVv89Zg";
$api_secret = "hola";
$hashed1 = md5($file1 . $api_secret);
$hashed2 = md5($file2 . $api_secret);
$hashed3 = md5($file3 . $api_secret);
$hashed4 = md5($file4 . $api_secret);
$hashed5 = md5($file5 . $api_secret);
$hashed6 = md5($file6 . $api_secret);
$hashed7 = md5($file7 . $api_secret);
$hashed8 = md5($file8 . $api_secret);
$hashed9 = md5($file9 . $api_secret);
$hashed10 = md5($file10 . $api_secret);
$hashed11 = md5($file11 . $api_secret);
$hashed12 = md5($file12 . $api_secret);
$hashed13 = md5($file13 . $api_secret);
$hashed14 = md5($file14 . $api_secret);
$hashed15 = md5($file15 . $api_secret);
$hashed16 = md5($file16 . $api_secret);

$file1 = "$file1&key=$api_key&hash=$hashed1";
$file2 = "$file2&key=$api_key&hash=$hashed2";
$file3 = "$file3&key=$api_key&hash=$hashed3";
$file4 = "$file4&key=$api_key&hash=$hashed4";
$file5 = "$file5&key=$api_key&hash=$hashed5";
$file6 = "$file6&key=$api_key&hash=$hashed6";
$file7 = "$file7&key=$api_key&hash=$hashed7";
$file8 = "$file8&key=$api_key&hash=$hashed8";
$file9 = "$file8&key=$api_key&hash=$hashed9";
$file10 = "$file8&key=$api_key&hash=$hashed10";
$file11 = "$file8&key=$api_key&hash=$hashed11";
$file12 = "$file8&key=$api_key&hash=$hashed12";
$file13 = "$file8&key=$api_key&hash=$hashed13";
$file14 = "$file8&key=$api_key&hash=$hashed14";
$file15 = "$file8&key=$api_key&hash=$hashed15";
$file16 = "$file8&key=$api_key&hash=$hashed16";

//$urlcli1 = "http://api.pagelr.com/capture/javascript?".$file1;
//$urlcli2 = "http://api.pagelr.com/capture/javascript?".$file2;
//$urlcli3 = "http://api.pagelr.com/capture/javascript?".$file3;
//$urlcli4 = "http://api.pagelr.com/capture/javascript?".$file4;
//$urlcli5 = "http://api.pagelr.com/capture/javascript?".$file5;
//$urlcli6 = "http://api.pagelr.com/capture/javascript?".$file6;
//$urlcli7 = "http://api.pagelr.com/capture/javascript?".$file7;
//$urlcli8 = "http://api.pagelr.com/capture/javascript?".$file8;

$urlcli1="http://do.convertapi.com/Web2Image?OutputFileName=TAPA_predis_16".$id_sesion."&curl=".$url1."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli2="http://do.convertapi.com/Web2Image?OutputFileName=CONTRATAPA_predis_16".$id_sesion."&curl=".$url2."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli3="http://do.convertapi.com/Web2Image?OutputFileName=PAG2_predis_16".$id_sesion."&curl=".$url3."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli4="http://do.convertapi.com/Web2Image?OutputFileName=PAG3_predis_16".$id_sesion."&curl=".$url4."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli5="http://do.convertapi.com/Web2Image?OutputFileName=PAG4_predis_16".$id_sesion."&curl=".$url5."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli6="http://do.convertapi.com/Web2Image?OutputFileName=PAG5_predis_16".$id_sesion."&curl=".$url6."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli7="http://do.convertapi.com/Web2Image?OutputFileName=PAG6_predis_16".$id_sesion."&curl=".$url7."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli8="http://do.convertapi.com/Web2Image?OutputFileName=PAG7_predis_16".$id_sesion."&curl=".$url8."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli9="http://do.convertapi.com/Web2Image?OutputFileName=PAG8_predis_16".$id_sesion."&curl=".$url9."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli10="http://do.convertapi.com/Web2Image?OutputFileName=PAG9_predis_16".$id_sesion."&curl=".$url10."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli11="http://do.convertapi.com/Web2Image?OutputFileName=PAG10_predis_16".$id_sesion."&curl=".$url11."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli12="http://do.convertapi.com/Web2Image?OutputFileName=PAG11_predis_16".$id_sesion."&curl=".$url12."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli13="http://do.convertapi.com/Web2Image?OutputFileName=PAG12_predis_16".$id_sesion."&curl=".$url13."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli14="http://do.convertapi.com/Web2Image?OutputFileName=PAG13_predis_16".$id_sesion."&curl=".$url14."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli15="http://do.convertapi.com/Web2Image?OutputFileName=PAG14_predis_16".$id_sesion."&curl=".$url15."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli16="http://do.convertapi.com/Web2Image?OutputFileName=PAG15_predis_16".$id_sesion."&curl=".$url16."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";

$md5hash1 = md5($url1."berazain");
$md5hash2 = md5($url2."berazain");
$md5hash3 = md5($url3."berazain");
$md5hash4 = md5($url4."berazain");
$md5hash5 = md5($url5."berazain");
$md5hash6 = md5($url6."berazain");
$md5hash7 = md5($url7."berazain");
$md5hash8 = md5($url8."berazain");
$md5hash9 = md5($url9."berazain");
$md5hash10 = md5($url10."berazain");
$md5hash11 = md5($url11."berazain");
$md5hash12 = md5($url12."berazain");
$md5hash13 = md5($url13."berazain");
$md5hash14 = md5($url14."berazain");
$md5hash15 = md5($url15."berazain");
$md5hash16 = md5($url16."berazain");


$url1 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url1."&secret_key=".$md5hash1."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=TAPA_16_".$nro_orden.".pdf";

$url2 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url2."&secret_key=".$md5hash2."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=CONTRATAPA_16_".$nro_orden.".pdf";

$url3 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url3."&secret_key=".$md5hash3."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=PAG2_16_".$nro_orden.".pdf";

$url4 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url4."&secret_key=".$md5hash4."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=PAG3_16_".$nro_orden.".pdf";

$url5 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url5."&secret_key=".$md5hash5."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=PAG4_16_".$nro_orden.".pdf";

$url6 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url6."&secret_key=".$md5hash6."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=PAG5_16_".$nro_orden.".pdf";
$url7 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url7."&secret_key=".$md5hash7."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=PAG6_16_".$nro_orden.".pdf";
$url8 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url8."&secret_key=".$md5hash8."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=PAG7_16_".$nro_orden.".pdf";
$url9 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url9."&secret_key=".$md5hash9."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=PAG8_16_".$nro_orden.".pdf";
$url10 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url10."&secret_key=".$md5hash10."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=PAG9_16_".$nro_orden.".pdf";
$url11 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url11."&secret_key=".$md5hash11."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=PAG10_16_".$nro_orden.".pdf";
$url12 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url12."&secret_key=".$md5hash12."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=PAG11_16_".$nro_orden.".pdf";
$url13 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url13."&secret_key=".$md5hash13."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=PAG12_16_".$nro_orden.".pdf";
$url14 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url14."&secret_key=".$md5hash14."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=PAG13_16_".$nro_orden.".pdf";
$url15 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url15."&secret_key=".$md5hash15."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=PAG14_16_".$nro_orden.".pdf";
$url16 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url16."&secret_key=".$md5hash16."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=PAG15_16_".$nro_orden.".pdf";


$update_orden_tapa=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='16predis' AND usuario ='$usuario' AND cara='tapa' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_contratapa=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='16predis' AND usuario ='$usuario' AND cara='contratapa' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_intizq=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag2' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_intder=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag3' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_intder=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag4' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_intder=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag5' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_intder=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag6' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_intder=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag7' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_intder=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag8' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_intder=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag9' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_intder=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag10' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_intder=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag11' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_intder=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag12' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_intder=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag13' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_intder=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag14' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_intder=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='16predis' AND usuario ='$usuario' AND cara='pag15' ORDER BY Id DESC LIMIT 1") or die(mysql_error());


$update_rating=mysql_query("UPDATE rating_productos SET nro_orden='$nro_orden', actual='no' WHERE usuario ='$usuario' AND id_sesion='$id_sesion' AND tipo='16'") or die(mysql_error());

$result_borrar=mysql_query("DELETE from flyers WHERE terminado='no' AND tipo='16predis' AND usuario ='$usuario' AND cara='tapa'")  or die(mysql_error());


/* MAIL A IDG */
        $mail = new PHPMailer();
		$mail->Encoding="base64";
		$mail->Host = "localhost";
		$mail->From = "sistema@webtoflyer.com";
		$mail->FromName = "WTF";
		$mail->Timeout=30;
		$mail->Subject = $nro_orden." - Solicitud nueva Revista(16) Predisenada WEB TO FLYER";
        $mail->AddAddress("ruben@idgonline.com.ar");
        $mail->AddCC('jorgelina@idgonline.com.ar');
        $mail->AddCC('alehusson@gmail.com');
		$mail->AddReplyTo($email, "WTF");
		
		$body  = "<table width='600' style='font-family: Verdana; font-size:12px;'><tr><td><img src='http://webtoflyer.com/demo/mails/header.jpg'></td></tr><tr><td style='padding:0 25px;'>Buen d&iacute;a, <br>Se ha generado una nueva solicitud de impresi&oacute;n. Les dejamos los datos a continuaci&oacute;n: </h3><br>Haga click en los enlaces inferiores para descargar los PDF.<br><br>";
        $body .= "<strong>NRO DE REFERENCIA: </strong> ".$nro_orden."<br /><br>";
        $body .= "<strong>CANTIDAD DE REVISTAS: </strong> ".$cantidad."<br /><br>";
        $body .= "<strong>MONTO A CARGAR Cta.: </strong> $".$precio." + IVA<br /><br>";
        $body .= "<strong>SEMANA ESTIMADA DE ENTREGA: </strong> ".$estimado."<br /><br>";
        $body .= "<strong>DIRECCION DE ENTREGA DE FOLLETOS: </strong> ".$direccion."<br /><br>";
        $body .= "<strong>PROVINCIA: </strong> ".$prov."<br /><br>";
        $body .= "<strong>HORARIO DE ENTREGA: </strong> ".$horario."<br /><br>";
        $body .= "<strong>BULTOS: </strong> ".$bultos." <br /><br>";
        $body .= "<strong>KILOS: </strong> ".$kilos."<br /><br>";
        $body .= "<strong>COMENTARIOS: </strong> ".$comentarios."<br /><br>";
        $body .= "<strong>RAZON SOCIAL: </strong> ".$sucursal."<br /><br>";
        $body .= "<strong>NOMBRE DE CONTACTO: </strong> ".$nombre."<br /><br>";
        $body .= "<strong>TELEFONO DE CONTACTO: </strong> ".$telefono."<br /><br>";
        $body .= "<strong>E-MAIL DE CONTACTO: </strong> ".$email."<br /><br />";
        $body .= "<strong>INFORMACION TECNICA: </strong>Revista de 16 p&aacute;ginas | Papel obra 70grs | full color | abrochado<br /><br />";
        $body .= "Haciendo click en los links de descarga obtendran el diseno de la revista en alta: <br /><br>";        
        
        $body .= "<strong>TAPA: </strong> <a href=".$url1." target='_blank'>DESCARGAR TAPA</a><br />";
        $body .= "<strong>CONTRATAPA: </strong> <a href=".$url2." target='_blank'>DESCARGAR CONTRATAPA</a><br />";
        $body .= "<strong>PAGINA 2: </strong> <a href=".$url3." target='_blank'>DESCARGAR PAGINA 2</a><br />";
        $body .= "<strong>PAGINA 3: </strong> <a href=".$url4." target='_blank'>DESCARGAR PAGINA 3</a><br />";
        $body .= "<strong>PAGINA 4: </strong> <a href=".$url5." target='_blank'>DESCARGAR PAGINA 4</a><br />";
        $body .= "<strong>PAGINA 5: </strong> <a href=".$url6." target='_blank'>DESCARGAR PAGINA 5</a><br />";
        $body .= "<strong>PAGINA 6: </strong> <a href=".$url7." target='_blank'>DESCARGAR PAGINA 6</a><br />";
        $body .= "<strong>PAGINA 7: </strong> <a href=".$url8." target='_blank'>DESCARGAR PAGINA 7</a><br />";
        $body .= "<strong>PAGINA 8: </strong> <a href=".$url9." target='_blank'>DESCARGAR PAGINA 8</a><br />";
        $body .= "<strong>PAGINA 9: </strong> <a href=".$url10." target='_blank'>DESCARGAR PAGINA 9</a><br />";
        $body .= "<strong>PAGINA 10: </strong> <a href=".$url11." target='_blank'>DESCARGAR PAGINA 10</a><br />";
        $body .= "<strong>PAGINA 11: </strong> <a href=".$url12." target='_blank'>DESCARGAR PAGINA 11</a><br />";
        $body .= "<strong>PAGINA 12: </strong> <a href=".$url13." target='_blank'>DESCARGAR PAGINA 12</a><br />";
        $body .= "<strong>PAGINA 13: </strong> <a href=".$url14." target='_blank'>DESCARGAR PAGINA 13</a><br />";
        $body .= "<strong>PAGINA 14: </strong> <a href=".$url15." target='_blank'>DESCARGAR PAGINA 14</a><br />";
        $body .= "<strong>PAGINA 15: </strong> <a href=".$url16." target='_blank'>DESCARGAR PAGINA 15</a><br /><br /><br />";
		$body .= "</td></tr><tr><td><img src='http://webtoflyer.com/demo/mails/footer.jpg'></td></tr></table>";

		$mail->IsHTML(true);
		$mail->Body = $body;
		$mail->Send();


/* MAIL A MARQUEZ - WEBMASTER */
        $mailmar = new PHPMailer();
        $mailmar->Encoding="base64";
        $mailmar->Host = "localhost";
        $mailmar->From = "sistema@webtoflyer.com";
        $mailmar->FromName = "WTF";
        $mailmar->Timeout=30;
        $mailmar->Subject = $nro_orden." - Solicitud nueva Revista (16) Predisenada WEB TO FLYER";
        $mailmar->AddAddress("alehusson@gmail.com");
        
        $bodymar  = "<table width='600' style='font-family: Verdana; font-size:12px;'><tr><td><img src='http://webtoflyer.com/demo/mails/header.jpg'></td></tr><tr><td style='padding:0 25px;'>Estimados, <br>Se ha generado una nueva solicitud de impresi&oacute;n. Les dejamos los datos a continuaci&oacute;n:<br><br>";
        $bodymar .= "<strong>NRO DE REFERENCIA: </strong> ".$nro_orden."<br /><br>";
        $bodymar .= "<strong>CANTIDAD DE REVISTAS: </strong> ".$cantidad."<br /><br>";
        $bodymar .= "<strong>MONTO A CARGAR Cta.: </strong> $".$precio." + IVA<br /><br>";
        $bodymar .= "<strong>SEMANA ESTIMADA DE ENTREGA: </strong> ".$estimado."<br /><br>";
        $bodymar .= "<strong>DIRECCION DE ENTREGA DE FOLLETOS: </strong> ".$direccion."<br /><br>";
        $bodymar .= "<strong>PROVINCIA: </strong> ".$prov."<br /><br>";
        $bodymar .= "<strong>HORARIO DE ENTREGA: </strong> ".$horario."<br /><br>";
        $bodymar .= "<strong>COMENTARIOS: </strong> ".$comentarios."<br /><br>";
        $bodymar .= "<strong>SUCURSAL: </strong> ".$sucursal."<br /><br>";
        $bodymar .= "<strong>NOMBRE DE CONTACTO: </strong> ".$nombre."<br /><br>";
        $bodymar .= "<strong>TELEFONO DE CONTACTO: </strong> ".$telefono."<br /><br>";
        $bodymar .= "<strong>E-MAIL DE CONTACTO: </strong> ".$email."<br /><br />";
        $bodymar .= "Haciendo click en los links de descarga obtendran el diseno de la revista en formato JPG: <br /><br>";        
        
        $bodymar .= "<strong>TAPA: </strong> <a href=".$urlcli1." target='_blank' download>DESCARGAR TAPA</a><br />";
        $bodymar .= "<strong>CONTRATAPA: </strong> <a href=".$urlcli2." target='_blank' download>DESCARGAR CONTRATAPA</a><br />";
        $bodymar .= "<strong>PAGINA 2: </strong> <a href=".$urlcli3." target='_blank' download>DESCARGAR PAGINA 2</a><br />";
        $bodymar .= "<strong>PAGINA 3: </strong> <a href=".$urlcli4." target='_blank' download>DESCARGAR PAGINA 3</a><br />";
        $bodymar .= "<strong>PAGINA 4: </strong> <a href=".$urlcli5." target='_blank' download>DESCARGAR PAGINA 4</a><br />";
        $bodymar .= "<strong>PAGINA 5: </strong> <a href=".$urlcli6." target='_blank' download>DESCARGAR PAGINA 5</a><br />";
        $bodymar .= "<strong>PAGINA 6: </strong> <a href=".$urlcli7." target='_blank' download>DESCARGAR PAGINA 6</a><br />";
        $bodymar .= "<strong>PAGINA 7: </strong> <a href=".$urlcli8." target='_blank' download>DESCARGAR PAGINA 7</a><br />";
        $bodymar .= "<strong>PAGINA 8: </strong> <a href=".$urlcli9." target='_blank' download>DESCARGAR PAGINA 8</a><br />";
        $bodymar .= "<strong>PAGINA 9: </strong> <a href=".$urlcli10." target='_blank' download>DESCARGAR PAGINA 9</a><br />";
        $bodymar .= "<strong>PAGINA 10: </strong> <a href=".$urlcli11." target='_blank' download>DESCARGAR PAGINA 10</a><br />";
        $bodymar .= "<strong>PAGINA 11: </strong> <a href=".$urlcli12." target='_blank' download>DESCARGAR PAGINA 11</a><br />";
        $bodymar .= "<strong>PAGINA 12: </strong> <a href=".$urlcli13." target='_blank' download>DESCARGAR PAGINA 12</a><br />";
        $bodymar .= "<strong>PAGINA 13: </strong> <a href=".$urlcli14." target='_blank' download>DESCARGAR PAGINA 13</a><br />";
        $bodymar .= "<strong>PAGINA 14: </strong> <a href=".$urlcli15." target='_blank' download>DESCARGAR PAGINA 14</a><br />";
        $bodymar .= "<strong>PAGINA 15: </strong> <a href=".$urlcli16." target='_blank' download>DESCARGAR PAGINA 15</a><br /><br /><br />";
        $bodymar .= "</td></tr><tr><td><img src='http://webtoflyer.com/demo/mails/footer.jpg'></td></tr></table>";

        $mailmar->IsHTML(true);
        $mailmar->Body = $bodymar;
        $mailmar->Send();


/* MAIL AL CLIENTE */
        $mailcli = new PHPMailer();
        $mailcli->Encoding="base64";
        $mailcli->Host = "localhost";
        $mailcli->From = "sistema@webtoflyer.com";
        $mailcli->FromName = "WTF";
        $mailcli->Timeout=30;
        $mailcli->Subject = $nro_orden." - Solicitud nueva Revista(16) Predisenada WEB TO FLYER";

        $mailcli->AddAddress($email,$nombre);
        $mailcli->AddBCC('alehusson@gmail.com');
        if ($cantidad < 10000) {
            $bodycli  = "<table width='600' style='font-family: Verdana; font-size:12px;'><tr><td><img src='http://webtoflyer.com/demo/mails/header.jpg'></td></tr><tr><td style='padding:0 25px;'>Hola ".$nombre."! <br>Hiciste un nuevo pedido de impresi&oacute;n de revistas. <br>Tu diseno fue enviado a impresion y en unos dias llegara a tu local. <br>Por cualquier duda llamanos al 4871-8184, o chate&aacute; con nosotros ingresando a WTF. Muchas gracias.<br><br>Te dejamos una copia de todos los datos a continuaci&oacute;n: <br><br>";
            $bodycli .= "<strong>NRO DE REFERENCIA: </strong> ".$nro_orden."<br /><br>";
            $bodycli .= "<strong>CANTIDAD DE REVISTAS: </strong> ".$cantidad."<br /><br>";
            $bodycli .= "<strong>MONTO A CARGAR Cta.: </strong> $".$precio." + IVA<br /><br>";
            $bodycli .= "<strong>SEMANA ESTIMADA DE ENTREGA: </strong> ".$estimado."<br /><br>";
            $bodycli .= "<strong>DIRECCION DE ENTREGA DE FOLLETOS: </strong> ".$direccion."<br /><br>";
            $bodycli .= "<strong>PROVINCIA: </strong> ".$prov."<br /><br>";
            $bodycli .= "<strong>HORARIO DE ENTREGA: </strong> ".$horario."<br /><br>";
            $bodycli .= "<strong>BULTOS: </strong> ".$bultos." <br /><br>";
            $bodycli .= "<strong>KILOS: </strong> ".$kilos."<br /><br>";
            $bodycli .= "<strong>COMENTARIOS: </strong> ".$comentarios."<br /><br>";
            $bodycli .= "<strong>SUCURSAL: </strong> ".$sucursal."<br /><br>";
            $bodycli .= "<strong>NOMBRE DE CONTACTO: </strong> ".$nombre."<br /><br>";
            $bodycli .= "<strong>TELEFONO DE CONTACTO: </strong> ".$telefono."<br /><br>";
            $bodycli .= "<strong>E-MAIL DE CONTACTO: </strong> ".$email."<br /><br />";
            $bodycli .= "Haciendo click en los links de descarga obtendran el diseno de la revista en formato JPG: <br /><br>";        
        
            $bodycli .= "<strong>TAPA: </strong> <a href=".$urlcli1." target='_blank' download>DESCARGAR TAPA</a><br />";
            $bodycli .= "<strong>CONTRATAPA: </strong> <a href=".$urlcli2." target='_blank' download>DESCARGAR CONTRATAPA</a><br />";
            $bodycli .= "<strong>PAGINA 2: </strong> <a href=".$urlcli3." target='_blank' download>DESCARGAR PAGINA 2</a><br />";
            $bodycli .= "<strong>PAGINA 3: </strong> <a href=".$urlcli4." target='_blank' download>DESCARGAR PAGINA 3</a><br />";
            $bodycli .= "<strong>PAGINA 4: </strong> <a href=".$urlcli5." target='_blank' download>DESCARGAR PAGINA 4</a><br />";
            $bodycli .= "<strong>PAGINA 5: </strong> <a href=".$urlcli6." target='_blank' download>DESCARGAR PAGINA 5</a><br />";
            $bodycli .= "<strong>PAGINA 6: </strong> <a href=".$urlcli7." target='_blank' download>DESCARGAR PAGINA 6</a><br />";
            $bodycli .= "<strong>PAGINA 7: </strong> <a href=".$urlcli8." target='_blank' download>DESCARGAR PAGINA 7</a><br />";
            $bodycli .= "<strong>PAGINA 8: </strong> <a href=".$urlcli9." target='_blank' download>DESCARGAR PAGINA 8</a><br />";
            $bodycli .= "<strong>PAGINA 9: </strong> <a href=".$urlcli10." target='_blank' download>DESCARGAR PAGINA 9</a><br />";
            $bodycli .= "<strong>PAGINA 10: </strong> <a href=".$urlcli11." target='_blank' download>DESCARGAR PAGINA 10</a><br />";
            $bodycli .= "<strong>PAGINA 11: </strong> <a href=".$urlcli12." target='_blank' download>DESCARGAR PAGINA 11</a><br />";
            $bodycli .= "<strong>PAGINA 12: </strong> <a href=".$urlcli13." target='_blank' download>DESCARGAR PAGINA 12</a><br />";
            $bodycli .= "<strong>PAGINA 13: </strong> <a href=".$urlcli14." target='_blank' download>DESCARGAR PAGINA 13</a><br />";
            $bodycli .= "<strong>PAGINA 14: </strong> <a href=".$urlcli15." target='_blank' download>DESCARGAR PAGINA 14</a><br />";
            $bodycli .= "<strong>PAGINA 15: </strong> <a href=".$urlcli16." target='_blank' download>DESCARGAR PAGINA 15</a><br /><br /><br />";
            $bodycli .= "</td></tr><tr><td><img src='http://webtoflyer.com/demo/mails/footer.jpg'></td></tr></table>";
        }
        else {
            $bodycli  = "<table width='600' style='font-family: Verdana; font-size:12px;'><tr><td><img src='http://webtoflyer.com/demo/mails/header.jpg'></td></tr><tr><td style='padding:0 25px;'>Hola ".$nombre."! <br>Hiciste un nuevo pedido de impresi&oacute;n de revistas. <br>Lo revisaremos para asegurarnos que sea optimo para impresion y en las siguientes horas te enviaremos los archivos para que des tu aprobacion final. <br>Por cualquier duda llamanos al 4871-8184, o chate&aacute; con nosotros ingresando a WTF. Muchas gracias.<br><br>Te dejamos una copia de todos los datos a continuaci&oacute;n: <br><br>";
            $bodycli .= "<strong>NRO DE REFERENCIA: </strong> ".$nro_orden."<br /><br>";
            $bodycli .= "<strong>CANTIDAD DE REVISTAS: </strong> ".$cantidad."<br /><br>";
            $bodycli .= "<strong>MONTO A CARGAR Cta.: </strong> $".$precio." + IVA<br /><br>";
            $bodycli .= "<strong>SEMANA ESTIMADA DE ENTREGA: </strong> ".$estimado."<br /><br>";
            $bodycli .= "<strong>DIRECCION DE ENTREGA DE FOLLETOS: </strong> ".$direccion."<br /><br>";
            $bodycli .= "<strong>PROVINCIA: </strong> ".$prov."<br /><br>";
            $bodycli .= "<strong>HORARIO DE ENTREGA: </strong> ".$horario."<br /><br>";
            $bodycli .= "<strong>BULTOS: </strong> ".$bultos." <br /><br>";
            $bodycli .= "<strong>KILOS: </strong> ".$kilos."<br /><br>";
            $bodycli .= "<strong>COMENTARIOS: </strong> ".$comentarios."<br /><br>";
            $bodycli .= "<strong>SUCURSAL: </strong> ".$sucursal."<br /><br>";
            $bodycli .= "<strong>NOMBRE DE CONTACTO: </strong> ".$nombre."<br /><br>";
            $bodycli .= "<strong>TELEFONO DE CONTACTO: </strong> ".$telefono."<br /><br>";
            $bodycli .= "<strong>E-MAIL DE CONTACTO: </strong> ".$email."<br /><br />";
            $bodycli .= "</td></tr><tr><td><img src='http://webtoflyer.com/demo/mails/footer.jpg'></td></tr></table>";
        }
        $mailcli->IsHTML(true);
        $mailcli->Body = $bodycli;
        $mailcli->Send();

$mantSesion = $_SESSION['ESTADO'];
session_unset();

$_SESSION['ESTADO'] = $mantSesion;

header("Location:predis_diseniar-16_enviado.php");
//print_r($_POST);
?>