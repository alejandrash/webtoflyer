<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
require("class.phpmailer.php");
include("class.smtp.php");

$resultado = '';
$usuario = $_POST['usuario'];
$ruta = $_POST['ruta'];

if ($usuario == '') {
    $resultado = "1";
}
else {

            $mail = new PHPMailer();
            $mail->Encoding="base64";
            $mail->Host = "localhost";
            $mail->From = "sistema@webtoflyer.com";
            $mail->FromName = "WEB TO FLYER";
            $mail->Timeout=30;
            $mail->Subject = "WEB TO FLYER - Compartir en Instagram";
            $mail->AddAddress($usuario);
            $mail->addStringAttachment(file_get_contents($ruta), 'compartir_instagram.jpg');
            //$mail->AddAttachment($ruta, 'compartir_instagram.jpg', 'base64', 'application/octet-stream');


            $body  = "<table width='600' style='font-family: Verdana; font-size:12px;'><tr><td><img src='http://webtoflyer.com/mails/header.jpg'></td></tr><tr><td style='padding:0 25px;'>Hola, <br>Segu&iacute; estos pasos para publicar:<br>- Ingres&aacute; a tu mail desde tu Smartphone.<br>- Descarg&aacute; tu dise&ntilde;o.<br>- Ingres&aacute; a tu cuenta de Instagram.<br>- Public&aacute; tu dise&ntilde;o.<br><br>";
            $body .= "</tr><tr><td><img src='http://webtoflyer.com/mails/footer.jpg'></td></tr></table>";

            $mail->IsHTML(true);
            $mail->Body = $body;
            //$mail->Send();
            $estadoEnvio = $mail->Send(); 
            if($estadoEnvio){
                $resultado = "0";
            }
            else {
                $resultado = $mail->ErrorInfo;
            }

    //$resultado = "0";
}

echo($resultado);
?>