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

$update_orden_frente=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='2' AND usuario ='$usuario' AND cara='frente' ORDER BY Id DESC LIMIT 1") or die(mysql_error());
$update_orden_dorso=mysql_query("UPDATE flyers SET nro_orden='$nro_orden', terminado='si' WHERE tipo='2' AND usuario ='$usuario' AND cara='dorso' ORDER BY Id DESC LIMIT 1") or die(mysql_error());

$update_rating=mysql_query("UPDATE rating_productos SET nro_orden='$nro_orden', actual='no' WHERE usuario ='$usuario' AND id_sesion='$id_sesion' AND tipo='2'") or die(mysql_error());


$url1='';
$url2='';

$result_flyer=mysql_query("select * from flyers WHERE tipo='2' AND usuario ='$usuario' AND cara='frente' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url1="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer_contratapa=mysql_query("select * from flyers WHERE tipo='2' AND usuario ='$usuario' AND cara='dorso' ORDER BY Id DESC LIMIT 1");
if ($row_flyer_contratapa=mysql_fetch_array($result_flyer_contratapa))
{
    $url2="http://webtoflyer.com/demo/".$row_flyer_contratapa["url"];
}


$file1 = "uri=".$url1."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
$file2 = "uri=".$url2."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";

$api_key = "fdJAIgr560-nXJBMVv89Zg";
$api_secret = "hola";
$hashed1 = md5($file1 . $api_secret);
$hashed2 = md5($file2 . $api_secret);

$file1 = "$file1&key=$api_key&hash=$hashed1";
$file2 = "$file2&key=$api_key&hash=$hashed2";

$urlcli1="http://do.convertapi.com/Web2Image?OutputFileName=FRENTE_FLYER".$id_sesion."&curl=".$url1."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli2="http://do.convertapi.com/Web2Image?OutputFileName=DORSO_FLYER".$id_sesion."&curl=".$url2."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";

$md5hash1 = md5($url1."berazain");
$md5hash2 = md5($url2."berazain");


$url1 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url1."&secret_key=".$md5hash1."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=FRENTE_FLYER_".$aramis."_".$nro_orden.".pdf";

$url2 = "http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff&document_url=".$url2."&secret_key=".$md5hash2."&page_size=A4&margin_top=0&margin_bottom=0&margin_left=0&margin_right=0&dpi=1000&ttl=300&force=1&document_name=DORSO_FLYER_".$aramis."_".$nro_orden.".pdf";

/* MAIL A IDG */
        $mail = new PHPMailer();
		$mail->Encoding="base64";
		$mail->Host = "localhost";
		$mail->From = "sistema@webtoflyer.com";
		$mail->FromName = "";
		$mail->Timeout=30;
		$mail->Subject = $aramis." - ".$nro_orden." - Solicitud nuevo Flyer WEB TO FLYER";
        $mail->AddAddress("ruben@idgonline.com.ar");
        $mail->AddCC('jorgelina@idgonline.com.ar');
        $mail->AddCC('alehusson@gmail.com');
		$mail->AddReplyTo($email, "WTF");
		
		$body  = "<table width='600' style='font-family: Verdana; font-size:12px;'><tr><td><img src='http://webtoflyer.com/demo/mails/header.jpg'></td></tr><tr><td style='padding:0 25px;'>Buen d&iacute;a, <br>Se ha generado una nueva solicitud de impresi&oacute;n. Les dejamos los datos a continuaci&oacute;n: </h3><br>Haga click en los enlaces inferiores para descargar los PDF.<br><br>";
        $body .= "<strong>NRO DE REFERENCIA: </strong> ".$nro_orden."<br /><br>";
        $body .= "<strong>CODIGO DE CLIENTE: </strong> ".$aramis."<br /><br>";
        $body .= "<strong>CANTIDAD DE FLYERS: </strong> ".$cantidad."<br /><br>";
        $body .= "<strong>MONTO A CARGAR Cta. : </strong> $".$precio." + IVA<br /><br>";
        $body .= "<strong>SEMANA ESTIMADA DE ENTREGA: </strong> ".$estimado."<br /><br>";
        $body .= "<strong>DIRECCION DE ENTREGA DE FOLLETOS: </strong> ".$direccion."<br /><br>";
        $body .= "<strong>HORARIO DE ENTREGA: </strong> ".$horario."<br /><br>";
        $body .= "<strong>BULTOS: </strong> ".$bultos." <br /><br>";
        $body .= "<strong>KILOS: </strong> ".$kilos."<br /><br>";
        $body .= "<strong>COMENTARIOS: </strong> ".$comentarios."<br /><br>";
        $body .= "<strong>RAZON SOCIAL: </strong> ".$sucursal."<br /><br>";
        $body .= "<strong>NOMBRE DE CONTACTO: </strong> ".$nombre."<br /><br>";
        $body .= "<strong>TELEFONO DE CONTACTO: </strong> ".$telefono."<br /><br>";
        $body .= "<strong>E-MAIL DE CONTACTO: </strong> ".$email."<br /><br />";
        $body .= "<strong>INFORMACION TECNICA: </strong>Flyer Frente y Dorso | Papel obra 70grs | full color<br /><br />";
        $body .= "Haciendo click en los links de descarga obtendran el diseno del flyer en alta: <br /><br>";        
        
        $body .= "<strong>FRENTE: </strong> <a href=".$url1." target='_blank'>DESCARGAR FRENTE</a><br />";
        $body .= "<strong>DORSO: </strong> <a href=".$url2." target='_blank'>DESCARGAR DORSO</a><br /><br /><br />";
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
        $mailmar->Subject = $aramis." - ".$nro_orden." - Solicitud nuevo Flyer WEB TO FLYER";
        $mailmar->AddAddress("wtf@webtoflyer.com");
        $mailmar->AddCC('alehusson@gmail.com');
        
        $bodymar  = "<table width='600' style='font-family: Verdana; font-size:12px;'><tr><td><img src='http://webtoflyer.com/demo/mails/header.jpg'></td></tr><tr><td style='padding:0 25px;'>Estimados, <br>Se ha generado una nueva solicitud de impresi&oacute;n. Les dejamos los datos a continuaci&oacute;n:<br><br>";
        $bodymar .= "<strong>NRO DE REFERENCIA: </strong> ".$nro_orden."<br /><br>";
        $bodymar .= "<strong>CODIGO DE CLIENTE: </strong> ".$aramis."<br /><br>";
        $bodymar .= "<strong>CANTIDAD DE FLYERS: </strong> ".$cantidad."<br /><br>";
        $bodymar .= "<strong>MONTO A CARGAR Cta. : </strong> $".$precio." + IVA<br /><br>";
        $bodymar .= "<strong>SEMANA ESTIMADA DE ENTREGA: </strong> ".$estimado."<br /><br>";
        $bodymar .= "<strong>DIRECCION DE ENTREGA DE FOLLETOS: </strong> ".$direccion."<br /><br>";
        $bodymar .= "<strong>HORARIO DE ENTREGA: </strong> ".$horario."<br /><br>";
        $bodymar .= "<strong>COMENTARIOS: </strong> ".$comentarios."<br /><br>";
        $bodymar .= "<strong>SUCURSAL: </strong> ".$sucursal."<br /><br>";
        $bodymar .= "<strong>NOMBRE DE CONTACTO: </strong> ".$nombre."<br /><br>";
        $bodymar .= "<strong>TELEFONO DE CONTACTO: </strong> ".$telefono."<br /><br>";
        $bodymar .= "<strong>E-MAIL DE CONTACTO: </strong> ".$email."<br /><br />";
        $bodymar .= "Haciendo click en los links de descarga obtendran el diseno del flyer en formato JPG: <br /><br>";        
        
        $bodymar .= "<strong>FRENTE: </strong> <a href=".$urlcli1." target='_blank' download>DESCARGAR FRENTE</a><br />";
        $bodymar .= "<strong>DORSO: </strong> <a href=".$urlcli2." target='_blank' download>DESCARGAR DORSO</a><br /><br /><br />";
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
		$mailcli->Subject = $aramis." - ".$nro_orden." - Solicitud nuevo Flyer WEB TO FLYER";

        $mailcli->AddAddress($email,$nombre);
        $mailcli->AddBCC('alehusson@gmail.com');
		
        if ($cantidad < 10000) {
    		$bodycli  = "<table width='600' style='font-family: Verdana; font-size:12px;'><tr><td><img src='http://webtoflyer.com/demo/mails/header.jpg'></td></tr><tr><td style='padding:0 25px;'>Hola ".$nombre."! <br>Hiciste un nuevo pedido de impresi&oacute;n de flyers. <br>Tu diseno fue enviado a impresion y en unos dias llegara a tu local. <br>Por cualquier duda llamanos al 4871-8184, o chate&aacute; con nosotros ingresando a WTF. Muchas gracias.<br><br>Te dejamos una copia de todos los datos a continuaci&oacute;n: <br><br>";
            $bodycli .= "<strong>NRO DE REFERENCIA: </strong> ".$nro_orden."<br /><br>"; 
            $bodycli .= "<strong>CODIGO DE CLIENTE: </strong> ".$aramis."<br /><br>";
            $bodycli .= "<strong>CANTIDAD DE FLYERS: </strong> ".$cantidad."<br /><br>";
            $bodycli .= "<strong>MONTO A CARGAR Cta. : </strong> $".$precio." + IVA<br /><br>";
            $bodycli .= "<strong>SEMANA ESTIMADA DE ENTREGA: </strong> ".$estimado."<br /><br>";
            $bodycli .= "<strong>DIRECCION DE ENTREGA DE FOLLETOS: </strong> ".$direccion."<br /><br>";
            $bodycli .= "<strong>HORARIO DE ENTREGA: </strong> ".$horario."<br /><br>";
            $bodycli .= "<strong>BULTOS: </strong> ".$bultos." <br /><br>";
            $bodycli .= "<strong>KILOS: </strong> ".$kilos."<br /><br>";
            $bodycli .= "<strong>COMENTARIOS: </strong> ".$comentarios."<br /><br>";
            $bodycli .= "<strong>SUCURSAL: </strong> ".$sucursal."<br /><br>";
            $bodycli .= "<strong>NOMBRE DE CONTACTO: </strong> ".$nombre."<br /><br>";
            $bodycli .= "<strong>TELEFONO DE CONTACTO: </strong> ".$telefono."<br /><br>";
            $bodycli .= "<strong>E-MAIL DE CONTACTO: </strong> ".$email."<br /><br />";
            $bodycli .= "Haciendo click en los links de descarga obtendran el diseno del flyer en formato JPG: <br /><br>";        
        
            $bodycli .= "<strong>FRENTE: </strong> <a href=".$urlcli1." target='_blank' download>DESCARGAR FRENTE</a><br />";
            $bodycli .= "<strong>DORSO: </strong> <a href=".$urlcli2." target='_blank' download>DESCARGAR DORSO</a><br /><br /><br />";
    		$bodycli .= "</td></tr><tr><td><img src='http://webtoflyer.com/demo/mails/footer.jpg'></td></tr></table>";
        }
        else {
            $bodycli  = "<table width='600' style='font-family: Verdana; font-size:12px;'><tr><td><img src='http://webtoflyer.com/demo/mails/header.jpg'></td></tr><tr><td style='padding:0 25px;'>Hola ".$nombre."! <br>Hiciste un nuevo pedido de impresi&oacute;n de flyers. <br>Lo revisaremos para asegurarnos que sea optimo para impresion y en las siguientes horas te enviaremos los archivos para que des tu aprobacion final. <br>Por cualquier duda llamanos al 4871-8184, o chate&aacute; con nosotros ingresando a WTF. Muchas gracias.<br><br>Te dejamos una copia de todos los datos a continuaci&oacute;n: <br><br>";
            $bodycli .= "<strong>NRO DE REFERENCIA: </strong> ".$nro_orden."<br /><br>";
            $bodycli .= "<strong>CODIGO DE CLIENTE: </strong> ".$aramis."<br /><br>";
            $bodycli .= "<strong>CANTIDAD DE FLYERS: </strong> ".$cantidad."<br /><br>";
            $bodycli .= "<strong>MONTO A CARGAR Cta. : </strong> $".$precio." + IVA<br /><br>";
            $bodycli .= "<strong>SEMANA ESTIMADA DE ENTREGA: </strong> ".$estimado."<br /><br>";
            $bodycli .= "<strong>DIRECCION DE ENTREGA DE FOLLETOS: </strong> ".$direccion."<br /><br>";
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

header("Location:diseniar-volante_enviado.php");
//echo($bodycli);
//print_r($_POST);
?>