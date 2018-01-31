<?php 
session_set_cookie_params(21600,"/");
session_start();

$user = $_SESSION['ESTADO'];

include("includes/conexion.php");

header("Content-Type:text/html; charset=utf-8");

require("class.phpmailer.php");
include("class.smtp.php");

$result_user=mysql_query("select * from usuarios WHERE email ='$user'");
//$row_user=mysql_fetch_array($result_user);

if($row_user=mysql_fetch_array($result_user)) {
		$email=$user;
		$nombre=utf8_decode($row_user['nombre_contacto']);
		$razonsocial=utf8_decode($row_user['sucursal']);
		$direccion=utf8_decode($row_user['direccion']);
		$telefono=$row_user['telefono'];

		$descripcion = $_POST['descripcion'];
		$legales = $_POST['legales'];

        $mail = new PHPMailer();
		$mail->Encoding="base64";
		$mail->Host = "localhost";
		$mail->From = "sistema@webtoflyer.com";
		$mail->FromName = "WTF";
		$mail->Timeout=30;
		$mail->Subject = "WTF - Solicitud de Nuevo Banner";
        $mail->AddAddress("ruben@idgonline.com.ar");
        $mail->AddCC('jorgelina@idgonline.com.ar');
        $mail->AddCC('alehusson@gmail.com');
		$fecha = date("d-M-y H:i");
		
		$body  = "<table width='600' style='font-family: Verdana; font-size:12px;'><tr><td><img src='http://webtoflyer.com/demo/mails/header.jpg'></td></tr><tr><td style='padding:0 25px;'>Estimados,<br>Un usuario de WebToFlyer ha solicitado un nuevo banner:<br><br> <strong>Nombre de contacto: </strong>".$nombre."<br /><strong>Razon social: </strong>".$razonsocial."<br /><strong>E-mail: </strong>".$email."<br /><strong>Telefono: </strong>".$telefono."<br /><strong>direccion: </strong>".$direccion."<br><br>".$promos."<br /><strong>Informacion para el Banner: </strong>".$descripcion."<br /><strong>Legales para el Banner: </strong>".$legales."<br /><br></td></tr><tr><td><img src='http://webtoflyer.com/demo/mails/footer.jpg'></td></tr></table>";
			
		$mail->IsHTML(true);
		$mail->Body = $body;
		$mail->Send();
    header("Location:solicitar-promos.php?msg_ok=Recibimos correctamente tu solicitud. A la brevedad nos comunicaremos. Gracias!");
}
else {
	header("Location:index.php?msg_ok=La sesión ha expirado. Por favor inicia sesión nuevamente. Gracias.");
}
//print_r($_POST);
//echo($body);

?>