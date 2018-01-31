<?php 
session_set_cookie_params(21600,"/");
session_start();

$user = $_SESSION['ESTADO'];

include("includes/conexion.php");

header("Content-Type:text/html; charset=utf-8");

require("class.phpmailer.php");
include("class.smtp.php");

$result_user=mysql_query("select * from usuarios WHERE email ='$user'");
$row_user=mysql_fetch_array($result_user);

$email=$user;
$nombre=utf8_decode($row_user['nombre_contacto']);
$razonsocial=utf8_decode($row_user['sucursal']);
$direccion=utf8_decode($row_user['direccion']);
$telefono=$row_user['telefono'];
$servicios = "Servicios que solicita el usuario: <br>";

$observaciones = utf8_decode($_POST['observaciones']);
$i=0;
foreach($_POST['personalizado'] as $item){
  $servicios = $servicios."<strong>- ".utf8_decode($item)."</strong><br>";
}

        $mail = new PHPMailer();
		$mail->Encoding="base64";
		$mail->Host = "localhost";
		$mail->From = "sistema@webtoflyer.com";
		$mail->FromName = "WTF";
		$mail->Timeout=30;
		$mail->Subject = "WTF - Servicio Personalizado";
        $mail->AddCC('jorgelina@idgonline.com.ar');
        $mail->AddCC('alehusson@gmail.com');
		$fecha = date("d-M-y H:i");
		
		$body  = "<table width='600' style='font-family: Verdana; font-size:12px;'><tr><td><img src='http://webtoflyer.com/demo/mails/header.jpg'></td></tr><tr><td style='padding:0 25px;'>Hola IDG,<br>Un usuario de WebToFlyer ha solicitado un servicio personalizado, debajo veras los datos de contacto del usuario, y los servicios que solicita:<br><br> <strong>Nombre de contacto: </strong>".$nombre."<br /><strong>Razon social: </strong>".$razonsocial."<br /><strong>E-mail: </strong>".$email."<br /><strong>Telefono: </strong>".$telefono."<br /><strong>direccion: </strong>".$direccion."<br><br>".$servicios."<br /><br>".$observaciones."<br /><br></td></tr><tr><td><img src='http://webtoflyer.com/demo/mails/footer.jpg'></td></tr></table>";
			
		$mail->IsHTML(true);
		$mail->Body = $body;
		$mail->Send();
    header("Location:personalizado.php?msg_ok=Recibimos correctamente tu solicitud. A la brevedad nos comunicaremos. Gracias!");

//print_r($_POST);

?>