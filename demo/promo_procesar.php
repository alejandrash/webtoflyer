<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
header("Content-Type:text/html; charset=utf-8");

$ruta="flyer/promos/";//ruta carpeta donde queremos copiar las imágenes

$redirect = "carga-promos.php?success";

foreach($_FILES as $key=>$file) { 
    $uploadfile_temporal=$file['tmp_name'];
    $uploadfile_nombre=$ruta.$file['name'];
    $uploadfile_size = $file['size'];
}

if (is_uploaded_file($uploadfile_temporal))
{
    move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
    $imagen = explode("/", $uploadfile_nombre, 4);
    $imagen = ($imagen[1]."/".$imagen[2]);
    //$imagen = $uploadfile_nombre;
    //$result=mysql_query("INSERT INTO marcas (nombre, logo) VALUES ('$nombre', '$imagen')") or die(mysql_error());
}

//$result_cod=mysql_query("select * from productos WHERE codigo='$codigo'");
//if ($row_cod=mysql_fetch_array($result_cod)) {
//    header("Location:insertar-prod.php?msg_error=Ya existe un producto con el mismo código.");
//}

//else {  
  // $result=mysql_query("INSERT INTO marcas (nombre, logo) VALUES ('$nombre', '$imagen')") or die(mysql_error());
   
    //header("Location:carga-marcas.php?msg_error=La marca se ha agregado correctamente.");
//}

//print_r($_POST);

?>