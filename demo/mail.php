<?php
if(isset($_POST['email'])){
		$mailTo = "pablojoannas@hotmail.com";
		$subject = "Contacto de la web - Pueblo Limite";
		$body = "Nuevo Mensaje - Pueblo Limite
<br><br>
De: ".$_POST['email']."<br>
Nombre: ".$_POST['name']."<br>
Mensaje: ".$_POST['message']."<br>";	
		$headers = "To: Solido <".$mailTo.">\r\n";
		$headers .= "From: ".$_POST['name']." <".$_POST['email'].">\r\n";
		$headers .= "Content-Type: text/html";
		//envio destinatario
		$mail_success =  mail($mailTo, utf8_decode($subject), utf8_decode($body), $headers);		
}
?>  