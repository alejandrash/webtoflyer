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
$aramis = $row_usuario["cod_aramis"];

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

$update_orden_tapa=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='8' AND usuario ='$usuario' AND cara='tapa' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_contratapa=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='8' AND usuario ='$usuario' AND id_sesion='$id_sesion' AND cara='contratapa' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_intizq=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='8' AND usuario ='$usuario' AND id_sesion='$id_sesion' AND cara='pag2' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_intder=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='8' AND usuario ='$usuario' AND id_sesion='$id_sesion' AND cara='pag3' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_intder=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='8' AND usuario ='$usuario' AND id_sesion='$id_sesion' AND cara='pag4' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_intder=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='8' AND usuario ='$usuario' AND id_sesion='$id_sesion' AND cara='pag5' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_intder=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='8' AND usuario ='$usuario' AND id_sesion='$id_sesion' AND cara='pag6' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_intder=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='8' AND usuario ='$usuario' AND id_sesion='$id_sesion' AND cara='pag7' ORDER BY Id DESC LIMIT 1") or die(mysql_error());

$update_rating=mysql_query("UPDATE rating_productos SET nro_orden='$nro_orden', actual='no' WHERE usuario ='$usuario' AND id_sesion='$id_sesion' AND tipo='8'") or die(mysql_error());

$result_borrar=mysql_query("DELETE from flyers WHERE terminado='no' AND tipo='8predis' AND usuario ='$usuario' AND cara='tapa'")  or die(mysql_error());

$url1='';
$url2='';
$url3='';
$url4='';
$url5='';
$url6='';
$url7='';
$url8='';

$result_flyer=mysql_query("select * from flyers WHERE tipo='8' AND usuario ='$usuario' AND cara='tapa' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url1="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer_contratapa=mysql_query("select * from flyers WHERE tipo='8' AND usuario ='$usuario' AND cara='contratapa' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_contratapa=mysql_fetch_array($result_flyer_contratapa))
{
    $url2="http://webtoflyer.com/demo/".$row_flyer_contratapa["url"];
}
$result_flyer_pag2=mysql_query("select * from flyers WHERE tipo='8' AND usuario ='$usuario' AND cara='pag2' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_pag2=mysql_fetch_array($result_flyer_pag2))
{
    $url3="http://webtoflyer.com/demo/".$row_flyer_pag2["url"];
}
$result_flyer_pag3=mysql_query("select * from flyers WHERE tipo='8' AND usuario ='$usuario' AND cara='pag3' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_pag3=mysql_fetch_array($result_flyer_pag3))
{
    $url4="http://webtoflyer.com/demo/".$row_flyer_pag3["url"];
}
$result_flyer_pag4=mysql_query("select * from flyers WHERE tipo='8' AND usuario ='$usuario' AND cara='pag4' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_pag4=mysql_fetch_array($result_flyer_pag4))
{
    $url5="http://webtoflyer.com/demo/".$row_flyer_pag4["url"];
}
$result_flyer_pag5=mysql_query("select * from flyers WHERE tipo='8' AND usuario ='$usuario' AND cara='pag5' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_pag5=mysql_fetch_array($result_flyer_pag5))
{
    $url6="http://webtoflyer.com/demo/".$row_flyer_pag5["url"];
}
$result_flyer_pag6=mysql_query("select * from flyers WHERE tipo='8' AND usuario ='$usuario' AND cara='pag6' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_pag6=mysql_fetch_array($result_flyer_pag6))
{
    $url7="http://webtoflyer.com/demo/".$row_flyer_pag6["url"];
}
$result_flyer_pag7=mysql_query("select * from flyers WHERE tipo='8' AND usuario ='$usuario' AND cara='pag7' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_pag7=mysql_fetch_array($result_flyer_pag7))
{
    $url8="http://webtoflyer.com/demo/".$row_flyer_pag7["url"];
}


$file1 = "uri=".$url1."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file2 = "uri=".$url2."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file3 = "uri=".$url3."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file4 = "uri=".$url4."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file5 = "uri=".$url5."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file6 = "uri=".$url6."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file7 = "uri=".$url7."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file8 = "uri=".$url8."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";

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

$file1 = "$file1&key=$api_key&hash=$hashed1";
$file2 = "$file2&key=$api_key&hash=$hashed2";
$file3 = "$file3&key=$api_key&hash=$hashed3";
$file4 = "$file4&key=$api_key&hash=$hashed4";
$file5 = "$file5&key=$api_key&hash=$hashed5";
$file6 = "$file6&key=$api_key&hash=$hashed6";
$file7 = "$file7&key=$api_key&hash=$hashed7";
$file8 = "$file8&key=$api_key&hash=$hashed8";

//$urlcli1 = "http://api.pagelr.com/capture/javascript?".$file1;
//$urlcli2 = "http://api.pagelr.com/capture/javascript?".$file2;
//$urlcli3 = "http://api.pagelr.com/capture/javascript?".$file3;
//$urlcli4 = "http://api.pagelr.com/capture/javascript?".$file4;
//$urlcli5 = "http://api.pagelr.com/capture/javascript?".$file5;
//$urlcli6 = "http://api.pagelr.com/capture/javascript?".$file6;
//$urlcli7 = "http://api.pagelr.com/capture/javascript?".$file7;
//$urlcli8 = "http://api.pagelr.com/capture/javascript?".$file8;

$urlcli1="http://do.convertapi.com/Web2Image?OutputFileName=TAPA_8".$id_sesion."&curl=".$url1."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli2="http://do.convertapi.com/Web2Image?OutputFileName=CONTRATAPA_8".$id_sesion."&curl=".$url2."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli3="http://do.convertapi.com/Web2Image?OutputFileName=PAG2_8".$id_sesion."&curl=".$url3."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli4="http://do.convertapi.com/Web2Image?OutputFileName=PAG3_8".$id_sesion."&curl=".$url4."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli5="http://do.convertapi.com/Web2Image?OutputFileName=PAG4_8".$id_sesion."&curl=".$url5."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli6="http://do.convertapi.com/Web2Image?OutputFileName=PAG5_8".$id_sesion."&curl=".$url6."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli7="http://do.convertapi.com/Web2Image?OutputFileName=PAG6_8".$id_sesion."&curl=".$url7."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli8="http://do.convertapi.com/Web2Image?OutputFileName=PAG7_8".$id_sesion."&curl=".$url8."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";

$md5hash1 = md5($url1."berazain");
$md5hash2 = md5($url2."berazain");
$md5hash3 = md5($url3."berazain");
$md5hash4 = md5($url4."berazain");
$md5hash5 = md5($url5."berazain");
$md5hash6 = md5($url6."berazain");
$md5hash7 = md5($url7."berazain");
$md5hash8 = md5($url8."berazain");


$url1 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url1."&secret_key=".$md5hash1."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=TAPA_8_".$aramis."_".$nro_orden.".pdf";

$url2 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url2."&secret_key=".$md5hash2."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=CONTRATAPA_8_".$aramis."_".$nro_orden.".pdf";

$url3 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url3."&secret_key=".$md5hash3."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=PAG2_8_".$aramis."_".$nro_orden.".pdf";

$url4 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url4."&secret_key=".$md5hash4."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=PAG3_8_".$aramis."_".$nro_orden.".pdf";

$url5 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url5."&secret_key=".$md5hash5."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=PAG4_8_".$aramis."_".$nro_orden.".pdf";

$url6 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url6."&secret_key=".$md5hash6."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=PAG5_8_".$aramis."_".$nro_orden.".pdf";
$url7 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url7."&secret_key=".$md5hash7."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=PAG6_8_".$aramis."_".$nro_orden.".pdf";
$url8 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url8."&secret_key=".$md5hash8."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=PAG7_8_".$aramis."_".$nro_orden.".pdf";

/* MAIL A IDG */
        $mail = new PHPMailer();
		$mail->Encoding="base64";
		$mail->Host = "localhost";
		$mail->From = "sistema@webtoflyer.com";
		$mail->FromName = "WTF";
		$mail->Timeout=30;
		$mail->Subject = $aramis." - ".$nro_orden." - Solicitud nueva Revista(8) WEB TO FLYER";
        $mail->AddAddress("ruben@idgonline.com.ar","WTF");
        $mail->AddCC('jorgelina@idgonline.com.ar');
        $mail->AddCC('alehusson@gmail.com');
		$mail->AddReplyTo($email, "WTF");
		
		$body  = "<table width='600' style='font-family: Verdana; font-size:12px;'><tr><td><img src='http://webtoflyer.com/demo/mails/header.jpg'></td></tr><tr><td style='padding:0 25px;'>Buen d&iacute;a, <br>Se ha generado una nueva solicitud de impresi&oacute;n. Les dejamos los datos a continuaci&oacute;n: </h3><br>Haga click en los 4 enlaces inferiores para descargar los PDF.<br><br>";
        $body .= "<strong>NRO DE REFERENCIA: </strong> ".$nro_orden."<br /><br>";
        $body .= "<strong>CODIGO DE CLIENTE: </strong> ".$aramis."<br /><br>";
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
        $body .= "<strong>INFORMACION TECNICA: </strong>Revista de 8 p&aacute;ginas | Papel obra 70grs | full color | abrochado<br /><br />";
        $body .= "Haciendo click en los links de descarga obtendran el diseno de la revista en alta: <br /><br>";        
        
        $body .= "<strong>TAPA: </strong> <a href=".$url1." target='_blank'>DESCARGAR TAPA</a><br />";
        $body .= "<strong>CONTRATAPA: </strong> <a href=".$url2." target='_blank'>DESCARGAR CONTRATAPA</a><br />";
        $body .= "<strong>PAGINA 2: </strong> <a href=".$url3." target='_blank'>DESCARGAR PAGINA 2</a><br />";
        $body .= "<strong>PAGINA 3: </strong> <a href=".$url4." target='_blank'>DESCARGAR PAGINA 3</a><br />";
        $body .= "<strong>PAGINA 4: </strong> <a href=".$url5." target='_blank'>DESCARGAR PAGINA 4</a><br />";
        $body .= "<strong>PAGINA 5: </strong> <a href=".$url6." target='_blank'>DESCARGAR PAGINA 5</a><br />";
        $body .= "<strong>PAGINA 6: </strong> <a href=".$url7." target='_blank'>DESCARGAR PAGINA 6</a><br />";
        $body .= "<strong>PAGINA 7: </strong> <a href=".$url8." target='_blank'>DESCARGAR PAGINA 7</a><br /><br /><br />";
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
        $mailmar->Subject = $aramis." - ".$nro_orden." - Solicitud nueva Revista (8) WEB TO FLYER";
        $mailmar->AddAddress("wtf@webtoflyer.com","WTF");
        $mailmar->AddCC('alehusson@gmail.com');
        
        $bodymar  = "<table width='600' style='font-family: Verdana; font-size:12px;'><tr><td><img src='http://webtoflyer.com/demo/mails/header.jpg'></td></tr><tr><td style='padding:0 25px;'>Estimados, <br>Se ha generado una nueva solicitud de impresi&oacute;n. Les dejamos los datos a continuaci&oacute;n:<br><br>";
        $bodymar .= "<strong>NRO DE REFERENCIA: </strong> ".$nro_orden."<br /><br>";
        $bodymar .= "<strong>CODIGO DE CLIENTE: </strong> ".$aramis."<br /><br>";
        $bodymar .= "<strong>CANTIDAD DE REVISTAS: </strong> ".$cantidad."<br /><br>";
        $bodymar .= "<strong>MONTO A CARGAR Cta. : </strong> $".$precio." + IVA<br /><br>";
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
        $bodymar .= "<strong>PAGINA 7: </strong> <a href=".$urlcli8." target='_blank' download>DESCARGAR PAGINA 7</a><br /><br /><br />";
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
		$mailcli->Subject = $aramis." - ".$nro_orden." - Solicitud nueva Revista(8) WEB TO FLYER";

        $mailcli->AddAddress($email,$nombre);
        $mailcli->AddBCC('alehusson@gmail.com');
		
        if ($cantidad < 10000) {
    		$bodycli  = "<table width='600' style='font-family: Verdana; font-size:12px;'><tr><td><img src='http://webtoflyer.com/demo/mails/header.jpg'></td></tr><tr><td style='padding:0 25px;'>Hola ".$nombre."! <br>Hiciste un nuevo pedido de impresi&oacute;n de revistas. <br>Tu diseno fue enviado a impresion y en unos dias llegara a tu local. <br>Por cualquier duda llamanos al 4871-8184, o chate&aacute; con nosotros ingresando a WTF. Muchas gracias.<br><br>Te dejamos una copia de todos los datos a continuaci&oacute;n: <br><br>";
            $bodycli .= "<strong>NRO DE REFERENCIA: </strong> ".$nro_orden."<br /><br>";
            $bodycli .= "<strong>CODIGO DE CLIENTE: </strong> ".$aramis."<br /><br>";
            $bodycli .= "<strong>CANTIDAD DE REVISTAS: </strong> ".$cantidad."<br /><br>";
            $bodycli .= "<strong>MONTO A CARGAR Cta. : </strong> $".$precio." + IVA<br /><br>";
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
            $bodycli .= "<strong>PAGINA 7: </strong> <a href=".$urlcli8." target='_blank' download>DESCARGAR PAGINA 7</a><br /><br /><br />";
    		$bodycli .= "</td></tr><tr><td><img src='http://webtoflyer.com/demo/mails/footer.jpg'></td></tr></table>";
        }
        else {
            $bodycli  = "<table width='600' style='font-family: Verdana; font-size:12px;'><tr><td><img src='http://webtoflyer.com/demo/mails/header.jpg'></td></tr><tr><td style='padding:0 25px;'>Hola ".$nombre."! <br>Hiciste un nuevo pedido de impresi&oacute;n de revistas. <br>Lo revisaremos para asegurarnos que sea optimo para impresion y en las siguientes horas te enviaremos los archivos para que des tu aprobacion final. <br>Por cualquier duda llamanos al 4871-8184, o chate&aacute; con nosotros ingresando a WTF. Muchas gracias.<br><br>Te dejamos una copia de todos los datos a continuaci&oacute;n: <br><br>";
            $bodycli .= "<strong>NRO DE REFERENCIA: </strong> ".$nro_orden."<br /><br>";
            $bodycli .= "<strong>CODIGO DE CLIENTE: </strong> ".$aramis."<br /><br>";
            $bodycli .= "<strong>CANTIDAD DE REVISTAS: </strong> ".$cantidad."<br /><br>";
            $bodycli .= "<strong>MONTO A CARGAR Cta. : </strong> $".$precio." + IVA<br /><br>";
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

header("Location:diseniar-8_enviado.php");
//echo($bodycli);
//print_r($_POST);
?>