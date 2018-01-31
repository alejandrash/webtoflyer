<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
header("Content-Type:text/html; charset=utf-8");

$ruta="flyer/banners/";//ruta carpeta donde queremos copiar las imágenes

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
}

print_r($_POST);

?>