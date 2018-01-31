<?php
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
header("Content-Type:text/html; charset=utf-8");
require("class.phpmailer.php");
include("class.smtp.php");

$clavecomun = $_POST['clavecomun'];
if ($clavecomun != 'GM_flyer2210') {
    header("Location:registro.php?msg_error=La clave de seguridad que ingresaste es incorrecta. Si no la recordas comunicate con nosotros desde el chat o llamanos e al 4871-8184.");
}
else {
    $email = $_POST['email'];
    if ($email==""){
        header("Location:registro.php");
    }
    else {

        $razonsocial = $_POST['razonsocial'];
        $nombre_contacto = $_POST['nombre'];
        $clave = $_POST['clave'];
        $clavemail = $_POST['clave'];
        $clave = base64_encode ($clave);

        $result_existe=mysql_query("select * from usuarios WHERE email ='$email'");
        if ($row_existe=mysql_fetch_array($result_existe)) {
            header("Location:registro.php?msg_error=El e-mail que ingresaste ya se usa en el sistema. Registrate con otro e-mail.");
        }

        $result_yaesta=mysql_query("select * from usuarios WHERE sucursal ='$razonsocial' AND email!=''");
        if ($row_yaesta=mysql_fetch_array($result_yaesta)) {
            header("Location:registro.php?msg_error=La razon social que elegiste ya se encuentra registrada.");
        }

        $result=mysql_query("UPDATE usuarios SET clave='$clave', email='$email', nombre_contacto='$nombre_contacto' WHERE Id='$razonsocial'") or die(mysql_error());

            $mail = new PHPMailer();
            $mail->Encoding="base64";
            $mail->Host = "localhost";
            $mail->From = "sistema@webtoflyer.com";
            $mail->FromName = "Grupo Marquez";
            $mail->Timeout=30;
            $mail->Subject = "Registro en WEB TO FLYER";
            $mail->AddAddress($email,"Grupo Marquez");

            $body  = "<table width='600' style='font-family: Verdana; font-size:12px;'><tr><td><img src='http://webtoflyer.com/mails/header.jpg'></td></tr><tr><td style='padding:0 25px;'>Hola ".$nombre_contacto."! <br>Te registraste en WEB TO FLYER.<br><br>Te recordamos tus datos de acceso. <br><br>Te recomendamos no borrar este e-mail para futura referencia.<br><br>";
            $body .= "<strong>Tu e-mail de acceso: </strong> ".$email."<br /><br>";
            $body .= "<strong>Tu clave de acceso: </strong> ".$clavemail."<br /><br></td></tr><tr><td><img src='http://webtoflyer.com/mails/footer.jpg'></td></tr></table>";

            $mail->IsHTML(true);
            $mail->Body = $body;
            $mail->Send();

        $result_dato=mysql_query("select * from usuarios WHERE email ='$email'");
        $row_dato=mysql_fetch_array($result_dato);
        $id = $row_dato['Id'];
        header("Location:comenzar.php?Id=".$id);
    }
}

?>