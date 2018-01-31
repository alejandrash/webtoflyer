<?php 
session_set_cookie_params(21600,"/");
session_start();
header("Content-Type:text/html; charset=utf-8");
include("includes/conexion.php");

if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

require("class.phpmailer.php");

$usuario = $_SESSION['ESTADO'];
$result_us=mysql_query("select * from usuarios WHERE email = '$usuario'");
$row_us=mysql_fetch_array($result_us);
$id_usuario = $row_us['Id'];
$razonsocial = utf8_decode($row_us['sucursal']);
$nombre_contacto = utf8_decode($row_us['nombre_contacto']);
$result_us2=mysql_query("select * from sucursales WHERE id_usuario = '$id_usuario' LIMIT 1");
$row_us2=mysql_fetch_array($result_us2);
$telefono = $row_us2['telefono'];

$fechacreacion = date("Y-m-d H:i:s");

$comentarios=utf8_decode($_POST['comentarios']);
$newsletter=$_POST['newsletter'];
$name="newsletters/newsletter_".$fechacreacion."_".$id_usuario.".html";

if ($newsletter == "") {
    header("Location:marketing.php");
}


$newsfinal = "<!DOCTYPE HTML><html><head><title>Grupo Marquez - WEB TO FLYER</title><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /></head><body style='background:#FFF;'>".$newsletter."</body></html>";
    
    $file=fopen($name, "w"); 
    fwrite($file, $newsfinal); 
    fclose($file);

$result=mysql_query("INSERT INTO newsletters (fecha, usuario, url) VALUES ('$fechacreacion', '$usuario', '$name')") or die(mysql_error());
$result_news=mysql_query("select * from newsletters ORDER BY Id DESC LIMIT 1");
$row_news=mysql_fetch_array($result_news);
$id_news = $row_news['Id'];

        /* MAIL A IDG */
        $mail = new PHPMailer();
		$mail->Encoding="base64";
		$mail->Host = "localhost";
		$mail->From = "sistema@webtoflyer.com";
		$mail->FromName = "Grupo Marquez";
		$mail->Timeout=30;
		$mail->Subject = $id_news." - Solicitud nuevo NEWSLETTER - WEB TO FLYER";
        $mail->AddAddress("marketing@idgonline.com.ar","Marketing");
        $mail->AddAttachment( $_FILES['excel_dir']['tmp_name'], $_FILES['excel_dir']['name'] );
        $mail->AddCC('ruben@idgonline.com.ar');
        $mail->AddCC('alehusson@gmail.com');
		
		$body  = "<table width='600' style='font-family: Verdana; font-size:12px;'><tr><td><img src='http://webtoflyer.com/mails/header.jpg'></td></tr><tr><td style='padding:0 25px;'>Buen d&iacute;a, <br>Se ha generado una nueva solicitud de env&iacute;o de newsletter. A continuaci&oacute;n les dejamos los datos del socio, el link donde obtener el HTML para el env&iacute;o, y <strong>adjunto el Excel con las direcciones de correo destinatarias</strong>: <br><br>";
        $body .= "<strong>NRO DE REFERENCIA: </strong> ".$id_news."<br /><br>";
        $body .= "<strong>COMENTARIOS: </strong> ".$comentarios."<br /><br>";
        $body .= "<strong>RAZON SOCIAL: </strong> ".$razonsocial."<br /><br>";
        $body .= "<strong>TELEFONO DE CONTACTO: </strong> ".$telefono."<br /><br>";
        $body .= "<strong>E-MAIL DE CONTACTO: </strong> ".$usuario."<br /><br />";            
        $body .= "<strong>CLICK AQU&Iacute; PARA OBTENER EL HTML A COPIAR: </strong> <a href='http://webtoflyer.com/".$name."' target='_blank'>HTML DEL NEWSLETTER</a><br /><br /><br />";
		$body .= "</td></tr><tr><td><img src='http://webtoflyer.com/mails/footer.jpg'></td></tr></table>";

		$mail->IsHTML(true);
		$mail->Body = $body;
		$mail->Send();

/* MAIL AL CLIENTE */
        $mailcli = new PHPMailer();
		$mailcli->Encoding="base64";
		$mailcli->Host = "localhost";
		$mailcli->From = "sistema@webtoflyer.com";
		$mailcli->FromName = "Grupo Marquez";
		$mailcli->Timeout=30;
		$mailcli->Subject = $id_news." - Solicitud nuevo NEWSLETTER - WEB TO FLYER";
        $mailcli->AddAddress($usuario,$nombre_contacto);
		
		$bodycli  = "<table width='600' style='font-family: Verdana; font-size:12px;'><tr><td><img src='http://webtoflyer.com/mails/header.jpg'></td></tr><tr><td style='padding:0 25px;'>Hola ".$nombre_contacto."! <br>Hiciste un nuevo pedido de env&iacute;o de newsletters. Nos pondremos en contacto para notificarte sobre el estado de su envio.<br>No respondas este e-mail. Por cualquier duda llamanos al 4871-8184, o chate&aacute; con nosotros ingresando a WTF.<br><br>";
        $bodycli .= "<strong>TU NRO DE REFERENCIA ES: </strong> ".$id_news."<br /><br>";
		$bodycli .= "</td></tr><tr><td><img src='http://webtoflyer.com/mails/footer.jpg'></td></tr></table>";

		$mailcli->IsHTML(true);
		$mailcli->Body = $bodycli;
		$mailcli->Send();

header("Location:marketing.php?msg_ok=Recibimos tu pedido de newsletter, nos pondremos en contacto para notificarte sobre el estado de su envio.");
//print_r($_POST);

?>