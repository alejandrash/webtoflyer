<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$control = 0;

$ruta="flyer/";//ruta carpeta donde queremos copiar las imágenes


if (!file_exists($_FILES['banner_tapa']['tmp_name']) || !is_uploaded_file($_FILES['banner_tapa']['tmp_name'])) 
{
    $control++;
}
else
{
    $uploadfile_temporal=$_FILES['banner_tapa']['tmp_name'];
    $uploadfile_nombre=$ruta.'cabecera.jpg';
    move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
}

if (!file_exists($_FILES['banner_intder']['tmp_name']) || !is_uploaded_file($_FILES['banner_intder']['tmp_name'])) 
{
    $control++;
}
else
{
    $uploadfile_temporal2=$_FILES['banner_intder']['tmp_name'];
    $uploadfile_nombre2=$ruta.'cobranding.jpg';
    move_uploaded_file($uploadfile_temporal2,$uploadfile_nombre2);
}

if ($control==2) {
    header("Location:carga-banners.php?msg_error=No agregaste ningún banner.");
}
else {
    header("Location:carga-banners.php?msg_ok=El/Los banners se agregó/aron correctamente.");
}
?>