<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");

header("Content-Type:text/html; charset=utf-8");

require("class.phpmailer.php");
include("class.smtp.php");

$email=$_POST['email'];

$result_email=mysql_query("select * from usuarios WHERE email ='$email'");
$row_email=mysql_fetch_array($result_email);
$select_email = $row_email["email"];

if($select_email != $email) {
    header("Location:olvido.php?msg_error=El e-mail que ha ingresado no es el asociado al sistema.");
}

else {
    $clave = $row_email["clave"];
    $clave = base64_decode ($clave);
        $mail = new PHPMailer();
		$mail->Encoding="base64";
		$mail->Host = "localhost";
		$mail->From = "sistema@webtoflyer.com";
		$mail->FromName = "WTF";
		$mail->Timeout=30;
		$mail->Subject = "Recordatorio de Clave";
		$mail->AddAddress($select_email,$select_email);
		$fecha = date("d-M-y H:i");
		
		$body  = "<table width='600' style='font-family: Verdana; font-size:12px;'><tr><td><img src='http://webtoflyer.com/mails/header.jpg'></td></tr><tr><td style='padding:0 25px;'>Hola,<br>Te recordamos su clave de acceso al sistema WEB TO FLYER: <strong>" . $clave ."</strong><br><br>Conserva este e-mail para futura referencia.<br /><br></td></tr><tr><td><img src='http://webtoflyer.com/mails/footer.jpg'></td></tr></table>";
			
		$mail->IsHTML(true);
		$mail->Body = $body;
		$mail->Send();
    header("Location:index.php?msg_ok=La clave ha sido enviada a su e-mail. Revise su bandeja de entrada o carpeta spam.");
}

//print_r($_POST);

?>