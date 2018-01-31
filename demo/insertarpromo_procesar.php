<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

$filename=$_POST['filenam'];
$fileori=$_POST['fileori'];
$select_rs=$_POST['select_rs'];
$legales=$_POST['legales'];

if ($legales == "") {
    $legales = 0;
}

if ($nombre == "") {
    header("Location:carga-promos.php");
}

$ruta="flyer/promos/";//ruta carpeta donde queremos copiar las imágenes

rename("flyer/promos/".$fileori, "flyer/promos/".$filename);
$filename=$ruta.$filename;

//$redirect = "carga-marcas.php?success";

//$uploadfile_temporal=$_FILES['foto']['tmp_name'];
//$uploadfile_nombre=$ruta.date('m-d-Y_hia').$_FILES['foto']['name'];
//$uploadfile_size = $_FILES['foto']['size'];

//if (is_uploaded_file($uploadfile_temporal))
//{
   // move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
    $imagen = explode("/", $filename, 4);
    $imagen = ($imagen[1]."/".$imagen[2]);
    //$imagen = $uploadfile_nombre;
    $result=mysql_query("INSERT INTO promos (foto, visible, legales) VALUES ('$imagen', '$select_rs', '$legales')") or die(mysql_error());
    header("Location:carga-promos.php?msg_ok=La promo se ha agregado correctamente.");
//}


//print_r($_POST);

?>