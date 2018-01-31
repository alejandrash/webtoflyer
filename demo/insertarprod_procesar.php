<?php
session_set_cookie_params(21600,"/"); 
session_start();
include("includes/conexion.php");
header("Content-Type:text/html; charset=utf-8");
require("class.phpmailer.php");
include("class.smtp.php");

if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

$id_cat=$_POST['categoria'];
$chequeo=$_POST['chequeo'];
//$titulo = htmlspecialchars($_POST['titulo']);
//$titulo=str_replace("'","*",$titulo);
//$titulo=str_replace('"',"&",$titulo);
$tipo=htmlspecialchars($_POST['tipo']);
$tipo = trim($tipo);
$tipo2 = $tipo;
$tipo=str_replace("'","*",$tipo);
$tipo=str_replace('"',"&",$tipo);
$modelo=$_POST['modelo'];
$modelo = trim($modelo);
$descripcion = htmlspecialchars($_POST['descripcion']);
$descripcion2 = $descripcion;
$descripcion=str_replace("'","*",$descripcion);
$descripcion=str_replace('"',"&quot;",$descripcion);
$precio=$_POST['precio'];
$ean = $_POST['ean'];

$id_marca=$_POST['marca'];
$result_marca=mysql_query("select * from marcas where Id='$id_marca'");
$row_marca=mysql_fetch_array($result_marca);
$nombre_marca = $row_marca['nombre'];
$nombre_marca = trim($nombre_marca);

$titulo = $tipo." ".$modelo." ".$nombre_marca;

$origen=$_POST['origen'];
$tags=$_POST['tags'];
$tags=str_replace(",",", ",$tags);
$usuario = $_SESSION['ESTADO'];
if ($usuario=='') {
	$usuario='jorgelina@idgonline.com.ar';
}
$result_social=mysql_query("select * from usuarios where email='$usuario'");
$row_social=mysql_fetch_array($result_social);
$social = $row_social['sucursal'];

$filename=$_POST['filenam'];
$fileori=$_POST['fileori'];

if ($id_cat == "") {
    header("Location:carga-productos.php");
}
if ($id_marca == "") {
    header("Location:carga-productos.php");
}

$ruta="images/productos/";//ruta carpeta donde queremos copiar las imágenes

rename("images/productos/".$fileori, "images/productos/".$filename);
$filename=$ruta.$filename;


    $imagen = explode("/", $filename, 4);
    $imagen = ($imagen[1]."/".$imagen[2]);
    $result=mysql_query("INSERT INTO productos (id_cat, id_marca, titulo, tipo, ean, modelo, nombre_marca, descripcion, foto, precio, origen, usuario, tags) VALUES ('$id_cat', '$id_marca', '$titulo', '$tipo', '$ean', '$modelo', '$nombre_marca', '$descripcion', '$imagen', '$0,00', '$origen', '$usuario', '$tags')") or die(mysql_error());

    if ($chequeo=='si') {
    		$mail = new PHPMailer();
            $mail->Encoding="base64";
            $mail->Host = "localhost";
            $mail->From = "sistema@webtoflyer.com";
            $mail->FromName = "WTF";
            $mail->Timeout=30;
            $mail->Subject = "Solicitud Chequeo de Producto WEB TO FLYER";
            $mail->AddAddress("jorgelina@idgonline.com.ar");
            $mail->AddCC('alehusson@gmail.com');

            $body  = "<table width='600' style='font-family: Verdana; font-size:12px;'><tr><td><img src='http://webtoflyer.com/mails/header.jpg'></td></tr><tr><td style='padding:0 25px;'>El usuario <strong>".$social."</strong> ha solicitado el chequeo de un producto.<br><br><strong>Datos del producto a revisar:</strong><br><br>";
            $body .= "<strong>Tipo de producto: </strong> ".$tipo2."<br /><br>";
            $body .= "<strong>Modelo: </strong> ".$modelo."<br /><br>";
            $body .= "<strong>Marca: </strong> ".$nombre_marca."<br /><br>";
            $body .= "<strong>Origen: </strong> ".$origen."<br /><br>";
            $body .= "<strong>Descripcion: </strong> ".$descripcion2."<br /><br>";
            $body .= "<strong>Imagen: </strong> <a href='http://www.webtoflyer.com/demo/images/".$imagen."' target='_blank' download>http://www.webtoflyer.com/images/".$imagen."</a><br /><br></td></tr><tr><td><img src='http://webtoflyer.com/mails/footer.jpg'></td></tr></table>";

            $mail->IsHTML(true);
            $mail->Body = $body;
            $mail->Send();
    }
    header("Location:carga-productos.php?msg_ok=El producto se ha agregado correctamente.");


//print_r($_POST);

?>