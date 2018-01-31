<?php
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
header("Content-Type:text/html; charset=utf-8");
require("class.phpmailer.php");
include("class.smtp.php");

$nombre_contacto = $_POST['nombre'];
if ($nombre_contacto==""){
    header("Location:editar-datos.php");
}
else {
    $id_usuario = $_POST['id_usuario'];
    $pvp = $_POST['pvp'];
    $email = $_POST['email'];
    $clave = $_POST['clave'];
    $clavemail = $_POST['clave'];
    $clave = base64_encode($clave);
    
    $result_existe=mysql_query("select * from usuarios WHERE email ='$email' AND Id!='$id_usuario'");
    if ($row_existe=mysql_fetch_array($result_existe)) {
        header("Location:editar-datos.php?msg_error=El e-mail que ingresaste ya se usa en el sistema. Ingresa otro e-mail.");
    }
    
    $enviar = 'no';
    $result_clave=mysql_query("select * from usuarios WHERE Id='$id_usuario'");
    $row_clave=mysql_fetch_array($result_clave);
    $email_actual = $row_clave['email'];
        if ($clave !=$row_clave['clave']) {
            $enviar = 'si';
        }
    }
    
    $result=mysql_query("UPDATE usuarios SET clave='$clave', email='$email', nombre_contacto='$nombre_contacto', pvp='$pvp' WHERE Id='$id_usuario'") or die(mysql_error());
    
    if (isset($_POST['direccion'])) {
        $id_sucursal = $_POST['sucursal'];
        $direccion = $_POST['direccion'];
        $provincia = $_POST['provincia'];
        $telefono = $_POST['telefono'];
        $result_suc=mysql_query("UPDATE sucursales SET direccion='$direccion', nombre_sucursal='$direccion', provincia='$provincia', telefono='$telefono' WHERE Id='$id_sucursal'") or die(mysql_error());
    }

    if ($email != $email_actual) {
        $nombre_tabla = ("vista_prod_".$id_usuario."");
        $result_act=mysql_query("UPDATE ".$nombre_tabla." SET usuario='$email' WHERE usuario='$email_actual'") or die(mysql_error());
        $result_act=mysql_query("UPDATE sesiones SET usuario='$email' WHERE usuario='$email_actual'") or die(mysql_error());
        $result_act=mysql_query("UPDATE productos SET usuario='$email' WHERE usuario='$email_actual'") or die(mysql_error());
        $result_act=mysql_query("UPDATE flyers SET usuario='$email' WHERE usuario='$email_actual'") or die(mysql_error());
        $result_act=mysql_query("UPDATE marcas SET usuario='$email' WHERE usuario='$email_actual'") or die(mysql_error());
        $result_act=mysql_query("UPDATE rating_productos SET usuario='$email' WHERE usuario='$email_actual'") or die(mysql_error());
        $result_act=mysql_query("UPDATE newsletters SET usuario='$email' WHERE usuario='$email_actual'") or die(mysql_error());
        $result_act=mysql_query("UPDATE cartel_precios SET usuario='$email' WHERE usuario='$email_actual'") or die(mysql_error());
        $result_act=mysql_query("UPDATE credito_personal SET usuario='$email' WHERE usuario='$email_actual'") or die(mysql_error());
        $mail = new PHPMailer();
		$mail->Encoding="base64";
		$mail->Host = "localhost";
		$mail->From = "sistema@webtoflyer.com";
		$mail->FromName = "WTF";
		$mail->Timeout=30;
		$mail->Subject = "Actualizacion de Datos WEB TO FLYER";
		$mail->AddAddress($email);
        
        $body  = "<table width='600' style='font-family: Verdana; font-size:12px;'><tr><td><img src='http://webtoflyer.com/mails/header.jpg'></td></tr><tr><td style='padding:0 25px;'>Hola ".$nombre_contacto."! <br>Modificaste tus datos de acceso, por lo que te los recordamos en este e-mail. <br><br>Te recomendamos no borrar este e-mail para futura referencia.<br><br>";
        $body .= "<strong>Tu e-mail de acceso: </strong> ".$email."<br /><br>";
        $body .= "<strong>Tu clave de acceso: </strong> ".$clavemail."<br /><br></td></tr><tr><td><img src='http://webtoflyer.com/mails/footer.jpg'></td></tr></table>";
			
		$mail->IsHTML(true);
		$mail->Body = $body;
		$mail->Send();
        header("Location:index.php?msg_ok=Los datos se actualizaron correctamente. Debes loguearte con tu nuevo e-mail.");
    }
    
    if ($enviar == 'si') {
        $mail = new PHPMailer();
		$mail->Encoding="base64";
		$mail->Host = "localhost";
		$mail->From = "sistema@webtoflyer.com";
		$mail->FromName = "WTF";
		$mail->Timeout=30;
		$mail->Subject = "Actualizacion de Datos WEB TO FLYER";
		$mail->AddAddress($email);
        
        $body  = "<table width='600' style='font-family: Verdana; font-size:12px;'><tr><td><img src='http://webtoflyer.com/mails/header.jpg'></td></tr><tr><td style='padding:0 25px;'>Hola ".$nombre_contacto."! <br>Modificaste tus datos de acceso, por lo que te los recordamos en este e-mail. <br><br>Te recomendamos no borrar este e-mail para futura referencia.<br><br>";
        $body .= "<strong>Tu e-mail de acceso: </strong> ".$email."<br /><br>";
        $body .= "<strong>Tu clave de acceso: </strong> ".$clavemail."<br /><br></td></tr><tr><td><img src='http://webtoflyer.com/mails/footer.jpg'></td></tr></table>";
			
		$mail->IsHTML(true);
		$mail->Body = $body;
		$mail->Send();
        
    }
    
    if ($email == $email_actual) {
        header("Location:editar-datos.php?msg_ok=Los datos se actualizaron correctamente.");
    }

?>